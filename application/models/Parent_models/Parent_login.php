<?php


class Parent_login extends CI_Model{
	

	
public function P_Log()
{
	
	$username = $this->input->post('U_ID');
	$password = $this->input->post('U_Password');

	//Filters
	$password = str_replace("'","\&#39;",$password);
	$password = stripslashes($password);
	$username = str_replace("'","\&#39;",$username);
	$username = stripslashes($username);

	$sql = 
	"
	SELECT * FROM parent_accounts WHERE p_username = '$username' AND p_password = '$password' AND active = '1'

	";

	$result = $this->db->query($sql);
	
	return $result;
	
}
			
}
?>