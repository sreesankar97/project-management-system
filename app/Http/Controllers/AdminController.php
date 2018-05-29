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
use \App\proforma;
use Mail;

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
          
            'present' => 'required',

        ]);

        $total = studentmark::all();
       // $tot= intval($total[0]); 
        
        $tot= $total->first();
        $tot= $tot->total_class;
        $present= $request->present;
        if($tot==1 || $tot==0)
        {
            return back()->with('msg', 'Firstly update total classes conducted');
        }

        else if($tot > 0 && $tot> $present )
        {

        //studentmark::where('email',$request->userid)->update(array('total_class' => $request->total));
        studentmark::where('email',$request->userid)->update(array('present' => $request->present));
        $request->session()->flash('success', 'Record successfully added!');
        return back();
        }

        else if(($request->present)> $tot)
        return back()->with('msg', 'Total classes conducted cannot be less than classes attended');

         else 
         return back()->with('msg', 'Total classes conducted cannot be string or null');


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
        $request->session()->flash('guidesuccess', 'Faculty Created Successfully.. ');
        return view('admin');
    
       
    }

    public function teamconfirm(Request $request)
    {
       // dd($request);
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
       $post->guide_id= $request->list;
       $post->save();
       $request->session()->flash('success', 'Team Created Successfully.. ');
       
        sorted::where('group_id',$users[0]->group_id)->delete();
        return view('admin')->with('id',$users[0]->group_id);
       
    }

    public function viewproforma()
    {
       
        $proforma=proforma::where('admin_verify',0)->orderBy('groupid','asc')->distinct('groupid')->get();  
        $members=studentmark::get(); 
        return view('viewproforma',['proforma'=>$proforma,'members'=>$members]);

    }
   



    public function send(Request $request)
{


      $var=studentmark::where('groupid',$request->groupid)->get();
      $mail = '';
      foreach($var as $user)
      {
          $mail=$user->email;
          $name=$user->name;
          $groupid=$user->groupid;

         /* Mail::send(['text'=>'mail'],['name','Harivishnu'],function($message)
          {
            $message->to($mail,$name)->subject('Test Email');
            $message->from('hvmp2012@gmail.com','hvmp');
            $message->text('Hi',$name);
            */

    Mail::send('mail', ['user' => $user], function ($m) use ($user) {
          $m->from('hvmp2012@gmail.com', 'PMS');

          $m->to($user->email, $user->name)->subject('Team Confirmation');
          //$m->text('Hi',$user->name);
          //$m->text('This is a conformation message that you have been added to Team No=',$user->group_id);
          //$m->text('Your login id is=',$email);
          //$m->text('Your Password is=amma');
          });


      }

      $request->session()->flash('mailsuccess', 'Mail Send to Each Student Successfully.. ');
      return view('mailconfirm')->with('id',0);
     

    }

    public function membermove(Request $request)
    {

      
         sorted::where('rollno',$request->rollno)->update(array('group_id' => $request->groupid));
        return back()->with('success', 'Member moved successfully');
    }

    public function approveproforma(Request $request)
    {
        geninfo::where('group_id',$request->groupid)->update(array('topic' => $request->topic));
        proforma::where('groupid',$request->groupid)->update(array('admin_verify' => 1));
        return back()->with('success', 'Topic assigned Successfully');
    }

    public function proformareject($id)
    {
        return view('proformareject')->with('file_id',$id);
    }

    public function proformarejectreason(Request $request)
    {
     $this->validate($request, [
         'body' => 'required',
         
     ]);
  
     $file=proforma::where('file_id',$request->file_id)->get();
   
    $groupid= $file[0]->groupid;
    $post= new posts;
    $post->group_id =$groupid;
    $post->title= " Proforma Rejected";
    $post->body= "Your Proforma named: ".$file[0]->topic." is rejected. "." Comments :".$request->body;
    $post->save();
    proforma::where('file_id',$request->file_id)->update(array('admin_verify' => 2));
   
    return redirect()->to("viewproforma")->with('msg','Proforma Rejected');
  }
  
  public function deleteallteams()
  {
      sorted::truncate();
      geninfo::truncate();
      user::truncate();
      studentmark::truncate();
      posts::truncate();
      proforma::truncate();
      fileupload::truncate();
      return redirect()->to("admin/importexport")->with('mssg','All Teams Deleted Successfully');
    }

    public function newteamcreate(Request $request)
    {

        sorted::where('rollno',$request->rollno)->update(array('group_id' => $request->groupid));
        return back()->with('teamsuccess', 'New Team Created with the selected student');
    }

    public function addtotalclass(Request $request)
    {
        return view('marks.addtotalclass');
    }

    public function addtotclassconducted(Request $request)
    {
        $this->validate($request, [
          
            'total' => 'required',

        ]);
        
        $users=studentmark::get();
        if(($request->total)==0)
        return back()->with('msg', 'Total classes conducted connot be zero or text');

         else if(($request->total) < 0)
         return back()->with('msg', 'Total classes conducted cannot be less than zero');

         else if(($request->total>0))
         {
        foreach($users as $user)
        {
            
            studentmark::where('stu_id',$user->stu_id)->update(array('total_class' => $request->total));
       

        }
    }

    else
    {
        return back()->with('msg', 'Total classes conducted cannot be a string');
    }

        return back()->with('success', 'Total classes conducted is now updated');

     }


}
