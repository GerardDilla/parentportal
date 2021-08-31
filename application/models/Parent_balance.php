<?php


class Parent_balance extends CI_Model{
	

	public function getbal_sy(){

		//echo 'RF: '.$this->session->userdata('RF').' '.$this->session->userdata('lname').'test';
		$FN = $this->session->userdata('RF');
		$sql = "SELECT * from get_Enrolled_CollegeFees WHERE Reference_Number = '$FN' GROUP BY schoolyear DESC";
		$result = $this->db->query($sql);

		return $result;
	}
	public function getbal_sem(){

		//echo 'RF: '.$this->session->userdata('RF').' '.$this->session->userdata('lname').'test';
		$FN = $this->session->userdata('RF');
		$q = $_REQUEST['q'];
		$sql = "SELECT * from get_Enrolled_CollegeFees WHERE Reference_Number = '$FN' AND schoolyear = '$q' GROUP BY schoolyear DESC";
		$result = $this->db->query($sql);


	}
	public function getbal_search(){


		
		$FN = $this->session->userdata('RF');
		$getSY = $this->input->post('$getSY');
		$getSem = $this->input->post('$getSem');
		$submitbal = $this->input->post('$submitbal');
		$Output = "".$getSY.''.$getSem .''.$submitbal;
		
		/* Get semester and school year from legends
		$leg = "
		
		
			SELECT * FROM Legend;
		
			
		";
		
		$result_leg = $this->db->query($leg);
		*/
		//Get semester and school year from legends

		
		//IF THERE IS SY AND SEM INPUT, DEFAULT
		if($submitbal != ''){
			
		$sql = "
		
			SELECT (tuition_Fee + MISC + OTHER + LAB ) AS `tuition`, semester, schoolyear FROM get_Enrolled_CollegeFees WHERE Reference_Number = '$FN' AND schoolyear = '$getSY' AND Semester = '$getSem' GROUP BY schoolyear DESC, semester DESC LIMIT 1
		
		";
		
		$result = $this->db->query($sql);
		
		}
		//IF THERE IS SY AND SEM INPUT, DEFAULT
		
		
		
		//IF NO INPUT
		else{
			
		$get = "SELECT * FROM get_Enrolled_CollegeFees WHERE Reference_Number = '$FN' GROUP BY schoolyear DESC, semester DESC LIMIT 1";

		$res = $this->db->query($get);
			//print_r($get_latest_bal);

			if($res->num_rows() > 1){
				foreach($res->result_array() as $res_row){
					echo 'success';
					$sy = $res_row['schoolyear'];
					$sem = $res_row['Semester'];

					$sql = "
					
					
	SELECT (tuition_Fee + MISC + OTHER + LAB ) AS `tuition`, semester, schoolyear FROM get_Enrolled_CollegeFees WHERE Reference_Number = '$FN' AND schoolyear = '$sy' AND Semester = '$sem' GROUP BY schoolyear DESC, semester DESC LIMIT 1
					
						
					";
					
					
				}

				$result = $this->db->query($sql);
			}
			else{

				$result = $this->db->query($get);

			}			
		
		}
		//IF NO INPUT
		
		
	
		
		
		
		//IF FEES HAS RESULTS
		if($result->num_rows() > 0){
			
			$row = $result->row();
			
			$sem = $row->semester;
			$sy = $row->schoolyear;
			$balance = $row->tuition_Fee;
			
			
			//GET PAYMENT BASE FROM SEM AND SY OF LEGEND
			$sql2 = "
			
				SELECT AmountofPayment, semester, schoolyear FROM get_Enrolled_Payments WHERE 
			
			Reference_Number = '$FN' AND Semester = '$sem' AND SchoolYear = '$sy' GROUP BY schoolyear 
			
			DESC, semester DESC LIMIT 1
			
			";
			
			$result2 = $this->db->query($sql2);
			
			
			//CHECK IF THERE IS PAYMENT
			if($result2->num_rows() > 0){
				
			 $row2 = $result2->row();
			
			 $paid = $row2->AmountofPayment;
				
			}
			else
			{
				
			 $paid = " - ";
				
				
			}
				
				
				//MINUS TO FEES
				$total = $balance - $paid;
				
				
				$Output .= "<div id='bal'>";
     				$Output .= '<div style="text-align:center; margin-bottom:40px;">';
    				$Output .= '<h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;">School year:'.$sy.'</br>';
     				$Output .= '</br>';
     				$Output .= 'Semester:'.$sem.'</h4>';
     				$Output .= '</div>';
     				$Output .= '<table class="table table-striped" style="color:#666">';
     				$Output .= '<thead>';
     				$Output .= '<tr>';
     				$Output .= '<th></th>';
     				$Output .= '<th>Amount</th>';
     				$Output .= '</tr>';
     				$Output .= '</thead>';
     				$Output .= '<tbody>';
     				$Output .= '<tr>';
     				$Output .= '<td style="background-color:#16A085; color:#FFF;">Tuition</td>';
     				$Output .= '<td>'.$balance.'</td>';
     				$Output .= '</tr>';
     				$Output .= '<tr>';
    			    $Output .= '<td style="background-color:#16A085; color:#FFF;">Total Paid</td>';
     				$Output .= '<td>'.$paid.'</td>';
     				$Output .= '</tr>';
     				$Output .= '<tr>';
     				$Output .= '<td style="background-color:#666; color:#FFF; text-align:center;">TOTAL :</td>';
     				$Output .= '<td style="background-color:#666; color:#FFF; text-align:center;">'.$total.'</td>';
     				$Output .= '</tr>';
     				$Output .= '</tbody>';
     				$Output .= '</table>';
     				$Output .= '</div>';
			
		}

		return $Output;
		


	}
	public function getbal(){
		
		
		$FN = $this->session->userdata('RN');
		$Output = "";
		
		//Get semester and school year from legends
		$leg = "
		
		
			SELECT * FROM Legend;
		
			
		";
		
		$result_leg = $this->db->query($leg);
		//Get semester and school year from legends

		
		//IF LEGEND HAS NO RESULT, DEFAULT
		if($result_leg->num_rows() == 0){
			
		$sql = "
		
		
			SELECT (tuition_Fee + MISC + OTHER + LAB ) AS `tuition`, semester, schoolyear FROM get_Enrolled_CollegeFees WHERE 			Reference_Number = '$FN' GROUP BY schoolyear DESC, semester DESC LIMIT 1
		
			
		";
		
		$result = $this->db->query($sql);
		
		}
		//IF LEGEND HAS NO RESULT, DEFAULT
		
		
		
		//IF LEGEND HAS RESULT
		else{
			
		$row2 = $result_leg->row();
		$sem = $row2->Semester;
		$sy = $row2->School_Year;
		
		$sql = "
		
		
			SELECT (tuition_Fee + MISC + OTHER + LAB ) AS `tuition`, semester, schoolyear FROM get_Enrolled_CollegeFees WHERE 			Reference_Number = '$FN' AND semester = '$sem' AND schoolyear = '$sy' LIMIT 1
		
			
		";
		
		$result = $this->db->query($sql);
		
		}
		//IF LEGEND HAS RESULT
		
		
	
		
		
		
		//IF FEES HAS RESULTS
		if($result->num_rows() > 0){
			
			$row = $result->row();
			
			$sem = $row->semester;
			$sy = $row->schoolyear;
			$balance = $row->tuition;
			
			
			//GET PAYMENT BASE FROM SEM AND SY OF LEGEND
			$sql2 = "
			
				SELECT AmountofPayment, semester, schoolyear FROM get_Enrolled_Payments WHERE 
			
			Reference_Number = '$FN' AND Semester = '$sem' AND SchoolYear = '$sy' GROUP BY schoolyear 
			
			DESC, semester DESC LIMIT 1
			
			";
			
			$result2 = $this->db->query($sql2);
			
			
			//CHECK IF THERE IS PAYMENT
			if($result2->num_rows() > 0){
				
			 $row2 = $result2->row();
			
			 $paid = $row2->AmountofPayment;
				
			}
			else
			{
				
			 $paid = " - ";
				
				
			}
				
				
				//MINUS TO FEES
				$total = $balance - $paid;
				
				
				$Output .= "<div id='bal'>";
     				$Output .= '<div style="text-align:center; margin-bottom:40px;">';
    				$Output .= '<h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;">School year:'.$sy.'</br>';
     				$Output .= '</br>';
     				$Output .= 'Semester:'.$sem.'</h4>';
     				$Output .= '</div>';
     				$Output .= '<table class="table table-striped" style="color:#666">';
     				$Output .= '<thead>';
     				$Output .= '<tr>';
     				$Output .= '<th></th>';
     				$Output .= '<th>Amount</th>';
     				$Output .= '</tr>';
     				$Output .= '</thead>';
     				$Output .= '<tbody>';
     				$Output .= '<tr>';
     				$Output .= '<td style="background-color:#16A085; color:#FFF;">Tuition</td>';
     				$Output .= '<td>'.$balance.'</td>';
     				$Output .= '</tr>';
     				$Output .= '<tr>';
    			    $Output .= '<td style="background-color:#16A085; color:#FFF;">Total Paid</td>';
     				$Output .= '<td>'.$paid.'</td>';
     				$Output .= '</tr>';
     				$Output .= '<tr>';
     				$Output .= '<td style="background-color:#666; color:#FFF; text-align:center;">TOTAL :</td>';
     				$Output .= '<td style="background-color:#666; color:#FFF; text-align:center;">'.$total.'</td>';
     				$Output .= '</tr>';
     				$Output .= '</tbody>';
     				$Output .= '</table>';
     				$Output .= '</div>';
			
		}
		
		//IF FEES HAS NO RESULTS	
		else
		{	
			
			$Output .= "<h3>You have no records yet.</h3></br>";
			$Output .= "Please visit the SDCA <a style='color:#00F' href='#'> Helpdesk </a> if there are any concerns, Thank you!";
			 
		}
			 

			
			 
			
			 return $Output;
		}
	
		
}

?>