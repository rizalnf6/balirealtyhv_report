<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="bveonly") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function bve() {
		$this->load->model('model_get');

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'admin/balivillaescapes/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'bveonly/report/report_bve';
		$data['filter'] = base_url().'bveonly/filter/bve_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'admin/balivillaescapes/report_reservation';

		$data['list_reservation'] = $this->model_get->reservation_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

}