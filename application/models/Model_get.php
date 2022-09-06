<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_get extends CI_Model
{
	public function reservation_admin(){
		$sql = $this->db->query("SELECT * FROM user WHERE level='reservation' ORDER BY name ASC");
		return $sql->result_array();
	}

	public function reservation(){
		$sql = $this->db->query("SELECT * FROM user WHERE level='reservation' AND user_status='1' ORDER BY name ASC");
		return $sql->result_array();
	}

	public function reservation_login(){
		$reservation_login = $this->session->userdata('name');

		$sql = $this->db->query("SELECT * FROM user WHERE name='$reservation_login' AND level='reservation' AND user_status='1' ORDER BY name ASC");
		return $sql->result_array();
	}

	public function reservation_login_report(){
		$reservation_login = $this->session->userdata('name');

		$sql = $this->db->query("SELECT * FROM user WHERE name='$reservation_login' AND level='reservation' AND user_status='1' ORDER BY name ASC");
		return $sql->result();
	}

	public function reservation_report(){
		$sql = $this->db->query("SELECT * FROM user WHERE level='reservation' AND user_status='1' ORDER BY name ASC");
		return $sql->result();
	}

	public function villa_manager(){
		$sql = $this->db->query("SELECT * FROM villa_manager WHERE manager_status='1' ORDER BY manager ASC");
		return $sql->result_array();
	}

	public function villa_supervisor(){
		$sql = $this->db->query("SELECT * FROM villa_supervisor WHERE supervisor_status='1' ORDER BY supervisor ASC");
		return $sql->result_array();
	}	

	public function nationality(){
		$sql = $this->db->query("SELECT * FROM nationality WHERE nationality_status='1' ORDER BY nationality ASC");
		return $sql->result_array();
	}

	public function source(){
		$sql = $this->db->query("SELECT * FROM source WHERE source_status='1' ORDER BY source ASC");
		return $sql->result_array();
	}

	public function website_report(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='2' AND source_status='1' ORDER BY source ASC");
		return $sql->result();
	}

	public function agent_report(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='1' AND source_status='1' ORDER BY source ASC");
		return $sql->result();
	}

	public function source_ota_report(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='3' AND source_status='1' ORDER BY source ASC");
		return $sql->result();
	}

	public function source_others_report(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='4' AND source_status='1' ORDER BY source ASC");
		return $sql->result();
	}

	public function villa_brhv(){
		$sql = $this->db->query("SELECT * FROM villa LEFT JOIN management ON management.management_id=villa.management_id WHERE villa_status='1' AND management.management='Bali realty Holiday Villas' ORDER BY villa ASC");
		return $sql->result_array();
	}

	public function villa_bve(){
		$sql = $this->db->query("SELECT * FROM villa LEFT JOIN management ON management.management_id=villa.management_id WHERE villa_status='1' ORDER BY villa ASC");
		return $sql->result_array();
	}

	public function source_agent(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='1' AND source_id IN ('34','48','101','108','61','117','68','54','85','43','122') AND source_status='1' ORDER BY source ASC");
		return $sql->result_array();
	}

	public function source_ota(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='3' AND source_status='1' ORDER BY source ASC");
		return $sql->result_array();
	}

	public function source_others(){
		$sql = $this->db->query("SELECT * FROM source WHERE category='4' AND source_status='1' ORDER BY source ASC");
		return $sql->result_array();
	}

	public function status_general(){
		$sql = $this->db->query("SELECT * FROM status_enquiry WHERE (status_enquiry!='Extend Stay' AND status_enquiry!='Proposed') AND status_status='1' ORDER BY status_enquiry ASC");
		return $sql->result_array();
	}

	public function status_filter_enquiry(){
		$sql = $this->db->query("SELECT * FROM status_enquiry WHERE (status_enquiry!='Enquiry' AND status_enquiry!='Confirm' AND status_enquiry!='Extend Stay' AND status_enquiry!='Proposed') AND status_status='1' ORDER BY status_enquiry ASC");
		return $sql->result_array();
	}

	public function status_filter_confirm(){
		$sql = $this->db->query("SELECT * FROM status_enquiry WHERE (status_enquiry!='Enquiry' AND status_enquiry!='Open' AND status_enquiry!='Hold' AND status_enquiry!='Outstanding' AND status_enquiry!='Cancel' AND status_enquiry!='Decision Pending') AND status_status='1' ORDER BY status_enquiry ASC");
		return $sql->result_array();
	}

	public function status_propose_extend(){
		$sql = $this->db->query("SELECT * FROM status_enquiry WHERE status_status='1' ORDER BY status_enquiry ASC");
		return $sql->result_array();
	}

	public function status_other(){
		$sql = $this->db->query("SELECT * FROM status_other ORDER BY status_other ASC");
		return $sql->result_array();
	}

	public function source_category(){
		$sql = $this->db->query("SELECT * FROM source_category ORDER BY source_category ASC");
		return $sql->result_array();
	}

	public function category_villa(){
		$sql = $this->db->query("SELECT * FROM category_villa ORDER BY category_villa ASC");
		return $sql->result_array();
	}

	public function payment(){
		$sql = $this->db->query("SELECT * FROM payment WHERE payment_status='1' ORDER BY payment ASC");
		return $sql->result_array();
	}

	public function cancelation(){
		$sql = $this->db->query("SELECT * FROM cancelation WHERE cancelation_status='1' ORDER BY cancelation ASC");
		return $sql->result_array();
	}

	public function cancelation_report(){
		$sql = $this->db->query("SELECT * FROM cancelation WHERE cancelation_status='1' ORDER BY cancelation ASC");
		return $sql->result();
	}

	public function management(){
		$sql = $this->db->query("SELECT * FROM management WHERE management_status='1' ORDER BY management ASC");
		return $sql->result_array();
	}


}