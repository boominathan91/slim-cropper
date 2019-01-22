<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	
	Public function get_image(){
		$data = $this->db->select('image_url')->get('user_details')->row_array();
		if(empty($data)){
			$data = array('image_url' => 'uploads/default-avatar.png');
		}
		return $data;
	}

}

/* End of file  */
/* Location: ./application/models/ */