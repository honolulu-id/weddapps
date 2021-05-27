<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_about");
		$this->load->helper('url');
	}

	public function index()
	{	
		$id=1;
		$data['user_info']=$this->model_about->get_by_id($id);
		$this->load->view("admin/about/index",$data);
		// $this->load->view("masterdata/profile/index");
	}

	public function ajax_update()
	{
		// print_r($_POST);
		// exit();
		$about_id=$this->input->post("about_id");
		$about_us=$this->input->post("about_us");
		$our_strength=$this->input->post("our_strength");

		
		$data = array(
			'about_us'=> $about_us,
			'our_strength'=> $our_strength
			
		);


		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$about = $this->model_about->get_by_id($this->input->post('about_id'));
			if(file_exists('upload/about/'.$about->photo) && $about->photo);
				// unlink('upload/about/'.$about->photo);

			$data['photo'] = $upload;
		}

		
		
		$this->model_about->update(array('about_id' => $about_id), $data);
		echo json_encode(array("status" => TRUE));
	}

		private function _do_upload()
	{
		$config['upload_path']          = 'upload/about';
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
