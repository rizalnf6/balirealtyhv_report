<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_villa_supervisor extends CI_Controller {
	
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

		$data['page_header'] = 'Villa Supervisor List';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/villa_supervisor';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'admin/setting_villa_supervisor/add';
		$data['button_detail'] = base_url().'admin/setting_villa_supervisor/details';
		$data['button_edit'] = base_url().'admin/setting_villa_supervisor/edit';
		$data['button_delete'] = base_url().'admin/setting_villa_supervisor/delete';

		$data['list_villa_supervisor'] = $this->model_select_brhv->villa_supervisor();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_villa_supervisor = $this->model_insert_brhv->add_villa_supervisor($_POST);
			if ($add_villa_supervisor) {
				$this->session->set_flashdata('add_sukses', 'New villa Supervisor added successfully');	
			}
			redirect("admin/setting_villa_supervisor");
		}

		$data['page_header'] = 'Add Villa Supervisor';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_villa_supervisor';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function details($supervisor_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Villa Supervior Details';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/villa_supervisor_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'admin/setting_villa_supervisor/add';
		$data['button_detail'] = base_url().'admin/setting_villa_supervisor/details';
		$data['button_edit'] = base_url().'admin/setting_villa_supervisor/edit';
		$data['button_delete'] = base_url().'admin/setting_villa_supervisor/delete';

		$data['default'] = $this->model_select_brhv->get_default_villa_supervisor($supervisor_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($supervisor_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->villa_supervisor($_POST, $supervisor_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Villa Supervisor has been updated successfully');	
			}
		redirect("admin/setting_villa_supervisor");
		}

		$data['page_header'] = 'Edit Villa Supervisor';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_villa_supervisor';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();

		$data['default'] = $this->model_select_brhv->get_default_villa_supervisor($supervisor_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

}