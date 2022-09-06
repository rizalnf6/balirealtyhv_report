<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bve_enquiry extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="reservation") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For new enquiry only
	public function new_enquiry($report_id=NULL) {
		$this->load->model('model_select_bve');

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('status_enquiry.status_enquiry', 'Enquiry');
		$this->db->where('status_other.status_other', 'Active');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$jml = $this->db->get('balivillaescapes');

		//pengaturan pagination
		$config['base_url'] = base_url().'reservation/bve_enquiry/new_enquiry';
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

		$data['page_header'] = 'New enquiry';
		
		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/enquiry_new';
		$data['footer'] = 'footer';

		$data['button_proccess'] = base_url().'reservation/bve_enquiry/process_enquiry';

		$data['list_enquiry'] = $this->model_select_bve->reservation_new_enquiry($config['per_page'], $report_id);
		
		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//Process Enquiry to Open 
	public function process_enquiry($report_id) {
		$this->load->model("model_edit_bve");
		$proses = $this->model_edit_bve->process_enquiry($report_id);
		if ($proses) {
				$this->session->set_flashdata('proses_sukses', 'Enquiry status now is OPEN');	
			}
		redirect("reservation/bve_enquiry/new_enquiry");
	}

	//For enquiry page
	public function enquiry($report_id=NULL) {
		$this->load->model('model_select_bve');
		$this->load->model('model_get');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->WHERE('balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$jml = $this->db->get('balivillaescapes');

		//pengaturan pagination
		$config['base_url'] = base_url().'reservation/bve_enquiry/enquiry';
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

		$data['page_header'] = 'Enquiry';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'reservation/export/excel_bve_enquiry';
		$data['add'] = base_url().'reservation/bve_enquiry/add';
		$data['filter'] = base_url().'reservation/filter/enquiry_bve';
		$data['reset'] = base_url().'reservation/bve_enquiry/enquiry';
		$data['button_detail'] = base_url().'reservation/bve_enquiry/details';
		$data['button_edit'] = base_url().'reservation/bve_enquiry/edit';
		$data['button_propose'] = base_url().'reservation/bve_enquiry/propose';
		$data['button_delete'] = base_url().'reservation/bve_enquiry/delete';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_enquiry'] = $this->model_get->status_filter_enquiry();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_enquiry'] = $this->model_select_bve->reservation_enquiry($config['per_page'], $report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function details($report_id) {
		$this->load->model('model_select_bve');

		$data['page_header'] = 'Enquiry Details';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/enquiry_detail';
		$data['footer'] = 'footer';

		$data['button_edit'] = base_url().'reservation/bve_enquiry/edit';
		$data['button_propose'] = base_url().'reservation/bve_propose_extend/propose';
		$data['button_delete'] = base_url().'reservation/bve_enquiry/delete';
		$data['button_print'] = base_url().'reservation/bve_enquiry/print';

		$data['default'] = $this->model_select_bve->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($report_id) {
		$this->load->model('model_select_bve');
		$this->load->model('model_edit_bve');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_bve->reservation_edit_enquiry($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("reservation/bve_enquiry/enquiry");
		}

		$data['page_header'] = 'Edit Enquiry';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/form_enquiry';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_login();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_bve->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function add() {
		$this->load->model('model_select_bve');
		$this->load->model('model_insert_bve');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			//proses simpan dilakukan
			$add_enquiry = $this->model_insert_bve->add_enquiry($_POST);
			if ($add_enquiry) {
				$this->session->set_flashdata('add_success', 'Enquiry added successfully');	
			}
			redirect("reservation/bve_enquiry/new_enquiry");
		}

		$data['page_header'] = 'Add New Enquiry';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'reservation/header';
		$data['main_content'] = 'admin/balivillaescapes/form_add_enquiry';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_login();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}
	
}