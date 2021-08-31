<?php


class Parent_model extends CI_Model{
	

	
public function student_list()
{
	
	$id = $this->session->userdata('p_id');
	//echo $id;
	/*
	$sql = 
	"
		SELECT * FROM `parentportal_assign` AS A 
		JOIN 
		(SELECT Student_Number,First_Name,Last_Name,Reference_Number FROM Student_Info UNION SELECT Student_number,First_Name,Last_Name,Reference_Number FROM Basiced_Studentinfo) 
		AS B ON A.Student_Number = B.Student_Number 
		WHERE A.Student_Number IS NOT NULL AND A.Student_Number <> 0
		AND A.p_account_id = '$id' GROUP BY A.Student_Number DESC

	";
	*/
	$sql = 
	"
	SELECT * FROM `parentportal_assign` WHERE p_account_id = '$id'
	AND Student_Number IS NOT NULL AND Student_Number <> 0 AND active = '1' GROUP BY Student_Number DESC 
	";

	$result = $this->db->query($sql);

	return $result;
		
}
public function getname($sn,$dp)
{


	if($dp == 'HED'){

		$sql = 
		"
		SELECT First_Name,Last_Name FROM `Student_Info` WHERE Student_Number = '$sn'
		";

	}else{

		$sql = 
		"
		SELECT First_Name,Last_Name FROM `Basiced_Studentinfo` WHERE Student_number = '$sn'
		";

	}
	$result = $this->db->query($sql);
	$name = '';
	foreach($result->result_array() as $row)
	{
		$name = $row['First_Name'].' '.$row['Last_Name'];
	}
	return $name;

}
public function getref($sn,$dp)
{

	if($dp == 'HED'){

		$sql = 
		"
		SELECT Reference_Number FROM `Student_Info` WHERE Student_Number = '$sn'
		";

	}else{

		$sql = 
		"
		SELECT Reference_Number FROM `Basiced_Studentinfo` WHERE Student_number = '$sn'
		";

	}
	$result = $this->db->query($sql);
	$ref = '';
	foreach($result->result_array() as $row)
	{
		$ref = $row['Reference_Number'];
	}
	return $ref;

}
public function get_reference_number($sn)
{
	
	$sql = 
	"

	SELECT * FROM Student_Info WHERE Student_Number = '$sn' LIMIT 1

	";

	$result = $this->db->query($sql);

	return $result;

}
public function get_reference_number_bed_shs($sn)
{
	
	$sql = 
	"

	SELECT * FROM Basiced_Studentinfo WHERE Student_number = '$sn' LIMIT 1

	";

	$result = $this->db->query($sql);
	$rn = '';
	foreach($result->result_array() as $row){
		$rn = $row['Reference_Number'];
	}

	return $rn;

}
public function setup_department($id,$dept)
{
	
	$sql = 
	"

	UPDATE parentportal_assign
	SET student_dept = '$dept'
	WHERE ppa_id = '$id';

	";

	$result = $this->db->query($sql);

	return $result;
}
public function check_validity($id,$dept)
{
	
	if($dept == 'HED'){
		$sql = 
		"
	
		SELECT * FROM Student_Info WHERE Student_Number = '$id'
	
		";

	}
	else{
		$sql = 
		"
	
		SELECT * FROM Basiced_Studentinfo WHERE Student_number = '$id'
	
		";
	}


	$result = $this->db->query($sql);

	return $result;
}
public function feedback_query($name,$email,$feedback,$parent_id){

	//echo $name.':'.$email.':'.$feedback.':'.$parent_id;
	$data = array(
        'parent_id' => $parent_id,
        'p_name' => $name,
		'p_email' => $email,
		'p_feedback' => $feedback,
	);
	$this->db->set('feedback_date', 'NOW()', FALSE); 
	if($this->db->insert('parent_feedback', $data)){

		return true;

	}else{

		return false;
	}
}

	public function Get_Legends()
	{	
		$result = $this->db->get('Legend');
		return $result->result_array();

	}

}
?>