<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!=="reservation") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	public function brhv() {
		$this->load->model('model_get');
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Reminder';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';
		
		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balirealty/reminder';
		$data['footer'] = 'footer';

		$data['reminder_enquiry_status'] = 'admin/balirealty/reminder_enquiry_status';
		$data['reminder_guest_arrival'] = 'admin/balirealty/reminder_guest_arrival';
		$data['reminder_revenue'] = 'admin/balirealty/reminder_revenue';
		$data['reminder_cancelation'] = 'admin/balirealty/reminder_cancelation';

		$data['button_detail_enquiry'] = base_url().'reservation/brhv_enquiry/details';
		$data['button_detail_confirm'] = base_url().'reservation/brhv_confirm/details';
		$data['button_edit_enquiry'] = base_url().'reservation/brhv_enquiry/edit';
		$data['button_edit_confirm'] = base_url().'reservation/brhv_confirm/edit';
		$data['button_edit_extend'] = base_url().'reservation/brhv_propose_extend/edit_extend';
		$data['button_edit_propose'] = base_url().'reservation/brhv_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'reservation/brhv_confirm/delete';

		$data['list_reservation'] = $this->model_get->reservation_login_report();
		$data['list_reminder_guest_arrival'] = $this->model_select_brhv->reservation_reminder_guest_arrival();
		$data['list_reminder_revenue'] = $this->model_select_brhv->reservation_reminder_revenue();
		$data['list_reminder_cancelation'] = $this->model_select_brhv->reservation_reminder_cancelation();

		$data['session_login'] = $this->session->userdata('name');
	
		$this->load->view('template_view',$data);
	}

	public function bve() {
		$this->load->model('model_get');
		$this->load->model('model_select_bve');

		$data['page_header'] = 'Reminder';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/reminder';
		$data['footer'] = 'footer';
		
		$data['reminder_enquiry_status'] = 'admin/balivillaescapes/reminder_enquiry_status';
		$data['reminder_guest_arrival'] = 'admin/balivillaescapes/reminder_guest_arrival';
		$data['reminder_revenue'] = 'admin/balivillaescapes/reminder_revenue';
		$data['reminder_cancelation'] = 'admin/balivillaescapes/reminder_cancelation';

		$data['button_detail_enquiry'] = base_url().'reservation/bve_enquiry/details';
		$data['button_detail_confirm'] = base_url().'reservation/bve_confirm/details';
		$data['button_edit_enquiry'] = base_url().'reservation/bve_enquiry/edit';
		$data['button_edit_confirm'] = base_url().'reservation/bve_confirm/edit';
		$data['button_edit_extend'] = base_url().'reservation/bve_propose_extend/edit_extend';
		$data['button_edit_propose'] = base_url().'reservation/bve_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'reservation/bve_confirm/delete';

		$data['list_reservation'] = $this->model_get->reservation_login_report();
		$data['list_reminder_guest_arrival'] = $this->model_select_bve->reservation_reminder_guest_arrival();
		$data['list_reminder_revenue'] = $this->model_select_bve->reservation_reminder_revenue();
		$data['list_reminder_cancelation'] = $this->model_select_bve->reservation_reminder_cancelation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function bvo() {
		$this->load->model('model_get');
		$this->load->model('model_select_bvo');

		$data['page_header'] = 'Reminder';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillasonline/reminder';
		$data['footer'] = 'footer';
		$data['reminder_enquiry_status'] = 'admin/balivillasonline/reminder_enquiry_status';
		$data['reminder_guest_arrival'] = 'admin/balivillasonline/reminder_guest_arrival';
		$data['reminder_revenue'] = 'admin/balivillasonline/reminder_revenue';
		$data['reminder_cancelation'] = 'admin/balivillasonline/reminder_cancelation';

		$data['button_detail_enquiry'] = base_url().'reservation/bvo_enquiry/details';
		$data['button_detail_confirm'] = base_url().'reservation/bvo_confirm/details';
		$data['button_edit_enquiry'] = base_url().'reservation/bve_enquiry/edit';
		$data['button_edit_confirm'] = base_url().'reservation/bvo_confirm/edit';
		$data['button_edit_extend'] = base_url().'reservation/bvo_propose_extend/edit_extend';
		$data['button_edit_propose'] = base_url().'reservation/bvo_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'reservation/bvo_confirm/delete';

		$data['list_reservation'] = $this->model_get->reservation_login_report();
		$data['list_reminder_guest_arrival'] = $this->model_select_bvo->reservation_reminder_guest_arrival();
		$data['list_reminder_revenue'] = $this->model_select_bvo->reservation_reminder_revenue();
		$data['list_reminder_cancelation'] = $this->model_select_bvo->reservation_reminder_cancelation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

}