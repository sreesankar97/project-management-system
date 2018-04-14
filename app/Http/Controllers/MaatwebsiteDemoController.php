<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Http\Request;

use \App\Student;
use \App\sorted;
use \App\faculty;
use Excel;
use App\geninfo;



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
	public function teamformation()
	{


		$var=student::orderBy('cgpa', 'desc')->get();
		$sorted=sorted::orderBy('cgpa', 'desc')->get();
	
		return view('importExport',['sorted'=>$sorted,'users'=>$var]);

	}
	public function team(Request $request)
	{
			$this->validate($request, [
					'studentno' => 'required',
					'count' =>'required',

			]);

			if($request->studentno ==0)
			return back()->with('msg', 'Number of students in a team cannot be null');

			

			else if(($request->studentno) > ($request->count))
			return back()->with('msg', 'Total number of students must be greater than team size');

			else 
			{
				
				
			$sno = $request->studentno;
			$count =$request->count;
			$exstud=$count % $sno;
			$totalstud=$count-$exstud;
			$noofteam=$count/$sno;

			//dd($count);

			$var=student::orderBy('cgpa', 'desc')->get();
		    /*$half= $sno/2;
			$half=ceil($half);
			echo $half;
			$bott= $sno-$half;
			$h=1;
			*/
		
			$i=1;
			$n=1;
			$c=0;
			

			while($n<$count)
			{
		
				
			   $t=1;
			   if($c==0)
			   {
				   $i=$n;
			   }
			   
				   

			for($i= $i; $t<$noofteam+1; $i++ )
			
			{  
			
				if(!isset($var[$n-1]) || $var[$n-1] == false)
				break;
			    $post= new sorted;
				$post->name =$var[$n-1]->name;
				$post->email= $var[$n-1]->email;
				$post->rollno= $var[$n-1]->rollno;
				$post->cgpa= $var[$n-1]->cgpa;
				$post->group_id= $t;
				$post->save();
				student::where('rollno',$var[$n-1]->rollno)->delete();
				$n=$n+1;
				$t++;
				
				
				
			}
			$c=1;
		
			
			
			for($j= $i; $j>=2 ;$j-- )
			{
				
				if(!isset($var[$n-1]) || $var[$n-1] == false)
				break;
				$post= new sorted;
				$post->name =$var[$n-1]->name;
				$post->email= $var[$n-1]->email;
				$post->rollno= $var[$n-1]->rollno;
				$post->cgpa= $var[$n-1]->cgpa;
				$post->group_id= $j-1;
				$post->save();
				student::where('rollno',$var[$n-1]->rollno)->delete();
				$n=$n+1;
				if($j-1==0)
				{$n=$n-1;
				}
				
				$i--;
		
		
			}
	
		}

		

			}

			$pending=student::orderBy('cgpa', 'desc')->get();
			if(count($pending)>0)
			{
				
				$count= count($pending);
				for($i=0;$i<$count;$i++)
				{
				$post= new sorted;
				$post->name =$pending[$i]->name;
				$post->email= $pending[$i]->email;
				$post->rollno= $pending[$i]->rollno;
				$post->cgpa= $pending[$i]->cgpa;
				$post->group_id= $i+1;
				$post->save();
				student::where('rollno',$pending[$i]->rollno)->delete();
				}

				
			}

            $pending=student::orderBy('cgpa', 'desc')->get();
			if((count($pending)==0))
			{ 

				return Redirect::to('admin/viewteamlist');
				
			}


	}

	public function viewteams($group_id)
	{
		$var=sorted::where('group_id',$group_id)->get();
	    $members=sorted::where('group_id',$group_id)->get();
		$all=sorted::select('group_id')->distinct('group_id')->orderBy('group_id','asc')->get();
		return view('formedteams',['users'=>$var,'allgroupids'=>$all,'members'=>$members]);


	}

	public function viewteamlist()
	{
		$groups=sorted::select('group_id')->distinct('group_id')->orderBy('group_id','asc')->get();
		$members=sorted::get();
	
		
		return view('sorted',['users'=>$groups,'members'=>$members]);
		
	}




}
