<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

Class Api extends REST_Controller {

	function users_get() {
		$request = $this->backend->get_by_table('user');
		 $this->response($request);
	}

	function artist_get($artist) {
		$result = $this->backend->get_by_artist($artist);
		$this->response($result);
	}

	function recommendation_get($mood, $user) {
		// PHL Time zone 
		date_default_timezone_set('Asia/Manila');
		$cur_hour = date('H');
		$cur_day = date('d');

		$recommendations = $this->backend->get_recommendations($cur_hour, $cur_day, $mood, $this->backend->get_id_by_user($user));

		$this->response($recommendations);
	}

	function discovery_get($user) {
		$discover = $this->backend->get_discover_songs($this->backend->get_id_by_user($user));

		$this->response($discover);	
	}

	function top_get($user) {
		$top = $this->backend->get_most_played($this->backend->get_id_by_user($user));

		$this->response($top);	
	}

	function weekly_trend_get($user) {
		$weekly = $this->backend->get_weekly_trend($this->backend->get_id_by_user($user));

		$this->response($weekly);	
	}

	function user_data_get($mood, $user) {
		// PHL Time zone 
		date_default_timezone_set('Asia/Manila');
		$cur_hour = date('H');
		$cur_day = date('d');

		$data = [
			'recommendations' =>  $this->backend->get_recommendations($cur_hour, $cur_day, $mood, $this->backend->get_id_by_user($user)),
			'discover' =>  $this->backend->get_discover_songs($this->backend->get_id_by_user($user)),
			'top_fifteen' => $this->backend->get_most_played($this->backend->get_id_by_user($user)),
			'weekly_trend' => $this->backend->get_weekly_trend($this->backend->get_id_by_user($user))
		];

		$this->response($data);
	}

}

?>