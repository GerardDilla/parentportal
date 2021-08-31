<?php


class Grades_model_BED extends CI_Model{
	

	public function getGrades($rn){
		
		$ay = $this->get_ay($rn);
		$qt = $this->get_quarter($rn);
		$sm = $this->get_sem($rn);

		$sql = "
			SELECT *
			FROM basiced_grading_enrolled_grades_final AS A 
			INNER JOIN basiced_grading_subjects AS B ON A.subject_id = B.id
			WHERE A.`Reference_Number` = '$rn' 
			AND A.School_Year = '$ay'
			AND A.Quarter = '$qt'
			AND B.semester = '$sm'
			ORDER BY B.subject_title ASC
		";

		$result = $this->db->query($sql);

		return $result;
	}
	public function get_ay($rn){

		$sql = 
		"
		SELECT School_Year 
		FROM basiced_grading_enrolled_grades_final 
		WHERE `Reference_Number` = '$rn' 
		ORDER BY School_Year DESC LIMIT 1
		";

		$result = $this->db->query($sql);
		$ay = '';
		foreach($result->result_array() as $row){
			$ay = $row['School_Year'];
		}
		return $ay;


	}
	public function get_sem($rn){

		$sql = 
		"
		SELECT B.`semester`
		FROM basiced_grading_enrolled_grades_final AS A 
		INNER JOIN basiced_grading_subjects AS B ON A.subject_id = B.id
		WHERE A.`Reference_Number` = '$rn' 
		ORDER BY B.semester DESC 
		LIMIT 1
		";
		$result = $this->db->query($sql);
		$sem = '';
		foreach($result->result_array() as $row){
			$sem = $row['semester'];
		}
		return $sem;
		
	}
	public function get_quarter($rn){

		$sql = "
		SELECT `Quarter`
		FROM basiced_grading_enrolled_grades_final 
		WHERE `Reference_Number` = '$rn' 
		ORDER BY `Quarter` DESC LIMIT 1
		";
		$result = $this->db->query($sql);
		$qt = '';
		foreach($result->result_array() as $row){
			$qt = $row['Quarter'];
		}
		return $qt;
		
	}
	

}

?>