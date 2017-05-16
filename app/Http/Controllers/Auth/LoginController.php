<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
    post login  for admin 

    **/
    public function postSignIn(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        $email= $request->get('email');
        $password= $request->get('password');
        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            $request->session()->flash('message','successfully Login ! ');
            return redirect("/admin/reviews");
        }
          $request->session()->flash('message','Credentials are  not matched ! ');
        return redirect("/admin/login");
    }
}
