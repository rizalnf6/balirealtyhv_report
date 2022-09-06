<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="bveonly") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For Confirm page
	public function confirm_bve($report_id=NULL) {
		$this->load->model('model_filter_bve');
		$this->load->model('model_get');

		$data['page_header'] = 'Confirm';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';
		$data['halaman'] = "";

		$data['header'] = 'bveonly/header';
		$data['main_content'] = 'admin/balivillaescapes/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'bveonly/export/excel_bve_confirm';
		$data['filter'] = base_url().'bveonly/filter/confirm_bve';
		$data['reset'] = base_url().'bveonly/bve_confirm/confirm';
		$data['button_detail'] = base_url().'bveonly/bve_confirm/details';
		$data['button_edit'] = base_url().'bveonly/bve_confirm/edit';
		$data['button_extend'] = base_url().'bveonly/bve_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'bveonly/bve_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'bveonly/bve_confirm/delete';
		$data['button_print'] = base_url().'bveonly/export/pdf_brhv_report';

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

	public function bve_report() {
		$this->load->model('model_get');

		$data['enquiry_start'] = $this->input->get('enquiry_start');
		$data['enquiry_end'] = $this->input->get('enquiry_end');

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

	public function bve_chart_daily() {
		
		$data['month'] = $this->input->get('month');

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

	public function bve_chart_reservation() {
		$this->load->model('model_get');

		$data['reservation'] = $this->input->get('reservation');

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