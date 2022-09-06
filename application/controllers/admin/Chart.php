<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="admin") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function brhv() {

		$data['page_header'] = 'Charts';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoDaily'] = base_url().'assets/images/icon/dailychart.png';
		$data['logoMonthly'] = base_url().'assets/images/icon/monthlychart.png';
		$data['logoSources'] = base_url().'assets/images/icon/sourcechart.png';
		$data['logoVillaMonthly'] = base_url().'assets/images/icon/villachart.png';
		$data['logoVillaSources'] = base_url().'assets/images/icon/villasources.png';
		$data['logoGuestComparison'] = base_url().'assets/images/icon/guestcomparison.png';
		$data['logoCancelation'] = base_url().'assets/images/icon/cancelationreason.png';
		$data['logoReservationCancelation'] = base_url().'assets/images/icon/reservationcancelation.png';
		$data['logoReservation'] = base_url().'assets/images/icon/reservationchart.png';
		$data['logoCovid19'] = base_url().'assets/images/icon/covid19.png';


		$data['textDaily'] = "Daily Chart";
		$data['textMonthly'] = "Monthly Chart";
		$data['textSource'] = "Source Chart";
		$data['textAgent'] = "Agent Chart";
		$data['textVillaMonthly'] = "Villa Chart";
		$data['textVillaSource'] = "Villa Source";
		$data['textGuestComparison'] = "Guest Comparison";
		$data['textCancelation'] = "Cancelation Reason";
		$data['textReservationCancelation'] = "Reservation's Cancelation Reason";
		$data['textReservation'] = "Reservation Chart";
		$data['textCovid19'] = "Covid 19";

		$data['buttonDaily'] = base_url().'admin/chart/brhv_daily';
		$data['buttonMonthly'] = base_url().'admin/chart/brhv_monthly';
		$data['buttonVilla'] = base_url().'admin/chart/brhv_villa';
		$data['buttonVillaSources'] = base_url().'admin/chart/brhv_villa_sources';
		$data['buttonCancelation'] = base_url().'admin/chart/brhv_cancelation';
		$data['buttonReservationCancelation'] = base_url().'admin/chart/brhv_reservation_cancelation';
		$data['buttonSources'] = base_url().'admin/chart/brhv_sources';
		$data['buttonAgents'] = base_url().'admin/chart/brhv_agents';
		$data['buttonReservation'] = base_url().'admin/chart/brhv_reservation';
		$data['buttonGuestComparison'] = base_url().'admin/chart/brhv_guest_comparison';
		$data['buttonCovid19'] = base_url().'admin/chart/brhv_covid19';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart';
		$data['footer'] = 'footer';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function brhv_covid19() {
		$this->load->model('model_get');

		$data['page_header'] = 'Covid 19';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_covid19';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_covid19';

		$data['chart_covid19_reschedule'] = 'admin/balirealty/chart_covid19_reschedule';
		$data['chart_covid19_nonrefundable'] = 'admin/balirealty/chart_covid19_nonrefundable';
		$data['chart_covid19_refundable'] = 'admin/balirealty/chart_covid19_refundable';
		
		$data['reset'] = base_url().'admin/chart/brhv_covid19';
		$data['filter'] = base_url().'admin/filter/brhv_chart_covid19';

		$data['list_villa'] = $this->model_get->villa_report();

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_daily() {

		$data['page_header'] = 'Daily Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_daily';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balirealty/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balirealty/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balirealty/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balirealty/chart_daily_conversion';

		$data['reset'] = base_url().'admin/chart/brhv_daily';
		$data['filter'] = base_url().'admin/filter/brhv_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_monthly() {

		$data['page_header'] = 'Monthly Chart';
		
		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_monthly';
		$data['footer'] = 'footer';
		$data['chart_monthly_enquiry'] = 'admin/balirealty/chart_monthly_enquiry';
		$data['chart_monthly_booking'] = 'admin/balirealty/chart_monthly_booking';
		$data['chart_monthly_revenue'] = 'admin/balirealty/chart_monthly_revenue';
		$data['chart_monthly_conversion'] = 'admin/balirealty/chart_monthly_conversion';

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_villa() {
		$this->load->model('model_get');

		$data['page_header'] = 'Villa Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_villa';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_villa';
		$data['chart_villa_enquiry'] = 'admin/balirealty/chart_villa_enquiry';
		$data['chart_villa_booking'] = 'admin/balirealty/chart_villa_booking';
		$data['chart_villa_revenue'] = 'admin/balirealty/chart_villa_revenue';

		$data['reset'] = base_url().'admin/chart/brhv_villa';
		$data['filter'] = base_url().'admin/filter/brhv_chart_villa';

		$data['button_print_enquiry'] = base_url().'admin/export/pdf_chart_villa_enquiry';
        $data['button_print_booking'] = base_url().'admin/export/pdf_chart_villa_booking';
        $data['button_print_revenue'] = base_url().'admin/export/pdf_chart_villa_revenue';

		$data['list_villa'] = $this->model_get->villa_brhv();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_villa_sources() {
		$this->load->model('model_get');

		$data['page_header'] = 'Villa Sources';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_villa_sources';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_villa_sources';
		$data['chart_villa_sources_enquiry'] = 'admin/balirealty/chart_villa_sources_enquiry';
		$data['chart_villa_sources_booking'] = 'admin/balirealty/chart_villa_sources_booking';
		$data['chart_villa_sources_revenue'] = 'admin/balirealty/cchart_villa_sources_revenue';
		
		$data['reset'] = base_url().'admin/chart/brhv_villa_sources';
		$data['filter'] = base_url().'admin/filter/brhv_chart_villa_sources';

		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_ota'] = $this->model_get->source_ota_report();
		$data['list_others'] = $this->model_get->source_others_report();

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_cancelation() {
		$this->load->model('model_get');

		$data['page_header'] = 'Cancelation Reason';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_cancelation';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_cancelation';
		$data['table_brhv_cancelation'] = 'admin/balirealty/table_cancelation';
		$data['piechart_brhv_cancelation'] = 'admin/balirealty/piechart_cancelation';

		$data['reset'] = base_url().'admin/chart/brhv_cancelation';
		$data['filter'] = base_url().'admin/filter/brhv_chart_cancelation';

		$data['list_cancelation'] = $this->model_get->cancelation_report();
		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_reservation_cancelation(){
		$this->load->model('model_get');

		$data['page_header'] = 'Cancelation Reason <br /> per Reservation';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_reservation_cancelation';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_reservation_cancelation';
		$data['table_reservation_cancelation'] = 'admin/balirealty/table_reservation_cancelation';
		$data['piechart_reservation_cancelation'] = 'admin/balirealty/piechart_reservation_cancelation';

		$data['reset'] = base_url().'admin/chart/brhv_reservation_cancelation';
		$data['filter'] = base_url().'admin/filter/brhv_chart_reservation_cancelation';

		$data['list_cancelation'] = $this->model_get->cancelation_report();
		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function brhv_reservation() {
		$this->load->model('model_get');

		$data['page_header'] = 'Reservation Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_reservation';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balirealty/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balirealty/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balirealty/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balirealty/chart_reservation_conversion';

		$data['reset'] = base_url().'admin/chart/brhv_reservation';
		$data['filter'] = base_url().'admin/filter/brhv_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_guest_comparison() {
		$this->load->model('model_get');

		$data['page_header'] = 'Guest Comparison';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_guest_comparison';
		$data['footer'] = 'footer';

		$data['chart_guest_comparison_checkin'] = 'admin/balirealty/chart_guest_comparison_checkin';
		$data['chart_guest_comparison_confirm'] = 'admin/balirealty/chart_guest_comparison_confirm';

		$data['reset'] = base_url().'admin/chart/brhv_guest_comparison';
		$data['filter'] = base_url().'admin/filter/brhv_guest_comparison';
		$data['filter_button'] = 'comparison_filter_button';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_sources() {
		$this->load->model('model_get');

		$data['page_header'] = 'Sources Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_sources';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_sources';
		$data['chart_source_enquiry'] = 'admin/balirealty/chart_source_enquiry';
		$data['chart_source_booking'] = 'admin/balirealty/chart_source_booking';
		$data['chart_source_revenue'] = 'admin/balirealty/chart_source_revenue';

		$data['reset'] = base_url().'admin/chart/brhv_sources';
		$data['filter'] = base_url().'admin/filter/brhv_chart_sources';

		$data['list_ota'] = $this->model_get->source_ota();
		$data['list_others'] = $this->model_get->source_others();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function brhv_agents() {
		$this->load->model('model_get');

		$data['page_header'] = 'Agents Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_agents';
		$data['footer'] = 'footer';
		
		$data['filter_button'] = 'chart_filter_agent';
		$data['chart_agent_enquiry'] = 'admin/balirealty/chart_agent_enquiry';
		$data['chart_agent_booking'] = 'admin/balirealty/chart_agent_booking';
		$data['chart_agent_revenue'] = 'admin/balirealty/chart_agent_revenue';
		$data['chart_agent_conversion'] = 'admin/balirealty/chart_agent_conversion';

		$data['reset'] = base_url().'admin/chart/brhv_agents';
		$data['filter'] = base_url().'admin/filter/brhv_chart_agents';

		$data['list_agents'] = $this->model_get->source_agent();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve() {

		$data['page_header'] = 'Charts';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoDaily'] = base_url().'assets/images/icon/dailychart.png';
		$data['logoMonthly'] = base_url().'assets/images/icon/monthlychart.png';
		$data['logoReservation'] = base_url().'assets/images/icon/reservationchart.png';

		$data['textDaily'] = "Daily Chart";
		$data['textMonthly'] = "Monthly Chart";
		$data['textSource'] = "Source Chart";
		$data['textVillaMonthly'] = "Villa Chart";
		$data['textVillaSource'] = "Villa Source";
		$data['textGuestComparison'] = "Guest Comparison";
		$data['textCancelation'] = "Cancelation Reason";
		$data['textReservationCancelation'] = "Reservation's Cancelation Reason";
		$data['textReservation'] = "Reservation Chart";

		$data['buttonDaily'] = base_url().'admin/chart/bve_daily';
		$data['buttonMonthly'] = base_url().'admin/chart/bve_monthly';
		$data['buttonReservation'] = base_url().'admin/chart/bve_reservation';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillaescapes/chart';
		$data['footer'] = 'footer';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function bve_daily() {

		$data['page_header'] = 'Daily Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_daily';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillaescapes/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillaescapes/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillaescapes/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balivillaescapes/chart_daily_conversion';

		$data['reset'] = base_url().'admin/chart/bve_daily';
		$data['filter'] = base_url().'admin/filter/bve_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve_monthly() {

		$data['page_header'] = 'Monthly Chart';
		
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_monthly';
		$data['footer'] = 'footer';
		$data['chart_monthly_enquiry'] = 'admin/balivillaescapes/chart_monthly_enquiry';
		$data['chart_monthly_booking'] = 'admin/balivillaescapes/chart_monthly_booking';
		$data['chart_monthly_revenue'] = 'admin/balivillaescapes/chart_monthly_revenue';
		$data['chart_monthly_conversion'] = 'admin/balivillaescapes/chart_monthly_conversion';

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function bve_reservation() {
		$this->load->model('model_get');

		$data['page_header'] = 'Reservation Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_reservation';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillaescapes/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillaescapes/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillaescapes/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balivillaescapes/chart_reservation_conversion';

		$data['reset'] = base_url().'admin/chart/bve_reservation';
		$data['filter'] = base_url().'admin/filter/bve_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bvo() {

		$data['page_header'] = 'Charts';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';
		$data['logoDaily'] = base_url().'assets/images/icon/dailychart.png';
		$data['logoMonthly'] = base_url().'assets/images/icon/monthlychart.png';
		$data['logoReservation'] = base_url().'assets/images/icon/reservationchart.png';

		$data['buttonDaily'] = base_url().'admin/chart/bvo_daily';
		$data['buttonMonthly'] = base_url().'admin/chart/bvo_monthly';
		$data['buttonReservation'] = base_url().'admin/chart/bvo_reservation';

		$data['textDaily'] = "Daily Chart";
		$data['textMonthly'] = "Monthly Chart";
		$data['textSource'] = "Source Chart";
		$data['textVillaMonthly'] = "Villa Chart";
		$data['textVillaSource'] = "Villa Source";
		$data['textGuestComparison'] = "Guest Comparison";
		$data['textCancelation'] = "Cancelation Reason";
		$data['textReservationCancelation'] = "Reservation's Cancelation Reason";
		$data['textReservation'] = "Reservation Chart";

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/chart';
		$data['footer'] = 'footer';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function bvo_daily() {

		$data['page_header'] = 'Daily Chart';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/chart_daily';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillasonline/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillasonline/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillasonline/chart_daily_revenue';
		$data['chart_daily_conversion'] = 'admin/balivillasonline/chart_daily_conversion';

		$data['reset'] = base_url().'admin/chart/bvo_daily';
		$data['filter'] = base_url().'admin/filter/bvo_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bvo_monthly() {

		$data['page_header'] = 'Monthly Chart';
		
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/chart_monthly';
		$data['footer'] = 'footer';
		$data['chart_monthly_enquiry'] = 'admin/balivillasonline/chart_monthly_enquiry';
		$data['chart_monthly_booking'] = 'admin/balivillasonline/chart_monthly_booking';
		$data['chart_monthly_revenue'] = 'admin/balivillasonline/chart_monthly_revenue';
		$data['chart_monthly_conversion'] = 'admin/balivillasonline/chart_monthly_conversion';

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function bvo_reservation() {
		$this->load->model('model_get');

		$data['page_header'] = 'Reservation Chart';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/chart_reservation';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillasonline/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillasonline/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillasonline/chart_reservation_revenue';
		$data['chart_reservation_conversion'] = 'admin/balivillasonline/chart_reservation_conversion';

		$data['reset'] = base_url().'admin/chart/bvo_reservation';
		$data['filter'] = base_url().'admin/filter/bvo_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function summary() {
		$this->load->model('model_get');

		$data['page_header'] = 'Summary Chart';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/chart_summary';
		$data['footer'] = 'footer';
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_summary_enquiry'] = 'admin/balirealty/chart_summary_enquiry';
		$data['chart_summary_booking'] = 'admin/balirealty/chart_summary_booking';
		$data['chart_summary_revenue'] = 'admin/balirealty/chart_summary_revenue';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

}