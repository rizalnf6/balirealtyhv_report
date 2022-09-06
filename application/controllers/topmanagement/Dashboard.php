<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!=="topmanagement") {
			redirect('auth');
		}
		$this->load->helper('text');
	}

	public function index() {

		$data['page_header'] = 'New Enquiry';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';
		
		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'topmanagement/dashboard';
		$data['footer'] = 'footer';

		$data['button_gotosee_brhv'] = base_url().'topmanagement/brhv_enquiry/new_enquiry';
		$data['button_gotosee_bve'] = base_url().'topmanagement/bve_enquiry/new_enquiry';
		$data['button_gotosee_bvo'] = base_url().'topmanagement/bvo_enquiry/new_enquiry';

		$data['dashboard_enquiry'] = 'admin/balirealty/dashboard_enquiry';
		$data['dashboard_booking'] = 'admin/balirealty/dashboard_booking';
		$data['dashboard_revenue'] = 'admin/balirealty/dashboard_revenue';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

}