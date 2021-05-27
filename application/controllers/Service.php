<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_service");
		$this->load->helper('url');
	}

	public function index()
	{	
		$id=1;
		$data['user_info']=$this->model_service->get_by_id($id);
		$this->load->view("admin/service/index",$data);
		// $this->load->view("masterdata/profile/index");
	}

	public function ajax_update()
	{
		// print_r($_POST);
		// exit();
		$service_id=$this->input->post("service_id");
		$keterangan=$this->input->post("keterangan");
		$Planning=$this->input->post("Planning");
		$Architecture=$this->input->post("Architecture");
		$Structural=$this->input->post("Structural");
		$Mechanic=$this->input->post("Mechanic");
		$Construction=$this->input->post("Construction");
		$Industrial=$this->input->post("Industrial");
		$Assessment=$this->input->post("Assessment");
		$Water=$this->input->post("Water");

		 
			$data = array(
				'keterangan'=> $keterangan,
				'Planning'=> $Planning,
				'Architecture'=> $Architecture,
				'Structural'=> $Structural,
				'Mechanic'=> $Mechanic,
				'Construction'=> $Construction,
				'Industrial'=> $Industrial,
				'Assessment'=> $Assessment,
				'Water'=> $Water
				
			);
		
		$this->model_service->update(array('service_id' => $service_id), $data);
		echo json_encode(array("status" => TRUE));
	}

	
}
