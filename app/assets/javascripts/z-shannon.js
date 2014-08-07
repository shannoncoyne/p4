/*!
 * Shannon's JS File 2014.8.7
 * Using jQuery Runner
 * https://github.com/jylauril/jquery-runner/
 */

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