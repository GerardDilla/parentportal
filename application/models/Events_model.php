<?php


class Events_model extends CI_Model{
	
	public function getEvents()
	{
			
		$cate = $this->input->post('cate');
			$events_refresh = $this->input->post('events_refresh');
			$event_src = $this->input->post('event_src');
			$Output = "";
			if(isset($cate)){
				
				$sql = "SELECT * FROM event_calendar WHERE Department='$cate' AND published = '1' ORDER BY Date DESC";
				$result = $this->db->query($sql);
				//echo "input";
			}
			else if(isset($events_refresh)){
				
				$sql = "SELECT * FROM event_calendar WHERE published = '1' ORDER BY Date DESC";
				$result = $this->db->query($sql);
				//echo "refreshed";
			}
			else if(isset($event_src)){
				
				$sql = "SELECT * FROM event_calendar WHERE published = '1' AND Event_Name LIKE '%$event_src%' OR Location LIKE '%event_src%' ORDER BY Date DESC";
				$result = $this->db->query($sql);
				//echo "refreshed";
			}
			else{
				
				$sql = "SELECT * FROM event_calendar WHERE published = '1' ORDER BY Date DESC";
				$result = $this->db->query($sql);
				//echo "no input";
				
				}
			
			if($result->num_rows() > 0){
				
			
			$Output .= 
			'
				 <table class="table table-striped" style="color:#666; overflow-x: auto;">
					  <thead>
						  <tr>
							<th>Event Name</th>
							<th>Description</th>
							<th>Date</th>
							<th>Location</th>
							<th>Department</th>
							
					   
						  </tr>
					  </thead>
				<tbody>
			';	
				
			foreach($result->result_array() as $row){
				
				$Output .= '<tr>';
				$Output .= '<td>'.$row['Event_Name'].'</td>';
				$Output .= '<td>'.$row['Description'].'</td>';
				$Output .= '<td>'.$row['Date'].'</td>';
				$Output .= '<td>'.$row['Location'].'</td>';
				$Output .= '<td>'.$row['Department'].'</td>';
				$Output .= '</tr>';
			}
			
			$Output .= 
			'
				 </tbody>
           		 </table>
			';
			
			}
			else{
				
				$Output .= "<h3>No records yet.</h3></br>";
				$Output .= "Please visit the SDCA <a style='color:#00F' href='#'> Helpdesk </a> if there are any concerns, Thank you!";
				
				}
					
				return $Output;
		
	}
	public function event_modal()
	{
		
		//AJAX 
		$q = $_REQUEST["q"];
		
		$sql = "SELECT * FROM event_calendar WHERE Event_ID='$q' LIMIT 1";
            $result = $this->db->query($sql);
            if($result->num_rows() == 1){
            $row = $result->row();
            $E = $row->Event_Name;
            $D = $row->Date;
            $L = $row->Location;
            $Dc = $row->Description;
            }
            else{
            $E = "";
            $D = "";
            $L = "";
            $Dc = "";
                }
				
		
		if($result->num_rows() > 0){
			
		
			
			echo "<h3>Event ID: ".$q."</h3><br />";
			
			echo '
				
			  <p style="color:#cc0000">Please set the date again</p>
			  <br />
			  <form method="post" action="'.site_url().'index.php/administrator/edit_event">
			  <input type="hidden" class="form-control" id="event" name="E_ID" value="'.$q.'">
			  <label for="event">Event Name*:</label>
			  <input type="text" class="form-control" id="event" name="event_E" value="'.$E.'">
			  <label for="date">Date*:</label>
			  <input type="date" class="form-control" name="date_E" value="'.$D.'">
			  <label for="loc">Location*:</label>
			  <input type="text" class="form-control" id="loc" name="loc_E" value="'.$L.'">
			  <label for="dept">Department:</label>
			  <select class="form-control" id="dept" name="dept_E">
				<option>All</option>
				<option>SIHTM</option>
				<option>SASE</option>
				<option>SHSP</option>
				<option>SBCS</option>
			  </select>
			  <label for="course">Description:</label>
			  <input type="text" class="form-control" id="course" name="desc_E" value="'.$Dc.'">
			  <button class="btn btn-info center-block" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Update</button>
			  </form>
			  <form action="'.site_url().'index.php/administrator/event_delete" method="post">
			  <button class="btn btn-danger center-block" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="E_DEL" value='.$q.' type="submit">Unpublish</button>
			  </form>
        
        
          ';
			
			
			}
		else{
				
			echo '';
				
				}
		
	}
	public function delete()
	{
		
			$E_ID = $this->input->post('E_DEL');
			
			$sql = "UPDATE event_calendar SET Published='0' WHERE Event_ID='$E_ID'";
			
			if($result = $this->db->query($sql)){
				$msg = "<span style='color:#FF0000' >Event was Unpublished".$E_ID."</span></br>";
				
				}else{
					$msg = "<span style='color:#FF0000' >There was an error</span></br>";
					
					}
	
			
			
			$msg_session = array(
						 'message' => $msg 
						 );
			$this->session->set_userdata($msg_session);
		
		
	}
	public function event_register()
	{
			
		$id = $this->session->userdata('ID');
		$event = $this->input->post('event');
		$date = $this->input->post('date');
		$loc = $this->input->post('loc');
		$dept = $this->input->post('dept');
		$desc = $this->input->post('desc');
		
		if($event == ""){
			$msg = "<span style='color:#FF0000' >No Event name entered</span></br>";
		} 
		else if($date == ""){
			$msg = "<span style='color:#FF0000' >No Event date entered</span></br>";
		}
		else if($loc == ""){
			$msg = "<span style='color:#FF0000' >No Event location entered</span></br>";
		}
		else if($dept == ""){
			$msg = "<span style='color:#FF0000' > No Event department entered </span></br>";
		}
		else{
			
		$sql = "INSERT INTO event_calendar (Event_Name,Date,Location,Department,Description,ID,Published)
VALUES ('$event','$date','$loc','$dept','$desc','$id','1');";
		$result = $this->db->query($sql);	
			
		$msg = "<h2 style='color:#666' > Event Added </h2></br>";
		}
		
		return $msg;
		
	}
	public function getid()
	{
		
		$edit_ID = $this->input->post('eventID');
		$session = array(
						 'E_ID' => $edit_ID
						 );
		$this->session->set_userdata($session);
	
		}
	public function eventEdit()
	{
		
		$event = $this->input->post('event_E');
		$date = $this->input->post('date_E');
		$loc  = $this->input->post('loc_E');
		$dept = $this->input->post('dept_E');
		$desc = $this->input->post('desc_E');
		$E_ID = $this->input->post('E_ID');
		
		if($event == NULL){
			$msg = "<span style='color:#FF0000' >No Event name entered</span></br>";
		} 
		else if($date == NULL){
			$msg = "<span style='color:#FF0000' >No Event date entered</span></br>";
		}
		else if($loc == NULL){
			$msg = "<span style='color:#FF0000' >No Event location entered</span></br>";
		}
		else if($dept == NULL){
			$msg = "<span style='color:#FF0000' > No Event department entered </span></br>";
		}
		
		else{
			
		$sql = "UPDATE event_calendar SET Event_Name='$event',Date='$date',Location='$loc',Department='$dept',Description='$desc' WHERE Event_ID='$E_ID'";
		$result = $this->db->query($sql);	
			
		$msg = "<h2 style='color:#666;' > Event Updated!</h2></br>";
		}
		
		$msg_session = array(
						 'message' => $msg
						 );
		$this->session->set_userdata($msg_session);
		
		}
		
	public function admin_event()
	{
		
		$event_src = $this->input->post('event_src');
		$event_src_fil = str_replace("'","\'",$event_src);
		$admin_ID = $this->session->userdata('ID');
		if(isset($event_src)){
				
				$sql = "SELECT * FROM `event_calendar` WHERE Event_Name LIKE '%$event_src_fil%' OR Department LIKE '%$event_src_fil%' OR Date LIKE '%$event_src_fil%'  OR Location LIKE '%$event_src_fil%' AND Published='1' ORDER BY Date DESC";
				$result = $this->db->query($sql);
			
			}
		else{
			
				$sql = "SELECT * FROM `event_calendar` WHERE Published='1' ORDER BY Date DESC";
				$result = $this->db->query($sql);
		
		}
		
		$Output = "";
		
		
		foreach($result->result_array() as $row){
		$author = $row['ID'];
		$eventID = $row['Event_ID'];
		$Output .= '<tr>';
		$Output .= '<td>'.$row['Event_Name'].'</td>';
		$Output .= '<td>'.$row['Description'].'</td>';
		$Output .= '<td>'.$row['Date'].'</td>';
		$Output .= '<td>'.$row['Location'].'</td>';
		$Output .= '<td>'.$row['Department'].'</td>';
		
		if($admin_ID != $author){
			$filter = "disabled";
			}else{
				$filter = "";
				}
		//$Output .= '<form method="Post" action="'.site_url().'index.php/administrator/event_manage">';
	  	$Output .= '<td><button onclick="eventmodal(this.value)" id="event_edit_button" class="btn btn-info glyphicon glyphicon-pencil" type="submit" '.$filter.' style="width:50px" name="eventID" value="'.$eventID.'"></button></td>';
	  	//$Output .= '</form>';
		$Output .= '</tr>';
		}
		return $Output;
		
	}
		
	public function category()
	{
		
		$admin_ID = $this->session->userdata('ID');
		$Dept = $this->input->post('cate');
		$sql = "SELECT * FROM `event_calendar` WHERE Published='1' AND Department='$Dept' ORDER BY Date DESC";
		$result = $this->db->query($sql);
		$Output = "";
		foreach($result->result_array() as $row){
		$author = $row['ID'];
		$eventID = $row['Event_ID'];
		$Output .= '<tr>';
		$Output .= '<td>'.$row['Event_Name'].'</td>';
		$Output .= '<td>'.$row['Description'].'</td>';
		$Output .= '<td>'.$row['Date'].'</td>';
		$Output .= '<td>'.$row['Location'].'</td>';
		$Output .= '<td>'.$row['Department'].'</td>';
		
		if($admin_ID != $author){
			$filter = "disabled";
			}else{
				$filter = "";
				}
		$Output .= '<form method="Post" action="'.site_url().'index.php/administrator/event_manage">';
	  	$Output .= '<td><button class="btn btn-info glyphicon glyphicon-pencil" type="submit" '.$filter.' style="width:50px" name="eventID" value="'.$eventID.'"></button></td>';
	  	$Output .= '</form>';
		$Output .= '</tr>';
		}
		return $Output;
		
	}
		
	
	
}

?>