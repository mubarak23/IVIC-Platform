<?php


	//this method helps in geting male contestants 
	function get_male_con($id)
	{
	   
	   //geting CI instance
	   $CI =& get_instance();
	   
	   //loading the database 
	   $CI->load->database();
	   
	   //making the query for comment count
	   $CI->db->select('contestants.*');
	   $CI->db->where('contestants.category_id', $id);
	   $CI->db->where('contestants_gender', 'Male');
	   
	   $q = $CI->db->get('contestants');
	   
	   
	   return $q->result_array();
	 
	}
	
   //this method helps in geting female contestants 
	function get_female_con($id)
	{
	   
	   //geting CI instance
	   $CI =& get_instance();
	   
	   //loading the database 
	   $CI->load->database();
	   
	   //making the query for comment count
	   $CI->db->select('contestants.*');
	   $CI->db->where('contestants.category_id', $id);
	   $CI->db->where('contestants_gender', 'Female');
	   
	   $q = $CI->db->get('contestants');
	   
	   
	   return $q->result_array();
	 
	}
	
	//this method helps in geting female contestants 
	function get_con($id)
	{
	   
	   //geting CI instance
	   $CI =& get_instance();
	   
	   //loading the database 
	   $CI->load->database();
	   
	   //making the query for comment count
	   $CI->db->select('contestants.*');
	   $CI->db->where('contestants.category_id', $id);
	   
	   $q = $CI->db->get('contestants');
	   
	   
	   return $q->result_array();
	 
	}
	
	
	//this method converts a grade point into alphabets like A,B,C,D
	function convert_to_alpha($grade_point)
	{
       $alpha = '';
	   
	   if($grade_point === 5)
	   {
		  $alpha = 'A';   
	   }elseif($grade_point === 4)
	   {
		 $alpha = 'B';
	   }elseif($grade_point === 3)
	   {
	      $alpha = 'C';
	   }elseif($grade_point === 2)
	   {
		   $alpha = 'D';
	   }else{
		   
		     $alpha = 'F';
		   }
		   
	   return $alpha;	   
	}
	
	

	//this method converts a number to two decimal place
	function to_2d_place($num)
	{
	
	
	 return number_format((float)$num, 2, '.', '');
	
	}
	
	
	//this method checks if a students has a transcript
	function check_trans($student_id, $level_id, $semester_id, $details)
	{  
	   //geting CI instance
	   $CI =& get_instance();
	   
	   //loading the database 
	   $CI->load->database();
	   
	   $CI->db->select('tcredit_and_tpoint.*');
	   $CI->db->where('tcredit_and_tpoint.student_id', $student_id);
	   $CI->db->where('tcredit_and_tpoint.level_id', $level_id);
	   $CI->db->where('tcredit_and_tpoint.semester_id', $semester_id);
	   
	   $q = $CI->db->get('tcredit_and_tpoint');
	   if($q->num_rows()>0){
		      
			  /*<a href="<?php echo base_url(); ?>admin/dashboard/add_result/<?php //echo $s->student_id.'/1/1' ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>*/
			  
			 // return "transcript available";
			  //return "No transcript";
			
				   return '<a href="'. base_url().'admin/dashboard/view_result/'.$student_id.'/' . $level_id.'/'. $semester_id.'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</a>';
				  
		
			  
		   }else{
			   
			      
				  
				  	  return '<a href="'. base_url().'admin/dashboard/add_result/'.$student_id.'/' . $level_id.'/'. $semester_id.'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>';
				  
			   }
	 
	}
	
	
	
	function bulk()
	{
		 //geting CI instance
	   $CI =& get_instance();
	   
	   //loading the database 
	   $CI->load->database();
	   
	   
	   if(isset($_POST['add_excel']))
	   {
	   		echo "Good Here";
	   		die();
		   
	     if($_FILES['file']['name'])
		 {
	       
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
		
    
	
	
	}//end funcction
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*this function checks if level year a is occupied
	function check_year_vailable($level_id, $student_id)
	{
	 
	 //geting CI instance
	  $CI =& get_instance(); 
	  
     //get remaining free year 
	 $CI->db->select('student_course.*, levels.*, student.student_id');
	 $CI->db-from('student_course');
	 $CI->db->join('level', 'levels.level_id=student_course.level_id');
	 $CI->db->join('student', 'student.student_id=student_course.student_id');
	 $CI->db->where('student.student_id', $student_id);
	 $CI->db->where('levels.level_id', $level_id);
	 
	 $q = $CI->db->get('student_course');
	 if($q->num_rows()>0){
		    
		      //call  the dropdown function
			  //$CI->available_dropdown($q->result_array());
			  
			  $result_level_id = $q->result_array();
			   $option = '';
	     
	  	  foreach($result_level_id as $level_id){
			   
	       	     
			  $option .= '<option value="'.$level_id['level_id'].'">'.$level_id['level_title'].'</option>';
			  
		  }
		  
		  echo $option;
		 
		 }else{
			   
			    // error from 
				echo 'error';
			 
			 }
	 
	}
	
	
	//this function display the available level  dropdown
	function available_dropdown($result_level_id)
	{    
	     $option = '';
	     
	  	foreach($result_level_id as $level_id){
			   
	       	  $option .= '<option value="'.$level_id['level_id'].'">';
			  $option .=  $level_id['level_title'];
			  $option .=  '</option>';	   
			  
		  }
		  
		  return $option;
    } 
	
	
	*/
	
	
	  //this method converts an integer into hundred
  function convert_to_hundred($int)
  {
	    $int_plus_00 = $int .'00';
	    return $int_plus_00;
  }
  
		
			//this method checks if a students has a transcript
	function get_dept($dept_id)
	{  
	   //geting CI instance
	   $CI =& get_instance();
	   
	   //loading the database 
	   $CI->load->database();
	   
	   $CI->db->where('dept_id', $dept_id);
	   $CI->db->limit(1);
	   
	   $q = $CI->db->get('department');
	   $row = $q->row();
	   return $row->dept_name;
	
	}
	
	

	
	