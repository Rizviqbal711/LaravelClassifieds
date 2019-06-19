<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
   public function contactSaveData(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'subject'=>'required',
        'message' => 'required'
        ]);
       ContactUs::create($request->all());
       \Mail::send('mail.contactus',
       array(
           'name' => $request->get('name'),
           'email' => $request->get('email'),
		   'subject' => $request->get('subject'),
           'user_message' => $request->get('message')
       ), function($message) use ($request)
   	{
      $message->from('info@quicklist.io');
      $message->to('info@quicklist.io', 'Admin')->subject($request->get('subject'));
   });
       return back()->with('success', 'If you need a reply we’ll get back to you just as soon as we can');
   }
}
