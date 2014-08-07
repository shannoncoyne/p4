@extends('layouts.master')

@section('title')
	Home
@stop

@section('content')
    <div class="h1">The Pomodoro Technique</div>

	<ol class="lead">
		<li>Decide on the task to be done</li>
		<li>Set the pomodoro timer to n minutes (traditionally 25)</li>
		<li>Work on the task until the timer rings; record with an x</li>
		<li>Take a short break (3–5 minutes)</li>
		<li>After four pomodori, take a longer break (15–30 minutes)</li>
	</ol>
	
	<div class="text-right small">
		<a href="http://en.wikipedia.org/wiki/Pomodoro_Technique">http://en.wikipedia.org/wiki/Pomodoro_Technique</a>
	</div>
	
	<div class="h1 text-center">
		<a href="/pomodori/create" class="green">get started</a>
	</div>
@stop