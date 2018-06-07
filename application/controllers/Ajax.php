<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function ajax_show(){

			$data['main_content'] = "Admin/ajax_add";

			$this->load->view('admin/layout/main', $data);

	}	

	public function add(){

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$reg_num = $this->input->post('reg_num');
			$level = $this->input->post('level');
			$faculty = $this->input->post('faculty');
			$department = $this->input->post('department');

				//put the input data into an array
					$data = array(
						'first_name'	=> $first_name,
						'last_name'		=> $last_name,
						'reg_no'		=> $reg_num,
						'faculty'		=> $faculty,
						'department'	=> $department,
						'level'			=> $level,
						'is_candidate'	=> '0'
							);

						$add_student = $this->Admin_model->add_student($data);

					if($add_student){

							$array = array(
									'thank_you'  => " Student Has Been Added "
								);
								echo json_encode($array);
					
					}else{
						$array = array(
									'thank_you'  => " Student Has Not Been Added "
								);
								echo json_encode($array);
					}

					die();
					

	}




}