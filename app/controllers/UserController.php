<?php

class UserController extends \BaseController {


	
	public function __construct()
	{
		$this->beforeFilter('guest', array('only' => array('getLogin','getSignup')));	
	}

	public function getSignUp()
	{
		return View::make('register');
	}

	public function postSignUp()
	{
		$rules = array(
			'email'    => 'required|email|unique:users,email',
			'password' => 'required|min:6'	
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('/signup')->withInput()->withErrors($validator);
		}
		
		/**
		  * From Lecture Notes
		  */
		
		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		
		try
		{
			$user->save();
		}
		catch (Exception $e)
		{
			return Redirect::to('/signup')->withInput();
		}
		
		
		/**
		 * From PHPAcademy! https://www.youtube.com/watch?v=hYUf6u_txhk
		 * Purpose of the Auth::attempt array is to include the Remember Me? boolean
		 * for the session cookie
		 */
		$remember = (Input::has('remember')) ? true : false;
		
		$auth = Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
		), $remember);
		
		if ($auth)
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::route('login')->with('flash_message', 'Login failed! Please try again.');
		}

	}

	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin() {

		$remember = (Input::has('remember')) ? true : false;

		$auth = Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
		), $remember);
		
		if($auth)	
		{
			return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
		}
		else
		{
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed! Email/password combination is incorrect.')
				->withInput();
		}

		return Redirect::to('login');
	}


	public function getLogout()
	{
		# Log out
		Auth::logout();

		# Send them to the homepage
		return Redirect::to('/');
	}


}
