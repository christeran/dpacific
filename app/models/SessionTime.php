<?php
 
class SessionTime extends Eloquent {
 
    protected $table = 'sessionTimes';
 
 	public function cinema(){
 		return $this->belongsTo('cinemas');
 	}
}
