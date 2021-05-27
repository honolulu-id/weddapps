<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_user");
		$this->load->helper('url');
	}

	public function index()
	{	
		$id=($this->session->userdata['logged_in']['user_id']);
		$data['user_info']=$this->model_user->get_by_id($id);
		$this->load->view("admin/profile/index",$data);
		// $this->load->view("masterdata/profile/index");
	}

	public function ajax_update()
	{
		// print_r($_POST);
		// print_r($_FILES);
		// exit();

		$user_id=$this->input->post("user_id");
		$user_username=$this->input->post("user_username");
		$user_info=$this->input->post("user_info");
		$user_email=$this->input->post("user_email");
		$photo=$this->input->post("photo");

		$user_password=$this->input->post("user_password");
		$user_password_2=$this->input->post("user_password_2");

		if(!empty($_FILES['photo']['name'])){
			$upload = $this->_do_upload();
			
			//delete file
			$user = $this->model_user->get_by_id($this->input->post('user_id'));
			if(file_exists('upload/user/'.$user->photo) && $user->photo);
				// unlink('upload/user/'.$user->photo);

			$data['photo'] = $upload;
		} else if ($user_password_2 != $user_password) {
			# code...
			echo json_encode(array("status" => FALSE));
		} else if ($user_password == null) {
			# code...
			$data = array(
				'user_username'=> $user_username,
				'user_info'=> $user_info,
				'user_email'=> $user_email
				
			);
		} else {
			$data = array(
				'user_username'=> $user_username,
				'user_info'=> $user_info,
				'user_email'=> $user_email,
				'user_password'=> $user_password
				
			);
		}
		
		$this->model_user->update(array('user_id' => $user_id), $data);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/user';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1204; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
        	$data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	
}
