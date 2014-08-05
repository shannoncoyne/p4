<?php

class PomodoroController extends \BaseController {

	public function __construct()
    {
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
		// list the pomodori
		
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
				
		$pomodoro = new Tomato;
		$pomodoro->user_id = Auth::id();
		$pomodoro->title = Input::get('title');
		$pomodoro->length = Input::get('length');
		$pomodoro->break_duration = Input::get('break_duration');
		$pomodoro->set_max = Input::get('set_max');
		
		try
		{
			$pomodoro->save();
		}
		catch (Exception $e)
		{
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
		//
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
		$pomodoro = Tomato::where('id', '=', $id)->first();
		
		# check user owns this pomodoro
		if($pomodoro->user_id == $auth_id)
		{
			return View::make('edit_form')->with('pomodoro', $pomodoro);
		}
		else
		{
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
		
		# From notes
		
		try
		{
			$pomodoro = Tomato::findOrFail($id);
		}
		catch(Exception $e)
		{
			return Redirect::to('/pomodori')->with('flash_message', 'Pomodoro not found.');
		}

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
