<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	 
	public function index()
	{
		echo "Good Here";
	}

	public function check(){
		$check = $this->Student_model->check();

		if($check = 0 ){
			echo "Good To Go From Here";
		}else{
			echo "Bad Road Here";
			
		}
	}


	public function search_student(){



		if(isset($_POST['search_term'])){

				
				 

			
			
			$this->form_validation->set_rules('reg_num', 'Student By Registration Number', 'trim|required');

				if($this->form_validation->run() == true){
					
						
					$reg_num = $this->input->post('reg_num');
				 

					//run the search query and the student 
					$data["students"] = $this->Student_model->search_student($reg_num);

					/*print_r($data["students"]);
					die();*/

					
					$data["main_content"] = "Admin/search_result";

					$this->load->view('admin/layout/main', $data);



				}else{
				$data["main_content"] = "Admin/search_student";

			$this->load->view('admin/layout/main', $data);

				}


		}else{

			$data["main_content"] = "Admin/search_student";

			$this->load->view('admin/layout/main', $data);


		}
	}






}


?>