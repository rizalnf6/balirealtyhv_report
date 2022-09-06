<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_delete extends CI_Model {

	public function admin_brhv_delete_enquiry($report_id){
		$session_login = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balirealtyhv 
				SET balirealtyhv_last_modified=NOW(), 
				balirealtyhv_modified_by='$session_login', 
				balirealtyhv_status='2' 
				WHERE report_id= ".intval($report_id));
			return true;
	}

	public function admin_bve_delete_enquiry($report_id){
		$session_login = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillaescapes 
				SET balivillaescapes_last_modified=NOW(), 
				balivillaescapes_modified_by='$session_login', 
				balivillaescapes_status='2' 
				WHERE report_id= ".intval($report_id));
			return true;
	}

	public function admin_bvo_delete_enquiry($report_id){
		$session_login = $this->session->userdata('name');

		$sql = $this->db->query("UPDATE balivillasonline 
				SET balivillasonline_last_modified=NOW(), 
				balivillasonline_modified_by='$session_login', 
				balivillasonline_status='2' 
				WHERE report_id= ".intval($report_id));
			return true;
	}

}