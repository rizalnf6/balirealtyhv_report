<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_filter_bve extends CI_Model {

	public function filter_admin_enquiry(){
		$reservation 		=   $this->input->get('reservation');
		$guest_name    		=   $this->input->get('guest_name');
		$villa  	 		=   $this->input->get('villa');
		$status_enquiry		=   $this->input->get('status_enquiry');
		$enquiry_start 		=   $this->input->get('enquiry_start');
		$enquiry_end  		=   $this->input->get('enquiry_end');
		$checkin_start 		=   $this->input->get('checkin_start');
		$checkin_end  		=   $this->input->get('checkin_end');
		$checkout_start 	=   $this->input->get('checkout_start');
		$checkout_end 		=   $this->input->get('checkout_end');

		if (empty($enquiry_start)) { $enquiry_start = "0000-00-00"; }
		if (empty($enquiry_end)) { $enquiry_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($checkin_start)) { $checkin_start = "0000-00-00"; }
		if (empty($checkin_end)) { $checkin_end = date('Y-m-d', strtotime('+5 year')); }

		if (empty($checkout_start)) { $checkout_start = "0000-00-00"; }
		if (empty($checkout_end)) { $checkout_end = date('Y-m-d', strtotime('+5 year')); }

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
        $this->db->LIKE('user.name', $reservation);
		$this->db->LIKE('balivillaescapes.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillaescapes.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillaescapes.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillaescapes.checkin >=', $checkin_start);
		$this->db->WHERE('balivillaescapes.checkin <=', $checkin_end);
		$this->db->WHERE('balivillaescapes.checkout >=', $checkout_start);
		$this->db->WHERE('balivillaescapes.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->ORDER_BY('name', 'ASC');

		$query = $this->db->get('balivillaescapes');
		return $query->result();
	}

	public function filter_reservation_enquiry(){
		$reservation_login	= 	$this->session->userdata('name');
		$guest_name    		=   $this->input->get('guest_name');
		$villa  	 		=   $this->input->get('villa');
		$status_enquiry		=   $this->input->get('status_enquiry');
		$enquiry_start 		=   $this->input->get('enquiry_start');
		$enquiry_end  		=   $this->input->get('enquiry_end');
		$checkin_start 		=   $this->input->get('checkin_start');
		$checkin_end  		=   $this->input->get('checkin_end');
		$checkout_start 	=   $this->input->get('checkout_start');
		$checkout_end 		=   $this->input->get('checkout_end');

		if (empty($enquiry_start)) { $enquiry_start = "0000-00-00"; }
		if (empty($enquiry_end)) { $enquiry_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($checkin_start)) { $checkin_start = "0000-00-00"; }
		if (empty($checkin_end)) { $checkin_end = date('Y-m-d', strtotime('+5 year')); }

		if (empty($checkout_start)) { $checkout_start = "0000-00-00"; }
		if (empty($checkout_end)) { $checkout_end = date('Y-m-d', strtotime('+5 year')); }

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
        $this->db->where('user.name', $reservation_login);
		$this->db->LIKE('balivillaescapes.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillaescapes.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillaescapes.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillaescapes.checkin >=', $checkin_start);
		$this->db->WHERE('balivillaescapes.checkin <=', $checkin_end);
		$this->db->WHERE('balivillaescapes.checkout >=', $checkout_start);
		$this->db->WHERE('balivillaescapes.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->ORDER_BY('guest_name', 'ASC');

		$query = $this->db->get('balivillaescapes');
		return $query->result();
	}

	public function filter_admin_confirm(){
		$reservation 		=   $this->input->get('reservation');
		$guest_name    		=   $this->input->get('guest_name');
		$villa  	 		=   $this->input->get('villa');
		$status_enquiry		=   $this->input->get('status_enquiry');
		$enquiry_start 		=   $this->input->get('enquiry_start');
		$enquiry_end  		=   $this->input->get('enquiry_end');
		$confirm_start 		=   $this->input->get('confirm_start');
		$confirm_end  		=   $this->input->get('confirm_end');
		$checkin_start 		=   $this->input->get('checkin_start');
		$checkin_end  		=   $this->input->get('checkin_end');
		$checkout_start 	=   $this->input->get('checkout_start');
		$checkout_end 		=   $this->input->get('checkout_end');

		if (empty($enquiry_start)) { $enquiry_start = "0000-00-00"; }
		if (empty($enquiry_end)) { $enquiry_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($confirm_start)) { $confirm_start = "0000-00-00"; }
		if (empty($confirm_end)) { $confirm_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($checkin_start)) { $checkin_start = "0000-00-00"; }
		if (empty($checkin_end)) { $checkin_end = date('Y-m-d', strtotime('+5 year')); }

		if (empty($checkout_start)) { $checkout_start = "0000-00-00"; }
		if (empty($checkout_end)) { $checkout_end = date('Y-m-d', strtotime('+5 year')); }

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->LIKE('user.name', $reservation);
		$this->db->LIKE('balivillaescapes.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillaescapes.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillaescapes.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillaescapes.confirm_date >=', $confirm_start);
		$this->db->WHERE('balivillaescapes.confirm_date <=', $confirm_end);
		$this->db->WHERE('balivillaescapes.checkin >=', $checkin_start);
		$this->db->WHERE('balivillaescapes.checkin <=', $checkin_end);
		$this->db->WHERE('balivillaescapes.checkout >=', $checkout_start);
		$this->db->WHERE('balivillaescapes.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed' 
						OR status_enquiry.status_enquiry='Extend Stay')");
		$this->db->ORDER_BY('checkin', 'ASC');
		
		$query = $this->db->get('balivillaescapes');
		return $query->result();
	}

	public function filter_reservation_confirm(){
		$reservation_login	= 	$this->session->userdata('name');
		$guest_name    		=   $this->input->get('guest_name');
		$villa  	 		=   $this->input->get('villa');
		$status_enquiry		=   $this->input->get('status_enquiry');
		$enquiry_start 		=   $this->input->get('enquiry_start');
		$enquiry_end  		=   $this->input->get('enquiry_end');
		$confirm_start 		=   $this->input->get('confirm_start');
		$confirm_end  		=   $this->input->get('confirm_end');
		$checkin_start 		=   $this->input->get('checkin_start');
		$checkin_end  		=   $this->input->get('checkin_end');
		$checkout_start 	=   $this->input->get('checkout_start');
		$checkout_end 		=   $this->input->get('checkout_end');

		if (empty($enquiry_start)) { $enquiry_start = "0000-00-00"; }
		if (empty($enquiry_end)) { $enquiry_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($confirm_start)) { $confirm_start = "0000-00-00"; }
		if (empty($confirm_end)) { $confirm_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($checkin_start)) { $checkin_start = "0000-00-00"; }
		if (empty($checkin_end)) { $checkin_end = date('Y-m-d', strtotime('+5 year')); }

		if (empty($checkout_start)) { $checkout_start = "0000-00-00"; }
		if (empty($checkout_end)) { $checkout_end = date('Y-m-d', strtotime('+5 year')); }

		$this->db->join('user', 'user.user_id = balivillaescapes.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillaescapes.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillaescapes.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillaescapes.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillaescapes.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillaescapes.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillaescapes.balivillaescapes_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->LIKE('balivillaescapes.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillaescapes.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillaescapes.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillaescapes.confirm_date >=', $confirm_start);
		$this->db->WHERE('balivillaescapes.confirm_date <=', $confirm_end);
		$this->db->WHERE('balivillaescapes.checkin >=', $checkin_start);
		$this->db->WHERE('balivillaescapes.checkin <=', $checkin_end);
		$this->db->WHERE('balivillaescapes.checkout >=', $checkout_start);
		$this->db->WHERE('balivillaescapes.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed' 
						OR status_enquiry.status_enquiry='Extend Stay')");
		$this->db->ORDER_BY('checkin', 'ASC');
		
		$query = $this->db->get('balivillaescapes');
		return $query->result();
	}

}