<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
class AuthenticationController extends Controller
{
    public function getLogin(){
        return view('authentication.login');
    }
    public function postLogin(LoginRequest $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('index')->with(['flash_message'=>'Login thành công!','flash_level'=>'success']);
        }else{
            return redirect()->route('getLogin')->with(['has-error'=>'Lỗi login']);
        }
    }
    public function addUser(){
        return view('authentication.register');
    }
    public function postAddUser(LoginRequest $request){
        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = Hash::make($request->username);
        $user->level = 1;
        $user->save();
        return redirect()->route('getLogin');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
