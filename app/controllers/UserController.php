<?php

class UserController extends \BaseController {

	public function __construct()
	{
		# from notes
		$this->beforeFilter('guest', array('only' => array('getLogin','getSignup')));	
	}

	public function getSignUp()
	{
		return View::make('register');
	}

	public function postSignUp()
	{
		$input = Input::all();
		
		$user = new User;

		# validator lives in the model Elegant (courtesy Codebright)
		if($user->validate($input))
		{
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
		}
		else
		{
			return Redirect::to('/signup')->withInput()->withErrors($user->errors());
		}

		/**
		 * From PHPAcademy! https://www.youtube.com/watch?v=hYUf6u_txhk
		 * Purpose of the Auth::attempt array is to include the Remember Me? boolean
		 * for the session cookie
		 * The authorize function is located in the User model and also used in @postLogin
		 */
		$remember = (Input::has('remember')) ? true : false;
		
		# Boolean
		$auth = $user->authorize($user->email, $user->password, $remember);
		
		if ($auth)
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('/login')->with('flash_message', 'Login failed! Please try again.');
		}
	}

	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin()
	{
		$remember = (Input::has('remember')) ? true : false;
		
		$user = new User();
		
		# Boolean
		$auth = $user->authorize(Input::get('email'), Input::get('password'), $remember);
		
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
