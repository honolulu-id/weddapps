<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_project");
		$this->load->model("model_project_detail");
		$this->load->model("model_kategori");
		$this->load->helper('url');
	}

	public function index()
	{	
		$data['kategori'] = $this->model_kategori->get_data();
		$this->load->view("admin/project/index",$data);
		$this->load->view("admin/project/project-modal", $data);

	}
	public function add()
	{
		$data['kategori'] = $this->model_kategori->get_data();
		$this->load->view("admin/project/add", $data);
	}

	public function ajax_list()
	{
		$list = $this->model_project->get_datatables();
		// print_r($list);

		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $project) {
			$no++;
			$row = array();;
			$row[] = $no;
			$row[] = $project->kategori;
			$row[] = $project->nama_project;
			$row[] = $project->waktu;
			$row[] = $project->customer;
			$row[] = $project->year;
			$row[] = $project->budget;
			if($project->background)
				$row[] = '<a href="'.base_url('upload/project/background/'.$project->background).'" target="_blank"><img src="'.base_url('upload/project/background/'.$project->background).'" class="img-thumbnail img-responsive" /></a>';
			else
				$row[] = '(No background)';


			$row[] = $project->keterangan;
			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_project('."'".$project->project_id."'".')"><i class="ti-pencil-alt"></i></button>

			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_project('."'".$project->project_id."'".')"></i></button>
			';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_project->count_all(),
			"recordsFiltered" => $this->model_project->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}


	public function ajax_delete($id)
	{
		$this->model_project->delete_by_id($id);
		$this->model_project_detail->delete_by_id($id);

		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_project->get_by_id($id);
		$data->photo=$this->model_project_detail->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		// print_r($_POST);
		// print_r($_FILES);
		// exit();

		// $project_id=$this->input->post("project_id");
		$nama=$this->input->post("nama");
		$id_kategori=$this->input->post("id_kategori");
		$waktu=$this->input->post("waktu");
		$customer=$this->input->post("customer");
		$year=$this->input->post("year");
		$budget=$this->input->post("budget");
		$keterangan=$this->input->post("keterangan");

		if(!empty($_FILES['background']['name']))
		{
			$temp = $_FILES['background']['tmp_name'];
			$filename = $_FILES['background']['name'];
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/project/background/".$filename)){
				unlink("upload/project/background/".$filename);
			}
			imagejpeg($image_p,'upload/project/background/'.$filename);
			$background = $filename;

		}

		$data = array(
			'id_kategori'=> $id_kategori,
			'nama_project'=> $nama,
			'waktu'=> $waktu,
			'customer'=> $customer,
			'year'=> $year,
			'budget'=> $budget,
			'background'=> $background,
			'keterangan'=> $keterangan
		);


		if(!empty($_FILES["photo"]["name"])){
			$insert_id = $this->model_project->save($data);
			foreach ($_FILES["photo"]["name"] as $key => $value) {
				
				// $project_id=$this->input->post("project_id");

				$temp = $_FILES['photo']['tmp_name'][$key];
				$filename = $value;
				list($width_orig, $height_orig) = getimagesize($temp);
				$height_des = 1500;
				$width_des = ($height_des*$width_orig)/$height_orig;
				$image_p = imagecreatetruecolor($width_des, $height_des);
				$image = imagecreatefromjpeg($temp);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
				if(file_exists("upload/project/".$filename)){
					unlink("upload/project/".$filename);
				}
				imagejpeg($image_p,'upload/project/'.$filename);
				$gambar = $filename;

				$data = array(
					'id_project'=> $insert_id,
					'photo'=> $gambar
				);

				$insert = $this->model_project_detail->save($data);
			}
			echo json_encode(array("status" => TRUE));
			
		} else {
			$insert_id = $this->model_project->save($data);
			echo json_encode(array("status" => TRUE));
		}

	}

	public function ajax_update()
	{
	// print_r($_POST);
	// print_r($_FILES);
	// exit();

		$id_kategori=$this->input->post("id_kategori");
		$id_project=$this->input->post("project_id");
		$nama=$this->input->post("nama");
		$waktu=$this->input->post("waktu");
		$customer=$this->input->post("customer");
		$year=$this->input->post("year");
		$budget=$this->input->post("budget");
		$keterangan=$this->input->post("keterangan");

		if(!empty($_FILES['background']['name']))
		{
			$temp = $_FILES['background']['tmp_name'];
			$filename = $_FILES['background']['name'];
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/project/background/".$filename)){
				unlink("upload/project/background/".$filename);
			}
			imagejpeg($image_p,'upload/project/background/'.$filename);
			$background = $filename;

		}

	if($this->input->post('remove_background')) // if remove photo checked
	{
		if(file_exists('upload/project'.$this->input->post('remove_background')) && $this->input->post('remove_background'))
			unlink('upload/project'.$this->input->post('remove_background'));
		$data['background'] = '';
	}

	if($this->input->post('remove_background')) {
		$data = array(
			'id_kategori'=> $id_kategori,
			'nama_project'=> $nama,
			'waktu'=> $waktu,
			'customer'=> $customer,
			'year'=> $year,
			'budget'=> $budget,
			'background'=> '',
			'keterangan'=> $keterangan
		);
	} else if (!empty($_FILES['background']['name'])) {
		$data = array(
			'id_kategori'=> $id_kategori,
			'nama_project'=> $nama,
			'waktu'=> $waktu,
			'customer'=> $customer,
			'year'=> $year,
			'budget'=> $budget,
			'background'=> $background,
			'keterangan'=> $keterangan
		);
	} else {
		$data = array(
			'id_kategori'=> $id_kategori,
			'nama_project'=> $nama,
			'waktu'=> $waktu,
			'customer'=> $customer,
			'year'=> $year,
			'budget'=> $budget,
			'keterangan'=> $keterangan
		);
	}

	if ($this->input->post('remove_')) {
		# code...
		$detail = $_POST['remove_'];
		foreach ($detail as $value) {
			$id_detail = $value['photo'];
			$this->model_project_detail->delete_by_id_detail($id_detail);

		}
	}

	if(!empty($_FILES["photo"]["name"])){
		foreach ($_FILES["photo"]["name"] as $key => $value) {
			
			// $project_id=$this->input->post("project_id");

			$temp = $_FILES['photo']['tmp_name'][$key];
			$filename = $value;
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/project/".$filename)){
				unlink("upload/project/".$filename);
			}
			imagejpeg($image_p,'upload/project/'.$filename);
			$gambar = $filename;

			$data_ = array(
				'id_project'=> $id_project,
				'photo'=> $gambar
			);

			$insert = $this->model_project_detail->save($data_);
		}
		// echo json_encode(array("status" => TRUE));
		
	}

	$this->model_project->update(array('project_id' => $id_project), $data);
	// $this->model_project_detail->delete_by_id(array('id_detail' => $id_detail));
	echo json_encode(array("status" => TRUE));


}
}
