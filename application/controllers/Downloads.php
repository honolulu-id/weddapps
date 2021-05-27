<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_downloads");
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("admin/downloads/index");
	}
	public function add()
	{
		$this->load->view("admin/downloads/add");
	}

	public function ajax_list()
	{
		$list = $this->model_downloads->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $downloads) {
			$no++;
			$row = array();;
			$row[] = $no;
			$row[] = $downloads->judul;
			$row[] = $downloads->waktu;
			// $row[] = $downloads->files;
			$row[] = $downloads->keterangan;
			if($downloads->files)
				$row[] = '<a href="'.base_url('upload/downloads/'.$downloads->files).'" target="_blank"><span>'.$downloads->files.'</span></a>';
			else
				$row[] = '(No files)';
			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_downloads('."'".$downloads->downloads_id."'".')"><i class="ti-pencil-alt"></i></button>
			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_downloads('."'".$downloads->downloads_id."'".')"></i></button>
			';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_downloads->count_all(),
			"recordsFiltered" => $this->model_downloads->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->model_downloads->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_downloads->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
        // print_r($this->input->post());
        // exit();
		$downloads_id=$this->input->post("downloads_id");
		$judul=$this->input->post("judul");
		$waktu=$this->input->post("waktu");
		$files=$this->input->post("files");
		$keterangan=$this->input->post("keterangan");
		$data = array(
			'judul'=> $judul,
			'waktu'=> $waktu,
			'files'=> $files,
			'keterangan'=> $keterangan,
		);
		if(!empty($_FILES['files']['name']))
		{
			$upload = $this->_do_upload();
			$data['files'] = $upload;
		}
		$insert = $this->model_downloads->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		// print_r($_POST);
		// print_r($_FILES);
		// exit();
		
		$judul=$this->input->post("judul");
		$waktu=$this->input->post("waktu");
		$files=$this->input->post("files");
		$keterangan=$this->input->post("keterangan");
		$id=$this->input->post("downloads_id");

		$data = array(
			'judul' => $judul, 
			'waktu'=> $waktu,
			// 'files'=> $files,
			'keterangan'=> $keterangan
		);

		if($this->input->post('remove_files')) // if remove files checked
		{
			if(file_exists('upload/downloads'.$this->input->post('remove_files')) && $this->input->post('remove_files'))
				unlink('upload/downloads'.$this->input->post('remove_files'));
			$data['files'] = '';
		}

		if(!empty($_FILES['files']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$downloads = $this->model_downloads->get_by_id($this->input->post('downloads_id'));
			if(file_exists('upload/downloads/'.$downloads->files) && $downloads->files);
				// unlink('upload/downloads/'.$downloads->files);

			$data['files'] = $upload;
		}
		
		$this->model_downloads->update(array('downloads_id' => $id), $data);
		echo json_encode(array("status" => TRUE));

	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/downloads';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG|doc|docx|pdf|xls|xlsx';
        $config['max_size']             = 1204; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('files')) //upload and validate
        {
        	$data['inputerror'][] = 'files';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}



}
