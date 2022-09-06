<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_select_bve extends CI_Model {

	//New Enquiry
	public function admin_new_enquiry($num, $offset){
		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('status_enquiry.status_enquiry', 'Enquiry');
		$this->db->where('status_other.status_other', 'Active');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		
		$sql = $this->db->get('balivillaescapes', $num, $offset);
		return $sql->result();
	}

	//New Enquiry
	public function reservation_new_enquiry($num, $offset){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('status_enquiry.status_enquiry', 'Enquiry');
		$this->db->where('status_other.status_other', 'Active');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		
		$sql = $this->db->get('balivillaescapes', $num, $offset);
		return $sql->result();
	}

	//All Enquiry
	public function admin_enquiry($num, $offset){
		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' AND status_enquiry.status_enquiry!='Confirm' AND status_enquiry.status_enquiry!='Proposed' AND status_enquiry.status_enquiry!='Extend Stay')");

		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');

		$sql = $this->db->get('balivillaescapes', $num, $offset);
		return $sql->result();
	}

	//All Enquiry
	public function reservation_enquiry($num, $offset){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
				AND status_enquiry.status_enquiry!='Confirm' 
				AND status_enquiry.status_enquiry!='Proposed' 
				AND status_enquiry.status_enquiry!='Extend Stay')");

		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');

		$sql = $this->db->get('balivillaescapes', $num, $offset);
		return $sql->result();
	}

	//Get default values from each $report_id 
	public function get_default($report_id){
		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('balivillaescapes.report_id', intval($report_id));
		$sql = $this->db->get('balivillaescapes');
		
		if($sql->num_rows() > 0)
		return $sql->row_array();
		return false;
	}

	//All Confirm BRHV
	public function admin_confirm($num, $offset){

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
				AND status_enquiry.status_enquiry!='Open' 
				AND status_enquiry.status_enquiry!='Hold' 
				AND status_enquiry.status_enquiry!='Outstanding' 
				AND status_enquiry.status_enquiry!='Cancel' 
				AND status_enquiry.status_enquiry!='Decision Pending')");

		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		
		$sql = $this->db->get('balivillaescapes', $num, $offset);
		return $sql->result();
	}

	//All Confirm BRHV
	public function reservation_confirm($num, $offset){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
				AND status_enquiry.status_enquiry!='Open' 
				AND status_enquiry.status_enquiry!='Hold' 
				AND status_enquiry.status_enquiry!='Outstanding' 
				AND status_enquiry.status_enquiry!='Cancel' 
				AND status_enquiry.status_enquiry!='Decision Pending')");

		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		
		$sql = $this->db->get('balivillaescapes', $num, $offset);
		return $sql->result();
	}

	public function admin_reminder_guest_arrival(){
		$today = date("Y-m-d");

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('balivillaescapes.checkout >=', $today);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balivillaescapes.adult='' 
						OR balivillaescapes.children='' 
						OR balivillaescapes.infant='' 
						OR balivillaescapes.arrival_flight='' 
						OR balivillaescapes.arrival_time='' 
						OR balivillaescapes.departure_flight='' 
						OR balivillaescapes.departure_time='')");
		$this->db->where('balivillaescapes.balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.checkin', 'ASC');
		$sql = $this->db->get('balivillaescapes');
		return $sql->result();
	}

	public function reservation_reminder_guest_arrival(){
		$today = date("Y-m-d");
		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('balivillaescapes.checkout >=', $today);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balivillaescapes.adult='' 
						OR balivillaescapes.children='' 
						OR balivillaescapes.infant='' 
						OR balivillaescapes.arrival_flight='' 
						OR balivillaescapes.arrival_time='' 
						OR balivillaescapes.departure_flight='' 
						OR balivillaescapes.departure_time='')");
		$this->db->where('balivillaescapes.balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.checkin', 'ASC');
		$sql = $this->db->get('balivillaescapes');
		return $sql->result();
	}

	public function admin_reminder_revenue(){
		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Extend Stay' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balivillaescapes.revenue_nett_aud='' 
						OR balivillaescapes.revenue_gross_aud=''
						OR balivillaescapes.revenue_nett_aud > balivillaescapes.revenue_gross_aud
						OR balivillaescapes.revenue_nett_usd='' 
						OR balivillaescapes.revenue_gross_usd=''
						OR balivillaescapes.revenue_nett_usd > balivillaescapes.revenue_gross_usd)");
		$this->db->where('balivillaescapes.balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$sql = $this->db->get('balivillaescapes');
		return $sql->result();
	}

	public function reservation_reminder_revenue(){

		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Extend Stay' 
						OR status_enquiry.status_enquiry='Proposed')");
		$this->db->where("(balivillaescapes.revenue_nett_aud='' 
						OR balivillaescapes.revenue_gross_aud=''
						OR balivillaescapes.revenue_nett_aud > balivillaescapes.revenue_gross_aud
						OR balivillaescapes.revenue_nett_usd='' 
						OR balivillaescapes.revenue_gross_usd=''
						OR balivillaescapes.revenue_nett_usd > balivillaescapes.revenue_gross_usd)");
		$this->db->where('balivillaescapes.balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$sql = $this->db->get('balivillaescapes');
		return $sql->result();
	}

	public function admin_reminder_cancelation(){
		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('status_enquiry.status_enquiry', 'Cancel');
		$this->db->where('balivillaescapes.cancelation_id', '');
		$this->db->where('balivillaescapes.balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$sql = $this->db->get('balivillaescapes');
		return $sql->result();
	}

	public function reservation_reminder_cancelation(){
		
		$reservation_login = $this->session->userdata('name');

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->where('status_enquiry.status_enquiry', 'Cancel');
		$this->db->where('balivillaescapes.cancelation_id', '');
		$this->db->where('balivillaescapes.balivillaescapes_status', '1');
		$this->db->ORDER_BY('balivillaescapes.balivillaescapes_last_modified', 'DESC');
		$sql = $this->db->get('balivillaescapes');
		return $sql->result();
	}

}