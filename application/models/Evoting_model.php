<?php

	
	// codes created by : Mubbarak Aminu 
// date : 31 December 2017


 Class Evoting_model extends CI_model{
	 
	 //fetching data for the admin dashboard
	 public function Ev_index(){
		 	
			//fetch all authorization activities for admin
			
		 
		 }

	public function stud_fullname($student_id){
			$this->db->select('full_name');
			$this->db->from('all_students');
			$this->db->where('id', $student_id);

			 $query = $this->db->get();
			 return $query->row();

	}	 


	public function vote_status_pre($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_president');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}	 


	public function pre_candidate(){
		$this->db->select('*', 'all_students.*');
		$this->db->from('president_canditate');
		$this->db->join('all_students', 'president_canditate.student_id = all_students.id');

		$query = $this->db->get();

		return $query->result_array();


	}


	public function president_vote($data){
		$insert = $this->db->insert('vote_counts_president', $data);

			if($insert){

				return true;
			
			}else{

				return false;

			}
	}

	public function vote_status_vp($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_vp_president');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}	 


	public function vp_candidate(){
			$this->db->select('*', 'all_students*');
			$this->db->from('vice_presi_cand');
			$this->db->join('all_students', 'vice_presi_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();
	}

	public function vp_vote($data){
				$insert = $this->db->insert('vote_counts_vp_president', $data);

				if($insert){

					return true;

				}else{

					return false;

				}
		}


		public function update_cand_pre($id, $data){
				$this->db->where('id', $id);
				$this->db->update('president_canditate', $data);

		}


		public function update_cand_vp($id, $data){
				$this->db->where('id', $id);
				$this->db->update('vice_presi_cand', $data);

		}

		public function vote_status_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_sec_gen');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


	// database interaction for sec gen position

	public function sec_gen_candidate(){
			$this->db->select("*");
			$this->db->from("sec_gen_cand");
			$this->db->join('all_students', 'sec_gen_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	


	public function sec_gen_vote($data){
			$insert = $this->db->insert('vote_counts_sec_gen', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_secgen($id, $data){
				$this->db->where('id', $id);
				$this->db->update('sec_gen_cand', $data);

		}


	// database interaction for sec gen position
		public function vote_status_fin_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_fin_sec');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


			//collecting all candidate for the position of fin sec
			public function fin_sec_candidate(){
			$this->db->select("*");
			$this->db->from("fin_sec_cand");
			$this->db->join('all_students', 'fin_sec_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function fin_sec_vote($data){
			$insert = $this->db->insert('vote_counts_fin_sec', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_finsec($id, $data){
				$this->db->where('id', $id);
				$this->db->update('fin_sec_cand', $data);

		}


		// database interaction for asis fin sec position
		public function vote_status_asis_fin_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from(' vote_counts_asis_fin_sec');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


			//collecting all candidate for the position of fin sec
			public function asis_fin_sec_candidate(){
			$this->db->select("*");
			$this->db->from("asis_fin_sec_cand");
			$this->db->join('all_students', 'asis_fin_sec_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function asis_fin_sec_vote($data){
			$insert = $this->db->insert('vote_counts_asis_fin_sec', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_asis_fin_sec($id, $data){
				$this->db->where('id', $id);
				$this->db->update('asis_fin_sec_cand', $data);

		}


		// database interaction for sec gen position
		public function vote_status_sport_dir($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_sport_dir');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


		//collecting all candidate for the position of sport director
			public function sport_dir_candidate(){
			$this->db->select("*");
			$this->db->from("sport_dir_cand");
			$this->db->join('all_students', 'sport_dir_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function sport_dir_vote($data){
			$insert = $this->db->insert('vote_counts_sport_dir', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_sportdir($id, $data){
				$this->db->where('id', $id);
				$this->db->update('sport_dir_cand', $data);

		}


		// database interaction for social director position
		public function vote_status_social_dir($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_social_dir');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}

//collecting all candidate for the position of sociaL director
			public function social_dir_candidate(){
			$this->db->select("*");
			$this->db->from("social_dir_cand");
			$this->db->join('all_students', 'social_dir_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function social_dir_vote($data){
			$insert = $this->db->insert('vote_counts_social_dir', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_socialdir($id, $data){
				$this->db->where('id', $id);
				$this->db->update('sport_dir_cand', $data);

		}

		// database interaction for social director position
		public function vote_status_academic_dir($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_status_academic_dir');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}

//collecting all candidate for the position of sociaL director
			public function acadamic_dir_candidate(){
			$this->db->select("*");
			$this->db->from("academic_cand");
			$this->db->join('all_students', 'academic_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function academic_dir_vote($data){
			$insert = $this->db->insert('vote_counts_academic_dir', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_academicdir($id, $data){
				$this->db->where('id', $id);
				$this->db->update('academic_cand', $data);

		}

			// database interaction for social director position
		public function vote_status_treasurer($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_trea');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}

//collecting all candidate for the position of sociaL director
			public function treasurer_candidate(){
			$this->db->select("*");
			$this->db->from("trea_cand");
			$this->db->join('all_students', 'trea_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function treasurer_vote($data){
			$insert = $this->db->insert('vote_counts_trea', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_treasurer($id, $data){
				$this->db->where('id', $id);
				$this->db->update('trea_cand', $data);

		}

			// database interaction for social director position
		public function vote_status_sales($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_sales_dir');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}

//collecting all candidate for the position of sociaL director
			public function sales_candidate(){
			$this->db->select("*");
			$this->db->from("sales_cand");
			$this->db->join('all_students', 'sales_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function sales_vote($data){
			$insert = $this->db->insert('vote_counts_sales_dir', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_sales($id, $data){
				$this->db->where('id', $id);
				$this->db->update('trea_cand', $data);

		}


			// database interaction for social director position
		public function vote_status_pro($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_pro');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}




//collecting all candidate for the position of PRO
			public function pro_candidate(){
			$this->db->select("*");
			$this->db->from("pro_cand");
			$this->db->join('all_students', 'pro_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function pro_vote($data){
			$insert = $this->db->insert('vote_counts_pro', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_pro($id, $data){
				$this->db->where('id', $id);
				$this->db->update('pro_cand', $data);

		}
			// database interaction for social director position
		public function vote_status_pro_II($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_pro_II');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}




//collecting all candidate for the position of PRO
			public function pro_II_candidate(){
			$this->db->select("*");
			$this->db->from("pro_II_cand");
			$this->db->join('all_students', 'pro_II_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function pro_II_vote($data){
			$insert = $this->db->insert('vote_counts_pro_II', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_pro_II($id, $data){
				$this->db->where('id', $id);
				$this->db->update('pro_II_cand', $data);

		}


			// database interaction for social director position
		public function vote_status_welf($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_welfare');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}



//collecting all candidate for the position of welf
			public function welf_candidate(){
			$this->db->select("*");
			$this->db->from("welf_cand");
			$this->db->join('all_students', 'welf_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function welf_vote($data){
			$insert = $this->db->insert('vote_counts_welfare', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_welf($id, $data){
				$this->db->where('id', $id);
				$this->db->update('welf_cand', $data);

		}

		// database interaction for social director position
		public function vote_status_asis_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_counts_asis_sec_gen');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}



//collecting all candidate for the position of Asistant Sec 
			public function asis_sec_gen_candidate(){
			$this->db->select("*");
			$this->db->from("asis_sec_gen_cand");
			$this->db->join('all_students', 'asis_sec_gen_cand.student_id = all_students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function asis_sec_gen_vote($data){
			$insert = $this->db->insert('vote_counts_asis_sec_gen', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_asis_sec_gen($id, $data){
				$this->db->where('id', $id);
				$this->db->update('asis_sec_gen_cand', $data);

		}


//collecting all candidate voted by a particular student
	public function vote_pre($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_president');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();
		
	}	

	public function vote_vice_pre($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_vp_president');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();
		
	}	

	public function vote_sec_gen($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_sec_gen');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();
		
	}	

	public function vote_asist_sec($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_asis_sec_gen');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();
		
	}	

	public function vote_fin_sec($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_fin_sec');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();
		
	}	

	public function vote_asis_fin($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_asis_fin_sec');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}

	public function vote_trea($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_trea');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}

	public function vote_welf($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_welfare');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}	

	public function vote_social($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_social_dir');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}	

    public function vote_sport($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_sport_dir');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}	

	public function vote_sales($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_sales_dir');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}	

public function vote_academic($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_academic_dir');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}	

public function vote_pro_II($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_pro_II');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}		
public function vote_pro_I($student_id){
		$this->db->select('*');
		$this->db->from('vote_counts_pro');
		$this->db->where('student_id', $student_id);

		$query = $this->db->get();
		return $query->row();

	}		


public function student_add($data){
		$insert = $this->db->insert('student_vote', $data);

		if($insert){
			return true;

		}else{

			return false;
		}

	}


	public function student_vote($student_id){
			$this->db->select('*');
			$this->db->from('student_vote');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();

			return $query->result_array();

	}














	}
	
?>	 