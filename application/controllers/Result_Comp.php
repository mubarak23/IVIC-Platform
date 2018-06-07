<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_Comp extends CI_Controller {

	public function result_sheet(){
		$data['title'] = "This is the feature that compile result";

		$data['main_content'] = "Admin/result_sheet";

		$data['president'] = $this->Result_sheet_model->pos_pre_count();
		$data['vice_president'] = $this->Result_sheet_model->pos_vp_pre_count();
		$data['sec_gen'] = $this->Result_sheet_model->pos_sec_gen_count();
		$data['fin_sec'] = $this->Result_sheet_model->pos_fin_sec_count();
		$data['sport_dir'] = $this->Result_sheet_model->pos_sport_dir_count();
		$data['social_dir'] = $this->Result_sheet_model->pos_social_dir_count();
		$data['pro'] = $this->Result_sheet_model->pos_pro_count();
		$data['treasurer'] = $this->Result_sheet_model->pos_trea_count();
		$data['welfare'] = $this->Result_sheet_model->pos_welf_count();
		$data['asis_sec_gen'] = $this->Result_sheet_model->pos_asis_sec_gen_count();
		$data['asis_fin_sec'] = $this->Result_sheet_model->pos_asis_fin_sec_count();
		$data['sales'] = $this->Result_sheet_model->pos_sales_count();
		$data['academic'] = $this->Result_sheet_model->pos_academic_count();
		$data['pro_II'] = $this->Result_sheet_model->pos_pro_II_count();
		//$data['president'] = $this->Result_sheet->pos_pre_coout()

		$this->load->view('Admin/layout/main', $data);


	}

	public function result_per_position(){

		$president = '359';

		//processing result for the post of mr. president
		$data['vote_count_pre_1'] = $this->Result_sheet_model->pre_count($president);

		//candidate details
		$data['pre_candidate_1'] = $this->Result_sheet_model->president($president);

		/*print_r($data['pre_candidate']);

		die();
*/

		


		$data['title'] = "This is the final result sheet for the election";

		$data['main_content'] = 'Admin/pre_position_result';

		$this->load->view('admin/layout/main', $data);
		

		}

	public function result_vice_position(){

		//processing first vice president vote

		$vice_president = '5';

		$data['vote_count_vp_1'] = $this->Result_sheet_model->vice_count($vice_president);

		$data['vice_president_1'] = $this->Result_sheet_model->vice_president($vice_president);

		//processing second vice president vote

		$vice_president = '7';

		$data['vote_count_vp_2'] = $this->Result_sheet_model->vice_count($vice_president);

		$data['vice_president_2'] = $this->Result_sheet_model->vice_president($vice_president);


		$data['main_content'] = 'Admin/vice_position_result';

		$this->load->view('admin/layout/main', $data);




		
	}





	public function result_sen_gen_position(){
		//processing first vice president vote

		$sec_gen = '588';

		$data['vote_count_sec_1'] = $this->Result_sheet_model->sec_count($sec_gen);

		$data['sec_gen_position_1'] = $this->Result_sheet_model->sec_gen($sec_gen);


		//processing second vice president vote
		$sec_gen = '7';

		$data['vote_count_sec_2'] = $this->Result_sheet_model->sec_count($sec_gen);

		$data['sec_gen_position_2'] = $this->Result_sheet_model->sec_gen($sec_gen);


		$data['main_content'] = 'Admin/sec_gen_result';

		$this->load->view('admin/layout/main', $data);

		
	}


	public function result_asis_sen_gen_position(){
		//processing first vice president vote

		$asis_sec_gen = '89';

		$data['vote_count_asis_sec_1'] = $this->Result_sheet_model->asis_sec_count($asis_sec_gen);

		$data['asis_sec_gen_position_1'] = $this->Result_sheet_model->asis_sec_gen($asis_sec_gen);

		$asis_sec_gen = '82';

		$data['vote_count_asis_sec_2'] = $this->Result_sheet_model->asis_sec_count($asis_sec_gen);

		$data['asis_sec_gen_position_2'] = $this->Result_sheet_model->asis_sec_gen($asis_sec_gen);


		//processing second vice president vote
		/*$asis_sec_gen = '7';

		$data['vote_count_sec_2'] = $this->Result_sheet_model->asis_sec_count($asis_sec_gen);

		$data['asis_sec_gen_position_2'] = $this->Result_sheet_model->asis_sec_gen($asis_sec_gen);*/


		$data['main_content'] = 'Admin/asis_sec_gen_result';

		$this->load->view('admin/layout/main', $data);

		
	}


	//processing vote for the post financial secetary
	public function result_fin_sen_position(){
		
		//processing vote for the post financial secetary

		$fin_sec = '1791';

		$data['vote_count_fin_sec_1'] = $this->Result_sheet_model->fin_sec_count($fin_sec);

		$data['fin_sec_position_1'] = $this->Result_sheet_model->fin_sec($fin_sec);
	

		$data['main_content'] = 'Admin/fin_sec_result';

		$this->load->view('admin/layout/main', $data);

		
	}

	//processing vote for the post Asis financial secetary
	public function result_asis_fin_sen_position(){
		
		//processing vote for the post financial secetary

		$asis_fin_sec = '1854';

		$data['vote_count_asis_fin_sec_1'] = $this->Result_sheet_model->asis_fin_sec_count($asis_fin_sec);

		$data['asis_fin_sec_position_1'] = $this->Result_sheet_model->asis_fin_sec($asis_fin_sec);
	

		$data['main_content'] = 'Admin/asis_fin_sec_result';

		$this->load->view('admin/layout/main', $data);

		
	}

	//processing vote for the post Asis financial secetary
	public function result_trea_position(){
		
		//processing vote for the post financial secetary

		$treasurer = '1824';

		$data['vote_count_treasurer_1'] = $this->Result_sheet_model->treasurer_count($treasurer);

		$data['treasurer_position_1'] = $this->Result_sheet_model->treasurer($treasurer);
	

		$data['main_content'] = 'Admin/treasurer_result';

		$this->load->view('admin/layout/main', $data);

		
	}


	//processing vote for the post Asis financial secetary
	public function result_welf_position(){
		
		//processing vote for the post financial secetary

		$welfare = '12';

		$data['vote_count_welfare_1'] = $this->Result_sheet_model->welfare_count($welfare);

		$data['welfare_position_1'] = $this->Result_sheet_model->welfare($welfare);
	

		$data['main_content'] = 'Admin/welfare_result';

		$this->load->view('admin/layout/main', $data);

		
	}

//processing vote for the post Asis financial secetary
	public function result_sales_position(){
		
		//processing vote for the post financial secetary

		$welfare = '647';

		$data['vote_count_sales_1'] = $this->Result_sheet_model->welfare_count($welfare);

		$data['sales_position_1'] = $this->Result_sheet_model->sales($welfare);
	

		$data['main_content'] = 'Admin/welfare_result';

		$this->load->view('admin/layout/main', $data);

		
	}


	//processing vote for the post financial secetary
	public function result_pro_II_position(){
		
		//processing vote for the post financial secetary

		$fin_sec = '7';

		$data['vote_count_fin_sec_1'] = $this->Result_sheet_model->fin_sec_count($fin_sec);

		$data['fin_sec_position_1'] = $this->Result_sheet_model->fin_sec($fin_sec);
	

		$data['main_content'] = 'Admin/fin_sec_result';

		$this->load->view('admin/layout/main', $data);

		
	}


public function result_social_dir(){

		//collect all candidate id 
		$candidate = " social_dir_cand";

		$social_dir = $this->Result_sheet_model->position($candidate);

		$social_dir_1 = '8';

		$data['vote_count_social_1'] = $this->Result_sheet_model->social_dir_count($social_dir_1);
		$data['social_position_1'] = $this->Result_sheet_model->social_dir($social_dir_1);

		$social_dir_2 = '12';
		$data['vote_count_social_2'] = $this->Result_sheet_model->social_dir_count($social_dir_2);
		$data['social_position_2'] = $this->Result_sheet_model->social_dir($social_dir_2);

		$data['main_content'] = 'Admin/social_dir_result';

		$this->load->view('admin/layout/main', $data);



		}


	public function result_sale_position(){

		$sale_dir = '647';

		//collect all the candidate data
		$data['sales_position_1'] = $this->Result_sheet_model->sale_dir($sale_dir);
		$data['vote_count_sale'] = $this->Result_sheet_model->vote_count_sale_dir($sale_dir);

		


		//collect the main page to populate the view
		$data['main_content'] = 'Admin/sale_dir_result';

		$this->load->view('admin/layout/main', $data);


	}	

	public function result_sport_dir(){
		//collect each candidate id
		$sport_dir_1 = '65';

		$data['sport_dir_1'] = $this->Result_sheet_model->sport_dir($sport_dir_1);
		$data['vote_count_sport_1'] = $this->Result_sheet_model->vote_count_sport($sport_dir_1);


		$sport_dir_2 = '267';

		$data['sport_dir_2'] = $this->Result_sheet_model->sport_dir($sport_dir_2);
		$data['vote_count_sport_2'] = $this->Result_sheet_model->vote_count_sport($sport_dir_2);

		//rendering the result to the view file

		$data['main_content'] = 'Admin/sport_dir_result';

		$this->load->view('admin/layout/main', $data);


		}

		public function result_academic_dir(){

			//collect the candidate id
			 $academic_dir = "1766";

			 $data["academic_dir"] = $this->Result_sheet_model->academic_dir($academic_dir);

			 $data["vote_count_academic_dir"] = $this->Result_sheet_model->vote_count_academic($academic_dir);

			 $data['main_content'] = "Admin/academic_dir_result";

			 $this->load->view('admin/layout/main', $data);
		}



		public function result_pro_1(){

			$pro_1 = "633";

			$data['pro_1'] = $this->Result_sheet_model->pro_1($pro_1);

			$data['vote_count_pro_1'] = $this->Result_sheet_model->vote_count_pro_1($pro_1);

			$data['main_content'] = "Admin/result_pro_1";
			$this->load->view('admin/layout/main', $data);
		}


		public function pro_II(){

			$pro_II = "17";

			$data['pro_II'] = $this->Result_sheet_model->pro_II($pro_II);

			$data['vote_count_pro_II'] = $this->Result_sheet_model->vote_count_pro_ii($pro_II);

			$data['main_content'] = "admin/result_pro_II";

			$this->load->view('admin/layout/main', $data);


		}






}