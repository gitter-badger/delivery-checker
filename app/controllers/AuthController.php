<?php

class AuthController extends \BaseController {

	public function login(){
		return View::make('auth.login')
					->with('title', 'Login');
	}

	public function doLogin()
	{
		$rules = array
		(
					'email'    => 'required',
					'password' => 'required'
		);
		$allInput = Input::all();
		$validation = Validator::make($allInput, $rules);

		//dd($allInput);


		if ($validation->fails())
		{

			return Redirect::route('login')
						->withInput()
						->withErrors($validation);
		} else
		{

			$credentials = array
			(
						'email'    => Input::get('email'),
						'password' => Input::get('password')
			);

			if (Auth::attempt($credentials))
			{
				$userInfo = BrowserDetect::detect();
				UserInfo::create([
					'ip' => Request::getClientIp(),
					'browser' => $userInfo->browserFamily,
					'os'    =>  $userInfo->osFamily,
					'device' => $userInfo->deviceModel,
					'user_id' => Auth::user()->id
				]);
				return Redirect::intended('dashboard');
			} else
			{
				return Redirect::route('login')
							->withInput()
							->withErrors('Error in Email Address or Password.');
			}
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('login')
					->with('success',"You are successfully logged out.");
	}

	public function dashboard(){
		return View::make('dashboard')
					->with('title','Dashboard');
	}

	public function changePassword(){
		return View::make('auth.changePassword')
					->with('title',"Change Password");
	}

	public function doChangePassword(){
		$rules =[
			'password'              => 'required|confirmed',
			'password_confirmation' => 'required'
		];
		$data = Input::all();

		$validation = Validator::make($data,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{
			$user = Auth::user();
			$user->password = Hash::make($data['password']);

			if($user->save()){
				Auth::logout();
				return Redirect::route('login')
							->with('success','Your password changed successfully.');
			}else{
				return Redirect::route('dashboard')
							->with('error',"Something went wrong.Please Try again.");
			}
		}
	}

	public function userInfo(){
		$info = UserInfo::with('user')->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
		$total = UserInfo::with('user')->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
		return View::make('auth.userInfo')
					->with('title','User Info')
					->with('total',$total)
					->with('info',$info);
	}



}