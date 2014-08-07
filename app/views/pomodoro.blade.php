@extends('layouts.master')

@section('title')
	Pomodoro
@stop

@section('content')
    <h1>Pomodoro</h1>

	<script>
		// JS in file to work with blade
		var length = {{ $pomodoro->length }};
		var set_max = {{ $pomodoro->set_max }};
		var set_num = 1;
		var break_duration = {{ $pomodoro->break_duration }};
		var num_completed;
	</script>

	<div id="pomodoro_heading">Sprint 1 of {{ $pomodoro->set_max }}</div>
	
	<div id="pomodoro_container">
		<div id="pomodoro"></div>
	
		<div id="break"></div>
	</div>
	
	<button type="button" class="btn btn-success" id="start">Start!</button>

	<p>Displaying Pomodoro with contents:</p>
	
		@if($pomodoro)
			<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<td>User ID</td>
						<td>Pomodoro</td>
						<td>ID</td>
						<td>Length</td>
						<td>Break Duration</td>
						<td>Sets</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $pomodoro->user_id }}</td>
						<td><a href="/pomodori/{{ $pomodoro->id }}">{{ $pomodoro->title }}</a></td>
						<td>{{ $pomodoro->id }}</td>
						<td>{{ $pomodoro->length / 60 }} minutes</td>
						<td>{{ $pomodoro->break_duration / 60 }} minutes</td>
						<td>{{ $pomodoro->set_max }}</td>
					</tr>
				</tbody>
			</table>
			</div>
		@endif

	@stop

@stop