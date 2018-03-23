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

}

  
