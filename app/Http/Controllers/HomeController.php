<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\studentmark;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function viewAttendence(){
        $users=studentmark::where('groupid','=',Auth::user()->groupid)->get();
        return view('home-attendence')->withUsers($users);
    }
    public function viewMarks(){
        return view('home-marks');
    }
    public function viewDocuments(){
        return view('home-document');
    }
    public function markRetrive()
{
    
}
}
