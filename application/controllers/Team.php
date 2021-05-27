<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_team");
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("admin/team/index");
	}
	public function add()
	{
		$this->load->view("admin/team/add");
	}

	public function ajax_list()
	{
		$list = $this->model_team->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $team) {
			$no++;
			$row = array();;
			$row[] = $no;
			$row[] = $team->nama;
			$row[] = $team->jabatan;
			$row[] = $team->email;
			$row[] = $team->no_telp;
			$row[] = $team->keterangan;
			if($team->photo)
				$row[] = '<a href="'.base_url('upload/team/'.$team->photo).'" target="_blank"><img src="'.base_url('upload/team/'.$team->photo).'" class="img-thumbnail img-responsive" /></a>';
			else
				$row[] = '(No photo)';
			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_team('."'".$team->team_id."'".')"><i class="ti-pencil-alt"></i></button>
			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_team('."'".$team->team_id."'".')"></i></button>
			';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_team->count_all(),
			"recordsFiltered" => $this->model_team->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->model_team->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_team->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
        // print_r($this->input->post());
        // exit();
		$team_id=$this->input->post("team_id");
		$nama=$this->input->post("nama");
		$jabatan=$this->input->post("jabatan");
		$email=$this->input->post("email");
		$no_telp=$this->input->post("no_telp");
		$keterangan=$this->input->post("keterangan");
		$data = array(
			'nama'=> $nama,
			'jabatan'=> $jabatan,
			'email'=> $email,
			'no_telp'=> $no_telp,
			'keterangan'=> $keterangan,
		);
		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}
		$insert = $this->model_team->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		// print_r($_POST);
		// exit();
		
		$nama=$this->input->post("nama");
		$jabatan=$this->input->post("jabatan");
		$email=$this->input->post("email");
		$no_telp=$this->input->post("no_telp");
		$keterangan=$this->input->post("keterangan");
		$id=$this->input->post("team_id");

		$data = array(
			'nama' => $nama, 
			'jabatan'=> $jabatan,
			'email'=> $email,
			'no_telp'=> $no_telp,
			'keterangan'=> $keterangan
		);
		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/team'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/team'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$team = $this->model_team->get_by_id($this->input->post('team_id'));
			if(file_exists('upload/team/'.$team->photo) && $team->photo);
				// unlink('upload/team/'.$team->photo);

			$data['photo'] = $upload;
		}
		$this->model_team->update(array('team_id' => $id), $data);
		echo json_encode(array("status" => TRUE));

	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/team';
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
