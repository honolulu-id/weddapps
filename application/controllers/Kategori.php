<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->model("model_kategori");
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("admin/kategori/index");
	}
	public function add()
	{
		$this->load->view("admin/kategori/add");
	}

	public function ajax_list()
	{
		$list = $this->model_kategori->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kategori) {
			$no++;

			$row = array();;
			$row[] = $no;
			$row[] = $kategori->kategori_id;
			$row[] = $kategori->kategori;
			$row[] = '<button data-toggle="tooltip" data-placement="top" title="Edit" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" onclick="edit_kategori('."'".$kategori->kategori_id."'".')"><i class="ti-pencil-alt"></i></button>
			<button data-toggle="tooltip" data-placement="top" id="sa-Delete" title="Hapus" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash" onclick="delete_kategori('."'".$kategori->kategori_id."'".')"></i></button>
				  ';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_kategori->count_all(),
						"recordsFiltered" => $this->model_kategori->count_filtered(),
						"data" => $data,
				);
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->model_kategori->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->model_kategori->get_by_id($id);
			echo json_encode($data);
	}

	public function ajax_add()
	{
        // print_r($this->input->post());
        // exit();
		$kategori_id=$this->input->post("kategori_id");
		$kategori=$this->input->post("kategori");

		$data = array(
			'kategori'=> $kategori

		);
		$insert = $this->model_kategori->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$kategori=$this->input->post("kategori");
		$id=$this->input->post("kategori_id");
		$data = array(
			'kategori_id' => $id,
			'kategori'=> $kategori
		);
		$this->model_kategori->update(array('kategori_id' => $id), $data);
		echo json_encode(array("status" => TRUE));

	}



}
