<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Validator;

class MemberController extends Controller
{

    private $formItems = ["name_sei","name_mei","nickname","gender","password","password_confirmation", "email"];

    private $validator = [
        'name_sei' => ['required','max:20'],
        'name_mei' => ['required','max:20'],
        'nickname' => ['required','max:10'],
        'gender' => ['required','integer','between:1,2'],
        'password' => ['required','regex:/^([a-zA-Z0-9]{8,20})$/','confirmed:password'],
        'password_confirmation' => ['required','regex:/^([a-zA-Z0-9]{8,20})$/'],
        'email' => ['required','max:200','email','unique:members,email'],
    ];

    public function show(){
		return view("member_regist");
	}

    public function post(Request $request){
		
		$input = $request->only($this->formItems);
		
		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()->action("MemberController@show")
				->withInput()
				->withErrors($validator);
		}

		//セッションに書き込む
		$request->session()->put("form_input", $input);

		return redirect()->action("MemberController@confirm");
	}

    public function confirm(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
        $gender_num = $input['gender'];
		$gender = config('master.gender');
        $seibetsu = $gender["$gender_num"];
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("MemberController@show");
		}

		return view("member_confirmation",compact('input' ,'gender','gender_num','seibetsu'));
    }

    //データベース登録
    public function add(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("MemberController@show");
		}

		//データベースに登録
        $member = new Member;
        $member ->name_sei = $input['name_sei'];
        $member ->name_mei = $input['name_mei'];
        $member ->nickname = $input['nickname'];
        $member ->gender = $input['gender'];
        $member ->password = bcrypt($input['password']);
        $member ->email = $input['email'];
        
        $member->save();

		//セッションを空にする
		$request->session()->forget("form_input");

		return redirect()->action("MemberController@complete");
    }

    //完了画面
    public function complete(){	
		return view("member_registered");
	}
    
}


