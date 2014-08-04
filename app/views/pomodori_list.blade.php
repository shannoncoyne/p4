@extends('layouts.master')

@section('title')
	My Pomodori
@stop

@section('content')
    <h1>My Pomodori <small><a href="/pomodoro/create">create new</a></h1>

	@if($pomodori)
		<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Pomodoro</td>
					<td>Length</td>
					<td>Break Duration</td>
					<td>Sets</td>
				</tr>
			</thead>
			<tbody>
		@foreach($pomodori as $pomodoro)
				<tr>
					<td>{{ $pomodoro->title }}</td>
					<td>{{ $pomodoro->length / 60 }} minutes</td>
					<td>{{ $pomodoro->break_duration / 60 }} minutes</td>
					<td>{{ $pomodoro->set_max }}</td>
				</tr>
		@endforeach
			</tbody>
		</table>
		</div>
	@endif

@stop