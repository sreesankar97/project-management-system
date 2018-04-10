<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{


    public function send()
    {


      Mail::send(['text'=>'mail'],['name','Harivishnu'],function($message)
      {
        $message->to('hvmp2012@gmail.com','To hvmp')->subject('Test Email');
        $message->from('hvmp2012@gmail.com','hvmp');
        echo 'mail send successfully';
      });
    }
}
