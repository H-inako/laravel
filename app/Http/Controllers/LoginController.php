<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function show(){
		return view("login");
	}

    public function login(Request $request)
    {
        $member = Member::where('email', $request->email)->get();

        if (count($member) === 0){
            return view('login', ['login_error' => '1']);
        }
        
        // 一致
        if (Hash::check($request->password, $member[0]->password)) {
            
            // セッション
            session(['name_sei'  => $member[0]->name_sei]);
            session(['name_mei'  => $member[0]->name_mei]);
            session(['email' => $member[0]->email]);
            
            // フラッシュ
            session()->flash('flash_flg', 1);
            session()->flash('flash_msg', 'ログインしました。');
                  
            return redirect(url('/top'));
        // 不一致    
        }else{
            return view('login', ['login_error' => '1']);
        }
    } 
    
    public function logout(Request $request)
    {
        session()->forget('name');
        session()->forget('email');
        return redirect(url('/'));
    }  
}
