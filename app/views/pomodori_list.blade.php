@extends('layouts.master')

@section('title')
	My Pomodori
@stop

@section('content')
    <h1>My Pomodori <small><a href="/pomodori/create">create new</a></h1>

	@if(count($pomodori) > 0)
		<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Pomodoro</td>
					<td>Length</td>
					<td>Break Duration</td>
					<td>Sets</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
		@foreach($pomodori as $pomodoro)
				<tr>
					<td><a href="/pomodori/{{ $pomodoro->id }}">{{ $pomodoro->title }}</a> <small><a href="/pomodori/{{ $pomodoro->id }}/edit">edit</a></small></td>
					<td>{{ $pomodoro->length / 60 }} minutes</td>
					<td>{{ $pomodoro->break_duration / 60 }} minutes</td>
					<td>{{ $pomodoro->set_max }}</td>
					<td>{{ Form::open(['method' => 'DELETE', 'action' => ['PomodoroController@destroy', $pomodoro->id]]) }}<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>delete</a>{{ Form::close() }}</td>
				</tr>
		@endforeach
			</tbody>
		</table>
		</div>
	@elseif(count($pomodori) == 0)
		<div class="text-center"><h3>You have no pomodori! <a href="/pomodori/create">Create one?</a></h3></div>
	@endif
	
@stop