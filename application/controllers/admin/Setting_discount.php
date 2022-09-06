<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_discount extends CI_Controller {
	
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

		$data['page_header'] = 'Discount List';
		
		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/discount';
		$data['footer'] = 'footer';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['button_add'] = base_url().'admin/setting_discount/add';
		$data['button_detail'] = base_url().'admin/setting_discount/details';
		$data['button_edit'] = base_url().'admin/setting_discount/edit';
		$data['button_delete'] = base_url().'admin/setting_discount/delete';
		$data['button_copy'] = base_url().'admin/setting_discount/copy';

		$data['list_discount'] = $this->model_select_brhv->discount();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_discount = $this->model_insert_brhv->add_discount($_POST);
			if ($add_discount) {
				$this->session->set_flashdata('add_sukses', 'New discount added successfully');	
			}
			redirect("admin/setting_discount");
		}

		$data['page_header'] = 'Add Discount';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_discount';
		$data['footer'] = 'footer';

		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_other();

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function copy($discount_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$copy_discount = $this->model_insert_brhv->add_discount($_POST);
			if ($copy_discount) {
				$this->session->set_flashdata('add_success', 'Discount added successfully');	
			}
			redirect("admin/setting_discount");
		}

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['page_header'] = 'Copy Discount';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_discount';
		$data['footer'] = 'footer';
		
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_other();

		$data['default'] = $this->model_select_brhv->get_default_discount($discount_id);
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function details($discount_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Discount Detail';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/discount_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'admin/setting_discount/add';
		$data['button_detail'] = base_url().'admin/setting_discount/details';
		$data['button_edit'] = base_url().'admin/setting_discount/edit';
		$data['button_delete'] = base_url().'admin/setting_discount/delete';

		$data['default'] = $this->model_select_brhv->get_default_discount($discount_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($discount_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->discount($_POST, $discount_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Source has been updated successfully');	
			}
		redirect("admin/setting_discount");
		}

		$data['page_header'] = 'Edit Discount';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_discount';
		$data['footer'] = 'footer';

		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_other();

		$data['default'] = $this->model_select_brhv->get_default_discount($discount_id);

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view',$data);
	}

}