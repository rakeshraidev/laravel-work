<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller

{
    //
    //
    public function registration()
    {
        return view("auth.registration");
    }
    public function login()
    {
        return view("auth.Login");
    }

    public function registerUser(Request $request)

    {

        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'

        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            return back()->with('success', 'The user has been Registred Successfully');
        } else {

            return back()->with('failed', 'The User is not Registred');
        }
    }

    public function loginuser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'

        ]);



        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('failed', 'Password not Matched');
            }
            # code...
        } else {
            return back()->with('failed', 'Email Id has been not Registered');
        }
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {

            $data = User::where('id', '=', Session::get('loginId'))->first();

            # code...
        }
        return view('dashboard', compact('data'));
    }
    public function logout()
    {
        if (session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
    public function index()
    {
        $data = DB::select('select * from users');
        // $data = User::all();
        return view('user-details', ['users' => $data]);

        // $data=User::all();
        // return view('user-detail',['users'=>$data]);
    }
}
