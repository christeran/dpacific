<?php
 
class SessionTimesTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('sessionTimes')->delete();
 
        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 1,
            'dateTime' => '2014-09-06 09:00'
        ));

        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 2,
            'dateTime' => '2014-09-05 09:00'
        ));

        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 2,
            'dateTime' => '2014-09-05 11:30'
        )); 

        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 4,
            'dateTime' => '2014-09-07 15:00'
        )); 


        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 1,
            'dateTime' => '2014-09-08 07:20'
        )); 

        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 2,
            'dateTime' => '2014-09-07 13:00'
        )); 

        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 3,
            'dateTime' => '2014-09-06 09:00'
        ));

        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 4,
            'dateTime' => '2014-09-10 09:00'
        ));

        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 5,
            'dateTime' => '2014-09-04 09:00'
        ));
 

        SessionTime::create(array(
            'movie_id' => 3,
            'cinema_id' => 2,
            'dateTime' => '2014-09-01 09:00'
        ));
 
        SessionTime::create(array(
            'movie_id' => 3,
            'cinema_id' => 1,
            'dateTime' => '2014-09-05 17:00'
        ));
 
        SessionTime::create(array(
            'movie_id' => 3,
            'cinema_id' => 4,
            'dateTime' => '2014-09-07 13:00'
        )); 

        SessionTime::create(array(
            'movie_id' => 4,
            'cinema_id' => 1,
            'dateTime' => '2014-09-05 13:00'
        )); 
        
        SessionTime::create(array(
            'movie_id' => 4,
            'cinema_id' => 2,
            'dateTime' => '2014-09-07 13:00'
        ));        

        SessionTime::create(array(
            'movie_id' => 5,
            'cinema_id' => 5,
            'dateTime' => '2014-09-06 19:00'
        ));

        SessionTime::create(array(
            'movie_id' => 6,
            'cinema_id' => 1,
            'dateTime' => '2014-09-07 19:00'
        ));

        SessionTime::create(array(
            'movie_id' => 6,
            'cinema_id' => 2,
            'dateTime' => '2014-09-08 19:00'
        ));

        SessionTime::create(array(
            'movie_id' => 7,
            'cinema_id' => 1,
            'dateTime' => '2014-09-08 19:00'
        ));
 
	}
}
