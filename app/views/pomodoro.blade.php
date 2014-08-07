@extends('layouts.master')

@section('title')
	Pomodoro
@stop

@section('content')
    <h1>Pomodoro</h1>

	<div id="pomodoro_heading">Sprint 1 of {{ $pomodoro->set_max }}</div>
	
	<div id="pomodoro_container">
		<div id="pomodoro"></div>
	
		<div id="break"></div>
	</div>
	
	<button type="button" class="btn btn-success" id="start">Start!</button>
	
	<script>
		var length = {{ $pomodoro->length }};
		var set_max = {{ $pomodoro->set_max }};
		var set_num = 1;
		var break_duration = {{ $pomodoro->break_duration }};
		var num_completed;
		
		$('#break').hide();
		
			$('#pomodoro').runner({
				autostart: false,
				countdown: true,
				startAt: length*1000, // milliseconds
				milliseconds: false,
				stopAt: 0
			}).on('runnerFinish', function(eventObject, info) {
				$('#pomodoro').hide();
				
				$('#break').show();
				
				$('#break').runner('start');
			});
				
				// the break
				
				$('#break').runner({
					autostart: false,
					countdown: true,
					startAt: break_duration*1000, // milliseconds
					milliseconds: false,
					stopAt: 0
				}).on('runnerFinish', function(eventObject, info) {
					if(set_num < set_max)
					{
						$('#break').hide();
						
						$('#pomodoro').show();
						$('#start').show();
						
						set_num = set_num + 1;
						
						$('#pomodoro_heading').text('Sprint ' + set_num + ' of ' + set_max);
					}
					else if (set_num == set_max)
					{
						$('#break').hide();
						
						$('#pomodoro_heading').text('Completed!!');
					}
				});
							
		
		$('#start').click(function() {
			$('#pomodoro').show();
	
			$('#pomodoro').runner('start');
			
			$('#start').hide();
		});

	</script>
	

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