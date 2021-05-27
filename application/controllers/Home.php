<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("model_project");
		$this->load->model("model_project_detail");
		$this->load->model("model_about");
		$this->load->model("model_team");
		$this->load->model("model_news");
		$this->load->model("model_news_detail");
		$this->load->model("model_ongoing");
		$this->load->model("model_ongoing_detail");
		$this->load->model("model_downloads");
		$this->load->model("model_qanda");
		$this->load->model("model_contact");
		$this->load->helper('url');
	}

	public function index()
	{	
		$this->load->view("landing/index");
	}
	
	
	public function projects($id = null)
	{	
		if ($id == null) {
			$data['projects'] = $this->model_project->get_data();
			$this->load->view("landing/projects",$data);
		} else {
			$data['project'] = $this->model_project->get_by_id($id);
			$data['project']->photo = $this->model_project_detail->get_by_id($id);
			$this->load->view("landing/project-single",$data);
		}
	}

	public function project_single()
	{	
		$this->load->view("landing/project-single");
	}
	
	
	public function profile()
	{	
		$this->load->view("landing/profile");
	}

	public function profile_company()
	{	
		$data['company'] = $this->model_about->get_data();
		$this->load->view("landing/company",$data);
	}

	public function profile_the_team()
	{	
		$data['teams'] = $this->model_team->get_data();
		$this->load->view("landing/team",$data);
	}
	
	
	public function insight()
	{	
		$this->load->view("landing/insight");
	}

	public function insight_news($id = null)
	{	
		if($id == null){
			$data['news'] = $this->model_news->get_data();
			$this->load->view("landing/news",$data);
		} else {
			$data['news_single'] = $this->model_news->get_by_id($id);
			$data['news_single']->photo = $this->model_news_detail->get_by_id($id);
			$this->load->view("landing/news-single",$data);
		}
	}

	public function insight_ongoing($id = null)
	{	
		if($id == null){
			$data['ongoing'] = $this->model_ongoing->get_data();
			$this->load->view("landing/ongoing",$data);
		} else {
			$data['ongoing_single'] = $this->model_ongoing->get_by_id($id);
			$data['ongoing_single']->photo = $this->model_ongoing_detail->get_by_id($id);
			$this->load->view("landing/ongoing-single",$data);
		}
	}

	public function insight_downloads($id = null)
	{	
		if($id == null){
			$data['downloads'] = $this->model_downloads->get_data();
			$this->load->view("landing/downloads",$data);
		} else {
			$data['downloads_single'] = $this->model_downloads->get_by_id($id);
			$this->load->view("landing/download-single",$data);
		}
	}
	

	public function qanda()
	{	
		$data['qanda'] = $this->model_qanda->get_data();
		$this->load->view("landing/qanda",$data);
	}
		
	public function contact()
	{	
		$data['contact'] = $this->model_contact->get_data(0);
		$data['contact'] = $data['contact'][0];
		$this->load->view("landing/contact",$data);
	}

	
}
