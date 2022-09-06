<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_insert_brhv extends CI_Model {

	public function add_enquiry($post){
		$reservation_id = $this->db->escape($post['reservation_id']);
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = date("Y-m-d");
		$source_id = $this->db->escape($post['source_id']);
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$villa_id = $this->db->escape($post['villa_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$remarks = $this->db->escape($post['remarks']);
		$balirealtyhv_modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO balirealtyhv (report_id, reservation_id, guest_name, enquiry_date, source_id, guest_email, phone, nationality_id, villa_id, checkin, checkout, status_enquiry_id, remarks, balirealtyhv_last_modified, balirealtyhv_modified_by, balirealtyhv_status)
			VALUES (NULL, $reservation_id, $guest_name, '$enquiry_date', $source_id, $guest_email, $phone, $nationality_id, $villa_id, $checkin, $checkout, '1', $remarks, NOW(), '$balirealtyhv_modified_by', '1')");
		if($sql)
		return true;
		return false;
	}

	public function propose($post){
		$reservation_id = $this->db->escape($post['reservation_id']);
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = $this->db->escape($post['enquiry_date']);
		$source_id = $this->db->escape($post['source_id']);
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

		$sql = $this->db->query("INSERT INTO balirealtyhv (report_id, reservation_id, guest_name, enquiry_date, source_id, guest_email, phone, nationality_id, villa_id, checkin, checkout, status_enquiry_id, payment_id, confirm_date, revenue_nett, revenue_gross, adult, children, infant, arrival_flight, arrival_time, departure_flight, departure_time, remarks, balirealtyhv_last_modified, balirealtyhv_modified_by, balirealtyhv_status) 
			VALUES (NULL, $reservation_id, $guest_name, '0000-00-00', $source_id, $guest_email, $phone, $nationality_id, $villa_id, $checkin, $checkout, $status_enquiry_id, $payment_id, $confirm_date, $revenue_nett, $revenue_gross, $adult, $children, $infant, $arrival_flight, $arrival_time, $departure_flight, $departure_time, $remarks, NOW(), '$modified_by', '1')");
		if($sql)
		return true;
		return false;
	}

	public function extend($post){
		$reservation_id = $this->db->escape($post['reservation_id']);
		$guest_name = $this->db->escape($post['guest_name']);
		$enquiry_date = $this->db->escape($post['enquiry_date']);
		$source_id = $this->db->escape($post['source_id']);
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

		$sql = $this->db->query("INSERT INTO balirealtyhv (report_id, reservation_id, guest_name, enquiry_date, source_id, guest_email, phone, nationality_id, villa_id, checkin, checkout, status_enquiry_id, payment_id, confirm_date, revenue_nett, revenue_gross, remarks, balirealtyhv_last_modified, balirealtyhv_modified_by, balirealtyhv_status) 
			VALUES (NULL, $reservation_id, $guest_name, '0000-00-00', $source_id, $guest_email, $phone, $nationality_id, $villa_id, $checkin, $checkout, $status_enquiry_id, $payment_id, $confirm_date, $revenue_nett, $revenue_gross, $remarks, NOW(), '$modified_by', '1')");
		if($sql)
		return true;
		return false;
	}

	public function add_villa($post){
		$villa = $this->db->escape($post['villa']);
		$villa_contact = $this->db->escape($post['villa_contact']);
		$address = $this->db->escape($post['address']);
		$website = $this->db->escape($post['website']);
		$availability = $this->db->escape($post['availability']);
		$dropbox = $this->db->escape($post['dropbox']);
		$villa_remarks = $this->db->escape($post['villa_remarks']);
		$villa_promotion = $this->db->escape($post['villa_promotion']);
		$management_id = $this->db->escape($post['management_id']);
		$manager_id = $this->db->escape($post['manager_id']);
		$supervisor_id = $this->db->escape($post['supervisor_id']);
		$butler = $this->db->escape($post['butler']);
		$housekeeper = $this->db->escape($post['housekeeper']);
		$villa_status = $this->db->escape($post['villa_status']);
		$villa_modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO villa (villa_id, villa, villa_contact, address, website, availability, dropbox, villa_remarks, villa_promotion, management_id, manager_id, supervisor_id, butler, housekeeper, villa_status, villa_last_modified, villa_modified_by) 
			VALUES (NULL, $villa, $villa_contact, $address, $website, $availability, $dropbox, $villa_remarks, $villa_promotion, $management_id, $manager_id, $supervisor_id, $butler, $housekeeper, $villa_status, NOW(), '$villa_modified_by')");
		if($sql)
		return true;
		return false;
	}

	public function add_management($post){
		$management = $this->db->escape($post['management']);
		$management_contact = $this->db->escape($post['management_contact']);
		$management_address = $this->db->escape($post['management_address']);
		$management_website = $this->db->escape($post['management_website']);
		$management_availability = $this->db->escape($post['management_availability']);
		$management_dropbox = $this->db->escape($post['management_dropbox']);
		$management_status = $this->db->escape($post['management_status']);
		$management_modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO management (management_id, management, management_contact, management_address, management_website, management_availability, management_dropbox, management_status, management_last_modified, management_modified_by) 
			VALUES (NULL, $management, $management_contact, $management_address, $management_website, $management_availability, $management_dropbox, $management_status, NOW(), '$management_modified_by')");
		if($sql)
		return true;
		return false;
	}

	public function add_source($post){
		$source = $this->db->escape($post['source']);
		$category = $this->db->escape($post['category']);
		$source_status = $this->db->escape($post['source_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO source (source_id, source, category, source_status) 
			VALUES (NULL, $source, $category, $source_status)");
		if($sql)
		return true;
		return false;
	}

	public function add_villa_manager($post){
		$manager = $this->db->escape($post['manager']);
		$manager_phone = $this->db->escape($post['manager_phone']);
		$manager_email = $this->db->escape($post['manager_email']);
		$manager_status = $this->db->escape($post['manager_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO villa_manager (manager_id, manager, manager_phone, manager_email, manager_status) VALUES (NULL, $manager, $manager_phone, $manager_email, $manager_status)");
		if($sql)
		return true;
		return false;
	}

	public function add_villa_supervisor($post){
		$supervisor = $this->db->escape($post['supervisor']);
		$supervisor_phone = $this->db->escape($post['supervisor_phone']);
		$supervisor_email = $this->db->escape($post['supervisor_email']);
		$supervisor_status = $this->db->escape($post['supervisor_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO villa_supervisor (supervisor_id, supervisor, supervisor_phone, supervisor_email, supervisor_status) VALUES (NULL, $supervisor, $supervisor_phone, $supervisor_email, $supervisor_status)");
		if($sql)
		return true;
		return false;
	}

	public function add_discount($post){
		$discount_title = $this->db->escape($post['discount_title']);
		$villa_discount =  $this->db->escape($post['villa_discount']);
		$start_date = $this->db->escape($post['start_date']);
		$end_date = $this->db->escape($post['end_date']);
		$discount_detail = $this->db->escape($post['discount_detail']);
		$discount_remarks = $this->db->escape($post['discount_remarks']);
		$discount_status = $this->db->escape($post['discount_status']);
		$discount_modified_by = $this->session->userdata('name');

		$sql = $this->db->query("INSERT INTO discount (discount_id, discount_title, villa_discount, start_date, end_date, discount_detail, discount_remarks, discount_status, discount_last_modified, discount_modified_by	) VALUES (NULL, $discount_title, $villa_discount, $start_date, $end_date, $discount_detail, $discount_remarks, $discount_status, NOW(), '$discount_modified_by')");
		if($sql)
		return true;
		return false;
	}

}