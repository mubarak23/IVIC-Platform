<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autharization extends CI_Controller {


	public function index(){
		
		//checking the first authorization button of login form has been click
		if(isset($_POST['login'])){

			//set validation rules that will validat user login details
			$this->form_validation->set_rules('programme', 'programme of Study', 'required|trim|min_length[4]');
			$this->form_validation->set_rules('reg_no', 'Registration Number', 'required|trim');

			//run the validation
			if($this->form_validation->run() == true){
				
	
				$last_name = $this->input->post('programme');
				$reg_no = $this->input->post('reg_no');


				//run db check fagaoin user login details
				$id = $this->Authorization_model->ev_login($reg_no);

				//check if the details are found in the database
					
				if($id){

				// after the check of user details again db data set strong sesstion and direct to OTP 
				//Autharization function

					/*echo $id;
					die();*/


						$data = array(
						'reg_no'		=> $reg_no,
						'student_id'	=> $id	
						);

					//set you session data
					$this->session->set_userdata($data);

					/*echo $this->session->userdata('student_id');
					die();*/

					//set flast data
					$this->session->set_flashdata('Logged_in', 'You  can Now Submit Your OTP');
					
					redirect('\Autharization/verify_otp');

				}else{

					// if result did not match return an an approperiate error message and redirect back to ///login screen

			$data['title'] = "Welcome to Neusa first Login system";

			$this->session->set_flashdata('Failed', 'Login Failed, Please use correct login details');
			//load the login page
			$this->load->view('e-voting/login');


					//return error messag with the login form
					//alternative i will process it wit jquery
					
				}


				


			}else{
				//return error message

			$data['title'] = "Welcome to Neusa first Login system";

			$this->session->set_flashdata('Failed', 'Please Check Your login Details And Try Again');
			//load the login page
			$this->load->view('e-voting/login');
				
			}

		}else{

			$data['title'] = "Welcome to Neusa first Login system";

			$this->session->set_flashdata('Failed', 'Unauthurize Access, Please Login');

			//load the login page
			$this->load->view('e-voting/login');
		}

		
	}


	public function verify_otp(){


		if(isset($_POST['varify'])){
			/*echo "Goos Here";
			die();*/

			$this->form_validation->set_rules('otp', 'OTP', 'required');

			if($this->form_validation->run() == true){

				$otp = $this->input->post('otp');
				//$student_id = $this->input->post('student_id');

				//$student_id = "2";

				
				$student_id = $this->session->userdata('student_id');
				/*echo $student_id;
				die()*/


				//check if the otp submitted is our db
				$check_otp = $this->Authorization_model->check_otp($otp);

				


				if($check_otp){

					$otp = $check_otp->otp;
				

				$data = array(
						'otp'	=> $otp
						);
				$this->session->set_userdata($data);
				
					//since otp exist, check if they have use it to vote
					$otp_vote = $this->Authorization_model->check_vote_otp($otp, $student_id);
					if($otp_vote){

							//set flash data
						$this->session->set_flashdata('Failed', 'OPT Has Already Been Used');
					
					$this->load->view('e-voting/submit_otp');


					}else{

						$otp = $this->session->userdata('otp');

						$data = array(
								'student_id'	=> $student_id,
								'otp_pin'		=> $otp,
								'verify'		=> '1'
								);

						$add_verify = $this->Authorization_model->add_verify($data);

						if($add_verify){

							$data = array(
							'student_id'	=> $student_id,
							'logged_in'	=> true,
							'otp'			=> $otp	
								);
							//set you session data
					$this->session->set_userdata($data);

					redirect('Evoting/pre_candidate');

						}else{

								//set flash data
					$this->session->set_flashdata('Failed', 'Unable to Verify Tour OPT at this Time');
					
					$this->load->view('e-voting/submit_otp');


						}


					}



				}else{

					$this->session->set_flashdata('Failed', 'OPT Does Not Exist iN Our Coolection');
					
					$this->load->view('e-voting/submit_otp');


				}


			}else{

				//set flash data
		$this->session->set_flashdata('Failed', 'Enter the Requird OTP Issued');
					
		$this->load->view('e-voting/submit_otp');


			}

		}else{

		

			//set flash data
		$this->session->set_flashdata('Failed', 'Enter Your One Time Password');
					
		$this->load->view('e-voting/submit_otp');

		}
	}

	

	/*
	public function ev_otp(){

		//check to ensure user login before showing this otp feature
		if(!$this->session->userdata('logged_in')){
			redirect('Autharization');
		}

		if(isset($_POST['varify_otp'])){
			//process the pin here

			$this->form_validation->set_rules('otp', 'OTP', 'required|number');

			if($this->form_validation->run() == false){

				$otp = $this->input->post('opt');

				$student_id = $this->session->userdata('student_id');

				//fetch student otp base on the id
				$original_otp = $this->Authorization_model->fetch_otp($student_id);

				//varify to ensure that both the submited opt and otp again student ii
				// in the db are equal
				// if they are equal reidrect to voting page

				if($otp == $original_otp ){



				 //update the db to set varify column to 1
				 	$data = array(
				 			'verify'	=> '1'
				 			);
				 	
				 	$update_otp = $this->Authorization_model->update_otp($student_id, $data);

				 	/*echo "Good Here and otp is updated Here";

				 	die();
*/
				 	//colect the varify status of the student from the varify otp table
				 	/*$varify = $this->Authorization_model->otp_status($student_id);

				 	

				 	//set the varify to global session
				 	$data = array(
				 			'otp_status' => $varify
				 			);

				 	$this->session->set_userdata($data);

				 	$this->session->flashdata('suecess', 'Welcome to Voting Page');

				 	redirect('Evoting/pre_candidate');		


					//redirect to voting page and give a message
				}else{
					//if there is not match redirect bac to otp submission page
					//with an errro message 

				 	$this->session->flashdata('Failed', 'Your OTP Did Not Match');
					
					$this->load->view('e-voting/submit_otp');
				}



			

			}else{
				//show erro message and redirect to authrization page


			//set flash data
			$this->session->set_flashdata('Failed', 'Wrong OTP');

			$this->load->view('e-voting/submit_otp');
			}

		}else{

			//set flash data
			$this->session->set_flashdata('Failed', 'Enter Your One Time Password');
					
			$this->load->view('e-voting/submit_otp');
		}
	}
*/
	public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('student_id');

			//set logout seccess message
			$this->session->flashdata('success', 'You Have Logout');

			//redirect to E-voting Main Home page
			redirect('Welcome');


	}


	public function addLogin(){

		if(isset($_POST['add_login'])){

			//check to ensure student enter his full name correct
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[3]|trim');
			$this->form_validation->set_rules('programme', 'programme of Study', 'required|trim|min_length[4]');
			$this->form_validation->set_rules('reg_no', 'Registration Number', 'required|trim');

				if($this->form_validation->run() == true){
					
					$full_name = $this->input->post('full_name');
					$programme = $this->input->post('programme');
					$reg_no = $this->input->post('reg_no');

					//add student details to the db first 
					$data = array(
							'stud_fullname'		=> $full_name,
							'reg_no'			=> $reg_no,
							'programme'			=> $programme,
							'is_candidate'		=> 0,
							'vote_status'		=> 0
							   );

					$insert_login = $this->Authorization_model->add_login($data);

					if($insert_login){

						//process student detail and login 
						//finally set the session
						//collect student id
						$id = $this->Authorization_model->find_id($reg_no);
						echo "wELCOME to The new Vote system";
						echo "<br/>";

						echo $id;
						echo "<br/>";
						die();

						$data = array(
						'reg_no'	=> $reg_no,
						'logged_in'	=> true,
						'student_id'	=> $id	
						);

					//set you session data
					$this->session->set_userdata($data);

					//set flast data
					$this->session->set_flashdata('Logged_in', 'You  can Now Start Voting');
					
					redirect('Evoting/pre_candidate');



					}else{

						echo "Unable to add student details to db";	
					}

				}else{

					echo "Not Good Here";
				}	

		}else{

			$data['title'] = "This function will add student to db and set user session";

			$data['main_content'] = "e-voting/add_login";

			$this->load->view('e-voting/add_login', $data);

		}
	}


}