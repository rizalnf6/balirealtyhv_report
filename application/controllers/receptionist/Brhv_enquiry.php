<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brhv_enquiry extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="receptionist") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For new enquiry only
	public function new_enquiry($report_id=NULL) {
		$this->load->model('model_select_brhv');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('status_enquiry.status_enquiry', 'Enquiry');
		$this->db->where('status_other.status_other', 'Active');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$jml = $this->db->get('balirealtyhv');

		//pengaturan pagination
		$config['base_url'] = base_url().'receptionist/brhv_enquiry/new_enquiry';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '150';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';

		//inisialisasi config
 		$this->pagination->initialize($config);

 		//buat pagination
		$data['halaman'] = $this->pagination->create_links();

		$data['page_header'] = 'New Enquiry';

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balirealty/enquiry_new';
		$data['footer'] = 'footer';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['button_proccess'] = base_url().'receptionist/brhv_enquiry/process_enquiry';
		$data['list_enquiry'] = $this->model_select_brhv->admin_new_enquiry($config['per_page'], $report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	//Process Enquiry to Open 
	public function process_enquiry($report_id) {
		$this->load->model("model_edit_brhv");
		$proses = $this->model_edit_brhv->process_enquiry($report_id);
		if ($proses) {
				$this->session->set_flashdata('proses_sukses', 'Enquiry status now is OPEN');	
			}
		redirect("receptionist/brhv_enquiry/new_enquiry");
	}

	//For enquiry page
	public function enquiry($report_id=NULL) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_get');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->WHERE('balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$jml = $this->db->get('balirealtyhv');

		//pengaturan pagination
		$config['base_url'] = base_url().'admin/brhv_enquiry/enquiry';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '150';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';

		//inisialisasi config
 		$this->pagination->initialize($config);

 		//buat pagination
		$data['halaman'] = $this->pagination->create_links();

		$data['page_header'] = 'ENQUIRY';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

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

		$data['list_enquiry'] = $this->model_select_brhv->admin_enquiry($config['per_page'], $report_id);
		
		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function details($report_id) {
		$this->load->model('model_select_brhv');

		$data['page_header'] = 'Enquiry Details';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balirealty/enquiry_detail';
		$data['footer'] = 'footer';

		$data['button_edit'] = base_url().'receptionist/brhv_enquiry/edit';
		$data['button_propose'] = base_url().'receptionist/brhv_propose_extend/propose';
		$data['button_delete'] = base_url().'receptionist/brhv_enquiry/delete';
		$data['button_print'] = base_url().'receptionist/brhv_enquiry/print';

		$data['default'] = $this->model_select_brhv->get_default($report_id);
		
		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function edit($report_id) {
		$this->load->model('model_select_brhv');
		$this->load->model('model_edit_brhv');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_brhv->admin_edit_enquiry($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("receptionist/brhv_enquiry/enquiry");
		}

		$data['page_header'] = 'Edit Enquiry';

		$data['logoBrhv'] = base_url().'assets/images/logo-brhv.png';

		$data['header'] = 'receptionist/header';
		$data['main_content'] = 'admin/balirealty/form_enquiry';
		$data['footer'] = 'footer';
		
		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_brhv();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_brhv->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function delete($report_id) {
		$this->load->model("model_delete");
		$delete = $this->model_delete->admin_brhv_delete_enquiry($report_id);
		if ($delete) {
				$this->session->set_flashdata('delete_success', 'Data has been deleted successfully');	
			}
		redirect("receptionist/brhv_enquiry/enquiry");
	}
	
}