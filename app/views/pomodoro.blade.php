@extends('layouts.master')

@section('title')
	Pomodoro
@stop

@section('content')
    <h1>Pomodoro</h1>

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
						<td>Number Completed</td>
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
						<td>{{ $pomodoro->number_completed }}</td>
					</tr>
				</tbody>
			</table>
			</div>
		@endif

	@stop

@stop