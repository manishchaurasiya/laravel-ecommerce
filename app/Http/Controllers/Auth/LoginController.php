<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    // dd("hello");
    $this->middleware('guest')->except('logout');
  }

  protected function authenticated(Request $request, $user)
  {
    //    dd($user->role->name);
    if ($user->role->name == "admin") {
      $this->redirectTo = route('admin.dashboard');
    } elseif (($user->role->name == "customer")) {
      if (($user->status == "Active")) {
        return redirect('/');
      } else {
        Auth::logout();
        return redirect()->back()->with('error', 'Your account has been suspended!');
      }
    } elseif ($user->role->name == "vendor") {
      if (($user->status == "Active")) {
        $this->redirectTo = route('vendor.dashboard');
      } else {
        Auth::logout();
        return redirect()->back()->with('error', 'Your account has been suspended!');
      }
    } else {
      Auth::logout();
      // dd("hello");
      $this->redirectTo = route('login');
    }
    return redirect($this->redirectTo);
  }
}
