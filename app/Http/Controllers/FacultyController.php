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

class FacultyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:faculty');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('faculty');
    }

    public function guideviewfileselectgroup()
    {
        $teams= geninfo::where('guide_id','=',Auth::user()->id)->get();
        return view('files.guideselect')->with('team',$teams);
    }

    public function viewfileuploads($group_id)
    {
        $file=fileupload::where('groupid',$group_id)->where('guide_verify',0)->get();
        $file_verified =fileupload::where('groupid',$group_id)->where('guide_verify',1)->get();
        return view('files.guideviewfiles',['file'=>$file,'file_verified'=>$file_verified]);
    }

    public function guidefileapprove($file_id)

    {
        fileupload::where('file_id',$file_id)->update(array('guide_verify' => 1));
        
        return redirect()->back()->with('message', 'File Verified successfully and is forwarded to admin');



    }

   public function guidefilereject($file_id)
   {
    
    return view('files.filereject')->with('file_id',$file_id);

   }

   public function filerejectreason(Request $request)
   {
    $this->validate($request, [
        'body' => 'required',
        
    ]);
 
    $file=fileupload::where('file_id',$request->file_id)->get();
  
   $groupid= $file[0]->groupid;
   $post= new posts;
   $post->group_id =$groupid;
   $post->title= " Document Rejected By Guide";
   $post->body= "Your Document named: ".$file[0]->filename." is rejected by your guide. "." Comment by Guide: ".$request->body;
   $post->save();
   fileupload::where('file_id',$request->file_id)->update(array('guide_verify' => 2));
  
   return redirect()->to("/guide/viewfiles/{$file[0]->groupid}")->with('msg','File Rejected');
 }


 public function selectteamteamstatus()
 {
     
    $teams= geninfo::where('guide_id','=',Auth::user()->id)->get();
    return view('guideselectteam')->with('team',$teams);



 }

 public function teamstatus($group_id)
 {
     
    $users= studentmark::where('groupid',$group_id)->get();
    return view('guideteamstatus')->with('users',$users);

 }

 public function guidemarksselectgroup()
 {
     
    $teams= geninfo::where('guide_id','=',Auth::user()->id)->get();
    return view('marks.guideselectteam')->with('team',$teams);

 }

 public function addguidemarks($groupid)
 {
     
    $users = studentmark::where('groupid',$groupid)->get();
    return view('marks.addguidemarks')->with('users',$users);

 }

 public function addguidemarkseachstudent($id)
 {
     
        $user = studentmark::where('email',$id)->get();
        $group_id= $user[0]->groupid;
        $users= studentmark::where('groupid',$group_id)->get();
        return view('marks.guideeachmarks',['student'=>$user,'users'=>$users]);

 }

 

 public function guidemarksofstudent(Request $request)

 {     
     
     $this->validate($request, [
         'first' => 'required',
       
     ]);
     studentmark::where('email',$request->userid)->update(array('guide_marks' => $request->first));
         $request->session()->flash('success', 'Record successfully added!');
         return back();

 }



}

  
