<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_contact");
		$this->load->helper('url');
	}

	public function index()
	{	
		$id=1;
		$data['contact']=$this->model_contact->get_by_id($id);
		$this->load->view("admin/contact/index",$data);
	}

	public function ajax_update()
	{
		// print_r($_POST);
		// exit();

		$contact_id=$this->input->post("contact_id");
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$phone=$this->input->post("phone");
		$additional=$this->input->post("additional");

		$data = array(
			'name'=> $name,
			'email'=> $email,
			'phone'=> $phone,
			'additional'=> $additional

		);

		$this->model_contact->update(array('contact_id' => $contact_id), $data);
		echo json_encode(array("status" => TRUE));
	}

	
}
