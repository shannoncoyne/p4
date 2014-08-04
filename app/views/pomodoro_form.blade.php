@extends('layouts.master')

@section('title')
	Create a New Pomodoro
@stop

@section('content')
    <h1>Create a New Pomodoro</h1>

	@foreach($errors->all() as $message)
		<div class="error">{{ $message }}</div>
	@endforeach

	{{ Form::open(array('url' => '/signup', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')); }}
	
	<div class="form-group">
		{{ Form::label('inputEmail', 'Email Address', array('class' => 'col-sm-2 control-label')); }}
		<div class="col-sm-10">
			{{ Form::email('email','', array('class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Enter Email')); }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('inputPassword', 'Password', array('class' => 'col-sm-2 control-label')); }}
		<div class="col-sm-10">
			{{ Form::password('password', array('class' => 'form-control', 'id' => 'inputPassword', 'placeholder' => 'Password (Minimum 6 Characters)')); }}
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
				<label>{{ Form::checkbox('remember'); }} Remember Me</label>
			</div>
		</div>
	</div>

	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-default')); }}
		</div>
	</div>

	{{ Form::close(); }}

@stop