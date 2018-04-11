<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use \App\sorted;
use App\studentmark;

class mailController extends Controller
{


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
      return view('mailconfirm');

    }
}
