<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SippKlingLoginController extends Controller
{
	  // use AuthenticatesUsers;

	  protected $redirectTo = '/sipp-kling';

    protected function redirectPath(){
      return $this->redirectTo;
    }

    public function __construct()
    {
      $this->middleware('guest:sippKlingAuth');
    }

    public function showLoginForm()
    {
      return view('auth.sippKlingLogin');
    }

    public function login(Request $request)
    {
      // // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|string'
      ]);

      // Attempt to log the user in
      if (Auth::guard('sippKlingAuth')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
          //return redirect()->intended(route('sipp-kling.dashboard'));
        // return redirect()->intended($this->redirectPath());
        return 1;
        // return Redirect::intended('/');
        // dd($request->remember);
        // dd(Auth::guard('sippKlingAuth')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember));
      }
      // return 2;
      
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
      // dd($request);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
