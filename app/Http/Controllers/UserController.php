<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;
use Validator;

class UserController extends Controller
{

    public function showUsers()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        return view('users.manage_users', compact(
            'users'
        ));
    }

    public function doAddUser(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
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

            $request->session()->flash('success', 'You added a user.');

            return back();
        }
    }

    public function doEditUser(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $user = User::find($request->input('user_id'));

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            $request->session()->flash('success', 'You updated a user.');

            return back();
        }
    }

    public function doActivateUser(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $user->status = 1;
        $user->save();

        $request->session()->flash('success', 'You activated this user.');

        return back();
    }

    public function doDeactivateUser(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $user->status = 0;
        $user->save();

        $request->session()->flash('success', 'You deactivated this user.');

        return back();
    }
}
