<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Elegant implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	protected $guarded = array('id', 'password', 'created_at', 'updated_at');
	
    public function tomatoes()
    {
        return $this->hasMany('Tomato');
    }

	protected $rules = array(
		'email'    => 'required|email|unique:users,email',
		'password' => 'required|min:6'
	    );
	
	public function authorize($user_email, $user_password, $remember)
	{		
		$auth = Auth::attempt(array(
			'email' => $user_email,
			'password' => $user_password,
		), $remember);
		
		return $auth;
	}

}