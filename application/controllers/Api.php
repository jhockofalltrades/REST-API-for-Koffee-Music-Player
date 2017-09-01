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


	function song_delete($song_id) {
		if($this->backend->check_id('songs','song_id', $song_id)) {
			$deleted = $this->backend->delete_song($song_id);

			if($deleted) {
				$this->response(["status" => "success", "message" => "The song has been deleted"]);
			} else {
				$this->response(["status" => "error", "message" => "The song has not been deleted"]);
			}
		} else {
			$this->response(["status" => "error", "message" => "Song ID doesn't exist"]);
		}
	}	

	/*ADD NEW SONG AIRPLAY*/
	function add_interactions_post() {

		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('user_id','USER ID','numeric|required|callback_check_user_id');
		$this->form_validation->set_rules('song_id', 'SONG ID','numeric|required|callback_check_song_id');
		$this->form_validation->set_rules('mood','Mood','required');

		
		if($this->form_validation->run() != false) {
			$new = $this->backend->new_airplay($this->put());

			if($new) {
				$this->response(["status" => "success", "message" => "New airplay is added"]);
			} else {
				$this->response(["status" => "error", "message" => $this->form_validation->error_array()]);
			}

		} else {	
			$this->response(["status" => "error", "message" => $this->form_validation->error_array()]);
		}
	}

	/**VALIDATIONS**/
	private function check_user_id($id) {
		if($this->backend->check_id('user','user_id', $id)) {
			return true;
		} else {
			$errors[] = $this->form_validation->set_message('check_user_id', 'The {field} user ID do not exist');
			return false;
		}
	}

	private function check_song_id($id) {
		if($this->backend->check_id('songs','song_id', $id)) {
			return true;
		} else {
			$errors[] = $this->form_validation->set_message('check_song_id', 'The {field} song ID do not exist');
			return false;
		}
	}


}

?>