<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evoting extends CI_Controller {


	public function pre_candidate(){
	
		if( $this->session->userdata('logged_in') && $this->session->userdata('otp')){
			
			//checking the vote status of voter by using his student id
			$student_id = $this->session->userdata('student_id');

			$vote_status = $this->Evoting_model->vote_status_pre($student_id);
				
				/*print_r($vote_status);
				die();*/

			if($vote_status ){
				
				$data['main_content'] = 'e-voting/cannot_vote';


				$this->load->view('e-voting/layout/main', $data);

			}else{

				$data['title'] = "Welcome to Neusa E-voting Platform";

				$data['pre_candidate'] = $this->Evoting_model->pre_candidate();



				$data['main_content'] = 'e-voting/voting';


				$this->load->view('e-voting/layout/main', $data);

			}


		}else{

			redirect('Autharization');

		}



	}


	public function pre_vote(){
		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['pre_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;
				 

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

				/*print_r($data);
				die();*/

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->president_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_pre($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
							//send data to student vote tsble
							$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'			=> "president"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);


							redirect('Evoting/sec_gen_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}


	
	public function vp_candidate(){

		if($this->session->userdata('logged_in') ){
			
		//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_vp($student_id);

		 if($vote_status){


				$data['main_content'] = 'e-voting/cannot_vote';


				$this->load->view('e-voting/layout/main', $data);

		 }else{

		 $data['title'] = "Welcome to Neusa E-voting Platform";

		$data['vp_president'] = $this->Evoting_model->vp_candidate();



		$data['main_content'] = 'e-voting/vp_voting';


		$this->load->view('e-voting/layout/main', $data);

		 }	

		

		}else{

			redirect('Autharization');

		}



	}



	public function vp_vote(){

			if(isset($_POST['vp_vote'])){
				/*echo "Good Here";
				die();*/

				//collecting voting details
				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');
				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;

				$student_id = $this->session->userdata('student_id');
				
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();
				

				//setting data array for saving data to the database
					$data = array(
							'student_id'	=> $student_id,
							'stud_lastname'	=> $student_full_name,
							'vote'			=> '1', //the most cretical part of this software
							'candidate_id'	=> $candidate_id,
							'candidate_name'=> $candidate_name,
							'vote_status'	=> '1'	
							);

						/*print_r($data);
						die();*/
					$vp_voting = $this->Evoting_model->vp_vote($data);


					//update the candidate vote cout record
						$id = $candidate_id;

						$data = array(
							'vote_count'	=> $vote_count
							);

						
						$update_candidate = $this->Evoting_model->update_cand_vp($id, $data);
						

					if($vp_voting){

						//set flash data and redirect to the next position
							//send data to student vote tsble
							$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'			=> "Vice president"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);	


						redirect('Evoting/sec_gen_candidate');


					} else{
						redirect('welcome');
					}
			}else{
			
			redirect('welcome');

			}
	}


	public function sec_gen_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_sec($student_id);

		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{

		 	$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['sec_gen_candidate'] = $this->Evoting_model->sec_gen_candidate();



		$data['main_content'] = 'e-voting/sec_gen_voting';


		$this->load->view('e-voting/layout/main', $data);

		 }

		

		}else{

			redirect('Autharization');

			}



	}


	//processing sec gen vote

	public function sec_gen_vote(){
			

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['sec_gen_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//getting student last name using their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);
				

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->sec_gen_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_secgen($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'			=> "secetary General"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							//set flash data and redirect to the next position

							redirect('Evoting/asis_sec_gen_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}



	//pulling the candidate for the fin sec
	public function fin_sec_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_fin_sec($student_id);

		 if($vote_status){


		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{

		 	$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['fin_sec_candidate'] = $this->Evoting_model->fin_sec_candidate();



		$data['main_content'] = 'e-voting/fin_sec_voting';


		$this->load->view('e-voting/layout/main', $data);


		 }
		
		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of financial secetary

	public function fin_sec_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['fin_sec_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//Getting student last namre through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->fin_sec_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_secgen($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position

								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "financial secetary"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/asis_fin_sec_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}

//pulling the candidate for the fin sec
	public function asis_fin_sec_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_asis_fin_sec($student_id);

		 if($vote_status){


		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{

		 	$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['asis_fin_sec'] = $this->Evoting_model->asis_fin_sec_candidate();



		$data['main_content'] = 'e-voting/asis_fin_sec_voting';


		$this->load->view('e-voting/layout/main', $data);


		 }
		
		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of financial secetary

	public function asis_fin_sec_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['asis_fin_sec_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//Getting student last namre through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->asis_fin_sec_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_asis_fin_sec($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "asistant financial secetary"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/sport_dir_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}



	//pulling the candidate for the sport director
	public function sport_dir_candidate(){

		if($this->session->userdata('logged_in')){
			

		 	//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_sport_dir($student_id);

		if($vote_status){

			$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		}else{

		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['sport_dir_candidate'] = $this->Evoting_model->sport_dir_candidate();



		$data['main_content'] = 'e-voting/sport_dir_voting';


		$this->load->view('e-voting/layout/main', $data);

		}	

		

		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of Sport Director

	public function sport_dir_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['sport_dir_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//getting student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->sport_dir_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_sportdir($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "Sport Director"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/social_dir_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}

//pulling the candidate for the social director
	public function social_dir_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_social_dir($student_id);

		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{

		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['social_dir_candidate'] = $this->Evoting_model->social_dir_candidate();



		$data['main_content'] = 'e-voting/social_dir_voting';


		$this->load->view('e-voting/layout/main', $data);
		 }


		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of Sport Director

	public function social_dir_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['social_dir_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//getting student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->social_dir_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_sportdir($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "Social Director"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							//set flash data and redirect to the next position

							redirect('Evoting/treasurer_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}

//pulling the candidate for the social director
	public function academic_dir_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_academic_dir($student_id);

		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{

		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['academic_cand'] = $this->Evoting_model->acadamic_dir_candidate();



		$data['main_content'] = 'e-voting/academic_dir_voting';


		$this->load->view('e-voting/layout/main', $data);
		 }


		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of Sport Director

	public function academic_dir_vote(){



		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){

				redirect('Welcome');
		}


			if(isset($_POST['academic_dir_vote'])){

				


				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//getting student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->academic_dir_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_academicdir($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position

								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "Academic Director"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/sales_dir_candidate');


						}else{
							
							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{


				redirect('Welcome');
			}



	}

//pulling the candidate for the social director
	public function sales_dir_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_sales($student_id);

		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{

		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['sales_cand'] = $this->Evoting_model->sales_candidate();



		$data['main_content'] = 'e-voting/sales_dir_voting';


		$this->load->view('e-voting/layout/main', $data);
		 }


		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of sales Director

	public function sales_dir_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['sales_dir_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//getting student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;


				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->sales_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_sales($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'			=> "Sale Director"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/pro_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}

	//pulling the candidate for the treasurer
	public function treasurer_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_treasurer($student_id);

		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';


			$this->load->view('e-voting/layout/main', $data);

		 }else{


		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['treasurer_candidate'] = $this->Evoting_model->treasurer_candidate();



		$data['main_content'] = 'e-voting/treasurer_voting';


		$this->load->view('e-voting/layout/main', $data);

		 }

		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of Sport Director

	public function treasurer_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['treasurer_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//Getting student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->treasurer_vote($data);

					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_treasurer($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position

								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "Treasurer"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/welf_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}


	//pulling the candidate for the PRO
	public function pro_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_pro($student_id);

			if($vote_status){

			$data['main_content'] = 'e-voting/cannot_vote';

			$this->load->view('e-voting/layout/main', $data);


			}else{


		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['pro_candidate'] = $this->Evoting_model->pro_candidate();



		$data['main_content'] = 'e-voting/pro_voting';


		$this->load->view('e-voting/layout/main', $data);
			

			}



		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of pro

	public function pro_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['pro_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//GETTING Student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->pro_vote($data);


					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_pro($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "PRO I"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/pro_II_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}
//pulling the candidate for the PRO
	public function pro_II_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_pro_II($student_id);

			if($vote_status){

			$data['main_content'] = 'e-voting/cannot_vote';

			$this->load->view('e-voting/layout/main', $data);


			}else{


		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['pro_II'] = $this->Evoting_model->pro_II_candidate();



		$data['main_content'] = 'e-voting/pro_II_voting';


		$this->load->view('e-voting/layout/main', $data);
			

			}



		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of pro

	public function pro_II_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['pro_II_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//GETTING Student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->pro_II_vote($data);


					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_pro_II($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "PRO II"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							//set flash data and redirect to the next position

							redirect('Evoting/confirm_vote');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}

	//pulling the candidate for the welfare
	public function welf_candidate(){

		if($this->session->userdata('logged_in')){
			
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_welf($student_id);

		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';

			$this->load->view('e-voting/layout/main', $data);


		 }else{


		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['welf_cand'] = $this->Evoting_model->welf_candidate();



		$data['main_content'] = 'e-voting/welf_voting';


		$this->load->view('e-voting/layout/main', $data);

		 }


		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of welfare

	public function welf_vote(){

		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['welf_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//getting student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->welf_vote($data);


					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_welf($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "Welfare Director"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/academic_dir_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}


//pulling the candidate for the asistant sec gen
	public function asis_sec_gen_candidate(){

		if($this->session->userdata('logged_in')){
				
			//collect voting status of the voter
		$student_id = $this->session->userdata('student_id');

		 $vote_status = $this->Evoting_model->vote_status_asis_sec($student_id);
		 
		 if($vote_status){

		 	$data['main_content'] = 'e-voting/cannot_vote';

			$this->load->view('e-voting/layout/main', $data);
		 		
		 }else{


		$data['title'] = "Welcome to Neusa E-voting Platform";

		$data['asis_sec_gen_candidate'] = $this->Evoting_model->asis_sec_gen_candidate();



		$data['main_content'] = 'e-voting/asis_sec_gen_voting';


		$this->load->view('e-voting/layout/main', $data);

		 }	


		}else{

			redirect('Autharization');

			}



	}


	//processing vote for the position of welfare

	public function asis_sec_gen_vote(){


		//checking if the voter hase the right credential to vote

		if(!$this->session->userdata('logged_in')){
				redirect('Welcome');
		}


			if(isset($_POST['asis_sec_gen_vote'])){

				$candidate_id = $this->input->post('candidate_id');
				$candidate_name = $this->input->post('candidate_name');

				$vote_count = $this->input->post('vote_count');

				$vote_count = $vote_count + 1;
				
				$student_id = $this->session->userdata('student_id');

				//GETTING student last name through their login id
				$student_full_name = $this->Evoting_model->stud_fullname($student_id);

				 $student_full_name = $student_full_name->full_name;

				//setting the time the voting was carryout 
				$datestring = ' %Y / %m / %d - %h:%i %a';
				$time = time();

				//collecting voting details here and pass them into an array
				$data = array(
						'student_id' 	=> $student_id,
						'stud_lastname'	=> $student_full_name,
						'vote'			=> '1', //the most critical part of the software
						'candidate_id'	=> $candidate_id,
						'candidate_name'=> $candidate_name,
						
						'vote_status'	=> '1'
						);

						

					//pushing voting details to the to the destinated table in the db
					$voting = $this->Evoting_model->asis_sec_gen_vote($data);


					//update the candidate vote cout record
						$id = $candidate_id;

						

						$data = array(
							'vote_count'	=> $vote_count
							);
						
						$update_candidate = $this->Evoting_model->update_cand_asis_sec_gen($id, $data);
						

						//if voting was successfully stored in the database send the voter
						// to the next voting position

						if($voting){

							//set flash data and redirect to the next position
								$data = array(
									'student_id'	=> $student_id,
									'candidate_id'	=> $candidate_id,
									'candidate_name'	=> $candidate_name,
									'position'		=> "Asistant Secetary General"
										);
							//add it to the student vote table
							$student_vote = $this->Evoting_model->student_add($data);
							

							redirect('Evoting/fin_sec_candidate');


						}else{

							//if erro occure redirect to home page, logout voter and kill all 
							//session
							redirect('Autharization/logout');

						}

			}else{

				redirect('Welcome');
			}



	}



  /*public function Final_vote(){

  		$student_id = $this->session->userdata('student_id');
  		
  		//pull all the candidate the student voted for
  		$data['president'] = $this->Evoting_model->vote_pre($student_id);


  		$data['vice_president'] = $this->Evoting_model->vote_vice_pre($student_id);
  		$data['sec_gen'] = $this->Evoting_model->vote_sec_gen($student_id);
  		$data['asis_sec_gen'] = $this->Evoting_model->vote_asist_sec($student_id);
  		$data['fin_sec'] = $this->Evoting_model->vote_fin_sec($student_id);
  		$data['asis_fin_sec'] = $this->Evoting_model->vote_asis_fin($student_id);

  		$data['treasurer'] = $this->Evoting_model->vote_trea($student_id);
  		$data['welfare'] = $this->Evoting_model->vote_welf($student_id);
  		$data['social'] = $this->Evoting_model->vote_social($student_id);
  		$data['sport'] = $this->Evoting_model->vote_sport($student_id);
  		$data['sales'] = $this->Evoting_model->vote_sales($student_id);

  		$data['academic'] = $this->Evoting_model->vote_academic($student_id);
  		$data['pro_I'] = $this->Evoting_model->vote_pro_I($student_id);
  		$data['pro_II'] = $this->Evoting_model->vote_pro_II($student_id);
  		//$data['fin_sec'] = $this->Evoting_model->vote_fin_sec($student_id);
  		


  		$data['title'] = "Thank you for your vote";


  		$data['main_content'] = 'e-voting/thank_you';

  		$this->load->view('e-voting/layout/main', $data);
  }*/
	

	public function confirm_vote(){

		//collect student id
		$student_id = $this->session->userdata('student_id');

		//collect all vote for this student
		$data['student_vote'] = $this->Evoting_model->student_vote($student_id);

		

		$data['main_content'] = "e-voting/thank_you";

		$this->load->view('e-voting/layout/main', $data);

	}



	



	






	


}


