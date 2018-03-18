<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentmarks;
use App\posts;
use App\User;
use App\fileupload;
use Auth;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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


   
}