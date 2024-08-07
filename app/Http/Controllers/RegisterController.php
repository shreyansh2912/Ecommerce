<?php

namespace App\Http\Controllers;

use App\Mail\Sendmail;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\RequestMatcher\IsJsonRequestMatcher;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("register");
    }
    public function login()
    {
        return view("login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $request->validate([
           'name'=>'required',
           'email'=>'required',
           'username'=>'required',
           'password'=>'required'
        ]);
        $regi = User::create($request->all());
        if($regi){
            $mailData=['title'=>'24*7Cart','body'=>'Welcome to our Community!!!'];
            // Mail::to($request->email)->send(new Sendmail ($mailData));
        }
        return redirect('login');
    }
    public function login_validation(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credential = $request->only('email','password','role_as');
        if(Auth::attempt($credential)){
            if(Auth::user()->role_as == 0){

                return redirect('home')->with('message','Login Success');
                // return $request->all();
            }
            else if(Auth::user()->role_as == 1){
                echo "<script>alert('Welcome back '".Auth::user()->name.")</script>";
                return redirect(route('admin_dashboard'))->with('message','Welcome back, '.Auth::user()->name.'😄');
            }
        }else{
           echo "<script> alert('Please enter valid email or password')</script>";
           return view('login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
