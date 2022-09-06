<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_discount extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!=="resmanager") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function index() {
		$this->load->model('model_get');
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Discount List';
		
		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/discount';
		$data['footer'] = 'footer';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['button_add'] = base_url().'resmanager/setting_discount/add';
		$data['button_detail'] = base_url().'resmanager/setting_discount/details';
		$data['button_edit'] = base_url().'resmanager/setting_discount/edit';
		$data['button_delete'] = base_url().'resmanager/setting_discount/delete';

		$data['list_discount'] = $this->model_select_brhv->discount();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function details($discount_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Discount Detail';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/discount_detail';
		$data['footer'] = 'footer';

		$data['button_add'] = base_url().'resmanager/setting_discount/add';
		$data['button_detail'] = base_url().'resmanager/setting_discount/details';
		$data['button_edit'] = base_url().'resmanager/setting_discount/edit';
		$data['button_delete'] = base_url().'resmanager/setting_discount/delete';

		$data['default'] = $this->model_select_brhv->get_default_discount($discount_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}
	
}