<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Mail\TemplateMail;
use App\Models\Template;

class MailController extends Controller
{
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {

    	$templates = Template::select('id')->get();
        return view('email.mail', compact('templates'));
    }


    /**

     * Write code on Method

     * @param \Illuminate\Http\Request  $request

     * @return response()

     */

    public function sendMail(Request $request)

    {

        $request->validate([
            'id' => 'required|integer',
            'email' => 'required|email',
            'toname' => 'required'
        ]);

         $templates = Template::where('id', $request->id)->select('etemplate')->first();

         
         $mailData = str_replace('##USER##', $request->toname, $templates->etemplate);


        $mail = Mail::to($request->email)->send(new TemplateMail($mailData));

         if($mail){
         	$request->session()->flash('status', 'Email is sent successfully.');
         } else{
         	$request->session()->flash('status', 'Email is sent failed.');
         }

         return redirect()->route('mail');

    }
}
