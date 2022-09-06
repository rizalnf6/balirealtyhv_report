<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_management extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="resmanager") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function index() {
		$this->load->model('model_get');
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Management List';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/management';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'resmanager/setting_management/add';
		$data['button_detail'] = base_url().'resmanager/setting_management/details';
		$data['button_edit'] = base_url().'resmanager/setting_management/edit';
		$data['button_delete'] = base_url().'resmanager/setting_management/delete';

		$data['list_management'] = $this->model_select_brhv->management();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		$data['page_header'] = 'Add Management';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/form_management';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();
		$data['session_login'] = $this->session->userdata('name');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_management = $this->model_insert_brhv->add_management($_POST);
			if ($add_management) {
				$this->session->set_flashdata('add_sukses', 'New management added successfully');	
			}
			redirect("resmanager/setting_management");
		}
		$this->load->view('template_view', $data);
	}

	public function details($management_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Management Detail';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/management_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'resmanager/setting_management/add';
		$data['button_detail'] = base_url().'resmanager/setting_management/details';
		$data['button_edit'] = base_url().'resmanager/setting_management/edit';
		$data['button_delete'] = base_url().'resmanager/setting_management/delete';

		$data['default'] = $this->model_select_brhv->get_default_management($management_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($management_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->management($_POST, $management_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Management has been updated successfully');	
			}
		redirect("resmanager/setting_management");
		}

		$data['page_header'] = 'Edit Management';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/form_management';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();

		$data['default'] = $this->model_select_brhv->get_default_management($management_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}
}