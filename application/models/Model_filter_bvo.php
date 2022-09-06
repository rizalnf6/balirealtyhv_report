<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_filter_bvo extends CI_Model {

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

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
        $this->db->LIKE('user.name', $reservation);
		$this->db->LIKE('balivillasonline.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillasonline.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillasonline.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillasonline.checkin >=', $checkin_start);
		$this->db->WHERE('balivillasonline.checkin <=', $checkin_end);
		$this->db->WHERE('balivillasonline.checkout >=', $checkout_start);
		$this->db->WHERE('balivillasonline.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->ORDER_BY('guest_name', 'ASC');

		$query = $this->db->get('balivillasonline');
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

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
       	$this->db->where('user.name', $reservation_login);
		$this->db->LIKE('balivillasonline.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillasonline.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillasonline.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillasonline.checkin >=', $checkin_start);
		$this->db->WHERE('balivillasonline.checkin <=', $checkin_end);
		$this->db->WHERE('balivillasonline.checkout >=', $checkout_start);
		$this->db->WHERE('balivillasonline.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->ORDER_BY('guest_name', 'ASC');

		$query = $this->db->get('balivillasonline');
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

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
		$this->db->LIKE('user.name', $reservation);
		$this->db->LIKE('balivillasonline.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillasonline.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillasonline.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillasonline.confirm_date >=', $confirm_start);
		$this->db->WHERE('balivillasonline.confirm_date <=', $confirm_end);
		$this->db->WHERE('balivillasonline.checkin >=', $checkin_start);
		$this->db->WHERE('balivillasonline.checkin <=', $checkin_end);
		$this->db->WHERE('balivillasonline.checkout >=', $checkout_start);
		$this->db->WHERE('balivillasonline.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed' 
						OR status_enquiry.status_enquiry='Extend Stay')");
		$this->db->ORDER_BY('checkin', 'ASC');
		
		$query = $this->db->get('balivillasonline');
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

		$this->db->join('user', 'user.user_id = balivillasonline.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balivillasonline.nationality_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balivillasonline.villa_id', 'left');
		$this->db->join('management', 'management.management_id = villa.management_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balivillasonline.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balivillasonline.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balivillasonline.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balivillasonline.balivillasonline_status', 'left');
		$this->db->where('user.name', $reservation_login);
		$this->db->LIKE('balivillasonline.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillasonline.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillasonline.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillasonline.confirm_date >=', $confirm_start);
		$this->db->WHERE('balivillasonline.confirm_date <=', $confirm_end);
		$this->db->WHERE('balivillasonline.checkin >=', $checkin_start);
		$this->db->WHERE('balivillasonline.checkin <=', $checkin_end);
		$this->db->WHERE('balivillasonline.checkout >=', $checkout_start);
		$this->db->WHERE('balivillasonline.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry='Confirm' 
						OR status_enquiry.status_enquiry='Proposed' 
						OR status_enquiry.status_enquiry='Extend Stay')");
		$this->db->ORDER_BY('checkin', 'ASC');
		
		$query = $this->db->get('balivillasonline');
		return $query->result();
	}

}