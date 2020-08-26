<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;
use Validator;

class GuestController extends Controller
{
    
    public function showHome()
    {
        return view('guests.home');
    }

    public function showRegister()
    {
        return view('guests.register');
    }

    public function doRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required"unique:users',
            'password' => 'required|same:confirm_password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $user = new User;

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->status = 1;
            $user->save();

            $request->session()->flash('success', 'You are now registered.');

            return redirect('/');
        }
    }

    public function doLogin(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ])) {
                return redirect('users');
            } else {
                return 'nay';
            }
        }
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect('/');
    }
}
