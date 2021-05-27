<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_news');
		$this->load->model('model_news_detail');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("admin/news/index");
	}
	public function add()
	{
		$this->load->view("admin/news/add");
	}

	public function ajax_list()
	{
		$list = $this->model_news->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $news) {
			$no++;
			$row = array();;
			$row[] = $no;
			$row[] = $news->judul;
			$row[] = $news->waktu;
			if($news->background)
				$row[] = '<a href="'.base_url('upload/news/background/'.$news->background).'" target="_blank"><img src="'.base_url('upload/news/background/'.$news->background).'" class="img-thumbnail img-responsive" /></a>';
			else
				$row[] = '(No background)';
			
			$row[] = $news->keterangan;

			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_news('."'".$news->news_id."'".')"><i class="ti-pencil-alt"></i></button>
			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_news('."'".$news->news_id."'".')"></i></button>
			';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_news->count_all(),
			"recordsFiltered" => $this->model_news->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->model_news->delete_by_id($id);
		$this->model_news_detail->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_news->get_by_id($id);
		$data->photo=$this->model_news_detail->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
  //       print_r($_POST);
  //       print_r($_FILES);
		// exit();

		$news_id=$this->input->post("news_id");
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
			if(file_exists("upload/news/background/".$filename)){
				unlink("upload/news/background/".$filename);
			}
			imagejpeg($image_p,'upload/news/background/'.$filename);
			$background = $filename;

		}

		$data = array(
			'judul'=> $judul,
			'waktu'=> $waktu,
			'background'=> $background,
			'keterangan'=> $keterangan
		);

		$insert_id = $this->model_news->save($data);
		// echo json_encode(array("status" => TRUE));
		if(!empty($_FILES["photo"]["name"])){
			foreach ($_FILES["photo"]["name"] as $key => $value) {
			// $news_id=$this->input->post("news_id");

				$temp = $_FILES['photo']['tmp_name'][$key];
				$filename = $value;
				list($width_orig, $height_orig) = getimagesize($temp);
				$height_des = 1500;
				$width_des = ($height_des*$width_orig)/$height_orig;
				$image_p = imagecreatetruecolor($width_des, $height_des);
				$image = imagecreatefromjpeg($temp);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
				if(file_exists("upload/news/".$filename)){
					unlink("upload/news/".$filename);
				}
				imagejpeg($image_p,'upload/news/'.$filename);
				$gambar = $filename;

				$data = array(
					'id_news'=> $insert_id,
					'photo'=> $gambar
				);

				$insert = $this->model_news_detail->save($data);
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
		$id_news=$this->input->post("news_id");
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
			if(file_exists("upload/news/background/".$filename)){
				unlink("upload/news/background/".$filename);
			}
			imagejpeg($image_p,'upload/news/background/'.$filename);
			$background = $filename;

		}

	if($this->input->post('remove_background')) // if remove photo checked
	{
		if(file_exists('upload/news'.$this->input->post('remove_background')) && $this->input->post('remove_background'))
			unlink('upload/news'.$this->input->post('remove_background'));
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
			$this->model_news_detail->delete_by_id_detail($id_detail);

		}
	}

	if(!empty($_FILES["photo"]["name"])){
		foreach ($_FILES["photo"]["name"] as $key => $value) {
			
			// $news_id=$this->input->post("news_id");

			$temp = $_FILES['photo']['tmp_name'][$key];
			$filename = $value;
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/news/".$filename)){
				unlink("upload/news/".$filename);
			}
			imagejpeg($image_p,'upload/news/'.$filename);
			$gambar = $filename;

			$data_ = array(
				'id_news'=> $id_news,
				'photo'=> $gambar
			);

			$insert = $this->model_news_detail->save($data_);
		}
		// echo json_encode(array("status" => TRUE));
		
	}

	$this->model_news->update(array('news_id' => $id_news), $data);
	// $this->model_news_detail->delete_by_id(array('id_detail' => $id_detail));
	echo json_encode(array("status" => TRUE));

	}

}
