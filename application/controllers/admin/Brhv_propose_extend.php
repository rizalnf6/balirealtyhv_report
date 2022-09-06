<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brhv_propose_extend extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="admin") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//Propose
	public function propose($report_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$propose_enquiry = $this->model_insert_brhv->propose($_POST);
			if ($propose_enquiry) {
				$this->session->set_flashdata('add_success', 'Enquiry proposed successfully');	
			}
			redirect("admin/brhv_confirm/confirm");
		}

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['page_header'] = 'Propose Villa';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_propose';
		$data['footer'] = 'footer';
		
		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_brhv->get_default($report_id);
		
		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view', $data);
	}

	public function edit_propose($report_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->edit_propose($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("admin/brhv_confirm/confirm");
		}

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['page_header'] = 'Form Edit Propose';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_propose';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_propose_extend();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_brhv->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	// ========================================================================================

	//Extend
	public function extend($report_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_insert_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$extend_enquiry = $this->model_insert_brhv->extend($_POST);
			if ($extend_enquiry) {
				$this->session->set_flashdata('add_success', 'Enquiry extended successfully');	
			}
			redirect("admin/brhv_confirm/confirm");
		}

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['page_header'] = 'Extend Stay';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_extend';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_brhv->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view', $data);
	}

	public function edit_extend($report_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->edit_extend($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("admin/brhv_confirm/confirm");
		}

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['page_header'] = 'Form Edit Extend Stay';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balirealty/form_extend';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_propose_extend();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_brhv->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

}