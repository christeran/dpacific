<?php

class MoviesController extends \BaseController {

	/**
	 * return all available movies as a JSON format
	 * on a given movie name .
	 *
	 * @param string $name
	 * @return json Response
	 */
	public function name($name)
	{
		$items=Movie::where('title', 'LIKE', '%' . $name . '%')
						->orderBy('title', 'asc')
						->get();

		$list=array();
		$list_movies=array();

		foreach ( $items as $movie) {
			$list[]=array(
				'id'=>$movie->id,
				'title'=>$movie->title,
				);
			$list_movies['cinemas']=array();
			foreach ($movie->cinemas as $cinema) {				
				if (!empty($cinema)){
					$cinema_details=array();
					$cinema_details['id']=$cinema->id;
					$cinema_details['name']=$cinema->name;
					$cinema_details['session']=$cinema->pivot->dateTime;
					array_push($list_movies['cinemas'],$cinema_details);
				}
			}
			
			$list[]=$list_movies;
		}
		$response['movies']=array($list);
		return Response::json($response);
	}


}

