<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentmarks;
use App\posts;
use App\User;
use App\fileupload;
use App\proforma;
use Auth;
use Hash;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= studentmarks::all();
        return $posts;
    }

    public function viewpost()
    {
        $id=Auth::user()->groupid;
        $posts = posts::where('group_id',$id)->orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    public function viewpostbyone($post_id)
    {
        $posts= posts::where('post_id',$post_id)->get();
        
        return view('posts.viewmessage')->with('posts',$posts);
        
    }

    public function studentfileupload(Request $request)
{

    $this->validate($request, [
        'filename' => 'required',
    
    ]);

    if($request->hasFile('filename')){
        // Get filename with the extension
        $filenameWithExt = $request->file('filename')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('filename')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('filename')->storeAs('public/proforma', $fileNameToStore);
    } else {
        $fileNameToStore = 'nofile.jpg';
    }
    
    $file = new fileupload;
   $file->filename = $fileNameToStore;
  $file->groupid= $request->groupid;
  $file->save();
  $request->session()->flash('success', 'Record successfully added!');
            return back();




}

public function fileup()
{   
    $user = Auth::user();
     $id= $user->groupid;
     $download=fileupload::where('groupid','=',Auth::user()->groupid)->get();
        return view('fileupload',['groupid'=>$id,'downloads'=>$download]);
       


}

public function submitproforma(Request $request)
{
 
    $this->validate($request, [
        'filename' => 'required',
        'topic'=> 'required',
    
    ]);

    if($request->hasFile('filename')){
        // Get filename with the extension
        $filenameWithExt = $request->file('filename')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('filename')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('filename')->storeAs('public/proforma', $fileNameToStore);
    } else {
        $fileNameToStore = 'nofile.jpg';
    }
    
    $file = new proforma;
   $file->filename = $fileNameToStore;
  $file->groupid= $request->groupid;
  $file->topic=$request->topic;
  $file->save();
  return redirect()->to("proformaupload")->with('proformasuccess','Proforma Submitted Successfully');

}

public function proformacheck($id)
{
    $var = proforma::where('groupid',$id)->where(function($q) {
        $q->where('admin_verify', 0)
          ->orWhere('admin_verify', 1);
    })->get();
    $count=count($var);
    return view('proformasubmit',['groupid'=>$id,'count'=>$count]);

}

public function changepassword(Request $request)
{
     
    $this->validate($request, [
        'oldpass' => 'required',
        'newpass'=> 'required',
        'passconf'=> 'required',
    
    ]);
    $id=Auth::user()->groupid;
    if($request->newpass != $request->passconf )
    {
    $request->session()->flash('mssg', 'Passwords doesnt match');
    return back();
    }

    elseif($request->oldpass != (Hash::check($request->input('oldpass'), Auth::user()->password)))
    {
        $request->session()->flash('mssg', 'Current password is incorrect');
        return back();
    }

    if(strlen($request->newpass)<6)
    {
        $request->session()->flash('mssg', 'The password must be at least 6 characters');
        return back();
    }

    if($request->newpass == $request->passconf && (Hash::check($request->input('oldpass'), Auth::user()->password)))
    {
        user::where('groupid',$id)->update(array('password' => bcrypt($request->newpass)));
        
        return back()->with('passwordsuccess','Password changed succesfully');
    }
}


   
}