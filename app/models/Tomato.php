<?php 

class Tomato extends Elegant { 

	public function user()
	{
		return $this->belongsTo('User');
	}
	
	protected $guarded = array('id', 'created_at', 'updated_at');
	
	protected $rules = array(
		'title'    => 'required|max:400',
		'length'   => 'required',
		'break_duration' => 'required',
		'set_max' => 'required'
	    );

}