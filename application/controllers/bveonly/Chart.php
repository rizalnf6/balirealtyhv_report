<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="bveonly") {
			redirect('auth');
		}
		
		$this->load->helper('text');
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

		$data['buttonDaily'] = base_url().'bveonly/chart/bve_daily';
		$data['buttonMonthly'] = base_url().'bveonly/chart/bve_monthly';
		$data['buttonReservation'] = base_url().'bveonly/chart/bve_reservation';

		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'admin/balivillaescapes/chart';
		$data['footer'] = 'footer';

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function bve_daily() {

		$data['page_header'] = 'Daily Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_daily';
		$data['footer'] = 'footer';

		$data['filter_button'] = 'chart_filter_button';
		$data['chart_daily_enquiry'] = 'admin/balivillaescapes/chart_daily_enquiry';
		$data['chart_daily_booking'] = 'admin/balivillaescapes/chart_daily_booking';
		$data['chart_daily_revenue'] = 'admin/balivillaescapes/chart_daily_revenue';

		$data['reset'] = base_url().'bveonly/chart/bve_daily';
		$data['filter'] = base_url().'bveonly/filter/bve_chart_daily';

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function bve_monthly() {

		$data['page_header'] = 'Monthly Chart';
		
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_monthly';
		$data['footer'] = 'footer';

		$data['chart_monthly_enquiry'] = 'admin/balivillaescapes/chart_monthly_enquiry';
		$data['chart_monthly_booking'] = 'admin/balivillaescapes/chart_monthly_booking';
		$data['chart_monthly_revenue'] = 'admin/balivillaescapes/chart_monthly_revenue';

		$data['session_login'] = $this->session->userdata('name');
		$this->load->view('template_view', $data);
	}

	public function bve_reservation() {
		$this->load->model('model_get');

		$data['page_header'] = 'Reservation Chart';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'admin/balivillaescapes/chart_reservation';
		$data['footer'] = 'footer';
		
		$data['filter_button'] = 'chart_filter_reservation';
		$data['chart_reservation_enquiry'] = 'admin/balivillaescapes/chart_reservation_enquiry';
		$data['chart_reservation_booking'] = 'admin/balivillaescapes/chart_reservation_booking';
		$data['chart_reservation_revenue'] = 'admin/balivillaescapes/chart_reservation_revenue';

		$data['reset'] = base_url().'bveonly/chart/bve_reservation';
		$data['filter'] = base_url().'bveonly/filter/bve_chart_reservation';

		$data['list_reservation'] = $this->model_get->reservation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

}