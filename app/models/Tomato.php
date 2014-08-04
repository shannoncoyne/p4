<?php 

class Tomato extends Eloquent { 

    public function user() {
	    return $this->belongsTo('User');
    }
    
	public function index()
	{
		$pomodoro = Pomodoro::get();
		
		print_r($pomodoro);
	}

	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {
        
        parent::boot();

        static::deleting(function($tag) {
            DB::statement('DELETE FROM book_tag WHERE tag_id = ?', array($tag->id));	 
        });

	}
    
}