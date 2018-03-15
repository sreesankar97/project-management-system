<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\geninfo;
use App\studentmark;
use Auth;
use App\posts;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('admin');
    }

   

    public function addmarks()
    {
        
          $users = geninfo::all();
          return view('marks.add-marks')->with('users',$users);;
    }

    public function studentmarks($groupid)
    {
        
        $users = studentmark::where('groupid',$groupid)->get();
        return view('marks.studentmarks')->with('users',$users);
    }
  
    

    public function fileupload()
    {
        return view('fileupload');
    }

    public function addmessage()
    {
        return view('posts.postform');
    }

    public function selectgroup()
    {
        $posts=  geninfo::all();
        return view('posts.selectgroup')->with('posts',$posts);
        
       
        
    }

    public function viewpost($id)
    {
       
        return view('posts.postform')->with('id',$id);

        
    }

    public function msgcompose(Request $request)
    {
        //$var=1;
        $post= new posts;
        $post->group_id =$request->groupid;
        $post->title= $request->title;
        $post->body= $request->body;
        $post->save();
        // return view('posts.confirm')->with('var',$var);
//        $value = session('key', 'machana pwolikk!');
        $request->session()->flash('success', 'Message Sent Succcessfully');
        return back();
    }

    public function addattendance()
    {

    
        $users = geninfo::all();
        return view('Attendance.add-att')->with('users',$users);

    }

    public function addattend($groupid)
    {   
       
        $users = studentmark::where('groupid',$groupid)->get();
        return view('Attendance.addattend')->with('users',$users);
    }

    public function addeachattend($id)
    {
    
        $user = studentmark::where('email',$id)->get();
        $group_id= $user[0]->groupid;
        $users= studentmark::where('groupid',$group_id)->get();
        return view('Attendance.addeachattend',['student'=>$user,'users'=>$users]);
     
    }

    public function attendance(Request $request)
    {      
        studentmark::where('email',$request->userid)->update(array('total_class' => $request->total));
        studentmark::where('email',$request->userid)->update(array('present' => $request->present));
        $request->session()->flash('success', 'Record successfully added!');
        return back();

        
    }

    public function addeachmarks($id)
    {
        $stu_id = $id;
        return view('marks.addmarks')->with('stu-id',$stu_id);
    }

    

    public function marksadd($id)
    {
        $user = studentmark::where('email',$id)->get();
        $group_id= $user[0]->groupid;
        $users= studentmark::where('groupid',$group_id)->get();
        return view('marks.addstudentmarks',['student'=>$user,'users'=>$users]);
       
        
    }

    

    public function firstreviewmarks(Request $request)
    {      
        studentmark::where('email',$request->userid)->update(array('review1' => $request->first));
            $request->session()->flash('success', 'Record successfully added!');
            return back();
   
    }

    public function secondreviewmarks(Request $request)
    {      
        studentmark::where('email',$request->userid)->update(array('review2' => $request->second));
            $request->session()->flash('success', 'Record successfully added!');
            return back();
   
    }

    public function finalreviewmarks(Request $request)
    {      
        studentmark::where('email',$request->userid)->update(array('final' => $request->final));
            $request->session()->flash('success', 'Record successfully added!');
            return back();
   
    }

   


  

}
