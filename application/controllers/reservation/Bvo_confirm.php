<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bvo_confirm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="reservation") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For Confirm page
	public function confirm($report_id=NULL) {
		$this->load->model('model_select_bvo');
		$this->load->model('model_get');

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed' 
						OR status_enquiry.status_enquiry='Extend Stay')");
		$this->db->where('balivillasonline_status', '1');
		$this->db->ORDER_BY('balivillasonline.balivillasonline_last_modified', 'DESC');
		$jml = $this->db->get('balivillasonline');

		//pengaturan pagination
		$config['base_url'] = base_url().'reservation/bvo_confirm/confirm';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '100';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';

		//inisialisasi config
 		$this->pagination->initialize($config);

 		//buat pagination
		$data['halaman'] = $this->pagination->create_links();

		$data['page_header'] = 'Confirm';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillasonline/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'reservation/export/excel_bvo_confirm';
		$data['filter'] = base_url().'reservation/filter/confirm_bvo';
		$data['reset'] = base_url().'reservation/bvo_confirm/confirm';
		$data['button_detail'] = base_url().'reservation/bvo_confirm/details';
		$data['button_edit'] = base_url().'reservation/bvo_confirm/edit';
		$data['button_extend'] = base_url().'reservation/bvo_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'reservation/bvo_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'reservation/bvo_confirm/delete';
		$data['button_print'] = base_url().'reservation/export/pdf_brhv_report';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_confirm'] = $this->model_get->status_filter_confirm();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_confirm'] = $this->model_select_bvo->reservation_confirm($config['per_page'], $report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function details($report_id) {
		$this->load->model('model_select_bvo');

		$data['page_header'] = 'Confirm Guest Detail';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillasonline/confirm_detail';
		$data['footer'] = 'footer';

		$data['button_edit_confirm'] = base_url().'reservation/bvo_confirm/edit';
		$data['button_edit_propose'] = base_url().'reservation/bvo_propose_extend/edit_propose';
		$data['button_edit_extend'] = base_url().'reservation/bvo_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'reservation/bvo_propose_extend/propose';
		$data['button_extend'] = base_url().'reservation/bvo_propose_extend/extend';
		$data['button_delete'] = base_url().'reservation/bvo_confirm/delete';
		$data['button_print'] = base_url().'reservation/export/pdf_brhv_report';

		$data['default'] = $this->model_select_bvo->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($report_id) {
		$this->load->model('model_select_bvo');
		$this->load->model('model_edit_bvo');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_bvo->admin_edit_confirm($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("reservation/bvo_confirm/confirm");
		}

		$data['page_header'] = 'Edit Confirm';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillasonline/form_confirm';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_login();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_bvo->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

}