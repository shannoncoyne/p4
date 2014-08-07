@extends('layouts.master')

@section('title')
	Pomodoro
@stop

@section('content')
    <h1>Pomodoro: {{ $pomodoro->title }}</h1>

	<script>
		// JS in file to work with blade
			var set_num = 1;
			var num_completed;
			var length;
			var set_max;
			var break_duration;
		@if($pomodoro)
			length = {{ $pomodoro->length }};
			set_max = {{ $pomodoro->set_max }};
			break_duration = {{ $pomodoro->break_duration }};
		@endif
	</script>

	<div id="pomodoro_heading" class="text-center h1">Sprint 1 of {{ $pomodoro->set_max }}</div>
	
	<div id="pomodoro_container" class="text-center h1">
		<div id="pomodoro" class="red"></div>
	
		<div id="break" class="green"></div>
	</div>
	
	<div>&nbsp;</div>
	
	<div class="text-center">
		<button type="button" class="btn btn-success" id="start">Start!</button>
	</div>
	
	<div>&nbsp;</div>
	
	<div class="text-center lead">
		@if($pomodoro)
			Sprint Length: {{ $pomodoro->length / 60 }} minutes<br/>
			Break Duration: {{ $pomodoro->break_duration / 60 }} minutes<br/>
			Number of Sets: 3
		@endif
	</div>

	@stop

@stop