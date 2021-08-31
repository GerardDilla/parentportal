<?php


class Parent_schedule extends CI_Model{
	
	public function GetLatest($sn,$sy,$sem){
		
		$sql = "SELECT * FROM EnrolledStudent_Subjects WHERE Student_Number = '$sn' ORDER BY School_Year DESC,Semester DESC LIMIT 1";
		$result = $this->db->query($sql);
		return $result; 
	}
	public function sched_dashboard($sn){

		$sql = "SELECT * FROM EnrolledStudent_Subjects WHERE Student_Number = '$sn' ORDER BY School_Year DESC,Semester DESC LIMIT 1";
		$result = $this->db->query($sql);
		return $result;

	}
	public function GetNewSched($sn,$sy,$sem){

		$chechsched1 = 
		"
			SELECT S.Sched_Code,S.Course_Code, Subj.Course_Title, S.Start_Time, S.End_Time, D.day, D.Day_Display, R.Room FROM EnrolledStudent_Subjects AS EnSubj
			INNER JOIN Sched AS S ON EnSubj.Sched_Code = S.Sched_Code
			LEFT JOIN `Day` AS D ON S.DayID = D.ID
			INNER JOIN `Subject` AS Subj ON S.Course_Code = Subj.Course_Code
			JOIN `Room` AS R ON S.RoomID = R.ID
			WHERE EnSubj.Student_Number = '$sn'
			AND EnSubj.School_Year = '$sy'
			AND EnSubj.`Semester` = '$sem'
			AND EnSubj.`Dropped` = '0'
			AND EnSubj.`Cancelled` = '0'
			AND EnSubj.`Charged` = '0'
			GROUP BY S.Sched_Code
		";

		$chkresult1 = $this->db->query($chechsched1);

		return $chkresult1;

	}
	public function GetOldSched($sn,$sy,$sem){

		$chechsched2 = 
		"	
			SELECT * FROM EnrolledStudent_Subjects AS EnSubj
			INNER JOIN SchedOld AS SO ON EnSubj.Sched_Code = SO.schedcode
			INNER JOIN `Subject` AS Subj ON SO.subjectcode = Subj.Course_Code
			WHERE EnSubj.Student_Number = '$sn'
			AND EnSubj.Semester = '$sem'
			AND EnSubj.School_Year = '$sy'
			AND EnSubj.`Dropped` = '0'
			AND EnSubj.`Cancelled` = '0'
			AND EnSubj.`Charged` = '0'
			GROUP BY SO.schedcode

		";

		$chkresult2 = $this->db->query($chechsched2);

		return $chkresult2;

	}
	public function SYchoice(){
		
		
		$Student_Number = $this->session->userdata('student_reference_no');
		
		$SY_sql = "SELECT School_Year FROM EnrolledStudent_Subjects WHERE Student_Number = '$Student_Number' GROUP BY School_Year";
		$SY_result = $this->db->query($SY_sql);
		
		if($SY_result->num_rows() != 0){
		
		$Output = '<option>Select Academic Year:</option>'; 
			
		foreach($SY_result->result_array() as $SY_row)
		  {

		  $Output .= '<option>'.$SY_row['School_Year'].'</option>';
		
		  }
		}else{
			
			$Output = '<option style="color:#CCC">You have no data yet. Proceed to Helpdesk if there are concerns</option>';
			
			}
		
		return $Output;

	}
	public function Sem_ajax(){
		
		$q = $_REQUEST["q"];
		$SN = $this->session->userdata('student_reference_no');
		$sql = "SELECT Semester FROM EnrolledStudent_Subjects WHERE Student_Number='$SN' AND School_Year = '$q' GROUP BY Semester DESC";
		//echo $sql;
		$result = $this->db->query($sql);
		
		echo '<select class="form-control" name="schedSEM" id="sel2">';
		foreach($result->result_array() as $row){
		echo "<option>".$row['Semester']."</option>";
		}
		echo "</select>";
		
		}
	public function convertTIME($S){
		
		if($S == 700){
			$t = '7:00am';
		}
		else if($S == 730){
			$t = '7:30am';
		}
		else if($S == 800){
			$t = '8:00am';
		}
		else if($S == 830){
			$t = '8:30am';
		}
		else if($S == 900){
			$t = '9:00am';
		}
		else if($S == 930){
			$t = '9:30am';
		}
		else if($S == 1000){
			$t = '10:00am';
		}
		else if($S == 1000){
			$t = '10:00am';
		}
		else if($S == 1030){
			$t = '10:30am';
		}
		else if($S == 1100){
			$t = '11:00am';
		}
		else if($S == 1130){
			$t = '11:30am';
		}
		else if($S == 1200){
			$t = '12:00pm';
		}
		else if($S == 1300){
			$t = '1:00pm';
		}
		else if($S == 1330){
			$t = '1:30pm';
		}
		else if($S == 1400){
			$t = '2:00pm';
		}
		else if($S == 1430){
			$t = '2:30pm';
		}
		else if($S == 1500){
			$t = '3:00pm';
		}
		else if($S == 1530){
			$t = '3:30pm';
		}
		else if($S == 1600){
			$t = '4:00pm';
		}
		else if($S == 1630){
			$t = '4:30pm';
		}
		else if($S == 1700){
			$t = '5:00pm';
		}
		else if($S == 1730){
			$t = '5:30pm';
		}
		else if($S == 1800){
			$t = '6:00pm';
		}
		else if($S == 1830){
			$t = '6:30pm';
		}
		else if($S == 1900){
			$t = '7:00pm';
		}
		else if($S == 1930){
			$t = '7:30pm';
		}
		else if($S == 2000){
			$t = '8:00pm';
		}
		else if($S == 2030){
			$t = '8:30pm';
		}
		else if($S == 2100){
			$t = '9:00pm';
		}
		else if($S == 2130){
			$t = '9:30pm';
		}
		else if($S == 2200){
			$t = '10:00pm';
		}
		else if($S == 2230){
			$t = '10:30pm';
		}
		else{
			$t = " ";
			}
			
			return $t;	
			
		}
	
	
	
}

?>