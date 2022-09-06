<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_select_brhv extends CI_Model {

	//New Enquiry BRHV
	public function admin_new_enquiry($num, $offset){
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
		
		$sql = $this->db->get('balirealtyhv', $num, $offset);
		return $sql->result();
	}

	//New Enquiry BRHV
	public function reservation_new_enquiry($num, $offset){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('status_enquiry.status_enquiry', 'Enquiry');
		$this->db->where('status_other.status_other', 'Active');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$sql = $this->db->get('balirealtyhv', $num, $offset);
		return $sql->result();
	}

	//All Enquiry BRHV
	public function admin_enquiry($num, $offset){
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
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		
		$sql = $this->db->get('balirealtyhv', $num, $offset);
		return $sql->result();
	}

	//All Enquiry BRHV
	public function reservation_enquiry($num, $offset){

		$reservation_login = $this->session->userdata('name');
		
		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
					AND status_enquiry.status_enquiry!='Confirm' 
					AND status_enquiry.status_enquiry!='Proposed' 
					AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		
		$sql = $this->db->get('balirealtyhv', $num, $offset);
		return $sql->result();
	}

	//All Confirm BRHV
	public function admin_confirm($num, $offset){
		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' AND status_enquiry.status_enquiry!='Open' AND status_enquiry.status_enquiry!='Hold' AND status_enquiry.status_enquiry!='Outstanding' AND status_enquiry.status_enquiry!='Cancel' AND status_enquiry.status_enquiry!='Decision Pending')");
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
	
		$sql = $this->db->get('balirealtyhv', $num, $offset);
		return $sql->result();
	}

	//All Confirm BRHV
	public function reservation_confirm($num, $offset){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
				AND status_enquiry.status_enquiry!='Open' 
				AND status_enquiry.status_enquiry!='Hold' 
				AND status_enquiry.status_enquiry!='Outstanding' 
				AND status_enquiry.status_enquiry!='Cancel' 
				AND status_enquiry.status_enquiry!='Decision Pending')");
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
	
		$sql = $this->db->get('balirealtyhv', $num, $offset);
		return $sql->result();
	}

	//Get default values from each $report_id 
	public function get_default($report_id){
		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('balirealtyhv.report_id', intval($report_id));
		$sql = $this->db->get('balirealtyhv');
		
		if($sql->num_rows() > 0)
		return $sql->row_array();
		return false;
	}

	public function admin_reminder_guest_arrival(){
		$today = date("Y-m-d");

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('balirealtyhv.checkout >=', $today);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balirealtyhv.adult='' 
						OR balirealtyhv.children='' 
						OR balirealtyhv.infant='' 
						OR balirealtyhv.arrival_flight='' 
						OR balirealtyhv.arrival_time='' 
						OR balirealtyhv.departure_flight='' 
						OR balirealtyhv.departure_time='')");
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.checkin', 'ASC');
		$sql = $this->db->get('balirealtyhv');
		return $sql->result();
	}

	public function reservation_reminder_guest_arrival(){
		$today = date("Y-m-d");
		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('balirealtyhv.checkout >=', $today);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balirealtyhv.adult='' 
						OR balirealtyhv.children='' 
						OR balirealtyhv.infant='' 
						OR balirealtyhv.arrival_flight='' 
						OR balirealtyhv.arrival_time='' 
						OR balirealtyhv.departure_flight='' 
						OR balirealtyhv.departure_time='')");
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.checkin', 'ASC');
		$sql = $this->db->get('balirealtyhv');
		return $sql->result();
	}

	public function admin_reminder_revenue(){
		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Extend Stay' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balirealtyhv.revenue_nett='' 
						OR balirealtyhv.revenue_gross=''
						OR balirealtyhv.revenue_nett > balirealtyhv.revenue_gross)");
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$sql = $this->db->get('balirealtyhv');
		return $sql->result();
	}

	public function reservation_reminder_revenue(){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Extend Stay' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balirealtyhv.revenue_nett='' 
						OR balirealtyhv.revenue_gross=''
						OR balirealtyhv.revenue_nett > balirealtyhv.revenue_gross)");
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$sql = $this->db->get('balirealtyhv');
		return $sql->result();
	}

	public function admin_reminder_cancelation(){
		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('status_enquiry.status_enquiry', 'Cancel');
		$this->db->where('balirealtyhv.cancelation_id', '');
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$sql = $this->db->get('balirealtyhv');
		return $sql->result();
	}

	public function reservation_reminder_cancelation(){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('status_enquiry.status_enquiry', 'Cancel');
		$this->db->where('balirealtyhv.cancelation_id', '');
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->ORDER_BY('balirealtyhv.balirealtyhv_last_modified', 'DESC');
		$sql = $this->db->get('balirealtyhv');
		return $sql->result();
	}

	public function villa(){
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('villa_manager', 'villa_manager.manager_id = villa.manager_id', 'left');
		$this->db->join('villa_supervisor', 'villa_supervisor.supervisor_id = villa.supervisor_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = villa.villa_status', 'left');
		$this->db->ORDER_BY('villa.villa_last_modified', 'DESC');
		$sql = $this->db->get('villa');
		return $sql->result();
	}

	public function villa_special(){
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('villa_manager', 'villa_manager.manager_id = villa.manager_id', 'left');
		$this->db->join('villa_supervisor', 'villa_supervisor.supervisor_id = villa.supervisor_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = villa.villa_status', 'left');
		$this->db->where("(villa.villa_remarks!='' 
						AND villa.villa_remarks!='<p><br></p>')");
		$this->db->ORDER_BY('villa.villa_last_modified', 'DESC');
		$sql = $this->db->get('villa');
		return $sql->result();
	}

	public function villa_promotion(){
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('villa_manager', 'villa_manager.manager_id = villa.manager_id', 'left');
		$this->db->join('villa_supervisor', 'villa_supervisor.supervisor_id = villa.supervisor_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = villa.villa_status', 'left');
		$this->db->where("(villa.villa_promotion!='' 
						AND villa.villa_promotion!='<p><br></p>')");
		$this->db->ORDER_BY('villa.villa_last_modified', 'DESC');
		$sql = $this->db->get('villa');
		return $sql->result();
	}

	public function get_default_villa($villa_id){
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('villa_manager', 'villa_manager.manager_id = villa.manager_id', 'left');
		$this->db->join('villa_supervisor', 'villa_supervisor.supervisor_id = villa.supervisor_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = villa.villa_status', 'left');
		$this->db->where('villa.villa_id', intval($villa_id));
		$sql = $this->db->get('villa');
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function Management(){
		$this->db->join('status_other', 'status_other.status_other_id = management.management_status', 'left');
		$this->db->ORDER_BY('management.management_last_modified', 'DESC');
		$sql = $this->db->get('management');
		return $sql->result();
	}

	public function get_default_management($management_id){
		$this->db->join('status_other', 'status_other.status_other_id = management.management_status', 'left');
		$this->db->where('management.management_id', intval($management_id));
		$sql = $this->db->get('management');
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function source(){
		$this->db->join('source_category', 'source_category.source_category_id = source.category', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = source.source_status', 'left');
		$this->db->ORDER_BY('source.category', 'ASC');
		$this->db->ORDER_BY('source.source', 'ASC');
		$sql = $this->db->get('source');
		return $sql->result();
	}

	public function get_default_source($source_id){
		$this->db->join('source_category', 'source_category.source_category_id = source.category', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = source.source_status', 'left');
		$this->db->where('source.source_id', intval($source_id));
		$sql = $this->db->get('source');
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function get_default_discount($discount_id){
		$this->db->where('discount.discount_id', intval($discount_id));
		$sql = $this->db->get('discount');
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function villa_manager(){
		$this->db->join('status_other', 'status_other.status_other_id = villa_manager.manager_status', 'left');
		$this->db->ORDER_BY('villa_manager.manager', 'ASC');
		$sql = $this->db->get('villa_manager');
		return $sql->result();
	}

	public function get_default_villa_manager($manager_id){
		$this->db->join('status_other', 'status_other.status_other_id = villa_manager.manager_status', 'left');
		$this->db->where('villa_manager.manager_id', intval($manager_id));
		$sql = $this->db->get('villa_manager');
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function villa_supervisor(){
		$this->db->join('status_other', 'status_other.status_other_id = villa_supervisor.supervisor_status', 'left');
		$this->db->ORDER_BY('villa_supervisor.supervisor', 'ASC');
		$sql = $this->db->get('villa_supervisor');
		return $sql->result();
	}

	public function get_default_villa_supervisor($supervisor_id){
		$this->db->join('status_other', 'status_other.status_other_id = villa_supervisor.supervisor_status', 'left');
		$this->db->where('villa_supervisor.supervisor_id', intval($supervisor_id));
		$sql = $this->db->get('villa_supervisor');
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function discount(){
		$this->db->ORDER_BY('discount_last_modified', 'DESC');
		$sql = $this->db->get('discount');
		return $sql->result();
	}

}