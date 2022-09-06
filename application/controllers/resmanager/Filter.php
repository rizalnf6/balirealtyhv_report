<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="resmanager") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For Enquiry Page
	public function enquiry_brhv() {
		$this->load->model('model_filter_brhv');
		$this->load->model('model_get');

		$data['page_header'] = 'Enquiry';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['halaman'] = "";

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_brhv_enquiry';
		$data['filter'] = base_url().'resmanager/filter/enquiry_brhv';
		$data['reset'] = base_url().'resmanager/brhv_enquiry/enquiry';
		$data['button_detail'] = base_url().'resmanager/brhv_enquiry/details';
		$data['button_edit'] = base_url().'resmanager/brhv_enquiry/edit';
		$data['button_propose'] = base_url().'resmanager/brhv_propose_extend/propose';
		$data['button_delete'] = base_url().'resmanager/brhv_enquiry/delete';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_enquiry'] = $this->model_get->status_filter_enquiry();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_enquiry'] = $this->model_filter_brhv->filter_admin_enquiry();
		
		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//For Enquiry Page
	public function enquiry_bve($report_id=NULL) {
		$this->load->model('model_filter_bve');
		$this->load->model('model_get');

		$data['page_header'] = 'Enquiry';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['halaman'] = "";

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_bve_enquiry';
		$data['filter'] = base_url().'resmanager/filter/enquiry_bve';
		$data['reset'] = base_url().'resmanager/bve_enquiry/enquiry';
		$data['button_detail'] = base_url().'resmanager/bve_enquiry/details';
		$data['button_edit'] = base_url().'resmanager/bve_enquiry/edit';
		$data['button_propose'] = base_url().'resmanager/bve_enquiry/propose';
		$data['button_delete'] = base_url().'resmanager/bve_enquiry/delete';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_enquiry'] = $this->model_get->status_filter_enquiry();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_enquiry'] = $this->model_filter_bve->filter_admin_enquiry();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//For Enquiry Page
	public function enquiry_bvo($report_id=NULL) {
		$this->load->model('model_filter_bvo');
		$this->load->model('model_get');

		$data['page_header'] = 'Enquiry';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';
		$data['halaman'] = "";

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillasonline/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_bvo_enquiry';
		$data['filter'] = base_url().'resmanager/filter/enquiry_bvo';
		$data['reset'] = base_url().'resmanager/bvo_enquiry/enquiry';
		$data['button_detail'] = base_url().'resmanager/bvo_enquiry/details';
		$data['button_edit'] = base_url().'resmanager/bvo_enquiry/edit';
		$data['button_propose'] = base_url().'resmanager/bvo_enquiry/propose';
		$data['button_delete'] = base_url().'resmanager/bvo_enquiry/delete';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_enquiry'] = $this->model_get->status_filter_enquiry();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_enquiry'] = $this->model_filter_bvo->filter_admin_enquiry();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//For Confirm page
	public function confirm_brhv($report_id=NULL) {
		$this->load->model('model_filter_brhv');
		$this->load->model('model_get');

		$data['page_header'] = 'Confirm';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['halaman'] = "";

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_brhv_confirm';
		$data['filter'] = base_url().'resmanager/filter/confirm_brhv';
		$data['reset'] = base_url().'resmanager/brhv_confirm/confirm';
		$data['button_detail'] = base_url().'resmanager/brhv_confirm/details';
		$data['button_edit'] = base_url().'resmanager/brhv_confirm/edit';
		$data['button_extend'] = base_url().'resmanager/brhv_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'resmanager/brhv_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'resmanager/brhv_confirm/delete';
		$data['button_print'] = base_url().'resmanager/export/pdf_brhv_report';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_confirm'] = $this->model_get->status_filter_confirm();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_confirm'] = $this->model_filter_brhv->filter_admin_confirm();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//For Confirm page
	public function confirm_bve($report_id=NULL) {
		$this->load->model('model_filter_bve');
		$this->load->model('model_get');

		$data['page_header'] = 'Confirm';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['halaman'] = "";

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_bve_confirm';
		$data['filter'] = base_url().'resmanager/filter/confirm_bve';
		$data['reset'] = base_url().'resmanager/bve_confirm/confirm';
		$data['button_detail'] = base_url().'resmanager/bve_confirm/details';
		$data['button_edit'] = base_url().'resmanager/bve_confirm/edit';
		$data['button_extend'] = base_url().'resmanager/bve_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'resmanager/bve_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'resmanager/bve_confirm/delete';
		$data['button_print'] = base_url().'resmanager/export/pdf_brhv_report';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_confirm'] = $this->model_get->status_filter_confirm();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_confirm'] = $this->model_filter_bve->filter_admin_confirm();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//For Confirm page
	public function confirm_bvo($report_id=NULL) {
		$this->load->model('model_filter_bvo');
		$this->load->model('model_get');

		$data['page_header'] = 'Confirm';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';
		$data['halaman'] = "";

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillasonline/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_bvo_confirm';
		$data['filter'] = base_url().'resmanager/filter/confirm_bvo';
		$data['reset'] = base_url().'resmanager/bvo_confirm/confirm';
		$data['button_detail'] = base_url().'resmanager/bvo_confirm/details';
		$data['button_edit'] = base_url().'resmanager/bvo_confirm/edit';
		$data['button_extend'] = base_url().'resmanager/bvo_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'resmanager/bvo_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'resmanager/bvo_confirm/delete';
		$data['button_print'] = base_url().'resmanager/export/pdf_brhv_report';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_confirm'] = $this->model_get->status_filter_confirm();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_confirm'] = $this->model_filter_bvo->filter_admin_confirm();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function brhv_report(){
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');
		
		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/report';
		$data['footer'] = 'footer';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		
		$data['reset'] = base_url().'resmanager/report/brhv';
		$data['filter'] = base_url().'resmanager/filter/brhv_report';
		$data['filter_button'] = 'report_filter_button';
		$data['report_reservation'] = 'admin/balirealty/report_reservation';
		$data['report_source'] = 'admin/balirealty/report_source';
		$data['report_website'] = 'admin/balirealty/report_website';
		$data['report_agent'] = 'admin/balirealty/report_agent';
		$data['report_piechart'] = 'admin/balirealty/report_piechart';

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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'resmanager/report/report_bve';
		$data['filter'] = base_url().'resmanager/filter/bve_report';
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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillasonline/report';
		$data['footer'] = 'footer';

		$data['reset'] = base_url().'resmanager/report/report_bvo';
		$data['filter'] = base_url().'resmanager/filter/bvo_report';
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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/team_target';
		$data['footer'] = 'footer';

		$data['team_target_revenue'] = 'admin/balirealty/team_target_revenue';
		$data['team_target_booking'] = 'admin/balirealty/team_target_booking';

		$data['reset'] = base_url().'resmanager/report/team_target';
		$data['filter'] = base_url().'resmanager/filter/team_target';
		$data['filter_button'] = 'report_filter_button';
		
		$data['list_reservation'] = $this->model_get->reservation_report();
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function brhv_chart_daily(){
		$data['month'] = $this->input->get('month');
		
		$data['page_header'] = 'Daily Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balirealty/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balirealty/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balirealty/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balirealty/chart_daily_conversion';

		$data['reset'] = base_url().'resmanager/chart/brhv_daily';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_daily';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function brhv_chart_villa(){
		$this->load->model('model_get');

		$data['villa'] = $this->input->get('villa');

		$data['page_header'] = 'Villa Chart';
		
		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_villa';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_villa';
		$data['chart_villa_enquiry'] = 'admin/balirealty/chart_villa_enquiry';
		$data['chart_villa_booking'] = 'admin/balirealty/chart_villa_booking';
		$data['chart_villa_revenue'] = 'admin/balirealty/chart_villa_revenue';

		$data['reset'] = base_url().'resmanager/chart/brhv_villa';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_villa';

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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_villa_sources';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_villa_sources';
		$data['chart_villa_sources_enquiry'] = 'admin/balirealty/chart_villa_sources_enquiry';
		$data['chart_villa_sources_booking'] = 'admin/balirealty/chart_villa_sources_booking';
		$data['chart_villa_sources_revenue'] = 'admin/balirealty/chart_villa_sources_revenue';
		
		$data['reset'] = base_url().'resmanager/chart/brhv_villa_sources';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_villa_sources';

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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_cancelation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_cancelation';
		$data['table_brhv_cancelation'] = 'admin/balirealty/table_cancelation';
		$data['piechart_brhv_cancelation'] = 'admin/balirealty/piechart_cancelation';

		$data['reset'] = base_url().'resmanager/chart/brhv_cancelation';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_cancelation';

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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_reservation_cancelation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_reservation_cancelation';
		$data['table_reservation_cancelation'] = 'admin/balirealty/table_reservation_cancelation';
		$data['piechart_reservation_cancelation'] = 'admin/balirealty/piechart_reservation_cancelation';

		$data['reset'] = base_url().'resmanager/chart/brhv_reservation_cancelation';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_reservation_cancelation';

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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_reservation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balirealty/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balirealty/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balirealty/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balirealty/chart_reservation_conversion';

		$data['reset'] = base_url().'resmanager/chart/brhv_reservation';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_chart_sources() {
		$this->load->model('model_get');

		$data['source'] = $this->input->get('source');

		$data['page_header'] = 'Sources Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_sources';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_sources';
		$data['chart_source_enquiry'] = 'admin/balirealty/chart_source_enquiry';
		$data['chart_source_booking'] = 'admin/balirealty/chart_source_booking';
		$data['chart_source_revenue'] = 'admin/balirealty/chart_source_revenue';

		$data['reset'] = base_url().'resmanager/chart/brhv_sources';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_sources';

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

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balirealty/chart_agents';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_agent';
		$data['chart_agent_enquiry'] = 'admin/balirealty/chart_agent_enquiry';
		$data['chart_agent_booking'] = 'admin/balirealty/chart_agent_booking';
		$data['chart_agent_revenue'] = 'admin/balirealty/chart_agent_revenue';
		$data['chart_agent_conversion'] = 'admin/balirealty/chart_agent_conversion';

		$data['reset'] = base_url().'resmanager/chart/brhv_agents';
		$data['filter'] = base_url().'resmanager/filter/brhv_chart_agents';

		$data['list_agents'] = $this->model_get->source_agent();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve_chart_daily() {
		
		$data['month'] = $this->input->get('month');

		$data['page_header'] = 'Daily Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillaescapes/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillaescapes/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillaescapes/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balivillaescapes/chart_daily_conversion';

		$data['reset'] = base_url().'resmanager/chart/bve_daily';
		$data['filter'] = base_url().'resmanager/filter/bve_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve_chart_reservation() {
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');

		$data['page_header'] = 'Reservation Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_reservation';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillaescapes/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillaescapes/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillaescapes/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balivillaescapes/chart_reservation_conversion';

		$data['reset'] = base_url().'resmanager/chart/bve_reservation';
		$data['filter'] = base_url().'resmanager/filter/bve_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bvo_chart_daily() {

		$data['month'] = $this->input->get('month');

		$data['page_header'] = 'Daily Chart';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillasonline/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillasonline/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillasonline/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillasonline/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balivillasonline/chart_daily_conversion';

		$data['reset'] = base_url().'resmanager/chart/bvo_daily';
		$data['filter'] = base_url().'resmanager/filter/bvo_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bvo_chart_reservation() {
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');

		$data['page_header'] = 'Reservation Chart';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillasonline/chart_reservation';
		$data['footer'] = 'footer';
		
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillasonline/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillasonline/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillasonline/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balivillasonline/chart_reservation_conversion';

		$data['reset'] = base_url().'resmanager/chart/bvo_reservation';
		$data['filter'] = base_url().'resmanager/filter/bvo_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

}