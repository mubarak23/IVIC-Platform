<?php

	
// Codes Written by : Mubbarak Aminu 
// date : 5 Febuuary 2018


 Class Result_sheet_model extends CI_model{
		

		public function pos_pre_count(){
			return $this->db->count_all('president_canditate');
		} 
		public function pos_vp_pre_count(){
			return $this->db->count_all('vice_presi_cand');
		} 
		public function pos_sec_gen_count(){
			return $this->db->count_all('sec_gen_cand');
		} 

		public function pos_fin_sec_count(){
			return $this->db->count_all('fin_sec_cand');
		}

		 public function pos_sport_dir_count(){
			return $this->db->count_all('sport_dir_cand');
		} 

		public function pos_social_dir_count(){
			return $this->db->count_all('social_dir_cand');
		} 

		public function pos_pro_count(){
			return $this->db->count_all('pro_cand');
		} 

		public function pos_trea_count(){
			return $this->db->count_all('trea_cand');
		} 

		public function pos_welf_count(){
			return $this->db->count_all('welf_cand');
		} 

		public function pos_asis_sec_gen_count(){
			return $this->db->count_all('asis_sec_gen_cand');
		}

		public function pos_asis_fin_sec_count(){
			return $this->db->count_all('asis_fin_sec_cand');
		}

		 public function pos_sales_count(){
			return $this->db->count_all('sales_cand');
		}

		 public function pos_academic_count(){
			return $this->db->count_all('academic_cand');
		}

		 public function pos_pro_II_count(){
			return $this->db->count_all('pro_II_cand');
		} 


		public function pre_count($president){
			$this->db->select('vote');
			$this->db->from('vote_counts_president');
			$this->db->where('candidate_id', $president);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}

	

		public function president($president){
			$this->db->select('*');
			$this->db->from('president_canditate');
			$this->db->where('student_id', $president);

			$query = $this->db->get();
			return $query->row();

		}



		//processing vice president total vote for each candidate

		public function vice_president($vice_president){
			$this->db->select('*');
			$this->db->from('vice_presi_cand');
			$this->db->where('student_id', $vice_president);

			$query = $this->db->get();
			return $query->row();

		}

			public function vice_count($vice_president){
			$this->db->select('vote');
			$this->db->from('vote_counts_vp_president');
			$this->db->where('candidate_id', $vice_president);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}	


		//processing sec gen total vote for each candidate

		public function sec_gen($sec_gen){
			$this->db->select('*');
			$this->db->from('sec_gen_cand');
			$this->db->where('student_id', $sec_gen);

			$query = $this->db->get();
			return $query->row();

		}
		
			public function sec_count($sec_gen){
			$this->db->select('vote');
			$this->db->from('vote_counts_sec_gen');
			$this->db->where('candidate_id', $sec_gen);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}


		//processing asis sec gen total vote for each candidate

		public function asis_sec_gen($asis_sec_gen){
			$this->db->select('*');
			$this->db->from(' asis_sec_gen_cand');
			$this->db->where('student_id', $asis_sec_gen);

			$query = $this->db->get();
			return $query->row();

		}
		

			public function asis_sec_count($asis_sec_gen){
			$this->db->select('vote');
			$this->db->from('vote_counts_asis_sec_gen');
			$this->db->where('candidate_id', $asis_sec_gen);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}


		//processing asis financial sec total vote for each candidate

		public function fin_sec($fin_sec){
			$this->db->select('*');
			$this->db->from(' fin_sec_cand');
			$this->db->where('student_id', $fin_sec);

			$query = $this->db->get();
			return $query->row();

		}


			public function fin_sec_count($fin_sec){
			$this->db->select('vote');
			$this->db->from('vote_counts_fin_sec');
			$this->db->where('candidate_id', $fin_sec);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}

//processing asis financial sec total vote for each candidate

		public function asis_fin_sec($asis_fin_sec){
			$this->db->select('*');
			$this->db->from('asis_fin_sec_cand');
			$this->db->where('student_id', $asis_fin_sec);

			$query = $this->db->get();
			return $query->row();

		}


			public function asis_fin_sec_count($fin_sec){
			$this->db->select('vote');
			$this->db->from('vote_counts_asis_fin_sec');
			$this->db->where('candidate_id', $fin_sec);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}


		public function treasurer($treasurer){
			$this->db->select('*');
			$this->db->from('  trea_cand');
			$this->db->where('student_id', $treasurer);

			$query = $this->db->get();
			return $query->row();

		}


			public function treasurer_count($treasurer){
			$this->db->select('vote');
			$this->db->from('vote_counts_trea');
			$this->db->where('candidate_id', $treasurer);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}


		public function welfare($welfare){
			$this->db->select('*');
			$this->db->from('  welf_cand');
			$this->db->where('student_id', $welfare);

			$query = $this->db->get();
			return $query->row();

		}


			public function welfare_count($welfare){
			$this->db->select('vote');
			$this->db->from('vote_counts_welfare');
			$this->db->where('candidate_id', $welfare);

			$query = $this->db->get();

			return $query->num_rows();
			
			
		}


		public function position($candidate){
			$this->db->select('id');
			$this->db->from($candidate);

			$query = $this->db->get();
			return $query->result_array();
			

		}


	public function social_dir_count($social_dir_1){
			$this->db->select('vote');
			$this->db->from('vote_counts_social_dir');
			$this->db->where('candidate_id', $social_dir_1);

			$query = $this->db->get();

			return $query->num_rows();
	}	

	public function social_dir($social_dir_1){
		$this->db->select('*');
		$this->db->from('social_dir_cand');
		$this->db->where('student_id', $social_dir_1);

		$query = $this->db->get();

		return $query->row();



	}


	public function sale_dir($sale_dir){
		$this->db->select('*');
		$this->db->from('sales_cand');
		$this->db->where('student_id', $sale_dir);


		$query = $this->db->get();
		return $query->row();
	}


	public function vote_count_sale_dir($sale_dir){
		$this->db->select('*');
		$this->db->from('vote_counts_sales_dir');
		$this->db->where('candidate_id', $sale_dir);

		$query = $this->db->get();

		return $query->num_rows();


	}


	public function sport_dir($sport_dir){
		$this->db->select('*');
		$this->db->from('sport_dir_cand');
		$this->db->where("student_id", $sport_dir);

		$query = $this->db->get();

		return $query->row();

	}


	public function vote_count_sport($sport_dir){
		$this->db->select('*');
		$this->db->from('vote_counts_sport_dir');
		$this->db->where('candidate_id', $sport_dir);

		$query = $this->db->get();

		return $query->num_rows();

	}



	public function academic_dir($academic_dir){

		$this->db->select('*');
		$this->db->from('academic_cand');
		$this->db->where('student_id', $academic_dir);

		$query = $this->db->get();

		return $query->row();

	}


	public function vote_count_academic($academic_dir){
			$this->db->select('vote');
			$this->db->from('vote_counts_academic_dir');
			$this->db->where('candidate_id', $academic_dir);

			$query = $this->db->get();

			return $query->num_rows();

	}



	public function pro_1($pro_1){
		$this->db->select("*");
		$this->db->from("pro_cand");
		$this->db->where('student_id', $pro_1);

		$query = $this->db->get();

		return $query->row();
	}


	public function vote_count_pro_1($pro_1){
			$this->db->select("vote");
			$this->db->from('vote_counts_pro');
			$this->db->where("candidate_id", $pro_1);

			$query = $this->db->get();

			return $query->num_rows();


	}

	public function pro_II($pro_II){
		$this->db->select("*");
		$this->db->from('pro_ii_cand');
		$this->db->where('student_id', $pro_II);

		$query = $this->db->get();

		return $query->row();

	}


	public function vote_count_pro_ii($pro_II){
			$this->db->select("vote");
			$this->db->from("vote_counts_pro_ii");
			$this->db->where('candidate_id', $pro_II);

			$query = $this->db->get();
			return $query->num_rows();
			
	}



	 }