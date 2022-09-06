<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bve_confirm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('email')=="" OR $this->session->userdata('level')!="resmanager") {
			redirect('auth');
		}
		
		$this->load->helper('text');
	}

	//For Confirm page
	public function confirm($report_id=NULL) {
		$this->load->model('model_select_bve');
		$this->load->model('model_get');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->WHERE("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed' 
						OR status_enquiry.status_enquiry='Extend Stay')");
		$this->db->WHERE('balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$jml = $this->db->get('balivillaescapes');

		//pengaturan pagination
		$config['base_url'] = base_url().'resmanager/bve_confirm/confirm';
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

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/confirm';
		$data['footer'] = 'footer';

		$data['export_excel'] = base_url().'resmanager/export/excel_bve_confirm';
		$data['filter'] = base_url().'resmanager/filter/confirm_bve';
		$data['reset'] = base_url().'resmanager/bve_confirm/confirm';
		$data['button_detail'] = base_url().'resmanager/bve_confirm/details';
		$data['button_edit'] = base_url().'resmanager/bve_confirm/edit';
		$data['button_extend'] = base_url().'resmanager/bve_propose_extend/edit_extend';
		$data['button_propose'] = base_url().'resmanager/bve_propose_extend/edit_propose';
		$data['button_delete'] = base_url().'resmanager/bve_confirm/delete';
		$data['button_print'] = base_url().'resmanager/export/pdf_brhv_report';

		$data['list_reservation'] = $this->model_get->reservation();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_status_filter_confirm'] = $this->model_get->status_filter_confirm();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['list_confirm'] = $this->model_select_bve->admin_confirm($config['per_page'], $report_id);

		$data['session_login'] = $this->session->userdata('name');
		
		$this->load->view('template_view',$data);
	}

	public function details($report_id) {
		$this->load->model('model_select_bve');

		$data['page_header'] = 'Confirm Guest Detail';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/confirm_detail';
		$data['footer'] = 'footer';

		$data['button_edit_confirm'] = base_url().'resmanager/bve_confirm/edit';
		$data['button_edit_propose'] = base_url().'resmanager/bve_propose_extend/edit_propose';
		$data['button_edit_extend'] = base_url().'resmanager/bve_propose_extend/edit_extend';
		$data['button_extend'] = base_url().'resmanager/bve_propose_extend/extend';
		$data['button_delete'] = base_url().'resmanager/bve_confirm/delete';
		$data['button_print'] = base_url().'resmanager/export/pdf_brhv_report';

		$data['default'] = $this->model_select_bve->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function edit($report_id) {
		$this->load->model('model_select_bve');
		$this->load->model('model_edit_bve');
		$this->load->model('model_get');

		if(isset($_POST['submit'])){
			$edit = $this->model_edit_bve->admin_edit_confirm($_POST, $report_id);
			if ($edit) {
				$this->session->set_flashdata('edit_success', 'Data has been updated successfully');	
			}
		redirect("resmanager/bve_confirm/confirm");
		}

		$data['page_header'] = 'Edit Confirm';

		$data['logoBve'] = base_url().'assets/images/logo-bve.png';

		$data['header'] = 'resmanager/header';
		$data['main_content'] = 'admin/balivillaescapes/form_confirm';
		$data['footer'] = 'footer';

		$data['list_reservation'] = $this->model_get->reservation_admin();
		$data['list_nationality'] = $this->model_get->nationality();
		$data['list_source'] = $this->model_get->source();
		$data['list_villa'] = $this->model_get->villa_bve();
		$data['list_status'] = $this->model_get->status_general();
		$data['list_payment'] = $this->model_get->payment();
		$data['list_cancelation'] = $this->model_get->cancelation();

		$data['default'] = $this->model_select_bve->get_default($report_id);

		$data['session_login'] = $this->session->userdata('name');

		$this->load->view('template_view',$data);
	}

	public function delete($report_id) {
		$this->load->model("model_delete");
		$delete = $this->model_delete->admin_bve_delete_enquiry($report_id);
		if ($delete) {
				$this->session->set_flashdata('delete_success', 'Data has been deleted successfully');	
			}
		redirect("resmanager/bve_confirm/confirm");
	}
}