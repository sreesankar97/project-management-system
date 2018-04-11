<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\geninfo;
use App\studentmark;
use Auth;
use App\posts;
use Illuminate\Support\Facades\DB;
use App\fileupload;
use \App\faculty;
use \App\sorted;

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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',

        ]);
        $post= new posts;
        $post->group_id =$request->groupid;
        $post->title= $request->title;
        $post->body= $request->body;
        $post->save();

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
        $this->validate($request, [
            'total' => 'required',
            'present' => 'required',

        ]);

        $tot = $request->total;
        $present= $request->present;

        if($tot > 0 && $tot> $present )
        {

        studentmark::where('email',$request->userid)->update(array('total_class' => $request->total));
        studentmark::where('email',$request->userid)->update(array('present' => $request->present));
        $request->session()->flash('success', 'Record successfully added!');
        return back();
        }

        else if(($request->total)==0)
        return back()->with('msg', 'Total classes conducted connot be zero or text');

         else if(($request->total) < ($request->present))
         return back()->with('msg', 'Total classes conducted cannot be less than classes attended');


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

        $this->validate($request, [
            'first' => 'required',

        ]);
        studentmark::where('email',$request->userid)->update(array('review1' => $request->first));
            $request->session()->flash('success', 'Record successfully added!');
            return back();

    }

    public function secondreviewmarks(Request $request)
    {

        $this->validate($request, [
            'second' => 'required',

        ]);
        studentmark::where('email',$request->userid)->update(array('review2' => $request->second));
            $request->session()->flash('success', 'Record successfully added!');
            return back();

    }

    public function finalreviewmarks(Request $request)
    {
        $this->validate($request, [
            'final' => 'required',

        ]);
        studentmark::where('email',$request->userid)->update(array('final' => $request->final));
            $request->session()->flash('success', 'Record successfully added!');
            return back();

    }

    public function fileuploadselectgroup()
    {
        $teams= geninfo::all();
        return view('files.selectgroup')->with('team',$teams);



    }

    public function viewfileuploads($group_id)
    {


        $file=fileupload::where('groupid',$group_id)->where('guide_verify',1)->get();
        return view('files.adminviewfiles')->with('file',$file);

    }

    public function guidealloc($group_id)
    {
        $faculty= faculty::get();
      
        return view('guideselect',['faculty'=>$faculty,'groupid'=>$group_id]);
        

   
    }

    public function teamalloc($group_id)
    {
        
        return view('guidealloc')->with('group_id',$group_id);

   
    }

    public function createfaculty()
    {
        return view('guidealloc');
    }

    public function createguide(Request $request)
    {
        $post= new faculty;
        $post->id=$request->facid;
        $post->name= $request->name;
        $post->email= $request->email;
        $post->job_title= 'guide';
        $post->password=bcrypt('password');
        
        $post->save();
        return 'created';
       
    }

    public function teamconfirm(Request $request)
    {
       $users=sorted::where('group_id',$request->groupid)->get();
       foreach($users as $user)
       {
        $post= new studentmark;
        $post->stu_id=$user->rollno;
        $post->name= $user->name;
        $post->email= $user->email;
        $post->groupid= $user->group_id;
        $post->present= 0;
        $post->total_class= 1;
        $post->review1 = 0;
        $post->review2 = 0;
        $post->final = 0;
        $post->guide_marks = 0;
        
        
        $post->save();
       }

       $post= new user;
       $post->email='groupno'.$users[0]->group_id.'@proj.com';
       $post->name='groupno'.$users[0]->group_id;
       $post->groupid=$users[0]->group_id;
       $post->password=bcrypt('password');
       $post->save();
        
       $post= new geninfo;
       $post->group_id = $users[0]->group_id;
       $post->topic = 'Topic not assigned';
       $post->guide_id= $request->facid;
       $post->save();
       $request->session()->flash('success', 'Team Created Successfully.. ');

        sorted::where('group_id',$users[0]->group_id)->delete();
        return view('admin');
       
    }

  



}
