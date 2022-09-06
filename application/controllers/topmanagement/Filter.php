<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="topmanagement") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function brhv_report(){
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');
		
		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/report';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'admin/balirealty/report_reservation';
		$data['report_source'] = 'admin/balirealty/report_source';
		$data['report_website'] = 'admin/balirealty/report_website';
		$data['report_agent'] = 'admin/balirealty/report_agent';
		$data['report_piechart'] = 'admin/balirealty/report_piechart';

		$data['reset'] = base_url().'topmanagement/report/brhv';
		$data['filter'] = base_url().'topmanagement/filter/brhv_report';

		$data['list_reservation'] = $this->model_get->reservation_report();
		$data['list_website'] = $this->model_get->website_report();
		$data['list_agent'] = $this->model_get->agent_report();
		$data['list_ota'] = $this->model_get->source_ota_report();
		$data['list_others'] = $this->model_get->source_others_report();
		
		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function bve_report() {
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balivillaescapes/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'topmanagement/report/report_bve';
		$data['filter'] = base_url().'topmanagement/filter/bve_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'admin/balivillaescapes/report_reservation';

		$data['list_reservation'] = $this->model_get->reservation_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function bvo_report() {
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balivillasonline/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'topmanagement/report/report_bvo';
		$data['filter'] = base_url().'topmanagement/filter/bvo_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'admin/balivillasonline/report_reservation';

		$data['list_reservation'] = $this->model_get->reservation_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function team_target() {
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/team_target';
		$data['footer'] = 'footer';

		$data['team_target_revenue'] = 'admin/balirealty/team_target_revenue';
		$data['team_target_booking'] = 'admin/balirealty/team_target_booking';

		$data['reset'] = base_url().'topmanagement/report/team_target';
		$data['filter'] = base_url().'topmanagement/filter/team_target';
		$data['filter_button'] = 'report_filter_button';
		
		$data['list_reservation'] = $this->model_get->reservation_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function brhv_chart_daily(){
		$data['month'] = $this->input->get('month');
		
		$data['page_header'] = 'Daily Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balirealty/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balirealty/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balirealty/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balirealty/chart_daily_conversion';

		$data['reset'] = base_url().'topmanagement/chart/brhv_daily';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_daily';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function brhv_chart_covid19() {
		$this->load->model('model_get');

		$data['year'] = $this->input->get('year');

		$data['page_header'] = 'Covid 19';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_covid19';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_covid19';

		$data['chart_covid19_reschedule'] = 'admin/balirealty/chart_covid19_reschedule';
		$data['chart_covid19_nonrefundable'] = 'admin/balirealty/chart_covid19_nonrefundable';
		$data['chart_covid19_refundable'] = 'admin/balirealty/chart_covid19_refundable';
		
		$data['reset'] = base_url().'topmanagement/chart/brhv_covid19';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_covid19';

		$data['list_villa'] = $this->model_get->villa_report();

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_villa(){
		$this->load->model('model_get');

		$data['villa'] = $this->input->get('villa');

		$data['page_header'] = 'Villa Chart';
		
		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_villa';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_villa';
		$data['chart_villa_enquiry'] = 'admin/balirealty/chart_villa_enquiry';
		$data['chart_villa_booking'] = 'admin/balirealty/chart_villa_booking';
		$data['chart_villa_revenue'] = 'admin/balirealty/chart_villa_revenue';

		$data['reset'] = base_url().'topmanagement/chart/brhv_villa';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_villa';
		$data['button_print_enquiry'] = base_url().'admin/export/pdf_chart_villa_enquiry';
        $data['button_print_booking'] = base_url().'admin/export/pdf_chart_villa_booking';
        $data['button_print_revenue'] = base_url().'admin/export/pdf_chart_villa_revenue';

		$data['list_villa'] = $this->model_get->villa_brhv();

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function brhv_chart_villa_sources() {
		$this->load->model('model_get');

		$data['villa'] = $this->input->get('villa');
		$data['year'] = $this->input->get('year');

		$data['page_header'] = 'Villa Sources';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_villa_sources';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_villa_sources';
		$data['chart_villa_sources_enquiry'] = 'admin/balirealty/chart_villa_sources_enquiry';
		$data['chart_villa_sources_booking'] = 'admin/balirealty/chart_villa_sources_booking';
		$data['chart_villa_sources_revenue'] = 'admin/balirealty/chart_villa_sources_revenue';
		
		$data['reset'] = base_url().'topmanagement/chart/brhv_villa_sources';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_villa_sources';

		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_ota'] = $this->model_get->source_ota_report();
		$data['list_others'] = $this->model_get->source_others_report();

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_cancelation() {
		$this->load->model('model_get');

		$data['year'] = $this->input->get('year');

		$data['page_header'] = 'Cancelation Reason';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_cancelation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_cancelation';
		$data['table_brhv_cancelation'] = 'admin/balirealty/table_cancelation';
		$data['piechart_brhv_cancelation'] = 'admin/balirealty/piechart_cancelation';

		$data['reset'] = base_url().'topmanagement/chart/brhv_cancelation';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_cancelation';

		$data['list_cancelation'] = $this->model_get->cancelation_report();
		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_reservation_cancelation(){
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');
		$data['year'] = $this->input->get('year');

		$data['page_header'] = 'Cancelation Reason <br /> per Reservation';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_reservation_cancelation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_reservation_cancelation';
		$data['table_reservation_cancelation'] = 'admin/balirealty/table_reservation_cancelation';
		$data['piechart_reservation_cancelation'] = 'admin/balirealty/piechart_reservation_cancelation';

		$data['reset'] = base_url().'topmanagement/chart/brhv_reservation_cancelation';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_reservation_cancelation';

		$data['list_cancelation'] = $this->model_get->cancelation_report();
		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_reservation() {
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');

		$data['page_header'] = 'Reservation Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_reservation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balirealty/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balirealty/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balirealty/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balirealty/chart_reservation_conversion';

		$data['reset'] = base_url().'topmanagement/chart/brhv_reservation';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_sources() {
		$this->load->model('model_get');

		$data['source'] = $this->input->get('source');

		$data['page_header'] = 'Sources Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_sources';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_sources';
		$data['chart_source_enquiry'] = 'admin/balirealty/chart_source_enquiry';
		$data['chart_source_booking'] = 'admin/balirealty/chart_source_booking';
		$data['chart_source_revenue'] = 'admin/balirealty/chart_source_revenue';

		$data['reset'] = base_url().'topmanagement/chart/brhv_sources';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_sources';

		$data['list_ota'] = $this->model_get->source_ota();
		$data['list_others'] = $this->model_get->source_others();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_agents() {
		$this->load->model('model_get');

		$data['source'] = $this->input->get('source');

		$data['page_header'] = 'Agents Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_agents';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_agent';
		$data['chart_agent_enquiry'] = 'admin/balirealty/chart_agent_enquiry';
		$data['chart_agent_booking'] = 'admin/balirealty/chart_agent_booking';
		$data['chart_agent_revenue'] = 'admin/balirealty/chart_agent_revenue';
		$data['chart_agent_conversion'] = 'admin/balirealty/chart_agent_conversion';

		$data['reset'] = base_url().'topmanagement/chart/brhv_agents';
		$data['filter'] = base_url().'topmanagement/filter/brhv_chart_agents';

		$data['list_agents'] = $this->model_get->source_agent();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_guest_comparison() {
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');

		$data['page_header'] = 'Guest Comparison';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balirealty/chart_guest_comparison';
		$data['footer'] = 'footer';

		$data['chart_guest_comparison_checkin'] = 'admin/balirealty/chart_guest_comparison_checkin';
		$data['chart_guest_comparison_confirm'] = 'admin/balirealty/chart_guest_comparison_confirm';

		$data['reset'] = base_url().'topmanagement/chart/brhv_guest_comparison';
		$data['filter'] = base_url().'topmanagement/filter/brhv_guest_comparison';
		$data['filter_button'] = 'comparison_filter_button';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve_chart_daily() {
		
		$data['month'] = $this->input->get('month');

		$data['page_header'] = 'Daily Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillaescapes/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillaescapes/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillaescapes/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balivillaescapes/chart_daily_conversion';

		$data['reset'] = base_url().'topmanagement/chart/bve_daily';
		$data['filter'] = base_url().'topmanagement/filter/bve_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve_chart_reservation() {
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');

		$data['page_header'] = 'Reservation Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_reservation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillaescapes/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillaescapes/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillaescapes/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balivillaescapes/chart_reservation_conversion';

		$data['reset'] = base_url().'topmanagement/chart/bve_reservation';
		$data['filter'] = base_url().'topmanagement/filter/bve_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bvo_chart_daily() {

		$data['month'] = $this->input->get('month');

		$data['page_header'] = 'Daily Chart';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balivillasonline/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillasonline/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillasonline/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillasonline/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balivillasonline/chart_daily_conversion';

		$data['reset'] = base_url().'topmanagement/chart/bvo_daily';
		$data['filter'] = base_url().'topmanagement/filter/bvo_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bvo_chart_reservation() {
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');

		$data['page_header'] = 'Reservation Chart';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'topmanagement/header';
		$data['main_content'] = 'admin/balivillasonline/chart_reservation';
		$data['footer'] = 'footer';
		
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillasonline/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillasonline/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillasonline/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balivillasonline/chart_reservation_conversion';

		$data['reset'] = base_url().'topmanagement/chart/bvo_reservation';
		$data['filter'] = base_url().'topmanagement/filter/bvo_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

}