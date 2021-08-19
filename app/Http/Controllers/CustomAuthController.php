<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class CustomAuthController extends Controller
{
    //
    public function index(){
        return view('custom-auth.login');
    }

    public function registration(){
        return view('custom-auth.register');
    }

    public function customRegistration(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required'
        ]);
        $run = $this->create($request->all());

        return redirect('dashboard')->withSuccess('Berhasil Daftar');

    }

    protected function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public function customLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credential = $request->only(['email', 'password']);
        if(Auth::attempt($credential)){
            return redirect()->intended('dashboard')->withSuccess('Berhasil Login');
        }
        return redirect('/')->with('failed', 'fda');
    }

    public function dashboard(){
        if(Auth::check()){
            $user = Auth::user();
            return view('custom-auth.dashboard', compact('user'));
        }
        return redirect('/');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();

        return redirect('/');
    }
}
