<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="receptionist") {
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

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balirealty/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'receptionist/export/excel_brhv_enquiry';
		$data['filter'] = base_url().'receptionist/filter/enquiry_brhv';
		$data['reset'] = base_url().'receptionist/brhv_enquiry/enquiry';
		$data['button_detail'] = base_url().'receptionist/brhv_enquiry/details';
		$data['button_edit'] = base_url().'receptionist/brhv_enquiry/edit';
		$data['button_propose'] = base_url().'receptionist/brhv_propose_extend/propose';
		$data['button_delete'] = base_url().'receptionist/brhv_enquiry/delete';

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

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balivillaescapes/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'receptionist/export/excel_bve_enquiry';
		$data['filter'] = base_url().'receptionist/filter/enquiry_bve';
		$data['reset'] = base_url().'receptionist/bve_enquiry/enquiry';
		$data['button_detail'] = base_url().'receptionist/bve_enquiry/details';
		$data['button_edit'] = base_url().'receptionist/bve_enquiry/edit';
		$data['button_propose'] = base_url().'receptionist/bve_enquiry/propose';
		$data['button_delete'] = base_url().'receptionist/bve_enquiry/delete';

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

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balivillasonline/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'receptionist/export/excel_bvo_enquiry';
		$data['filter'] = base_url().'receptionist/filter/enquiry_bvo';
		$data['reset'] = base_url().'receptionist/bvo_enquiry/enquiry';
		$data['button_detail'] = base_url().'receptionist/bvo_enquiry/details';
		$data['button_edit'] = base_url().'receptionist/bvo_enquiry/edit';
		$data['button_propose'] = base_url().'receptionist/bvo_enquiry/propose';
		$data['button_delete'] = base_url().'receptionist/bvo_enquiry/delete';

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

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balirealty/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'receptionist/export/excel_brhv_confirm';
		$data['filter'] = base_url().'receptionist/filter/confirm_brhv';
		$data['reset'] = base_url().'receptionist/brhv_confirm/confirm';
		$data['button_detail'] = base_url().'receptionist/brhv_confirm/details';
		$data['button_edit'] = base_url().'receptionist/brhv_confirm/edit';
		$data['button_extend'] = base_url().'receptionist/brhv_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'receptionist/brhv_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'receptionist/brhv_confirm/delete';
		$data['button_print'] = base_url().'receptionist/export/pdf_brhv_report';

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

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balivillaescapes/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'receptionist/export/excel_bve_confirm';
		$data['filter'] = base_url().'receptionist/filter/confirm_bve';
		$data['reset'] = base_url().'receptionist/bve_confirm/confirm';
		$data['button_detail'] = base_url().'receptionist/bve_confirm/details';
		$data['button_edit'] = base_url().'receptionist/bve_confirm/edit';
		$data['button_extend'] = base_url().'receptionist/bve_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'receptionist/bve_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'receptionist/bve_confirm/delete';
		$data['button_print'] = base_url().'receptionist/export/pdf_brhv_report';

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

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balivillasonline/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'receptionist/export/excel_bvo_confirm';
		$data['filter'] = base_url().'receptionist/filter/confirm_bvo';
		$data['reset'] = base_url().'receptionist/bvo_confirm/confirm';
		$data['button_detail'] = base_url().'receptionist/bvo_confirm/details';
		$data['button_edit'] = base_url().'receptionist/bvo_confirm/edit';
		$data['button_extend'] = base_url().'receptionist/bvo_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'receptionist/bvo_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'receptionist/bvo_confirm/delete';
		$data['button_print'] = base_url().'receptionist/export/pdf_brhv_report';

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
	
}