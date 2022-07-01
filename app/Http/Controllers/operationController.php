<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Rules\email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class operationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate(
            [
                "firstName" => "required | min:3 | max:10 | alpha",
                "lastName" => "required | min:3 | max:10 | alpha",
                "email" => ["required", new email, "unique:users,email" . $user->id],
                "Password" => ["required", function ($attribute, $value, $fail) {
                    if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/', $value)) {
                        $fail("the password must contain minimum 8 and maximum 16 character and one uppercase, one lowercase, one number and one spacial character.");
                    }
                }],
                "c_password" => "required | same:Password",
            ],
        );

        $data = new User;
        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->email = $request->email;
        $data->password = Hash::make($request->Password);
        $data->save();
        return  redirect('/')->with('register', 'Your account is created successfully.');
    }

    function login(Request $details)
    {
        $details->validate([
            "email" => ["required", new email],
            "password" => "required"
        ]);

        if (Auth::attempt($details->only('email', 'password'))) {
            $id = auth()->user()->id;
            $user_data =  DB::table('users')->find($id);
            $details->session()->put('user', $user_data);
            return redirect('user_dashboard');
        } else {
            return redirect('login')->with('fail', 'Invalid Email address or Password.');
        }
    }


    function admin_login(Request $details)
    {
        $details->validate([
            "email" => ["required", new email],
            "password" => "required"
        ]);

        $login_details = Admin::where(['email' => $details->email, 'password' => $details->password])->get();
        if (count($login_details) != 0) {
            $details->session()->put('admin', 'Hello Admin');
            return redirect('admin_dashboard');
        } else {
            return redirect('admin_login')->with('fail', 'Invalid Email address or Password.');
        }
    }

    function admin_panel()
    {
        $posts = Post::all();
        return view('admin_dashboard', ['post' => $posts]);
    }

    function search_data(Request $request)
    {
        $posts = Post::where("$request->search_dropdown", 'like',  '%'.$request->search_field.'%')->get();
        return view('admin_dashboard', ['post' => $posts]);
    }




    function logout()
    {
        if (session()->has('user')) {
            session()->forget('user');
            return redirect('login');
        }
        if (session()->has('admin')) {
            session()->forget('admin');
            return redirect('admin_login');
        }
    }
}
