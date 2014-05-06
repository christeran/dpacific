<?php
 
class MoviesTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('movies')->delete();
 
        Movie::create(array(
            'title' => 'The Other Woman'
        ));

 
        Movie::create(array(
            'title' => 'The Amazing Spider-Man'
        ));

 
        Movie::create(array(
            'title' => 'The Grand Budapest Hotel'
        ));

 
        Movie::create(array(
            'title' => 'Transcendence'
        ));

 
        Movie::create(array(
            'title' => 'The Lego Movie'
        ));

 
        Movie::create(array(
            'title' => 'Bad Neighbours'
        ));

 
        Movie::create(array(
            'title' => 'Divergent'
        ));                                                
 
	}
}	
