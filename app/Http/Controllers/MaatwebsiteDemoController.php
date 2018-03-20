<?php
namespace App\Http\Controllers;



use Illuminate\Http\Request;

use \App\Student;

use Excel;



class MaatwebsiteDemoController extends Controller

{

	public function __construct()
	{
			$this->middleware('auth:admin');
	}

	/**

     * Return View file

     *

     * @var array

     */

	public function importExport()

	{

		return view('importExport');

	}



	/**

     * File Export Code

     *

     * @var array

     */

	public function downloadExcel(Request $request, $type)

	{

		$data = Student::get()->toArray();

		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

			$excel->sheet('mySheet', function($sheet) use ($data)

	        {

				$sheet->fromArray($data);

	        });

		})->download($type);

	}



	/**

     * Import file into database Code

     *

     * @var array

     */

	public function importExcel(Request $request)

	{



		if($request->hasFile('import_file')){

			$path = $request->file('import_file')->getRealPath();



			$data = Excel::load($path, function($reader) {})->get();



			if(!empty($data) && $data->count()){


				$i=0;
				$errcount=0;
				$rowcount=0;
				foreach ($data->toArray() as $key => $value) {

					if(!empty($value)){
						//echo $value;
						//dd($value);
						// foreach ($value as $v) {
						// 	dd($v);
						// 	$insert = ['name' => $v['name'], 'email' => $v['email'], 'rollno' => $v['rollno']];
						//
						// }
						$rowcount++;

						$users = Student::where('rollno',$value['rollno']) ->orWhere('email',$value['email'])->get();
						
						if(count($users)>0)
						{
							$errcount++;
							
						}

						else
						{

						$insert[$i++]= ['name' => $value['name'], 'email' => $value['email'], 'rollno' => $value['rollno'], 'cgpa' => $value['cgpa']];
					}
				}

				}
				
				if($errcount==$rowcount)
				{
					return back()->with('error','Only duplicate entries found');

				}

				else if($errcount > 0)
				{
					\App\Student::insert($insert);

					return back()->with('error','Data inserted successfully except Duplicate entries found');

				}

				

				if(!empty($insert)){

					\App\Student::insert($insert);

					return back()->with('success','Insert Record successfully.');

				}



			}



		}



		return back()->with('error','Please Check your file, Something is wrong there.');

	}



}
