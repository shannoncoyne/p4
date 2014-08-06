<?php

class PomodoroController extends \BaseController {

	public function __construct()
    {
		# only logged in users can work with pomodori (this resource)
        $this->beforeFilter('auth');

        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// list the user's pomodori
		
		$pomodori = Tomato::where('user_id', '=', Auth::id())->get();
		
		return View::make('pomodori_list')->with('pomodori', $pomodori);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pomodoro_form');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		# validation
		$rules = array(
			'title'    => 'required|max:400',
			'length'   => 'required',
			'break_duration' => 'required',
			'set_max' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('/pomodori/create')->withInput()->withErrors($validator);
		}
		
		# validation passed, so create a new row with the input		
		$pomodoro = new Tomato;
		$pomodoro->user_id = Auth::id();
		$pomodoro->title = Input::get('title');
		$pomodoro->length = Input::get('length');
		$pomodoro->break_duration = Input::get('break_duration');
		$pomodoro->set_max = Input::get('set_max');
		
		try
		{
			# success
			$pomodoro->save();
		}
		catch (Exception $e)
		{
			# hiccup catch all
			return Redirect::to('/pomodori/create')->withInput()->with('flash_message', 'Sorry! Something went wrong.');
		}
		
		return Redirect::to('/pomodori')->with('flash_message', 'Successfully added new pomodoro.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		# pomodoro with the given id (first() because there is only one I want)
		$pomodoro = Tomato::where('id', '=', $id)->first();
		
		# pass pomodoro to the view
		return View::make('pomodoro')->with('pomodoro', $pomodoro);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$auth_id = Auth::id();
		# using first() because there is only one result
		$pomodoro = Tomato::where('id', '=', $id)->first();
		
		if($pomodoro->user_id == $auth_id)
		{
			# user owns this pomodoro
			return View::make('edit_form')->with('pomodoro', $pomodoro);
		}
		else
		{
			# user doesn't have permissions to see this pomodoro
			return Redirect::to('/');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		# validation
		$rules = array(
			'title'    => 'required|max:400',
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('/pomodori/'.$id.'/edit')->withInput()->withErrors($validator);
		}
		
		# From notes (findOrFail with try/catch)
		
		try
		{
			$pomodoro = Tomato::findOrFail($id);
		}
		catch(Exception $e)
		{
			return Redirect::to('/pomodori')->with('flash_message', 'Pomodoro not found.');
		}

		# found it, so update it with input
		$pomodoro->title = Input::get('title');
		$pomodoro->length = Input::get('length');
		$pomodoro->break_duration = Input::get('break_duration');
		$pomodoro->set_max = Input::get('set_max');
		$pomodoro->save();

		return Redirect::action('PomodoroController@index')->with('flash_message', 'Pomodoro successfully updated.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
				
		$auth_id = Auth::id();
		# only one record in question, so first()
		$pomodoro = Tomato::where('id', '=', $id)->first();
		
		# check user owns this pomodoro
		if($pomodoro->user_id == $auth_id)
		{
			Tomato::destroy($id);
			return Redirect::to('/pomodori')->with('flash_message', 'Successfully deleted pomodoro.');
		}
		else
		{
			return Redirect::to('/');
		}
	}


}
