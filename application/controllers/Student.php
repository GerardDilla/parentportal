/<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	
	public function index()
	{
		
		redirect('index.php/ParentPortal');
		
	}
	
	public function Main()
	{
		$data['error'] = "";
		$data['logged'] = $this->session->userdata('logged_in');
		
		if($data['logged'] == 1){
			
			redirect('index.php/Student/Profile','refresh');
			
			}
		else{
			
			$data['pass'] = "1";
			$this->load->view('Mobile_Login',$data);
			
		}
			
	}
	
	public function login()
	{
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->U_Log();
		$data['error'] = "";
		
		
		if($data['pass'] == 1){
			
			
			redirect('index.php/Student/Profile','refresh');

			}
		else{
			$this->session->unset_userdata('logged_in');
			$data['error'] = "Invalid ID or Password";
			$this->load->view('Mobile_Login',$data);
			}
	}
	
	
	//**************************PROFILE PAGE****************************///
	public function Profile()
	{	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['Output'] = $this->User_login->Profile();
		$data['error'] = "";
		$data['active'] = "1";
		$this->session->userdata('logged_in');
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_profile',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
	}
	//**************************PROFILE PAGE****************************///
	
	//**************************GRADES****************************///
	public function grades()
	{
 		
		$this->load->model('Grades_model');
		
		$this->load->model('User_login');
		
		$data['pass'] = $this->User_login->jumpcheck();
		$data['resultSY'] = $this->Grades_model->getSY();
		$data['Grade_Output'] = $this->Grades_model->getGrades();
		$data['All_Grades'] = $this->Grades_model->AllGrades();

		$data['error'] = "";
		$data['active'] = "2";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_grades',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}			
	}
	public function get_sem(){
		
		//AJAX
		$this->load->model('Grades_model');
		$this->Grades_model->getSem();
		
		
		}
	//**************************GRADES****************************///
	
	
	
	//**************************BALANCE****************************///
	public function balance()
	{
 		$this->load->model('User_login');
		$this->load->model('Balance_model');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['Output'] = $this->Balance_model->getbal();
		//$data['Sem'] = $this->Balance_model->getSem();
		$data['error'] = "";
		$data['active'] = "3";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_balance',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
	}
	//**************************BALANCE****************************///
	
	//**************************SCHEDULE****************************///
	public function schedule()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		
		$this->load->model('Schedule_model');
		$data['Schedule_Output'] = $this->Schedule_model->getsched();
		$data['SYlist'] = $this->Schedule_model->SYchoice();
		$data['error'] = "";
		$data['active'] = "4";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_schedule',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
	}
	public function sched_sem(){
		
		//Ajax
		$this->load->model('Schedule_model');
		$this->Schedule_model->Sem_ajax();
		
		
		}
	//**************************SCHEDULE****************************///
	
	
	//**************************EVENTS****************************///
	public function event()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		
		$this->load->model('Events_model');
		$data['events'] = $this->Events_model->getEvents();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_events',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
	}
	//**************************EVENTS****************************///
	
	
	
	//**************************AWARDS****************************///
	public function awards()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$this->load->model('Awards_model');
		$data['awards'] = $this->Awards_model->getlist();
		$data['error'] = "";
		$data['active'] = "5";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_awards');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
	}
	//**************************AWARDS****************************///
	
	
	
	public function requirements()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "7";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_requirements');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
	}
	
	//**************************ACCOUNT SETTINGS****************************///
	public function User_settings()
	{
 		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		
		$this->load->model('Settings');
		$data['PW'] = $this->Settings->change_password();
		$data['E'] = "";
		$data['P_on'] = $this->Settings->passwordshow();
		$data['E_on'] = "panel-collapse collapse";
		$data['error'] = "";
		$data['active'] = "";
		$data['show'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_settings',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
	}
	
	public function email_change(){
	
		$this->load->model('Settings');
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['E'] = $this->Settings->change_email();
		$data['PW'] = "";
		$data['E_on'] = $this->Settings->emailshow();
		$data['P_on'] = "panel-collapse collapse";
		$data['error'] = "";
		$data['active'] = "6";
		$data['show'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_settings',$data);
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
	}
	
	public function changepic(){
		$this->load->model('login_check');
		$this->load->model('Settings');
		$data['pass'] = $this->login_check->jumpcheck();
		$data['PW'] = $this->Settings->change_password();
		$data['E'] = "";
		$data['P_on'] = $this->Settings->passwordshow();
		$data['E_on'] = "panel-collapse collapse";
		$data['error'] = "";
		$data['active'] = "";
		$data['show'] = 1;
		if($data['pass'] == 1){
			
		$data['up'] = $this->Settings->changepic();
			
			
				
			redirect('index.php/Student/User_settings','refresh');
		

			
		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}		
		}
	//**************************ACCOUNT SETTINGS****************************///
	
		
	//**************************RESUME BUILDER****************************///
	public function Resume_form()
	{	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$this->load->model('Awards_model');
		$data['awards'] = $this->Awards_model->getlist();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_resume_builder');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
	}
	
	public function Resume_display()
	{	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			
			$this->load->view('Resume_page');
			
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
	}
	//**************************RESUME BUILDER****************************///
	
	
	//**************************DIARY****************************///
	public function Diary()
	{	
		$this->load->model('User_login');
		$this->load->model('Diary_model');
		$data['Diary_Output'] = $this->Diary_model->getlist();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_diary');
			$this->load->view('User_footer');
			}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
	}
	public function Diary_entry(){
		
		$this->load->model('User_login');
		$this->load->model('Diary_model');
		$this->Diary_model->newEntry();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		
		if($data['pass'] == 1){
		redirect('index.php/Student/Diary','refresh');
		}else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}
		}
	public function Diary_edit(){
		$this->load->model('Diary_model');
		$this->Diary_model->edit();
		redirect('index.php/Student/Diary','refresh');
		}
	public function Diary_delete(){
		$this->load->model('Diary_model');
		$this->Diary_model->delete();
		redirect('index.php/Student/Diary','refresh');
		}	
	public function Diary_load(){
		
		//AJAX
		
		$this->load->model('Diary_model');
		$this->Diary_model->load();
	
		
		}
	//**************************DIARY****************************///
	
	//**************************VIOLATIONS****************************///
	public function Sanctions(){
			
		$this->load->model('User_login');
		$this->load->model('Sanctions_model');
		$data['Sanction_Output'] = $this->Sanctions_model->getlist();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "6";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_sanction',$data);
			$this->load->view('User_footer');
			} 
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
			
	  }
	//**************************VIOLATIONS****************************///
	
	//**************************NOTIFICATIONS****************************///
	public function Notif(){
		
		//AJAX
		$this->load->model('Notify');
		$this->Notif->Notif();

	  }
	public function delete_selected()
		{
		 $this->load->model('Notify');
		 $this->Notif->delete_selected();
		 redirect('index.php/Student/Notification','refresh');
		 
		}
	public function delete_all()
		{
		 $this->load->model('Notify');
		 $this->Notif->delete_all();
		 redirect('index.php/Student/Notification','refresh');
		 
		}
	public function Notification(){
		
		$this->load->model('Notify');
		$this->load->model('User_login');
		$data['Notif_list'] = $this->Notif->getList();
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "";
		if($data['pass'] == 1){
			
			$this->load->view('User_header',$data);
			$this->load->view('User_notification',$data);
			$this->load->view('User_footer');
			} 
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}	
		
		}
		
		public function Notif_bell(){
		
			//AJAX
			
			$this->load->model('Notify');
			$this->Notif->notif_bell2();
			
		
		}	
		public function Notif_read(){
			
			$this->load->model('Notify');
			$this->Notif->read();
			$this->Notification();
			
			}
	//**************************NOTIFICATIONS****************************///
			
	
	//**************************CURRICULUM****************************///	
	public function Curriculum(){
			
			
			$this->load->model('User_login');
			$this->load->model('Curriculum_model');
			$data['Cur_list'] = $this->Curriculum_model->getlist();
			$data['pass'] = $this->User_login->jumpcheck();
			$data['error'] = "";
			$data['active'] = "";
			if($data['pass'] == 1){
			
				$this->load->view('User_header',$data);
				$this->load->view('Curriculum_list',$data);
				$this->load->view('User_footer');
			} 
			else{
				$data['error'] = "You must Login first";
				$this->load->view('Mobile_Login',$data);
			}		
	  }
	public function get_curriculum(){
			
			//AJAX
			$this->load->model('User_login');
			$this->load->model('Curriculum_model');
			$data['pass'] = $this->User_login->jumpcheck();
			$data['error'] = "";
			$data['active'] = "";
			if($data['pass'] == 1){
			
				$data['list'] = $this->Curriculum_model->getcur();
			} 
			else{
				$data['error'] = "You must Login first";
				$this->load->view('Mobile_Login',$data);
			}		
		
	  }
	  //**************************CURRICULUM****************************///	
	  
	 
	//**************************PASSWORD RESET****************************///	
	public function Reset_password()
	{
		$this->load->model('Reset_password_model');
		$data['Form'] = $this->Reset_password_model->Form();
		$this->load->view('Restore_Password',$data);
		
		
	}
	public function Confirm_code()
	{
		$this->load->model('Reset_password_model');
		$data['Form'] = $this->Reset_password_model->Confirmation();
		$this->load->view('Restore_Password',$data);
		
		
	}
	public function Reset_Form()
	{
		$this->load->model('Reset_password_model');
		$data['Form'] = $this->Reset_password_model->Change_Password();
		$this->load->view('Restore_Password',$data);
		
		
	}
	public function Reset()
	{
		$input = $this->session->userdata('reset_rn');
		$input = str_replace("'","\&#39;",$input);
		$input = stripslashes($input);
		
		if(!empty($input)){
			
			
			$this->load->model('Reset_password_model');
			$data['Form'] = $this->Reset_password_model->Reset();
			$this->load->view('Restore_Password',$data);
			
			
		}else{
			
			$this->Reset_password();
			
			}
		
		
	}
	//**************************PASSWORD RESET****************************///	
	
	
	//**************************LOGOUT****************************///	
	public function logout()
	{
		
		$this->load->model('User_login');
		$this->User_login->TimeOut();
		$this->session->unset_userdata('logged_in');
		redirect('index.php/Student/Main','refresh');
	}
	//**************************LOGOUT****************************///
	
	
	
	
	////// FAC_EVAL CONTROLLER ////
	 public function User_Faculty_Eval()
	 
	 
	{ 
	
	//////  FACULTY EVAL  ////
	
	$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "1";
		if($data['pass'] == 1){
	
	  $this->load->model('User_faculty_evaluation');
	    $data['geti'] = $this->User_faculty_evaluation->getinstructors();
		$this->load->view('User_header',$data);
		$this->load->view('User_Faculty_Eval',$data);
		$this->load->view('User_footer');
		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}			
		//////  FACULTY EVAL  ////
	}
	
	
	////// FAC_EVAL SATEFORM ////

	
	
	 public function  User_Sate_Form()
	 
	 
	{   
	
		$this->load->model('User_login');
		$data['pass'] = $this->User_login->jumpcheck();
		$data['error'] = "";
		$data['active'] = "1";
		if($data['pass'] == 1){
	
	
	
	   $this->load->model('user_sate_form_model');
	    $data['geta'] = $this->user_sate_form_model->getareas();
		$this->load->view('User_header',$data);
		$this->load->view('User_Sate_Form',$data);
		$this->load->view('User_footer');
		
		}
		else{
			$data['error'] = "You must Login first";
			$this->load->view('Mobile_Login',$data);
			}			
		
		////// FAC_EVAL SATEFORM ////
		
	}
	
	
	
	
	
        public function  Fac_Eval_Insert()
		{
		
	    
	    $this->load->model('User_sate_form_model');
	    $this->User_sate_form_model->Inserting();
		redirect('index.php/Student/User_Faculty_Eval','refresh');
		//$this->User_Faculty_Eval();
	    	
		
		}
	
	////// FAC_EVAL CONTROLLER ////
	
	
}
?>