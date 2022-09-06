<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_insert_bvo extends CI_Model {

	public function add_enquiry($post){
		$reservation_id = $this->db->escape($post['reservation_id']);
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = date("Y-m-d");
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$remarks = $this->db->escape($post['remarks']);
		$balivillasonline_modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO balivillasonline (report_id, reservation_id, guest_name, enquiry_date, guest_email, phone, nationality_id, villa_id, checkin, checkout, status_enquiry_id, remarks, balivillasonline_last_modified, balivillasonline_modified_by, balivillasonline_status) 
			VALUES (NULL, $reservation_id, $guest_name, '$enquiry_date', $guest_email, $phone, $nationality_id, $villa_id, $checkin, $checkout, '1', $remarks, NOW(), '$balivillasonline_modified_by', '1')");
		if($sql)
		return true;
		return false;
	}

	public function propose($post){
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
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett = $this->db->escape($post['revenue_nett']);
		$revenue_gross = $this->db->escape($post['revenue_gross']);
		$adult = $this->db->escape($post['adult']);
		$children = $this->db->escape($post['children']);
		$infant = $this->db->escape($post['infant']);
		$arrival_flight = $this->db->escape($post['arrival_flight']);
		$arrival_time = $this->db->escape($post['arrival_time']);
		$departure_flight = $this->db->escape($post['departure_flight']);
		$departure_time = $this->db->escape($post['departure_time']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO balivillasonline (report_id, reservation_id, guest_name, enquiry_date, guest_email, phone, nationality_id, villa_id, checkin, checkout, status_enquiry_id, payment_id, confirm_date, revenue_nett, revenue_gross, adult, children, infant, arrival_flight, arrival_time, departure_flight, departure_time, remarks, balivillasonline_last_modified, balivillasonline_modified_by, balivillasonline_status) 
			VALUES (NULL, $reservation_id, $guest_name, '0000-00-00', $guest_email, $phone, $nationality_id, $villa_id, $checkin, $checkout, $status_enquiry_id, $payment_id, $confirm_date, $revenue_nett, $revenue_gross, $adult, $children, $infant, $arrival_flight, $arrival_time, $departure_flight, $departure_time, $remarks, NOW(), '$modified_by', '1')");
		if($sql)
		return true;
		return false;
	}

	public function extend($post){
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
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett = $this->db->escape($post['revenue_nett']);
		$revenue_gross = $this->db->escape($post['revenue_gross']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO balivillasonline (report_id, reservation_id, guest_name, enquiry_date, guest_email, phone, nationality_id, villa_id, checkin, checkout, status_enquiry_id, payment_id, confirm_date, revenue_nett, revenue_gross, remarks, balivillasonline_last_modified, balivillasonline_modified_by, balivillasonline_status) 
			VALUES (NULL, $reservation_id, $guest_name, '0000-00-00', $guest_email, $phone, $nationality_id, $villa_id, $checkin, $checkout, $status_enquiry_id, $payment_id, $confirm_date, $revenue_nett, $revenue_gross, $remarks, NOW(), '$modified_by', '1')");
		if($sql)
		return true;
		return false;
	}

}