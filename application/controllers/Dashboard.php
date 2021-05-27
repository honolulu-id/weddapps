<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_project");
		$this->load->model("model_team");
		$this->load->model("model_news");
		$this->load->model("model_ongoing");
		$this->load->model("model_downloads");
		$this->load->helper('url');
	}
	
	public function index()
	{
		$data['projects']=$this->model_project->count_all();
		$data['team']=$this->model_team->count_all();
		$data['news']=$this->model_news->count_all();
		$data['ongoing']=$this->model_ongoing->count_all();
		$data['downloads']=$this->model_downloads->count_all();

		$data['teams']=$this->model_team->get_data();

		$this->load->view("admin/dashboard/index",$data);
	}

}
