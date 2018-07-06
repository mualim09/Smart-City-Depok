<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Snowfire\Beautymail\Beautymail;
use Illuminate\Support\Facades\Input;
use App\Email;
use Redirect;
use Session;

class MailController extends Controller
{
    public function sendMail(Request $request){
        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'required|min:8',
        ]);
        $cekemail = Email::select('id_subscribers')
        ->where('email', $request->email)
        ->where('password', $request->password)
        ->first();

        if(!$cekemail)
        {
        	$alamat_email = Email::create([
        	'email' => $request->email,
        	'password' => $request->password
        ]);
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.welcome', [], function($message) 
        {
            $to_email = Input::get('email');
            $message
                ->from('hidepok.id@gmail.com', 'Hi-Depok')
                ->to($to_email, $to_email)
                ->subject('Selamat Datang di Hi-Depok!');
        });
        Session::flash("message","Email sent successfully");
        }
        else
        {
        	return Redirect::back();
        }
        return Redirect::back();
    }  
}
