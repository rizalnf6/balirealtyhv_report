<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!=="bveonly") {
			redirect('auth');
		}
		$this->load->helper('text');
	}

	public function index() {

		$data['page_header'] = 'New Enquiry';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';
		
		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'bveonly/dashboard';
		$data['footer'] = 'footer';

		$data['dashboard_enquiry'] = 'admin/balirealty/dashboard_enquiry';
		$data['dashboard_booking'] = 'admin/balirealty/dashboard_booking';
		$data['dashboard_revenue'] = 'admin/balirealty/dashboard_revenue';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

}