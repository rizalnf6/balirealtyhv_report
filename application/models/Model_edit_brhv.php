<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_edit_brhv extends CI_Model {

	public function process_enquiry($report_id){
		$session_login = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balirealtyhv 
				SET balirealtyhv_last_modified=NOW(), 
				balirealtyhv_modified_by='$session_login', 
				status_enquiry_id='2' 
				WHERE report_id= ".intval($report_id));
			return true;
	}

	//Edit Enquiry
	public function admin_edit_enquiry($post, $report_id){
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
		$cancelation_id = $this->db->escape($post['cancelation_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett = $this->db->escape($post['revenue_nett']);
		$revenue_gross = $this->db->escape($post['revenue_gross']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balirealtyhv SET 
				reservation_id = $reservation_id,
				guest_name = $guest_name,
				enquiry_date = $enquiry_date,
				source_id = $source_id,
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
				revenue_nett = $revenue_nett,
				revenue_gross = $revenue_gross,
				remarks = $remarks,
				balirealtyhv_last_modified = NOW(),
				balirealtyhv_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Enquiry
	public function reservation_edit_enquiry($post, $report_id){
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
		$cancelation_id = $this->db->escape($post['cancelation_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett = $this->db->escape($post['revenue_nett']);
		$revenue_gross = $this->db->escape($post['revenue_gross']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balirealtyhv SET 
				reservation_id = $reservation_id,
				guest_name = $guest_name,
				enquiry_date = $enquiry_date,
				source_id = $source_id,
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
				revenue_nett = $revenue_nett,
				revenue_gross = $revenue_gross,
				remarks = $remarks,
				balirealtyhv_last_modified = NOW(),
				balirealtyhv_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Confirm
	public function admin_edit_confirm($post, $report_id){
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
		$confirm_date = $this->db->escape($post['confirm_date']);
		$payment_id = $this->db->escape($post['payment_id']);
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

		$sql = $this->db->query("UPDATE balirealtyhv SET 
				guest_name = $guest_name,
				enquiry_date = $enquiry_date,
				source_id = $source_id,
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				status_enquiry_id = $status_enquiry_id,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett = $revenue_nett,
				revenue_gross = $revenue_gross,
				adult =$adult,
				children = $children,
				infant = $infant,
				arrival_flight = $arrival_flight,
				arrival_time = $arrival_time,
				departure_flight = $departure_flight,
				departure_time = $departure_time,
				remarks = $remarks,
				balirealtyhv_last_modified = NOW(),
				balirealtyhv_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Confirm
	public function reservation_edit_confirm($post, $report_id){
		$guest_name = $this->db->escape($post['guest_name']);
		$guest_email = $this->db->escape($post['guest_email']);
		$phone = $this->db->escape($post['phone']);
		$nationality_id = $this->db->escape($post['nationality_id']);
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$status_enquiry_id = $this->db->escape($post['status_enquiry_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$payment_id = $this->db->escape($post['payment_id']);
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

		$sql = $this->db->query("UPDATE balirealtyhv SET 
				guest_name = $guest_name,
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				checkin = $checkin,
				checkout = $checkout,
				status_enquiry_id = $status_enquiry_id,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett = $revenue_nett,
				revenue_gross = $revenue_gross,
				adult =$adult,
				children = $children,
				infant = $infant,
				arrival_flight = $arrival_flight,
				arrival_time = $arrival_time,
				departure_flight = $departure_flight,
				departure_time = $departure_time,
				remarks = $remarks,
				balirealtyhv_last_modified = NOW(),
				balirealtyhv_modified_by = '$modified_by'
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

		$sql = $this->db->query("UPDATE balirealtyhv SET 
				guest_email = $guest_email,
				phone = $phone,
				nationality_id = $nationality_id,
				villa_id = $villa_id,
				checkin = $checkin,
				checkout = $checkout,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett = $revenue_nett,
				revenue_gross = $revenue_gross,
				adult =$adult,
				children = $children,
				infant = $infant,
				arrival_flight = $arrival_flight,
				arrival_time = $arrival_time,
				departure_flight = $departure_flight,
				departure_time = $departure_time,
				remarks = $remarks,
				balirealtyhv_last_modified = NOW(),
				balirealtyhv_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	//Edit Extend
	public function edit_extend($post, $report_id){
		$checkin = $this->db->escape($post['checkin']);
		$checkout = $this->db->escape($post['checkout']);
		$payment_id = $this->db->escape($post['payment_id']);
		$confirm_date = $this->db->escape($post['confirm_date']);
		$revenue_nett = $this->db->escape($post['revenue_nett']);
		$revenue_gross = $this->db->escape($post['revenue_gross']);
		$remarks = $this->db->escape($post['remarks']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balirealtyhv SET 
				checkin = $checkin,
				checkout = $checkout,
				payment_id = $payment_id,
				confirm_date = $confirm_date,
				revenue_nett = $revenue_nett,
				revenue_gross = $revenue_gross,
				remarks = $remarks,
				balirealtyhv_last_modified = NOW(),
				balirealtyhv_modified_by = '$modified_by'
				WHERE report_id = ".intval($report_id));
		return true;
	}

	public function villa($post, $villa_id){
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
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE villa SET 
				villa = $villa,
				villa_contact = $villa_contact,
				address = $address,
				website = $website,
				availability = $availability,
				dropbox = $dropbox,
				villa_remarks = $villa_remarks,
				villa_promotion = $villa_promotion,
				management_id = $management_id,
				manager_id = $manager_id,
				supervisor_id = $supervisor_id,
				butler = $butler,
				housekeeper = $housekeeper,
				villa_status = $villa_status,
				villa_last_modified = NOW(),
				villa_modified_by = '$modified_by'
				WHERE villa_id = ".intval($villa_id));
		return true;
	}

	public function management($post, $management_id){
		$management = $this->db->escape($post['management']);
		$management_contact = $this->db->escape($post['management_contact']);
		$management_address = $this->db->escape($post['management_address']);
		$management_website = $this->db->escape($post['management_website']);
		$management_availability = $this->db->escape($post['management_availability']);
		$management_dropbox = $this->db->escape($post['management_dropbox']);
		$management_status = $this->db->escape($post['management_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE management SET 
				management = $management,
				management_contact = $management_contact,
				management_address = $management_address,
				management_website = $management_website,
				management_availability = $management_availability,
				management_dropbox = $management_dropbox,
				management_status = $management_status,
				management_last_modified = NOW(),
				management_modified_by = '$modified_by'
				WHERE management_id = ".intval($management_id));
		return true;
	}

	public function source($post, $source_id){
		$source = $this->db->escape($post['source']);
		$category = $this->db->escape($post['category']);
		$source_status = $this->db->escape($post['source_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE source SET 
				source = $source,
				category = $category,
				source_status = $source_status
				WHERE source_id = ".intval($source_id));
		return true;
	}

	public function villa_manager($post, $manager_id){
		$manager = $this->db->escape($post['manager']);
		$manager_phone = $this->db->escape($post['manager_phone']);
		$manager_email = $this->db->escape($post['manager_email']);
		$manager_status = $this->db->escape($post['manager_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE villa_manager SET 
				manager = $manager,
				manager_phone = $manager_phone,
				manager_email = $manager_email,
				manager_status = $manager_status
				WHERE manager_id = ".intval($manager_id));
		return true;
	}

	public function villa_supervisor($post, $supervisor_id){
		$supervisor = $this->db->escape($post['supervisor']);
		$supervisor_phone = $this->db->escape($post['supervisor_phone']);
		$supervisor_email = $this->db->escape($post['supervisor_email']);
		$supervisor_status = $this->db->escape($post['supervisor_status']);
		$modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE villa_supervisor SET 
				supervisor = $supervisor,
				supervisor_phone = $supervisor_phone,
				supervisor_email = $supervisor_email,
				supervisor_status = $supervisor_status
				WHERE supervisor_id = ".intval($supervisor_id));
		return true;
	}

	public function discount($post, $discount_id){
		$discount_title = $this->db->escape($post['discount_title']);
		$villa_discount = $this->db->escape($post['villa_discount']);
		$start_date = $this->db->escape($post['start_date']);
		$end_date = $this->db->escape($post['end_date']);
		$discount_detail = $this->db->escape($post['discount_detail']);
		$discount_remarks = $this->db->escape($post['discount_remarks']);
		$discount_status = $this->db->escape($post['discount_status']);
		$discount_modified_by = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE discount SET 
				discount_title = $discount_title,
				villa_discount = $villa_discount,
				start_date = $start_date,
				end_date = $end_date,
				discount_detail = $discount_detail,
				discount_remarks = $discount_remarks,
				discount_status = $discount_status,
				discount_last_modified = NOW(),
				discount_modified_by = '$discount_modified_by'
				WHERE discount_id = ".intval($discount_id));
		return true;
	}

}