<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class customAuth extends Controller
{
    public function login()
    {

        // return "Successfully logged in";
        return view('auth/login');
    }

    public function registration()
    {

        // return "Successfully registered";
        return view('auth/registration');
    }

    public function profile()
    {
        $data = array();

        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('auth/profile', compact('data'));
    }

    public function logout()
    {

        if (Session::has('loginID')) {
            Session::pull('loginID');
            return redirect('login');
        }
        return view('base', compact('data'));
    }

    public function registrationUser(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20',
            'c_password' => 'same:password',
        ]);

        if ($request->password != $request->c_password) {
            return redirect()->back()->withInput()->withErrors(['c_password' => 'The password confirmation does not match.']);
        }

        // If passwords match, continue with registration
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            return back()->with('success', 'Registration successful.');
        } else {
            return back()->with('fail', 'Invalid, Please Try Again!');
        }
    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            // return back()->with('success','Email Got Successfully');
            if (Hash::check($request->password, $user->password)) {
                $request->Session()->put('loginID', $user->id);
                // return redirect()->back()->with('success','Login Successfully');
                return redirect('profile');
            } else {
                return back()->with('fail', "The password does not match!");
            }
        } else {
            return back()->with('fail', "Email is not registered!");
        }
        ;

    }
}
