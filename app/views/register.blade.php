@extends('layouts.master')

@section('title')
	Register
@stop

@section('content')
    <h1>Register</h1>

	<ul>
	@foreach($errors->all() as $message)
		<li><em>{{ $message }}</em></li>
	@endforeach
	</ul>

	{{ Form::open(array('url' => '/user-generator', 'method' => 'POST')); }}
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-left">
			{{ Form::text('number_of_users','', array('class' => 'form-control', 'placeholder' => 'Number of Users')); }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-left">
			{{ Form::checkbox('birthdate', '1') . Form::label('birthdate', '&nbsp;Birthdate?'); }}
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-left">
			{{ Form::checkbox('location', '1') . Form::label('location', '&nbsp;Location?'); }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-left">
			{{ Form::checkbox('profile', '1') . Form::label('profile', '&nbsp;Profile?'); }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-left">
			{{ Form::submit('Submit!'); }}
		</div>
	</div>

	{{ Form::close(); }}
@stop