<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_export extends CI_Model
{
	public function excel_brhv_enquiry($post){
        $this->load->database();
        $this->load->library('Excel_generator');

        $reservation 		=   $this->input->post('reservation');
		$guest_name    		=   $this->input->post('guest_name');
		$villa  	 		=   $this->input->post('villa');
		$source 			=   $this->input->post('source');
		$status_enquiry		=   $this->input->post('status_enquiry');
		$enquiry_start 		=   $this->input->post('enquiry_start');
		$enquiry_end  		=   $this->input->post('enquiry_end');
		$checkin_start 		=   $this->input->post('checkin_start');
		$checkin_end  		=   $this->input->post('checkin_end');
		$checkout_start 	=   $this->input->post('checkout_start');
		$checkout_end 		=   $this->input->post('checkout_end');

		if (empty($enquiry_start)) { $enquiry_start = "0000-00-00"; }
		if (empty($enquiry_end)) { $enquiry_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($checkin_start)) { $checkin_start = "0000-00-00"; }
		if (empty($checkin_end)) { $checkin_end = date('Y-m-d', strtotime('+5 year')); }

		if (empty($checkout_start)) { $checkout_start = "0000-00-00"; }
		if (empty($checkout_end)) { $checkout_end = date('Y-m-d', strtotime('+5 year')); }

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
        $this->db->LIKE('user.name', $reservation);
		$this->db->LIKE('balirealtyhv.guest_name', $guest_name);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->LIKE('source.source', $source);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balirealtyhv.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balirealtyhv.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balirealtyhv.checkin >=', $checkin_start);
		$this->db->WHERE('balirealtyhv.checkin <=', $checkin_end);
		$this->db->WHERE('balirealtyhv.checkout >=', $checkout_start);
		$this->db->WHERE('balirealtyhv.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->WHERE('balirealtyhv_status', '1');

		$this->db->ORDER_BY('guest_name', 'ASC');
		$query = $this->db->get('balirealtyhv');

        $this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array('report_id', 'name', 'guest_name', 'enquiry_date', 'source', 'guest_email', 'phone', 'nationality', 'villa', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'status_other'));

        $this->excel_generator->set_column(array('report_id', 'name', 'guest_name', 'enquiry_date', 'source', 'guest_email', 'phone', 'nationality', 'villa', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'status_other'));

        $this->excel_generator->set_width(array(10, 25, 25, 20, 20, 30, 30, 20, 35, 20, 20, 20, 25, 30, 20, 15, 15, 50, 25));
        $this->excel_generator->exportTo2003('Excel - BRHV Guest Details');
    }

    public function excel_brhv_confirm($post){
        $this->load->database();
        $this->load->library('Excel_generator');

        $reservation 		=   $this->input->post('reservation');
		$guest_name    		=   $this->input->post('guest_name');
		$villa  	 		=   $this->input->post('villa');
		$source 			=   $this->input->post('source');
		$status_enquiry		=   $this->input->post('status_enquiry');
		$enquiry_start 		=   $this->input->post('enquiry_start');
		$enquiry_end  		=   $this->input->post('enquiry_end');
		$confirm_start 		=   $this->input->post('confirm_start');
		$confirm_end  		=   $this->input->post('confirm_end');
		$checkin_start 		=   $this->input->post('checkin_start');
		$checkin_end  		=   $this->input->post('checkin_end');
		$checkout_start 	=   $this->input->post('checkout_start');
		$checkout_end 		=   $this->input->post('checkout_end');

		if (empty($enquiry_start)) { $enquiry_start = "0000-00-00"; }
		if (empty($enquiry_end)) { $enquiry_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($confirm_start)) { $confirm_start = "0000-00-00"; }
		if (empty($confirm_end)) { $confirm_end = date('Y')."-".date('m')."-".date('d'); }

		if (empty($checkin_start)) { $checkin_start = "0000-00-00"; }
		if (empty($checkin_end)) { $checkin_end = date('Y-m-d', strtotime('+5 year')); }

		if (empty($checkout_start)) { $checkout_start = "0000-00-00"; }
		if (empty($checkout_end)) { $checkout_end = date('Y-m-d', strtotime('+5 year')); }

		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');
        $this->db->LIKE('user.name', $reservation);
		$this->db->LIKE('balirealtyhv.guest_name', $guest_name);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->LIKE('source.source', $source);
		$this->db->LIKE('villa.villa', $villa);
		$this->db->WHERE('balirealtyhv.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balirealtyhv.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balirealtyhv.checkin >=', $checkin_start);
		$this->db->WHERE('balirealtyhv.checkin <=', $checkin_end);
		$this->db->WHERE('balirealtyhv.checkout >=', $checkout_start);
		$this->db->WHERE('balirealtyhv.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Open' 
						AND status_enquiry.status_enquiry!='Hold' 
						AND status_enquiry.status_enquiry!='Outstanding' 
						AND status_enquiry.status_enquiry!='Cancel' 
						AND status_enquiry.status_enquiry!='Decision Pending')");
		$this->db->WHERE('balirealtyhv.confirm_date >=', $confirm_start);
		$this->db->WHERE('balirealtyhv.confirm_date <=', $confirm_end);
		$this->db->WHERE('balirealtyhv_status', '1');

		$this->db->ORDER_BY('guest_name', 'ASC');
		$query = $this->db->get('balirealtyhv');

        $this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array('report_id', 'name', 'guest_name', 'enquiry_date', 'source', 'guest_email', 'phone', 'nationality', 'villa', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'adult', 'children', 'infant', 'arrival_flight',  'arrival_time', 'departure_flight',  'departure_time', 'status_other'));

        $this->excel_generator->set_column(array('report_id', 'name', 'guest_name', 'enquiry_date', 'source', 'guest_email', 'phone', 'nationality', 'villa', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'adult', 'children', 'infant', 'arrival_flight',  'arrival_time', 'departure_flight',  'departure_time', 'status_other'));

        $this->excel_generator->set_width(array(10, 25, 25, 20, 20, 30, 30, 20, 35, 20, 20, 20, 25, 30, 20, 15, 15, 50, 20, 20, 20, 20, 20, 20, 20, 25));
        $this->excel_generator->exportTo2003('Excel - BRHV Guest Details');
    }

    public function excel_bve_enquiry($post){
        $this->load->database();
        $this->load->library('Excel_generator');

        $reservation 		=   $this->input->post('reservation');
		$guest_name    		=   $this->input->post('guest_name');
		$villa  	 		=   $this->input->post('villa');
		$management  	 	=   $this->input->post('management');
		$status_enquiry		=   $this->input->post('status_enquiry');
		$enquiry_start 		=   $this->input->post('enquiry_start');
		$enquiry_end  		=   $this->input->post('enquiry_end');
		$checkin_start 		=   $this->input->post('checkin_start');
		$checkin_end  		=   $this->input->post('checkin_end');
		$checkout_start 	=   $this->input->post('checkout_start');
		$checkout_end 		=   $this->input->post('checkout_end');

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
		$this->db->LIKE('management.management', $management);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillaescapes.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillaescapes.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillaescapes.checkin >=', $checkin_start);
		$this->db->WHERE('balivillaescapes.checkin <=', $checkin_end);
		$this->db->WHERE('balivillaescapes.checkout >=', $checkout_start);
		$this->db->WHERE('balivillaescapes.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->WHERE('balivillaescapes_status', '1');

		$this->db->ORDER_BY('guest_name', 'ASC');
		$query = $this->db->get('balivillaescapes');

        $this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'management', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett_aud', 'revenue_gross_aud', 'revenue_nett_usd', 'revenue_gross_usd', 'remarks', 'status_other'));

        $this->excel_generator->set_column(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'management', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett_aud', 'revenue_gross_aud', 'revenue_nett_usd', 'revenue_gross_usd', 'remarks', 'status_other'));

        $this->excel_generator->set_width(array(10, 25, 25, 20, 20, 30, 30, 20, 35, 20, 20, 20, 25, 30, 20, 15, 15, 15, 15, 50, 25));
        $this->excel_generator->exportTo2003('Excel - BVE Guest Details');
    }

    public function excel_bve_confirm($post){
        $this->load->database();
        $this->load->library('Excel_generator');

        $reservation 		=   $this->input->post('reservation');
		$guest_name    		=   $this->input->post('guest_name');
		$villa  	 		=   $this->input->post('villa');
		$management  	 	=   $this->input->post('management');
		$status_enquiry		=   $this->input->post('status_enquiry');
		$enquiry_start 		=   $this->input->post('enquiry_start');
		$enquiry_end 		=   $this->input->post('enquiry_end');
		$confirm_start 		=   $this->input->post('confirm_start');
		$confirm_end  		=   $this->input->post('confirm_end');
		$enquiry_end  		=   $this->input->post('enquiry_end');
		$checkin_start 		=   $this->input->post('checkin_start');
		$checkin_end  		=   $this->input->post('checkin_end');
		$checkout_start 	=   $this->input->post('checkout_start');
		$checkout_end 		=   $this->input->post('checkout_end');

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
		$this->db->LIKE('management.management', $management);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillaescapes.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillaescapes.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillaescapes.checkin >=', $checkin_start);
		$this->db->WHERE('balivillaescapes.checkin <=', $checkin_end);
		$this->db->WHERE('balivillaescapes.checkout >=', $checkout_start);
		$this->db->WHERE('balivillaescapes.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Open' 
						AND status_enquiry.status_enquiry!='Hold' 
						AND status_enquiry.status_enquiry!='Outstanding' 
						AND status_enquiry.status_enquiry!='Cancel' 
						AND status_enquiry.status_enquiry!='Decision Pending')");
		$this->db->WHERE('balivillaescapes.confirm_date >=', $confirm_start);
		$this->db->WHERE('balivillaescapes.confirm_date <=', $confirm_end);
		$this->db->WHERE('balivillaescapes_status', '1');

		$this->db->ORDER_BY('guest_name', 'ASC');
		$query = $this->db->get('balivillaescapes');

        $this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'management', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett_aud', 'revenue_gross_aud', 'revenue_nett_usd', 'revenue_gross_usd', 'remarks', 'adult', 'children', 'infant', 'arrival_flight',  'arrival_time', 'departure_flight',  'departure_time', 'status_other'));

        $this->excel_generator->set_column(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'management', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett_aud', 'revenue_gross_aud', 'revenue_nett_usd', 'revenue_gross_usd', 'remarks', 'adult', 'children', 'infant', 'arrival_flight',  'arrival_time', 'departure_flight',  'departure_time', 'status_other'));

        $this->excel_generator->set_width(array(10, 25, 25, 20, 20, 30, 30, 20, 20, 20, 35, 20, 20, 20, 25, 30, 20, 15, 15, 15, 15, 50, 20, 20, 20, 20, 20, 20, 20, 25));
        $this->excel_generator->exportTo2003('Excel - BVE Guest Details');
    }

    public function excel_bvo_enquiry($post){
        $this->load->database();
        $this->load->library('Excel_generator');

        $reservation 		=   $this->input->post('reservation');
		$guest_name    		=   $this->input->post('guest_name');
		$villa  	 		=   $this->input->post('villa');
		$management  	 	=   $this->input->post('management');
		$status_enquiry		=   $this->input->post('status_enquiry');
		$enquiry_start 		=   $this->input->post('enquiry_start');
		$enquiry_end  		=   $this->input->post('enquiry_end');
		$checkin_start 		=   $this->input->post('checkin_start');
		$checkin_end  		=   $this->input->post('checkin_end');
		$checkout_start 	=   $this->input->post('checkout_start');
		$checkout_end 		=   $this->input->post('checkout_end');

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
		$this->db->LIKE('management.management', $management);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillasonline.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillasonline.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillasonline.checkin >=', $checkin_start);
		$this->db->WHERE('balivillasonline.checkin <=', $checkin_end);
		$this->db->WHERE('balivillasonline.checkout >=', $checkout_start);
		$this->db->WHERE('balivillasonline.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry.status_enquiry!='Confirm' 
						AND status_enquiry.status_enquiry!='Proposed' 
						AND status_enquiry.status_enquiry!='Extend Stay')");
		$this->db->WHERE('balivillasonline_status', '1');

		$this->db->ORDER_BY('guest_name', 'ASC');
		$query = $this->db->get('balivillasonline');

        $this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'status_other'));

        $this->excel_generator->set_column(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'status_other'));

        $this->excel_generator->set_width(array(10, 25, 25, 20, 20, 30, 30, 20, 35, 20, 20, 20, 25, 30, 20, 15, 15, 50, 25));
        $this->excel_generator->exportTo2003('Excel - AHR Guest Details');
    }

    public function excel_bvo_confirm($post){
        $this->load->database();
        $this->load->library('Excel_generator');

        $reservation 		=   $this->input->post('reservation');
		$guest_name    		=   $this->input->post('guest_name');
		$villa  	 		=   $this->input->post('villa');
		$management  	 	=   $this->input->post('management');
		$status_enquiry		=   $this->input->post('status_enquiry');
		$enquiry_start 		=   $this->input->post('enquiry_start');
		$enquiry_end  		=   $this->input->post('enquiry_end');
		$confirm_start 		=   $this->input->post('confirm_start');
		$confirm_end  		=   $this->input->post('confirm_end');
		$checkin_start 		=   $this->input->post('checkin_start');
		$checkin_end  		=   $this->input->post('checkin_end');
		$checkout_start 	=   $this->input->post('checkout_start');
		$checkout_end 		=   $this->input->post('checkout_end');

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
		$this->db->LIKE('management.management', $management);
		$this->db->LIKE('status_enquiry.status_enquiry', $status_enquiry);
		$this->db->WHERE('balivillasonline.enquiry_date >=', $enquiry_start);
		$this->db->WHERE('balivillasonline.enquiry_date <=', $enquiry_end);
		$this->db->WHERE('balivillasonline.checkin >=', $checkin_start);
		$this->db->WHERE('balivillasonline.checkin <=', $checkin_end);
		$this->db->WHERE('balivillasonline.checkout >=', $checkout_start);
		$this->db->WHERE('balivillasonline.checkout <=', $checkout_end);
		$this->db->WHERE("(status_enquiry!='Enquiry' 
						AND status_enquiry!='Open' 
						AND status_enquiry!='Hold' 
						AND status_enquiry!='Outstanding' 
						AND status_enquiry!='Cancel' 
						AND status_enquiry!='Decision Pending')");
		$this->db->WHERE('balivillasonline.confirm_date >=', $confirm_start);
		$this->db->WHERE('balivillasonline.confirm_date <=', $confirm_end);
		$this->db->WHERE('balivillasonline_status', '1');

		$this->db->ORDER_BY('guest_name', 'ASC');
		$query = $this->db->get('balivillasonline');

        $this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'management', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'adult', 'children', 'infant', 'arrival_flight',  'arrival_time', 'departure_flight',  'departure_time', 'status_other'));

        $this->excel_generator->set_column(array('report_id', 'name', 'guest_name', 'enquiry_date', 'guest_email', 'phone', 'nationality', 'villa', 'management', 'checkin', 'checkout', 'status_enquiry', 'payment', 'cancelation', 'confirm_date', 'revenue_nett', 'revenue_gross', 'remarks', 'adult', 'children', 'infant', 'arrival_flight',  'arrival_time', 'departure_flight',  'departure_time', 'status_other'));

        $this->excel_generator->set_width(array(10, 25, 25, 20, 20, 30, 30, 20, 35, 20, 20, 20, 25, 30, 20, 15, 15, 50, 20, 20, 20, 20, 20, 20, 20, 25));
        $this->excel_generator->exportTo2003('Excel - BVO Guest Details');
    }

		
	/*======================================================================*/
    public function pdf_brhv_report($report_id){
		$this->db->join('user', 'user.user_id = balirealtyhv.reservation_id', 'left');
		$this->db->join('nationality', 'nationality.nationality_id = balirealtyhv.nationality_id', 'left');
		$this->db->join('source', 'source.source_id = balirealtyhv.source_id', 'left');
		$this->db->join('villa', 'villa.villa_id = balirealtyhv.villa_id', 'left');
		$this->db->join('villa_manager', 'villa_manager.manager_id = villa.manager_id', 'left');
		$this->db->join('villa_supervisor', 'villa_supervisor.supervisor_id = villa.supervisor_id', 'left');
		$this->db->join('status_enquiry', 'status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id', 'left');
		$this->db->join('payment', 'payment.payment_id = balirealtyhv.payment_id', 'left');
		$this->db->join('cancelation', 'cancelation.cancelation_id = balirealtyhv.cancelation_id', 'left');
		$this->db->join('status_other', 'status_other.status_other_id = balirealtyhv.balirealtyhv_status', 'left');

		$this->db->where("(status_enquiry.status_enquiry!='Enquiry' 
						AND status_enquiry.status_enquiry!='Open' 
						AND status_enquiry.status_enquiry!='Hold' 
						AND status_enquiry.status_enquiry!='Outstanding' 
						AND status_enquiry.status_enquiry!='Cancel' 
						AND status_enquiry.status_enquiry!='Decision Pending')");
		$this->db->where('balirealtyhv.balirealtyhv_status', '1');
		$this->db->where('balirealtyhv.report_id', intval($report_id));
		$sql = $this->db->get('balirealtyhv');
		return $sql->row_array();
	}

}