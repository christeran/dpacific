<?php

class CinemaController extends \BaseController {

	/**
	 * return all cinemas  as a JSON format
	 *
	 * @return json Response
	 */
	public function all()
	{
		$page = Input::get('page');
		if (isset($page)){

			$items= Cinema::with('movies')
							->orderBy('name', 'asc')
							->paginate(2);

			$item=$items->getCollection()->all();
		}else{
			$items= Cinema::with('movies')
							->orderBy('name', 'asc')
							->get();
		}

		$list=array();
		$list_movies=array();

		foreach ( $items as $cinema) {
			$list[]=array(
				'id'=>$cinema->id,
				'name'=>$cinema->name,
				'address'=>$cinema->address,
				'geo'=>$cinema->geo
				);
			$list_movies['movies']=array();
			foreach ($cinema->movies as $movie) {				
				if (!empty($movie)){
					$movie_details=array();
					$movie_details['id']=$movie->id;
					$movie_details['title']=$movie->title;
					$movie_details['session']=$movie->pivot->dateTime;
					array_push($list_movies['movies'],$movie_details);
				}
			}
			
			$list[]=$list_movies;
		}

		$response['cinemas']=array($list);
		return Response::json($response);
	}


	/**
	 * return all cinemas as a JSON format base on a given cinema name
	 *
	 * @param string $name
	 * @return json Response
	 */
	public function name($name){
		$list=array();
		$list_movies=array();

		$items =Cinema::with('movies')
						->where('name', 'LIKE', '%' . $name . '%')
						->orderBy('name', 'asc')
						->get() ;
		
		foreach ( $items as $cinema) {
			# code...
			$list[]=array(
				'id'=>$cinema->id,
				'name'=>$cinema->name,
				'address'=>$cinema->address,
				'geo'=>$cinema->geo
				);
			$list_movies['movies']=array();
			foreach ($cinema->movies as $movie) {				
				if (!empty($movie)){
					$movie_details=array();
					$movie_details['id']=$movie->id;
					$movie_details['title']=$movie->title;
					$movie_details['session']=$movie->pivot->dateTime;
					array_push($list_movies['movies'],$movie_details);
				}
			}
			
			$list[]=$list_movies;
		}

		$response['cinemas']=array($list);
		return Response::json($response);
	}


	/**
	 * return all cinemas as a JSON format 
	 * base on a given cinema name and date
	 *
	 * @param string $name
	 * @param string $date
	 * @return json Response
	 */
	public function name_date($name, $date){		
		if (is_string($date)){
			switch ($date)
			{
				case 'today': $date =date("Y-m-d");break;
				case 'yesterday': $date =date('Y-m-d', strtotime('-1 day'));break;
				case 'tomorrow': $date =date('Y-m-d', strtotime('+1 day'));break;
				default:
				if (!preg_match("/(\d{2})-(\d{2})-(\d{4})$/", $date)) {
					App::abort(500, 'Date format not found');;
				}	
			}
		}
		$date = date('Y-m-d', strtotime($date));

		$item = Cinema::with(array('movies' => function($q) use ($date){
									$q->where('dateTime',  $date);					
							}))
						->where('name', 'like', '%' . $name . '%')
						->orderBy('name', 'asc')
						->get();		
		 
		$list=array();
		$list_movies=array();

		foreach ( $item as $cinema) {
			$list[]=array(
				'id'=>$cinema->id,
				'name'=>$cinema->name,
				'address'=>$cinema->address,
				'geo'=>$cinema->geo
				);
			$list_movies['movies']=array();
			foreach ($cinema->movies as $movie) {	
				if (!empty($movie)){
					$movie_details=array();
					$movie_details['id']=$movie->id;
					$movie_details['title']=$movie->title;
					$movie_details['session']=$movie->pivot->dateTime;
					array_push($list_movies['movies'],$movie_details);
				}
			}
			
			$list[]=$list_movies;
		}

		$response['cinemas']=array($list);
		return Response::json($response);
	}
	

	/**
	 * return all cinemas with their locations as a JSON format 
	 * base on a given gps location. Only users with "pacific" role
	 * are able to use this function.
	 *
	 * @param string $gps
	 * @return json Response
	 */
	public function location($gps){
		$user=Auth::user();
		if (!$user->hasRole('pacific'))
			App::abort(403);

		if (is_string($gps)){
			switch ($gps)
			{
				case 'central': $gps ='-33.884115,151.206186';break;
				case 'circular quay': $gps ='-33.8617803,151.2102304';break;
				case 'bondi': $gps ='-33.891582,151.248439';break;
			}
		}

		$gps = explode(",", $gps);

		$items= Cinema::with('movies')->get();
		$list=array();
		foreach ( $items as $cinema) {
			$cinema_gps= explode("/", $cinema->geo);
			$distance= $this->distance($gps[0], $gps[1], $cinema_gps[0], $cinema_gps[1]);
			$list[]=array(
				'id'=>$cinema->id,
				'name'=>$cinema->name,
				'address'=>$cinema->address,
				'distance_km'=>$distance
				);
		}
		$response['cinemas']=array($list);
		return Response::json($response);
	}


	/**
	 * calculate the distance betwwen two gps points 
	 * in kilometers
	 *
	 * @param string $lat1
	 * @param string $lon1
	 * @param string $lat2
	 * @param string $lon2
	 * @return  distance
	 */
	function distance($lat1, $lon1, $lat2, $lon2) {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		return ($miles * 1.609344);
	}
}
