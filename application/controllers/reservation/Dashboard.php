<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!=="reservation") {
			redirect('auth');
		}
		$this->load->helper('text');
	}

	public function index() {

		$data['page_header'] = 'New Enquiry';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';
		
		$data['header'] = 'reservation/header';
		$data['main_content'] = 'reservation/dashboard';
		$data['footer'] = 'footer';

		$data['button_gotosee_brhv'] = base_url().'reservation/brhv_enquiry/new_enquiry';
		$data['button_gotosee_bve'] = base_url().'reservation/bve_enquiry/new_enquiry';
		$data['button_gotosee_bvo'] = base_url().'reservation/bvo_enquiry/new_enquiry';

		$data['dashboard_new_enquiry'] 			= 'reservation/balirealty/dashboard_new_enquiry';
		$data['dashboard_openenquiry'] 			= 'reservation/balirealty/dashboard_openenquiry';
		$data['dashboard_holdenquiry'] 			= 'reservation/balirealty/dashboard_holdenquiry';
		$data['dashboard_outstandingenquiry'] 	= 'reservation/balirealty/dashboard_outstandingenquiry';
		$data['dashboard_enquiry'] 				= 'reservation/balirealty/dashboard_enquiry';
		$data['dashboard_booking'] 				= 'reservation/balirealty/dashboard_booking';
		$data['dashboard_revenue'] 				= 'reservation/balirealty/dashboard_revenue';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

}