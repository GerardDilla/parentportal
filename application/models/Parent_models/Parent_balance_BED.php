<?php


class Parent_balance_BED extends CI_Model{
	
	////////////FOR BASIC EDUCATION AND SENIOR HIGH/////////////////////
	public function getbalance($sn){

		$sql = 
		"

		SELECT 
		(Initial_Payment 
		+ First_Payment 
		+ Second_Payment 
		+ Third_Payment 
		+ Fourth_Payment 
		+ Fifth_Payment 
		+ Sixth_Payment 
		+ Seventh_Payment) 
		AS Fees, schoolyear,Student_Number  
		FROM Basiced_EnrolledFees 
		WHERE Student_Number = '$sn'
		
		";


		$result = $this->db->query($sql);

		return $result;
	}
	public function getpayment(){


		$sql = 
		"

		SELECT SUM(AmountofPayment) AS AmountofPayment
		,Student_Number
		,SchoolYear 
		FROM Basiced_Payments_Throuhput 
		WHERE Student_Number = '$sn' 
		GROUP BY SchoolYear
		
		";
		$result = $this->db->query($sql);

		return $result;
	}
	public function getlatestbal($sn){


		$sql = 
		"

		SELECT 
		schoolyear
		,Student_Number  
		FROM Basiced_EnrolledFees 
		WHERE Student_Number = '$sn' 
		ORDER BY schoolyear DESC LIMIT 1
		
		";

		$result = $this->db->query($sql);
		
		return $result;
		
	}
	public function getOutstandingbal($sn,$sy){

		$sql = 
		"

		SELECT 
		SUM(Initial_Payment 
		+ First_Payment 
		+ Second_Payment 
		+ Third_Payment 
		+ Fourth_Payment 
		+ Fifth_Payment 
		+ Sixth_Payment 
		+ Seventh_Payment) 
		AS Fees, schoolyear,Student_Number  
		FROM Basiced_EnrolledFees 
		WHERE Student_Number = '$sn'
		
		";

		$result = $this->db->query($sql);
		
		return $result;
	}
	public function CheckOutstandingbal($sn,$sy){

		$sql = 
		"
		SELECT 
		SUM(Initial_Payment 
		+ First_Payment 
		+ Second_Payment 
		+ Third_Payment 
		+ Fourth_Payment 
		+ Fifth_Payment 
		+ Sixth_Payment 
		+ Seventh_Payment) 
		AS Fees, schoolyear,Student_Number 
		FROM Basiced_EnrolledFees 
		WHERE Student_Number = '$sn' 
		AND id <> 
		( 
			SELECT id FROM Basiced_EnrolledFees 
			WHERE Student_number = '$sn' 
			ORDER BY SchoolYear DESC LIMIT 1
		)
		";

		$result = $this->db->query($sql);
		
		return $result;
	}
	public function gettotalpaid($sn,$sy){

		$sql = 
		"

		SELECT SUM(AmountofPayment) AS AmountofPayment
		,Student_Number
		,SchoolYear 
		FROM Basiced_Payments_Throuhput 
		WHERE Student_Number = '$sn'
		
		";
		$result = $this->db->query($sql);
		
		return $result;	
	}
	public function checktotalpaid($sn,$sy){

		$sql = 
		"

		SELECT SUM(AmountofPayment) AS AmountofPayment
		,Student_Number
		,SchoolYear 
		FROM Basiced_Payments_Throuhput 
		WHERE Student_Number = '$sn'
		AND id <> 
		(
			SELECT id FROM Basiced_Payments_Throuhput WHERE Student_Number = '$sn'ORDER BY SchoolYear DESC LIMIT 1
		)
		
		";
		$result = $this->db->query($sql);
		
		return $result;	
	}
	public function semestralbalance($sn,$sy){


		$sql = 
		"

		SELECT 
		(Initial_Payment 
		+ First_Payment 
		+ Second_Payment 
		+ Third_Payment 
		+ Fourth_Payment 
		+ Fifth_Payment 
		+ Sixth_Payment 
		+ Seventh_Payment) 
		AS Fees, schoolyear,Student_Number  
		FROM Basiced_EnrolledFees 
		WHERE Student_Number = '$sn'
		AND schoolyear = '$sy'
		
		";

		$result = $this->db->query($sql);
		
		return $result;
	}
	public function gettotalpaidsemester($sn,$sy){

		$sql = 
		"

		SELECT SUM(AmountofPayment) as AmountofPayment
		,Student_Number
		,SchoolYear 
		FROM Basiced_Payments_Throuhput 
		WHERE Student_Number = '$sn'
		AND SchoolYear = '$sy'
		
		";
		$result = $this->db->query($sql);
		
		return $result;	
	}


}

?>