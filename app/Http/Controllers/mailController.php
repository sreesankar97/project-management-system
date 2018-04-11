<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use \App\sorted;

class mailController extends Controller
{


    public function send()
    {
      $var=sorted::get();
      $mail = '';
      foreach($var as $user)
      {
          $mail=$user->email;
          $name=$user->name;
          $groupid=$user->group_id;
          
         /* Mail::send(['text'=>'mail'],['name','Harivishnu'],function($message)
          {
            $message->to($mail,$name)->subject('Test Email');
            $message->from('hvmp2012@gmail.com','hvmp');
            $message->text('Hi',$name);
            */
            
        Mail::send('mail', ['user' => $user], function ($m) use ($user) {
          $m->from('hvmp2012@gmail.com', 'PMS');

          $m->to($user->email, $user->name)->subject('Confirmation');
     
          });
      echo "success";
      }
    }
}
