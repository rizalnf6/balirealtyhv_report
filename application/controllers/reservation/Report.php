<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="reservation") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function brhv() {
		$this->load->model('model_get');

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		
		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balirealty/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'reservation/report/brhv';
		$data['filter'] = base_url().'reservation/filter/brhv_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'reservation/balirealty/report_reservation';
		$data['report_source'] = 'reservation/balirealty/report_source';
		$data['report_website'] = 'reservation/balirealty/report_website';
		$data['report_agent'] = 'reservation/balirealty/report_agent';
		$data['report_piechart'] = 'reservation/balirealty/report_piechart';

		$data['list_reservation'] = $this->model_get->reservation_login_report();
		$data['list_website'] = $this->model_get->website_report();
		$data['list_agent'] = $this->model_get->agent_report();
		$data['list_ota'] = $this->model_get->source_ota_report();
		$data['list_others'] = $this->model_get->source_others_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function bve() {
		$this->load->model('model_get');

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'reservation/report/report_bve';
		$data['filter'] = base_url().'reservation/filter/bve_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'reservation/balivillaescapes/report_reservation';

		$data['list_reservation'] = $this->model_get->reservation_login_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function bvo() {
		$this->load->model('model_get');

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillasonline/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'reservation/report/report_bvo';
		$data['filter'] = base_url().'reservation/filter/bvo_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'reservation/balivillasonline/report_reservation';

		$data['list_reservation'] = $this->model_get->reservation_login_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function team_target() {
		$this->load->model('model_get');

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balirealty/team_target';
		$data['footer'] = 'footer';
		$data['team_target_revenue'] = 'reservation/balirealty/team_target_revenue';
		$data['team_target_booking'] = 'reservation/balirealty/team_target_booking';

		$data['reset'] = base_url().'reservation/report/team_target';
		$data['filter'] = base_url().'reservation/filter/team_target';
		$data['filter_button'] = 'report_filter_button';
		
		$data['list_reservation'] = $this->model_get->reservation_login_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

}