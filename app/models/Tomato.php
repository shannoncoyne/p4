<?php 

class Tomato extends Eloquent { 

	public function user()
	{
		return $this->belongsTo('User');
	}
	
	protected $guarded = array('id', 'created_at', 'updated_at');

}