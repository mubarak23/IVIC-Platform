<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

		public function index(){

			/*echo "Good Here";
			die();*/

		$config['upload_path'] = APPPATH . 'upload';
		$config['allowed_types'] = 'jpeg|jpg|gif|png';
		$config['max_size'] = '1024';
		
		//loading the puload library
		$this->load->library('upload');
		$this->upload->initialize($config);


		if(isset($_POST['upload'])){
			/*echo "Good Here";
			die();
*/
			$this->form_validation->set_rules('image', 'Image', 'required');

				if($this->form_validation->run() == false){

					//process file upload
					 	if(! $this->upload->do_upload('image')){
						$data['error'] = $this->upload->display_errors();
						
						$this->load->view('upload', $data);
						
						}else{
							
				$upload = $this->input->post('image');			
				$data = array('upload_data' => $this->upload->data());

					echo "Good Here Image Has finally uploaded";
					die();
				
							}

				}else{

					//prcoess the error message here and savely return to upload view page

					echo "Something when wrong along the line of execution";
					die();

				}

		}else{
				$data['error'] = "";
			$this->load->view('upload', $data);
		}




		}	


	  //this upload bulk result
   public function add_bulk_excel()
   {

   			$config['upload_path'] = APPPATH . 'upload';
		$config['allowed_types'] = 'jpeg|jpg|gif|png|xlsx';
		$config['max_size'] = '1024';
		
		//loading the puload library
		$this->load->library('upload');
		$this->upload->initialize($config);

		if(isset($_POST['bulk_upload'])){

				if(! $this->upload->do_upload('add_excel')){

					$data['error'] = $this->upload->display_errors();
						
					$this->load->view('upload', $data);

				}else{

					$inserted = $this->input->post('add_excel');

					//$inserted = bulk();
					$filename = explode(".", $_FILES['file']['name']);

					if(end($filename) == 'xlsx'){
						$handle = fopen($_FILES['file']['tmp_name'], 'r');
						while($data = fgetcsv($handle)){
							echo "Good Here";
							die();
							
						}
					}

					

				}



		}else{

			$data['title'] = "Welcome to Student Bulk Upload to the db";

			$data['main_content'] = "Admin/add_bulk_excel";

			$this->load->view('admin/layout/main', $data);


		}

   		//$inserted = bulk();

   		 /*if(isset($_POST['add_excel'])){

   		 	echo "Good Here";
   		 	die();


   		 		 $inserted = bulk();
		 
		 if($inserted ){
         
		 
		 $data['title'] = "Thank You Page";

		$data['main_content'] = "Admin/thank_you";

		$this->load->view('admin/layout/main', $data);
        
		 }else{
			 
			     	$data['title'] = "Thank You Page";

					$data['main_content'] = "Admin/add_bulk_excel";

					$this->load->view('admin/layout/main', $data);
			 
			 }



   		 }else{

   		 	$data['title'] = "Thank You Page";

					$data['main_content'] = "Admin/add_bulk_excel";

					$this->load->view('admin/layout/main', $data);


   		 }	*/

       /*  $inserted = bulk();
		 
		 if($inserted ){
         
		 
		 $data['title'] = "Thank You Page";

		$data['main_content'] = "Admin/thank_you";

		$this->load->view('admin/layout/main', $data);
        
		 }else{
			 
			     	$data['title'] = "Thank You Page";

					$data['main_content'] = "Admin/add_bulk_excel";

					$this->load->view('admin/layout/main', $data);
			 
			 }*/
   }




   public function send_bulk(){

   		if(isset($_POST['bulk_upload']))
	   {
	   		/*echo "Good Here";
	   		die();*/
		   
	     if($_FILES['file']['name'])
		 {
	       	echo "Good Here";
	       	die();
		      $filename = explode(".", $_FILES['file']['name']);
			  if(end($filename) == 'csv')
			  {
				  
				  $handle = fopen($_FILES['file']['tmp_name'], "r");
				  while($data = fgetcsv($handle))
				  {
					  
					// dump($data); 
					  //die;
					 $data_bulk = array(
					   
					   'student_name'        => $data[0],
					   'reg_num'             => $data[1], 
					   'tcr'                 => $data[2], 
					   'tcp'                 => $data[3],
					   'gpa'                 => $data[4],
					   'cgpa'                => $data[5], 
					   'level_id'            => $data[6],
					   'semester_id'         => $data[7],
					   'carry_over'          => $data[8], 
					   'remark'              => $data[9],
					   
					   ); 
					   
					   $insert = $CI->db->insert('student', $data_bulk);
					   
					   
					   
				  }

				  //end while
				  fclose($handle);
				  
				  
				  return $insert;
				  
			  }
			  else
			  {
			     echo '<p class="text-danger">Please Select a  CSV FILE</p>';
			  }
		 
		 }
		 else
		 {
		 	echo "Good Here";
   		 	die();
		  
		   echo '<p class="text-danger">Please Select a file to upload</p>';
		 
		 }
	   
	   }
   }



}







?>