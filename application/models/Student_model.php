<?php

	
	// Codes Written by : Mubbarak Aminu 
// date : 31 December 2017


 Class Student_model extends CI_model{
	 
	 //fetching data for the admin dashboard
	 public function Ev_index(){
		 	
			//fetch all authorization activities for admin
			
		 
		 }

		 public function check(){
		 	return $this->db->count_all('vote_count_asis_fin_sec');
		 }

/*	public function candidate_details($candidate_id){
		$this->db->select('*');
		$this->db->from('president_canditate');
		$this->db->where('id', $student_id);

		$query = $this->db->get();

		return $query->result_array();
	}	*/ 



	public function search_student($reg_num){
			$this->db->select('*');
			$this->db->from('all_students');
			$this->db->where('reg_no', $reg_num);
			

			$query = $this->db->get();

			return $query->row();

	}








	}
	
?>	 