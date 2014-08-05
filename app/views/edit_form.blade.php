@extends('layouts.master')

@section('title')
	Edit Pomodoro
@stop

@section('content')
    <h1>Edit Pomodoro</h1>

	@foreach($errors->all() as $message)
		<div class="error">{{ $message }}</div>
	@endforeach
	

	
	{{ Form::open(array('role' => 'form', 'class' => 'form-horizontal', 'method' => 'PUT', 'action' => array('PomodoroController@update', $pomodoro->id))) }}
	
	
	<div class="form-group">
		{{ Form::label('inputTitle', 'Title', array('class' => 'col-sm-2 control-label')); }}
		<div class="col-sm-10">
			{{ Form::text('title','', array('class' => 'form-control', 'id' => 'inputTitle', 'placeholder' => 'e.g., Homework')); }}
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Sprint Length (minutes)</label>
		<div class="col-sm-10 inline">
			<label class="radio-inline" for="length15">
				{{ Form::radio('length', '900', false, array('id' => 'length15')); }}
				15
			</label>
			<label class="radio-inline" for="length20">
				{{ Form::radio('length', '1200', false, array('id' => 'length20')); }}
				20
			</label>
			<label class="radio-inline" for="length25">
			  {{ Form::radio('length', '1500', false, array('id' => 'length25')); }}
			  25
			</label>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Break Length (minutes)</label>
		<div class="col-sm-10 inline">
			<label class="radio-inline" for="break3">
				{{ Form::radio('break_duration', '180', false, array('id' => 'break3')); }}
				3
			</label>
			<label class="radio-inline" for="break5">
				{{ Form::radio('break_duration', '300', false, array('id' => 'break5')); }}
				5
			</label>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Number of Sets</label>
		<div class="col-sm-10 inline">
			<label class="radio-inline" for="set3">
				{{ Form::radio('set_max', '3', false, array('id' => 'set3')); }}
				3
			</label>
			<label class="radio-inline" for="set4">
				{{ Form::radio('set_max', '4', false, array('id' => 'set4')); }}
				4
			</label>
		</div>
	</div>

	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-default')); }}
		</div>
	</div>

	{{ Form::close(); }}

@stop