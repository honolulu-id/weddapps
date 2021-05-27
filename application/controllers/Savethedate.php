<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Savethedate extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Model_savethedate");
		$this->load->helper('url');
	}

	public function index()
	{	
		$data = $this->Model_savethedate->get_data();
		$this->load->view("admin/project/savethedate/index",$data);
		$this->load->view("admin/project/savethedate/project-modal", $data);

	}
	public function add()
	{
		$data = $this->Model_savethedate->get_data();
		$this->load->view("admin/project/savethedate/add", $data);
	}

	public function ajax_list()
	{
		$list = $this->Model_savethedate->get_datatables();
		// print_r($list);exit();

		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $project) {
			$no++;
			$row = array();;
			$row[] = $no;
			$row[] = $project->nama_pria;
			$row[] = $project->nama_wanita;
			$row[] = $project->tanggal;
			$row[] = $project->tempat_resepsi;
			$row[] = $project->keluarga_pria;
			$row[] = $project->keluarga_wanita;
			$row[] = $project->sosmed_pria;
			$row[] = $project->sosmed_wanita;

			if(!empty($project->foto_pria)) {
				$row[] = '<a href="'.base_url('upload/project/savethedate/'.$project->foto_pria).'" target="_blank"><img src="'.base_url('upload/project/savethedate/'.$project->foto_pria).'" class="img-thumbnail img-responsive" style="width: 80px; max-width:auto;" /></a>';
			} else {
				$row[] = '(Tidak Foto Pria)';
			}

			if(!empty($project->foto_wanita)) {
				$row[] = '<a href="'.base_url('upload/project/savethedate/'.$project->foto_wanita).'" target="_blank"><img src="'.base_url('upload/project/savethedate/'.$project->foto_wanita).'" class="img-thumbnail img-responsive" style="width: 80px; max-width:auto;" /></a>';
			} else {
				$row[] = '(Tidak Foto Wanita)';
			}

			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_savethedate('."'".$project->id."'".')"><i class="ti-pencil-alt"></i></button>

			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_project('."'".$project->id."'".')"></i></button>
			';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Model_savethedate->count_all(),
			"recordsFiltered" => $this->Model_savethedate->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}


	public function ajax_delete($id)
	{
		$this->Model_savethedate->delete_by_id($id);
		// $this->Model_savethedate_detail->delete_by_id($id);

		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->Model_savethedate->get_by_id($id);
		// $data->photo=$this->Model_savethedate_detail->get_by_id($id);
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
			$insert_id = $this->Model_savethedate->save($data);
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

				$insert = $this->Model_savethedate_detail->save($data);
			}
			echo json_encode(array("status" => TRUE));
			
		} else {
			$insert_id = $this->Model_savethedate->save($data);
			echo json_encode(array("status" => TRUE));
		}

	}

	public function ajax_update()
	{
	// print_r($_POST);
	// print_r($_FILES);
	// exit();

		$id=$this->input->post("id");
		$nama_pria=$this->input->post("nama_pria");
		$nama_wanita=$this->input->post("nama_wanita");
		$tanggal=$this->input->post("tanggal");
		$tempat_resepsi=$this->input->post("tempat_resepsi");
		$keluarga_pria=$this->input->post("keluarga_pria");
		$keluarga_wanita=$this->input->post("keluarga_wanita");

		if(!empty($_FILES['foto_pria']['name']))
		{
			$temp = $_FILES['foto_pria']['tmp_name'];
			$filename = $_FILES['foto_pria']['name'];
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/project/savethedate/".$filename)){
				unlink("upload/project/savethedate/".$filename);
			}
			imagejpeg($image_p,'upload/project/savethedate/'.$filename);
			$foto_pria = $filename;

		}

		if(!empty($_FILES['foto_wanita']['name']))
		{
			$temp = $_FILES['foto_wanita']['tmp_name'];
			$filename = $_FILES['foto_wanita']['name'];
			list($width_orig, $height_orig) = getimagesize($temp);
			$height_des = 1500;
			$width_des = ($height_des*$width_orig)/$height_orig;
			$image_p = imagecreatetruecolor($width_des, $height_des);
			$image = imagecreatefromjpeg($temp);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width_des, $height_des, $width_orig, $height_orig);
			if(file_exists("upload/project/savethedate/".$filename)){
				unlink("upload/project/savethedate/".$filename);
			}
			imagejpeg($image_p,'upload/project/savethedate/'.$filename);
			$foto_wanita = $filename;

		}

	if($this->input->post('remove_foto_pria')) // if remove photo checked
	{
		if(file_exists('upload/project/savethedate'.$this->input->post('remove_foto_pria')) && $this->input->post('remove_foto_pria'))
			unlink('upload/project/savethedate'.$this->input->post('remove_foto_pria'));
		$data['foto_pria'] = '';
	}

	if($this->input->post('remove_foto_wanita')) // if remove photo checked
	{
		if(file_exists('upload/project/savethedate'.$this->input->post('remove_foto_wanita')) && $this->input->post('remove_foto_wanita'))
			unlink('upload/project/savethedate'.$this->input->post('remove_foto_wanita'));
		$data['foto_wanita'] = '';
	}

	if($this->input->post('remove_foto_pria')) {
		$data = array(
			'nama_pria'=> $nama_pria,
			'nama_wanita'=> $nama_wanita,
			'tanggal'=> $tanggal,
			'tempat_resepsi'=> $tempat_resepsi,
			'keluarga_pria'=> $keluarga_pria,
			'keluarga_wanita'=> $keluarga_wanita,
			'foto_pria'=> '',
			'foto_wanita'=> $foto_wanita
		);
	} else if ($this->input->post('remove_foto_wanita')) {
		$data = array(
			'nama_pria'=> $nama_pria,
			'nama_wanita'=> $nama_wanita,
			'tanggal'=> $tanggal,
			'tempat_resepsi'=> $tempat_resepsi,
			'keluarga_pria'=> $keluarga_pria,
			'keluarga_wanita'=> $keluarga_wanita,
			'foto_pria'=> $foto_pria,
			'foto_wanita'=> ''
		);
	} else if (!empty($_FILES['foto_pria']['name'])) {
		$data = array(
			'nama_pria'=> $nama_pria,
			'nama_wanita'=> $nama_wanita,
			'tanggal'=> $tanggal,
			'tempat_resepsi'=> $tempat_resepsi,
			'keluarga_pria'=> $keluarga_pria,
			'keluarga_wanita'=> $keluarga_wanita,
			'foto_pria'=> $foto_pria
		);
	} else if (!empty($_FILES['foto_wanita']['name'])) {
		$data = array(
			'nama_pria'=> $nama_pria,
			'nama_wanita'=> $nama_wanita,
			'tanggal'=> $tanggal,
			'tempat_resepsi'=> $tempat_resepsi,
			'keluarga_pria'=> $keluarga_pria,
			'keluarga_wanita'=> $keluarga_wanita,
			'foto_wanita'=> $foto_wanita
		);
	} else if (!empty($_FILES['foto_pria']['name']) && !empty($_FILES['foto_pria']['name'])) {
		$data = array(
			'nama_pria'=> $nama_pria,
			'nama_wanita'=> $nama_wanita,
			'tanggal'=> $tanggal,
			'tempat_resepsi'=> $tempat_resepsi,
			'keluarga_pria'=> $keluarga_pria,
			'keluarga_wanita'=> $keluarga_wanita,
			'foto_pria'=> $foto_pria,
			'foto_wanita'=> $foto_wanita
		);
	} else {
		$data = array(
			'nama_pria'=> $nama_pria,
			'nama_wanita'=> $nama_wanita,
			'tanggal'=> $tanggal,
			'tempat_resepsi'=> $tempat_resepsi,
			'keluarga_pria'=> $keluarga_pria,
			'keluarga_wanita'=> $keluarga_wanita
		);
	}

	$this->Model_savethedate->update(array('id' => $id), $data);
	echo json_encode(array("status" => TRUE));


}
}
