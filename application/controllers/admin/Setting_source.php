<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_source extends CI_Controller {
	
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

		$data['page_header'] = 'Source List';
		
		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/source';
		$data['footer'] = 'footer';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['button_add'] = base_url().'admin/setting_source/add';
		$data['button_detail'] = base_url().'admin/setting_source/details';
		$data['button_edit'] = base_url().'admin/setting_source/edit';
		$data['button_delete'] = base_url().'admin/setting_source/delete';

		$data['list_source'] = $this->model_select_brhv->source();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_source = $this->model_insert_brhv->add_source($_POST);
			if ($add_source) {
				$this->session->set_flashdata('add_sukses', 'New source added successfully');	
			}
			redirect("admin/setting_source");
		}

		$data['page_header'] = 'Add Source';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_source';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();
		$data['list_source_category'] = $this->model_get->source_category();

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function details($source_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Source Detail';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/source_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'admin/setting_source/add';
		$data['button_detail'] = base_url().'admin/setting_source/details';
		$data['button_edit'] = base_url().'admin/setting_source/edit';
		$data['button_delete'] = base_url().'admin/setting_source/delete';

		$data['default'] = $this->model_select_brhv->get_default_source($source_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($source_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->source($_POST, $source_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Source has been updated successfully');	
			}
		redirect("admin/setting_source");
		}

		$data['page_header'] = 'Edit Source';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_source';
		$data['footer'] = 'footer';

		$data['list_status'] = $this->model_get->status_other();
		$data['list_source_category'] = $this->model_get->source_category();

		$data['default'] = $this->model_select_brhv->get_default_source($source_id);

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view',$data);
	}

}