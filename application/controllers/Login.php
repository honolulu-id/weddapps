<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_login');
	}

// Show login page
	public function index() {
		$this->load->view('admin/login/index');
	}



// Check for user login process
	public function login_process() {

		
		$this->form_validation->set_rules('user_username', 'user_username', 'trim|required');
		$this->form_validation->set_rules('user_password', 'user_password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('masterdata/index');
			}else{
				// $this->load->view('login/login2');
				$this->load->view('admin/login/index');
			}
		} else {
			$data = array(
				'user_username' => $this->input->post('user_username'),
				'user_password' => $this->input->post('user_password')
			);
			$result = $this->model_login->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('user_username');
				$result = $this->model_login->read_user_information($username);

				// print_r($result);
				// exit();
				if ($result != false) {
					$session_data = array(
						'user_id' => $result[0]->user_id,
						'user_username' => $result[0]->user_username,
						'user_password' => $result[0]->user_password,
						'user_email' => $result[0]->user_email,
						'photo' => $result[0]->photo,
						'user_info' => $result[0]->user_info
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					// $data = array(
					// 	"container" => "home"
					// );

					redirect('dashboard/index',$data);
				} else {
					echo "string";
				}
			} else {
				$data = array(
					'error_message' => '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Invalid Username or Password.
                                </div>'
				);
				$this->load->view('admin/login/index', $data);
			}
		}
	}

	public function logout() {
	// Hapus semua data pada session
    $this->session->sess_destroy();
 	$data = array(
					'logout_message' => 'Logout successfully'
				);
    // redirect ke halaman login	
    redirect('login',$data);
	}

}


