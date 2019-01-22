<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	

	public function index()
	{
		$this->load->model('Welcome_model','welcome');
		$data['image'] = $this->welcome->get_image();
		$this->load->view('welcome_message',$data);
	}
	public function upload_avatar(){
		
		if(!empty($_POST['slim'])){

			$output = json_decode($_POST['slim'][0], TRUE);
			if(isset($output) && isset($output['output']) && isset($output['output']['image'])){

				$file = $output['output']['image'];
				$file_name = $output['input']['name'];

				if(isset($file)){
					/* Check jpeg file */
					if(stripos($file, 'data:image/jpeg;base64,') === 0)
					{
						$img = base64_decode(str_replace('data:image/jpeg;base64,', '', $file));						
					}/* Check png file */
					else if(stripos($file, 'data:image/png;base64,') === 0)
					{
						$img = base64_decode(str_replace('data:image/png;base64,', '', $file));						
					}
					else /* error */
					{
						$result =  array('error' => 'Non-image file');
					}
					$result = file_put_contents('uploads/' . $file_name, $img);

					if($result == FALSE){
						$result =  array('error' => 'Failed to write to file, may not have permission');
					}else{
						$result = array('image_url' =>'uploads/'.$file_name);
					}

					if(isset($result['image_url'])){
						$this->db->truncate('user_details');
						$this->db->insert('user_details',$result);
					}
					echo json_encode($result);

				}
			}
		}
	}
	Public function delete_profile_image(){
  
  $result = $this->db->get_where('user_details',array('user_id'=>1))->row_array();
  if(empty($result['image_url'])){
    $data = array('status' => false);
  }else{
    $this->db->update('user_details',array('image_url'=>''),array('user_id'=>1));
    $data = array('status' => TRUE,'image_url'=>base_url() . 'uploads/default-avatar.png');
  }
  echo json_encode($data);  

}
	
}
