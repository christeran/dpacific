<?php
 
class Cinema extends Eloquent {
 
    protected $table = 'cinemas';

    public function movies(){
    	return $this->belongsToMany('Movie','sessionTimes')->withPivot('dateTime'); 
	}
 
 	
}
