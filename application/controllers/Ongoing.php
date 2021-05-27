<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongoing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_ongoing");
		$this->load->model("model_ongoing_detail");
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("admin/ongoing/index");
	}
	public function add()
	{
		$this->load->view("admin/ongoing/add");
	}

	public function ajax_list()
	{
		$list = $this->model_ongoing->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $ongoing) {
			$no++;
			$row = array();;
			$row[] = $no;
			$row[] = $ongoing->judul;
			$row[] = $ongoing->waktu;
		// $row[] = $ongoing->foto;
			if($ongoing->background)
				$row[] = '<a href="'.base_url('upload/ongoing/background/'.$ongoing->background).'" target="_blank"><img src="'.base_url('upload/ongoing/background/'.$ongoing->background).'" class="img-thumbnail img-responsive" /></a>';
			else
				$row[] = '(No background)';
			$row[] = $ongoing->keterangan;

			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_ongoing('."'".$ongoing->ongoing_id."'".')"><i class="ti-pencil-alt"></i></button>
			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_ongoing('."'".$ongoing->ongoing_id."'".')"></i></button>
			';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_ongoing->count_all(),
			"recordsFiltered" => $this->model_ongoing->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->model_ongoing->delete_by_id($id);
		$this->model_ongoing_detail->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_ongoing->get_by_id($id);
		$data->photo=$this->model_ongoing_detail->get_by_id($id);

		echo json_encode($data);
	}

	public function ajax_add()
	{
    // print_r($this->input->post());
    // exit();
		$ongoing_id=$this->input->post("ongoing_id");
		$judul=$this->input->post("judul");
		$waktu=$this->input->post("waktu");
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
			if(file_exists("upload/ongoing/background/".$filename)){
				unlink("upload/ongoing/background/".$filename);
			}
			imagejpeg($image_p,'upload/ongoing/background/'.$filename);
			$background = $filename;

		}

		$data = array(
			'judul'=> $judul,
			'waktu'=> $waktu,
			'background'=> $background,
			'keterangan'=> $keterangan
		);

		$insert_id = $this->model_ongoing->save($data);
	// echo json_encode(array("status" => TRUE));
		if(!empty($_FILES["photo"]["name"])){
			foreach ($_FILES["photo"]["name"] as $key => $value) {

			// $ongoing_id=$this->input->post("ongoing_id");

				$temp = $_FILES['photo']['tmp_name'][$key];
				$filename = $value;
				list($width_orig, $height_orig) = getimagesize($temp);
				$height_des = 1500;
				$width_des = ($height_des*$width_orig)/$height_orig;
				$image_p = imagecreatetruecolor($width_des, $height_des);
				$image = imagecreatefromjpeg($temp);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
				if(file_exists("upload/ongoing/".$filename)){
					unlink("upload/ongoing/".$filename);
				}
				imagejpeg($image_p,'upload/ongoing/'.$filename);
				$gambar = $filename;

				$data = array(
					'id_ongoing'=> $insert_id,
					'photo'=> $gambar
				);

				$insert = $this->model_ongoing_detail->save($data);
			}

		}
			echo json_encode(array("status" => TRUE));
		
	}

	public function ajax_update()
	{
	// print_r($_POST);
	// print_r($_FILES);
	// exit();

		$judul=$this->input->post("judul");
		$waktu=$this->input->post("waktu");
		$keterangan=$this->input->post("keterangan");
		$id_ongoing=$this->input->post("ongoing_id");
		$id_detail=$this->input->post("id_detail");

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
			if(file_exists("upload/ongoing/background/".$filename)){
				unlink("upload/ongoing/background/".$filename);
			}
			imagejpeg($image_p,'upload/ongoing/background/'.$filename);
			$background = $filename;

		}

	if($this->input->post('remove_background')) // if remove photo checked
	{
		if(file_exists('upload/ongoing'.$this->input->post('remove_background')) && $this->input->post('remove_background'))
			unlink('upload/ongoing'.$this->input->post('remove_background'));
		$data['background'] = '';
	}

	if($this->input->post('remove_background')) {
		$data = array(
			'judul'=> $judul,
			'waktu'=> $waktu,
			'background'=> '',
			'keterangan'=> $keterangan
		);
	} else if (!empty($_FILES['background']['name'])) {
		$data = array(
			'judul'=> $judul,
			'waktu'=> $waktu,
			'background'=> $background,
			'keterangan'=> $keterangan
		);
	} else {
		$data = array(
			'judul'=> $judul,
			'waktu'=> $waktu,
			'keterangan'=> $keterangan
		);
	}

	if ($this->input->post('remove_')) {
		# code...
		$detail = $_POST['remove_'];
		foreach ($detail as $value) {
			$id_detail = $value['photo'];
			$this->model_ongoing_detail->delete_by_id_detail($id_detail);

		}
	}

	if(!empty($_FILES["photo"]["name"])){
		foreach ($_FILES["photo"]["name"] as $key => $value) {
			
			// $ongoing_id=$this->input->post("ongoing_id");

			$temp = $_FILES['photo']['tmp_name'][$key];
			$filename = $value;
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/ongoing/".$filename)){
				unlink("upload/ongoing/".$filename);
			}
			imagejpeg($image_p,'upload/ongoing/'.$filename);
			$gambar = $filename;

			$data_ = array(
				'id_ongoing'=> $id_ongoing,
				'photo'=> $gambar
			);

			$insert = $this->model_ongoing_detail->save($data_);
		}
		// echo json_encode(array("status" => TRUE));
		
	}

	$this->model_ongoing->update(array('ongoing_id' => $id_ongoing), $data);
	// $this->model_ongoing_detail->delete_by_id(array('id_detail' => $id_detail));
	echo json_encode(array("status" => TRUE));

}



}
