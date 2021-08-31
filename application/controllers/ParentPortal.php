<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ParentPortal extends MY_Controller {

	
	function __construct() {
        parent::__construct();
        $this->load->model('Parent_models/Parent_login');
        $this->load->model('Parent_models/Parent_model');
        $this->load->model('Parent_models/Parent_grade');
        $this->load->model('Parent_models/Parent_schedule');
		$this->load->model('Parent_models/Parent_balance');
		$this->load->model('Parent_models/Parent_balance_BED');
		$this->load->model('Parent_models/Grades_model_BED');
		$this->load->model('Parent_models/Policy_Model');
        $this->load->model('Curriculum_model');
		$this->data['message'] = '';
		$this->data['choose_student_message'] = '';
        //Basic Info
		$this->data['fname'] = $this->session->userdata('fname');
		$this->data['lname'] = $this->session->userdata('lname');
		$this->data['RF'] = $this->session->userdata('RF');
		$this->data['School_Year'] = '';
		$this->data['Semester'] = '';
		$this->data['Schedule_New'] = '';
		$this->data['Schedule_Old'] = ''; 
		$this->load->model('Grades_model');

   
    }
	public function index()
	{
		$this->Main(); 
		
	}
	
	public function Main()
	{
		
		$this->load->view('Parent/Mobile_Login_Parent');
			
	}
	public function Login()
	{
		$result = $this->Parent_login->P_Log();
		if($result->num_rows() > 0)
		{
			$result = $result->result_array();
			$account_session = 
			array
			(
				'p_id' => $result[0]['p_account_id'],
				'fname' => $result[0]['p_fname'],
				'lname' => $result[0]['p_lname'],
				'parent_token' => '1'
			);
			$this->session->set_userdata($account_session);
			//$this->Select();
			$privacy_policy_array['Reference_Number'] = $account_session['p_id'];
			$privacy_policy_array['System'] = 'Parent Portal';
			$privacy_check = $this->Policy_Model->check_privacy_agreement($privacy_policy_array);
			if($privacy_check == 0){
				$this->privacy_policy($privacy_policy_array);
			}else{
				$this->select();
			}
			
		}
		else
		{
			$this->data['message'] = 'Invalid Username or Password';
			$this->load->view('Parent/Mobile_Login_Parent');
		}
		
			
	}
	public function privacy_policy(){

		$this->load->view('Parent/Parent_header_no_nav');
		$this->load->view('Parent/Privacy_Policy');
		$this->load->view('Parent/Parent_footer');

	}
	public function privacy_policy_accept(){
		$array = array(
			'Reference_Number' => $this->session->userdata('p_id'),
			'System' => 'Parent Portal',
			'Date' => date("Y-m-d")
		);
		$this->Policy_Model->insert_agreement($array);
		redirect('index.php/ParentPortal/Select','Refresh');

	}
	//----------------------------STUDENT SELECTION PROCESS-------------------------------------------
	public function Set_student()
	{

		$student_ref = $this->input->post('student_ref');
		$student_fullname = $this->input->post('student_fullname');
		$RF = $this->input->post('RF');
		$dept = $this->input->post('dept');
		//echo $RF.'test: '.$student_fullname;
		$check = $this->Parent_model->check_validity($student_ref,$dept);
			if($check->num_rows() != 0){

				$student_data = array(
				'student_dept'  => $dept,
				'student_reference_no'  => $student_ref,
				'student_fullname' => $student_fullname,
				'RF' => $RF
				);
		
				$this->session->set_userdata($student_data);

				if($dept == 'HED'){
					redirect('index.php/ParentPortal/Dashboard', 'refresh');
				}else{
					redirect('index.php/ParentPortal/BEDBalance', 'refresh');
				}

				/*
				$bal_check = $this->check_balance($student_ref,$dept);
				//echo $bal_check;
				if($bal_check > 0){
		
					$msg = 
					
					'<u>'.$student_fullname.'</u>
					still has an existing balance.<br>
					Please settle your account to access the portal.<br><br>
					Thank you!
					';
					$this->session->set_flashdata('Balance_msg',$msg); 
		
					redirect('index.php/ParentPortal/Select?'.$student_fullname);
		
				}
				else{
					
					if($dept == 'HED'){
						redirect('index.php/ParentPortal/Dashboard', 'refresh');
					}else{
						redirect('index.php/ParentPortal/BEDBalance', 'refresh');
					}
				}
				*/
			}
			else{
				$this->data['choose_student_message'] = 'Student did not match the chosen department';
				$this->Select();
			}

		
		
		
			
	}
	public function student_setup()
	{
		$student_ref = $this->input->post('student_ref');
		$assign_id = $this->input->post('ppa_id');
		$dept = $this->input->post('dept');

		$check = $this->Parent_model->check_validity($student_ref,$dept);
		if($check->num_rows() != 0){
			$this->Parent_model->setup_department($assign_id,$dept);
			if($this->db->affected_rows() == '1'){
				$this->data['choose_student_message'] = 'Successfully assigned the student!';
				$this->Select();
			}
			else
			{
				$this->data['choose_student_message'] = 'An error occured!';
				$this->Select();
			}
		}
		else{
			$this->data['choose_student_message'] = 'The Student is not found on your chosen department';
			$this->Select();
		}

	}
	public function Select()
	{
		$result = $this->Parent_model->student_list();
		$count = 0;
		foreach($result->result_array() as $row1){
			
			$student_info[$count]['SN'] = $row1['Student_Number'];
			$student_info[$count]['DEPT'] = $row1['student_dept'];
			$student_info[$count]['ID'] = $row1['ppa_id'];
			$student_info[$count]['NAME'] = $this->Parent_model->getname($row1['Student_Number'],$row1['student_dept']);
			$student_info[$count]['REF'] = $this->Parent_model->getref($row1['Student_Number'],$row1['student_dept']);
			
			$count++;
		}
		$this->data['Handled_Students_result'] = $student_info;

		//print_r($student_info);
		$count = 0;
		/*echo '<br><br><br>';
		foreach($student_info as $row)
		{	
			echo $row['SN'].'<br>';
			echo $row['DEPT'].'<br>';
			echo $row['ID'].'<br>';
			echo $row['NAME'].'<br><br>';
		}
		*/
		//$this->layout('Parent/Parent_profile');
		$this->load->view('Parent/Parent_header_no_nav');
		$this->load->view('Parent/Parent_profile');
		$this->load->view('Parent/Parent_footer');
			
	}
	public function Handled()
	{
		$result = $this->Parent_model->student_list();
		$count = 0;
		foreach($result->result_array() as $row1){
			
			$student_info[$count]['SN'] = $row1['Student_Number'];
			$student_info[$count]['DEPT'] = $row1['student_dept'];
			$student_info[$count]['ID'] = $row1['ppa_id'];
			$student_info[$count]['NAME'] = $this->Parent_model->getname($row1['Student_Number'],$row1['student_dept']);
			$student_info[$count]['REF'] = $this->Parent_model->getref($row1['Student_Number'],$row1['student_dept']);

			$count++;
		}
		$this->data['Handled_Students_result'] = $student_info;
		$this->layout('Parent/Parent_profile');		
	}
	//----------------------------STUDENT SELECTION PROCESS-------------------------------------------END

	//----------------------------DASHBOARD-------------------------------------------
	public function Dashboard()
	{	
		//Schedule Output
		$sn = $this->session->userdata('student_reference_no');
		$this->data['legend'] = $this->Parent_model->Get_Legends();
		$this->layout('Parent/Parent_dashboard');
			
	}
	//----------------------------DASHBOARD-------------------------------------------END

	//----------------------------GRADING FUNCTIONS-------------------------------------------
	public function Grades()
	{
		
		$this->data['resultSY'] = $this->Parent_grade->getSY();
		$this->layout('Parent/Parent_grade');
		
	}
	public function get_sem()
	{
		
		//AJAX
		$this->Parent_grade->getSem();
		
		
	}
	//----------------------------GRADING FUNCTIONS-------------------------------------------END

	//----------------------------SCHEDULE FUNCTIONS-------------------------------------------
	public function Schedule()
	{
 		
		$this->data['SYlist'] = $this->Parent_schedule->SYchoice();
		$this->layout('Parent/Parent_schedule');

				
	}

	public function sched_sem()
	{
		
		//Ajax
		$this->Parent_schedule->Sem_ajax();
		
		
	}
	//----------------------------SCHEDULE FUNCTIONS-------------------------------------------END

	//----------------------------BALANCE FUNCTIONS-------------------------------------------
	public function balance()
	{
		$this->data['legend'] = $this->Parent_model->Get_Legends();
		$this->layout('Parent/Parent_balance');
		
	}
	public function balance_semlist()
	{
 		//AJAX: gets available semester when user chooses a schoolyear
		$this->Parent_balance->getbal_sem();
		//echo '<option>test<option>';
		
	}
	public function check_balance($sn,$sl){


		//echo $sn.'<br>'.$sl.'<br>';
		$bal_check = '';
		if($sl == 'HED'){

			//echo 'get from hed<br>';
			//$sn = $this->session->userdata('student_reference_no');
			$rn = $this->getstudent_reference_number($sn);
			$latestbal = $this->Parent_balance->getlatestbal($rn);
			foreach($latestbal->result_array() as $latestbal_row){
				$sy = $latestbal_row['schoolyear'];
				$sem = $latestbal_row['semester'];
			}
			//echo $sy.' '.$sem.'<br>';
			$outstanding = $this->Parent_balance->check_Outstandingbal($rn,$sy,$sem);
			$totalpaid = $this->Parent_balance->check_totalpaid($rn,$sy,$sem);
			foreach($outstanding->result_array() as $outstanding_row){
				$ob = $outstanding_row['Fees'];
			}
			foreach($totalpaid->result_array() as $totalpaid_row){
				$tp = $totalpaid_row['AmountofPayment'];
			}
			//echo $ob.' '.$tp.'<br>';
			$bal_check = $ob - $tp;
			//echo '<br>'.$bal_check.'<br>';
			return $bal_check;

		}
		else{

			//echo 'get from bed and shs<br>';

			$sn = $this->session->userdata('student_reference_no');
			$sy = '';
	
			$latestbal = $this->Parent_balance_BED->getlatestbal($sn);
			foreach($latestbal->result_array() as $latestbal_row){
				$sy = $latestbal_row['schoolyear'];
			}
			
			$outstanding = $this->Parent_balance_BED->CheckOutstandingbal($sn,$sy);
			$totalpaid = $this->Parent_balance_BED->checktotalpaid($sn,$sy);
			foreach($outstanding->result_array() as $outstanding_row){
				$ob = $outstanding_row['Fees'];
			}
			foreach($totalpaid->result_array() as $totalpaid_row){
				$tp = $totalpaid_row['AmountofPayment'];
			}
			//echo $ob.' '.$tp.'<br>';
			$bal_check = $ob - $tp;
			//echo '<br>'.$bal_check.'<br>';
			return $bal_check;

		}

	}
	//----------------------------BALANCE FUNCTIONS-------------------------------------------END

	//----------------------------CURRICULUM FUNCTIONS-------------------------------------------
	public function Curriculum()
	{
			
			$this->data['Cur_list'] = $this->Curriculum_model->getlist();
			$this->layout('Parent/Parent_curriculum');
					
	}
	public function get_curriculum()
	{
			
			//AJAX
			$this->data['curriculum_list'] = $this->Curriculum_model->getcur();
					
		
	}
	//----------------------------CURRICULUM FUNCTIONS-------------------------------------------END



	//USE THIS FUNCTION IF REFERENCE NUMBER IS NEEDED, GETS STUDENT NUMBER THEN RETURNS REFERENCE NUMBER WHEN CALLED
	public function getstudent_reference_number($sn)
	{

		$result = $this->Parent_model->get_reference_number($sn);

		foreach($result->result_array() as $row){
			$rf = $row['Reference_Number'];
		}

		return $rf;

	}

	//----------------------------TEMPORARY: BASIC EDUCATION AND SENIOR HIGH PORTAL FUNCTIONS---------------/////

	public function BEDBalance(){

		$sn = $this->session->userdata('student_reference_no');
		$sy = '';
		
		$this->data['legend'] = $this->Parent_model->Get_Legends();

		$latestbal = $this->Parent_balance_BED->getlatestbal($sn);
		foreach($latestbal->result_array() as $latestbal_row){
			$sy = $latestbal_row['schoolyear'];
		}
		
		$outstanding = $this->Parent_balance_BED->getOutstandingbal($sn,$sy);
		$totalpaid = $this->Parent_balance_BED->gettotalpaid($sn,$sy);
		$sembalance = $this->Parent_balance_BED->semestralbalance($sn,$sy);
		$totalpaidsem = $this->Parent_balance_BED->gettotalpaidsemester($sn,$sy);
		foreach($outstanding->result_array() as $outstanding_row){
			$ob = $outstanding_row['Fees'];
		}
		foreach($totalpaid->result_array() as $totalpaid_row){
			$tp = $totalpaid_row['AmountofPayment'];
		}
		foreach($sembalance->result_array() as $sembalance_row){
			$sembal = $sembalance_row['Fees'];
		}
		foreach($totalpaidsem->result_array() as $totalpaidsem_row){
			$sempaid = $totalpaidsem_row['AmountofPayment'];
		}
		
		$this->data['Outstanding_Balance'] = $ob-$tp;
		$this->data['Semestral_Balance'] = $sembal;
		$this->data['Sem_total_Paid'] = $sempaid;
		$this->data['Total_Paid'] = $sembal - $sempaid;
		$this->data['Bal_Schoolyear'] = $sy;
		$this->data['Bal_Semester'] = '';
		/*//Uncomment to validate variables
		if($this->input->post('getSY') == '' || $this->input->post('getSem') == ''){
		echo $this->data['Outstanding_Balance'].'<br>';
		}
		echo $this->data['Semestral_Balance'].'<br>';
		echo $this->data['Sem_total_Paid'].'<br>';
		if($this->input->post('getSY') == '' || $this->input->post('getSem') == ''){
		echo $this->data['Total_Paid'].'<br>';
		}
		echo 'reference:'.$rn;
		*/
		
		$this->data['SY_list'] = $this->Parent_balance_BED->getbalance($sn,$sy);
		$this->data['Balance_Output'] = $this->Parent_balance->getbal_search();
		$this->layout('Parent/Parent_balance');
		
	}

	public function BEDGrade(){

		$sn = $this->session->userdata('student_reference_no');
		$sy = '';

		$latestbal = $this->Parent_balance_BED->getlatestbal($sn);
		foreach($latestbal->result_array() as $latestbal_row){
			$sy = $latestbal_row['schoolyear'];
		}
		
		$outstanding = $this->Parent_balance_BED->CheckOutstandingbal($sn,$sy);
		$totalpaid = $this->Parent_balance_BED->checktotalpaid($sn,$sy);
		foreach($outstanding->result_array() as $outstanding_row){
			$ob = $outstanding_row['Fees'];
		}
		foreach($totalpaid->result_array() as $totalpaid_row){
			$tp = $totalpaid_row['AmountofPayment'];
		}
		//echo $ob.' '.$tp.'<br>';
		$bal_check = $ob - $tp;
		//echo $bal_check;
		
		if($bal_check <= 0){
			$sn = $this->session->userdata('student_reference_no');
			$rn = $this->Parent_model->get_reference_number_bed_shs($sn);
			$this->data['BED_Grade_Output'] = $this->Grades_model_BED->getGrades($rn);
			$this->layout('Parent/Parent_grade_BED');
		}
		else{
			//echo 'with balance';
			$this->data['message'] = 
			'
			<div class="row">
			<div class="col-md-3" style="text-align:center">
				<i style="font-size:500%" class="	fa fa-exclamation-circle" aria-hidden="true"></i> 
			</div>
			<div class="col-md-9">
				Please settle your existing balance to display the Grade. <bR>
				Thank you for your understanding!
			</div>
			</div>
			';
			$this->layout('Parent/Parent_grade_BED');
		}


		
	}

	//----------------------------TEMPORARY: BASIC EDUCATION AND SENIOR HIGH PORTAL FUNCTIONS---------------/////
	public function maintenance()
	{

		$this->layout('maintenance');

	}

	public function feedback()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|trim|prep_for_form|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('feedback', 'Feedback', 'required|trim|max_length[500]');

		if ($this->form_validation->run() == FALSE)
		{
				//$this->load->view('myform');
				//echo 'fail: <br>';
				echo '<span style="color:#cc0000">'.form_error('name').'</span>';
				echo '<span style="color:#cc0000">'.form_error('email').'</span>';
				echo '<span style="color:#cc0000">'.form_error('feedback').'</span>';
				//echo validation_errors();
		}
		else
		{
				//$this->load->view('formsuccess');
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$feedback = $this->input->post('feedback');
				$parent_id = $this->input->post('parent_id');
				$insert = $this->Parent_model->feedback_query($name,$email,$feedback,$parent_id);
				echo $insert;
				//if($insert == true)
				//echo validation_errors();
		}
	}
	public function Logout(){

		
		$this->session->unset_userdata('parent_token');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('student_reference_no');
		$this->session->unset_userdata('student_fullname');
		$this->session->unset_userdata('RN');
		$this->Main();

	}
	
	
	


		

	
	
	
	
	
}
?>