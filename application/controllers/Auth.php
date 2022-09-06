<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{	
		$this->load->library('session');
		$this->load->view('login');
	}

	public function check_login()
	{	
		$this->load->library('session');
		$this->load->model('model_user');

		$data = array('email' => $this->input->post('email'), 
					  'password' => md5($this->input->post('password')));

		$hasil = $this->model_user->check_user($data);
			if ($hasil->num_rows() == 1){
				foreach($hasil->result() as $sess)
            {
            	$sess_data['logged_in'] = 'Sudah Login';
              	$sess_data['email'] = $sess->email;
              	$sess_data['name'] 	= $sess->name;
              	$sess_data['level'] = $sess->level;
              	$this->session->set_userdata($sess_data);
            }
			if ($this->session->userdata('level')=='admin'){
				redirect('admin/dashboard');
			}
			elseif ($this->session->userdata('level')=='reservation'){
				redirect('reservation/dashboard');
			}
			elseif ($this->session->userdata('level')=='receptionist'){
				redirect('receptionist/dashboard');
			}
			elseif ($this->session->userdata('level')=='topmanagement'){
				redirect('topmanagement/dashboard');
			}
			elseif ($this->session->userdata('level')=='resmanager'){
				redirect('resmanager/dashboard');
			} 
			elseif ($this->session->userdata('level')=='bveonly'){
				redirect('bveonly/dashboard');
			}
		}
		else
		{	
			$this->session->set_flashdata('login_failed', 'Invalid username or password !!!');	
			redirect('auth');		
			//echo " <script>alert('Gagal Login: Cek username , password!');history.go(-1);</script>";
		}
		
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('auth');
	}
}