<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed|min:8',

        ]);

        $user = User::find(Auth()->user()->id);
        if (Hash::check($request->oldPassword, $user->password)) {
            $newPassword = Hash::make($request->password);
            User::find(Auth()->user()->id)->update(['password' => $newPassword]);
        } else {
            echo "<script>alert('Please enter currect old password');</script>";
        }
        return redirect('/login');
    }
}
