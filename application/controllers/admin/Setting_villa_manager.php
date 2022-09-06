<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_villa_manager extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!=="admin") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function index() {
		$this->load->model('model_get');
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Villa Manager List';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/villa_manager';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'admin/setting_villa_manager/add';
		$data['button_detail'] = base_url().'admin/setting_villa_manager/details';
		$data['button_edit'] = base_url().'admin/setting_villa_manager/edit';
		$data['button_delete'] = base_url().'admin/setting_villa_manager/delete';

		$data['list_villa_manager'] = $this->model_select_brhv->villa_manager();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_villa_manager = $this->model_insert_brhv->add_villa_manager($_POST);
			if ($add_villa_manager) {
				$this->session->set_flashdata('add_sukses', 'New villa manager added successfully');	
			}
			redirect("admin/setting_villa_manager");
		}

		$data['page_header'] = 'Add Villa Manager';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_villa_manager';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function details($manager_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Villa Manager Detail';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/villa_manager_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'admin/setting_villa_manager/add';
		$data['button_detail'] = base_url().'admin/setting_villa_manager/details';
		$data['button_edit'] = base_url().'admin/setting_villa_manager/edit';
		$data['button_delete'] = base_url().'admin/setting_villa_manager/delete';

		$data['default'] = $this->model_select_brhv->get_default_villa_manager($manager_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($manager_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->villa_manager($_POST, $manager_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Villa Manager has been updated successfully');	
			}
		redirect("admin/setting_villa_manager");
		}

		$data['page_header'] = 'Edit Villa Manager';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_villa_manager';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();

		$data['default'] = $this->model_select_brhv->get_default_villa_manager($manager_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

}