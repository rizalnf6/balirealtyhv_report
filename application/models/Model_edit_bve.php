<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_edit_bve extends CI_Model {

	public function process_enquiry($report_id){
		$session_login = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET status_enquiry_id='2' WHERE report_id= ".intval($report_id));
		return true;
	}

	//Edit Enquiry
	public function admin_edit_enquiry($post, $report_id){
		$reservation_id = $this->db->escape($post['reservation_id']);
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = $this->db->escape($post['enquiry_date']);
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$status_enquiry_id = $this->db->escape($post['status_enquiry_id']);
		$payment_id = $this->db->escape($post['payment_id']);
		$cancelation_id = $this->db->escape($post['cancelation_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett_aud = $this->db->escape($post['revenue_nett_aud']);
		$revenue_gross_aud = $this->db->escape($post['revenue_gross_aud']);
		$revenue_nett_usd = $this->db->escape($post['revenue_nett_usd']);
		$revenue_gross_usd = $this->db->escape($post['revenue_gross_usd']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET 
				reservation_id = $reservation_id,
				guest_name = $guest_name,
				enquiry_date = $enquiry_date,
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				status_enquiry_id = $status_enquiry_id,
				payment_id = $payment_id,
				cancelation_id =$cancelation_id,
				confirm_date = $confirm_date,
				revenue_nett_aud = $revenue_nett_aud,
				revenue_gross_aud = $revenue_gross_aud,
				revenue_nett_usd = $revenue_nett_usd,
				revenue_gross_usd = $revenue_gross_usd,
				remarks = $remarks,
				balivillaescapes_last_modified = NOW(),
				balivillaescapes_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Enquiry
	public function reservation_edit_enquiry($post, $report_id){
		$reservation_id = $this->db->escape($post['reservation_id']);
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = $this->db->escape($post['enquiry_date']);
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$status_enquiry_id = $this->db->escape($post['status_enquiry_id']);
		$payment_id = $this->db->escape($post['payment_id']);
		$cancelation_id = $this->db->escape($post['cancelation_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett_aud = $this->db->escape($post['revenue_nett_aud']);
		$revenue_gross_aud = $this->db->escape($post['revenue_gross_aud']);
		$revenue_nett_usd = $this->db->escape($post['revenue_nett_usd']);
		$revenue_gross_usd = $this->db->escape($post['revenue_gross_usd']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET 
				guest_name = $guest_name,
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				status_enquiry_id = $status_enquiry_id,
				payment_id = $payment_id,
				cancelation_id =$cancelation_id,
				confirm_date = $confirm_date,
				revenue_nett_aud = $revenue_nett_aud,
				revenue_gross_aud = $revenue_gross_aud,
				revenue_nett_usd = $revenue_nett_usd,
				revenue_gross_usd = $revenue_gross_usd,
				remarks = $remarks,
				balivillaescapes_last_modified = NOW(),
				balivillaescapes_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Confirm
	public function admin_edit_confirm($post, $report_id){
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = $this->db->escape($post['enquiry_date']);
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$status_enquiry_id = $this->db->escape($post['status_enquiry_id']);
		$payment_id = $this->db->escape($post['payment_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett_aud = $this->db->escape($post['revenue_nett_aud']);
		$revenue_gross_aud = $this->db->escape($post['revenue_gross_aud']);
		$revenue_nett_usd = $this->db->escape($post['revenue_nett_usd']);
		$revenue_gross_usd = $this->db->escape($post['revenue_gross_usd']);
		$adult = $this->db->escape($post['adult']);
		$children = $this->db->escape($post['children']);
		$infant = $this->db->escape($post['infant']);
		$arrival_flight = $this->db->escape($post['arrival_flight']);
		$arrival_time = $this->db->escape($post['arrival_time']);
		$departure_flight = $this->db->escape($post['departure_flight']);
		$departure_time = $this->db->escape($post['departure_time']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET 
				guest_name = $guest_name,
				enquiry_date = $enquiry_date,
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				status_enquiry_id = $status_enquiry_id,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett_aud = $revenue_nett_aud,
				revenue_gross_aud = $revenue_gross_aud,
				revenue_nett_usd = $revenue_nett_usd,
				revenue_gross_usd = $revenue_gross_usd,
				adult =$adult,
				children = $children,
				infant = $infant,
				arrival_flight = $arrival_flight,
				arrival_time = $arrival_time,
				departure_flight = $departure_flight,
				departure_time = $departure_time,
				remarks = $remarks,
				balivillaescapes_last_modified = NOW(),
				balivillaescapes_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Confirm
	public function reservation_edit_confirm($post, $report_id){
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = $this->db->escape($post['enquiry_date']);
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$status_enquiry_id = $this->db->escape($post['status_enquiry_id']);
		$payment_id = $this->db->escape($post['payment_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett_aud = $this->db->escape($post['revenue_nett_aud']);
		$revenue_gross_aud = $this->db->escape($post['revenue_gross_aud']);
		$revenue_nett_usd = $this->db->escape($post['revenue_nett_usd']);
		$revenue_gross_usd = $this->db->escape($post['revenue_gross_usd']);
		$adult = $this->db->escape($post['adult']);
		$children = $this->db->escape($post['children']);
		$infant = $this->db->escape($post['infant']);
		$arrival_flight = $this->db->escape($post['arrival_flight']);
		$arrival_time = $this->db->escape($post['arrival_time']);
		$departure_flight = $this->db->escape($post['departure_flight']);
		$departure_time = $this->db->escape($post['departure_time']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET 
				guest_name = $guest_name,
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				status_enquiry_id = $status_enquiry_id,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett_aud = $revenue_nett_aud,
				revenue_gross_aud = $revenue_gross_aud,
				revenue_nett_usd = $revenue_nett_usd,
				revenue_gross_usd = $revenue_gross_usd,
				adult =$adult,
				children = $children,
				infant = $infant,
				arrival_flight = $arrival_flight,
				arrival_time = $arrival_time,
				departure_flight = $departure_flight,
				departure_time = $departure_time,
				remarks = $remarks,
				balivillaescapes_last_modified = NOW(),
				balivillaescapes_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	public function edit_propose($post, $report_id){
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$payment_id = $this->db->escape($post['payment_id']);
		$cancelation_id = $this->db->escape($post['cancelation_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett_aud = $this->db->escape($post['revenue_nett_aud']);
		$revenue_gross_aud = $this->db->escape($post['revenue_gross_aud']);
		$revenue_nett_usd = $this->db->escape($post['revenue_nett_usd']);
		$revenue_gross_usd = $this->db->escape($post['revenue_gross_usd']);
		$adult = $this->db->escape($post['adult']);
		$children = $this->db->escape($post['children']);
		$infant = $this->db->escape($post['infant']);
		$arrival_flight = $this->db->escape($post['arrival_flight']);
		$arrival_time = $this->db->escape($post['arrival_time']);
		$departure_flight = $this->db->escape($post['departure_flight']);
		$departure_time = $this->db->escape($post['departure_time']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET 
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett_aud = $revenue_nett_aud,
				revenue_gross_aud = $revenue_gross_aud,
				revenue_nett_usd = $revenue_nett_usd,
				revenue_gross_usd = $revenue_gross_usd,
				adult =$adult,
				children = $children,
				infant = $infant,
				arrival_flight = $arrival_flight,
				arrival_time = $arrival_time,
				departure_flight = $departure_flight,
				departure_time = $departure_time,
				remarks = $remarks,
				balivillaescapes_last_modified = NOW(),
				balivillaescapes_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Extend
	public function edit_extend($post, $report_id){
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$payment_id = $this->db->escape($post['payment_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett_aud = $this->db->escape($post['revenue_nett_aud']);
		$revenue_gross_aud = $this->db->escape($post['revenue_gross_aud']);
		$revenue_nett_usd = $this->db->escape($post['revenue_nett_usd']);
		$revenue_gross_usd = $this->db->escape($post['revenue_gross_usd']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes SET 
				checkin = $checkin,
				checkout = $checkout,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett_aud = $revenue_nett_aud,
				revenue_gross_aud = $revenue_gross_aud,
				revenue_nett_usd = $revenue_nett_usd,
				revenue_gross_usd = $revenue_gross_usd,
				remarks = $remarks,
				balivillaescapes_last_modified = NOW(),
				balivillaescapes_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

}