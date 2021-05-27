<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qanda extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->model("model_qanda");
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("admin/qanda/index");
	}
	public function add()
	{
		$this->load->view("admin/qanda/add");
	}

	public function ajax_list()
	{
		$list = $this->model_qanda->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$sts;
		foreach ($list as $user) {
			$no++;
			if ($user->jawab==null) {
				$sts='<span class="label label-danger">Belum dijawab</span>';
			}else{
				$sts='<span class="label label-info">Sudah dijawab</span>';
			}

			$row = array();;
			$row[] = $no;
			$row[] = $user->user;
			$row[] = $user->email;
			$row[] = $sts;
			$row[] = $user->tanya;
			$row[] = $user->jawab;
			$row[] = $user->waktu_tanya;
			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_qanda('."'".$user->qanda_id."'".')"><i class="ti-pencil-alt"></i></button>
			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_qanda('."'".$user->qanda_id."'".')"></i></button>
				  ';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_qanda->count_all(),
						"recordsFiltered" => $this->model_qanda->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->model_qanda->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_qanda->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
        // print_r($this->input->post());
        // exit();
		$qanda_id=$this->input->post("qanda_id");
		$user=$this->input->post("user");
		$email=$this->input->post("email");
		$tanya=$this->input->post("tanya");
		$date = date("Y-m-d H:i:s");

		$data = array(
			'user'=> $user,
			'email'=> $email,
			'tanya'=> $tanya,
			'waktu_tanya' => $date

		);
		;
		$insert = $this->model_qanda->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$jawab=$this->input->post("jawab");
		$id=$this->input->post("qanda_id");
		$date = date("Y-m-d H:i:s");
		$data = array(
			'qanda_id' => $id,
			'jawab'=> $jawab,
			'waktu_jawab' => $date
		);
		$this->model_qanda->update(array('qanda_id' => $id), $data);
		echo json_encode(array("status" => TRUE));

	}



}
