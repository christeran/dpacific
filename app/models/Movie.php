<?php
 
class Movie extends Eloquent {
 
    protected $table = 'movies';

 	public function cinemas(){
    	return $this->belongsToMany('Cinema','sessionTimes')->withPivot('dateTime'); 
	}
}
