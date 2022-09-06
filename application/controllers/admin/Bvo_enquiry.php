<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bvo_enquiry extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="admin") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For new enquiry only
	public function new_enquiry($report_id=NULL) {
		$this->load->model('model_select_bvo');

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
		$this->db->where('status_enquiry.status_enquiry', 'Enquiry');
		$this->db->where('status_other.status_other', 'Active');
		$this->db->ORDER_BY('balivillasonline.balivillasonline_last_modified', 'DESC');
		$jml = $this->db->get('balivillasonline');

		//pengaturan pagination
		$config['base_url'] = base_url().'admin/bvo_enquiry/new_enquiry';
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
		
		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/enquiry_new';
		$data['footer'] = 'footer';

		$data['button_proccess'] = base_url().'admin/bvo_enquiry/process_enquiry';

		$data['list_enquiry'] = $this->model_select_bvo->admin_new_enquiry($config['per_page'], $report_id);
		
		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	//Process Enquiry to Open 
	public function process_enquiry($report_id) {
		$this->load->model("model_edit_bvo");
		$proses = $this->model_edit_bvo->process_enquiry($report_id);
		if ($proses) {
				$this->session->set_flashdata('proses_sukses', 'Enquiry status now is OPEN');	
			}
		redirect("admin/bvo_enquiry/new_enquiry");
	}

	//For enquiry page
	public function enquiry($report_id=NULL) {
		$this->load->model('model_select_bvo');
		$this->load->model('model_get');

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->WHERE('balivillasonline_status', '1');
		$this->db->ORDER_BY('balivillasonline.balivillasonline_last_modified', 'DESC');
		$jml = $this->db->get('balivillasonline');

		//pengaturan pagination
		$config['base_url'] = base_url().'admin/bvo_enquiry/enquiry';
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

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/enquiry';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'admin/export/excel_bvo_enquiry';
		$data['filter'] = base_url().'admin/filter/enquiry_bvo';
		$data['reset'] = base_url().'admin/bvo_enquiry/enquiry';
		$data['button_detail'] = base_url().'admin/bvo_enquiry/details';
		$data['button_edit'] = base_url().'admin/bvo_enquiry/edit';
		$data['button_propose'] = base_url().'admin/bvo_enquiry/propose';
		$data['button_delete'] = base_url().'admin/bvo_enquiry/delete';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_enquiry'] = $this->model_get->status_filter_enquiry();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_enquiry'] = $this->model_select_bvo->admin_enquiry($config['per_page'], $report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function details($report_id) {
		$this->load->model('model_select_bvo');

		$data['page_header'] = 'Enquiry Details';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/enquiry_detail';
		$data['footer'] = 'footer';

		$data['button_edit'] = base_url().'admin/bvo_enquiry/edit';
		$data['button_propose'] = base_url().'admin/bvo_propose_extend/propose';
		$data['button_delete'] = base_url().'admin/bvo_enquiry/delete';
		$data['button_print'] = base_url().'admin/bvo_enquiry/print';

		$data['default'] = $this->model_select_bvo->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($report_id) {
		$this->load->model('model_select_bvo');
		$this->load->model('model_edit_bvo');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_bvo->admin_edit_enquiry($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("admin/bvo_enquiry/enquiry");
		}

		$data['page_header'] = 'Edit Enquiry';

		$data['logoAhr'] = base_url().'assets/images/logo-ahr.png';

		$data['header'] = 'admin/header';
		$data['main_content'] = 'admin/balivillasonline/form_enquiry';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_bvo->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function delete($report_id) {
		$this->load->model("model_delete");
		$delete = $this->model_delete->admin_bvo_delete_enquiry($report_id);
		if ($delete) {
				$this->session->set_flashdata('delete_success', 'Data has been deleted successfully');	
			}
		redirect("admin/bvo_enquiry/enquiry");
	}
}