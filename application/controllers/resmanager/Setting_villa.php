<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_villa extends CI_Controller {
	
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

		$data['page_header'] = 'Villa List';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/villa';
		$data['footer'] = 'footer';

		$data['villa_all'] = 'admin/balirealty/villa_all';
		$data['villa_special'] = 'admin/balirealty/villa_special';
		$data['villa_promotion'] = 'admin/balirealty/villa_promotion';

		$data['button_add'] = base_url().'resmanager/setting_villa/add';
		$data['button_detail'] = base_url().'resmanager/setting_villa/details';
		$data['button_edit'] = base_url().'resmanager/setting_villa/edit';
		$data['button_delete'] = base_url().'resmanager/setting_villa/delete';

		$data['list_villa'] = $this->model_select_brhv->villa();
		$data['list_villa_special'] = $this->model_select_brhv->villa_special();
		$data['list_villa_promotion'] = $this->model_select_brhv->villa_promotion();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_get');
		$this->load->model('model_insert_brhv');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_villa = $this->model_insert_brhv->add_villa($_POST);
			if ($add_villa) {
				$this->session->set_flashdata('add_sukses', 'New villa added successfully');	
			}
			redirect("admin/setting_villa");
		}

		$data['page_header'] = 'Add Villa';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_villa';
		$data['footer'] = 'footer';

		$data['list_manager'] = $this->model_get->villa_manager();
		$data['list_supervisor'] = $this->model_get->villa_supervisor();
		$data['list_status'] = $this->model_get->status_other();
		$data['list_management'] = $this->model_get->management();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function details($villa_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Villa Detail';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/villa_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'resmanager/setting_villa/add';
		$data['button_detail'] = base_url().'resmanager/setting_villa/details';
		$data['button_edit'] = base_url().'resmanager/setting_villa/edit';
		$data['button_delete'] = base_url().'resmanager/setting_villa/delete';

		$data['default'] = $this->model_select_brhv->get_default_villa($villa_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($villa_id) {
		$this->load->model('model_get');
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		
		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->villa($_POST, $villa_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Villa has been updated successfully');	
			}
		redirect("resmanager/setting_villa");
		}

		$data['page_header'] = 'Edit Villa';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/form_villa';
		$data['footer'] = 'footer';

		$data['list_manager'] = $this->model_get->villa_manager();
		$data['list_supervisor'] = $this->model_get->villa_supervisor();
		$data['list_status'] = $this->model_get->status_other();
		$data['list_management'] = $this->model_get->management();

		$data['default'] = $this->model_select_brhv->get_default_villa($villa_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

}