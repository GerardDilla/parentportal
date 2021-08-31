<script type="text/javascript">
  $(document).ready(function(){
        document.getElementById("btn1").disabled = true;
		document.getElementById("btn2").disabled = true;
		document.getElementById("btn3").disabled = true;
    });

</script>

<!--content--!-->

<div id="page-content-wrapper" style="width:100%; height:100%; cursor:default;">
<div class="container-fluid">
<div class="row" style="margin-top:auto; margin-bottom:auto;">
<div class="col-md-12"><!--HEADER--!-->
  
  <div class="row content-title"><span style="margin-left:50px; margin-top:20px; margin-bottom:20px;" class="glyphicon glyphicon-user"></span> Accounts</div>
</div>
<!--HEADER--!-->

<div class="col-md-12" id="ContentContainer">
<!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:20px; margin-bottom:30px; min-width:100%; overflow:auto;">
  <h3 style="color:#666"> <!--Message--!-->
    <?php 
			$msg = $this->session->userdata('msg'); 
			echo $msg; 
			$this->session->unset_userdata('msg');
			?>
  </h3>
  <div class="form-group" style="margin-top:30px;"> <!--Search--!-->
    
    <form method="get" action="<?php echo site_url(); ?>index.php/administrator/account_search" class="inline">
      <input type="text" class="form-control" id="search" name="query" placeholder="Search..">
      <button class="btn btn-info inline" style="margin:auto; margin-bottom:30px; margin-top:20px;" name="submit" type="submit">Search</button>
    </form>
  </div>
  <div id="list_table" style="max-height:400px; overflow-y:auto; ">
    <table class="table table-striped" style="color:#666; font-size:16px; max-height:400px; overflow-y:auto;">
      <thead>
        <tr>
          <th>Student Number</th>
          <th>FirstName</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Last Time-In</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		
			echo $Account_list;
			
		?>
      </tbody>
    </table>
  </div>
  <?php
	echo "<div class='pagination' id='pagination'>".$this->pagination->create_links()."</div>";
	?>
</div>
<!--BODY--!--> 

<!-- Modal -->
<div id="editmodal" class="modal fade container-fluid" role="dialog" >
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px;font-family:Verdana, Geneva, sans-serif;">
      <div class="modal-header"> <!-- Modal Header-->
        
        <input type='text' class='firstname' value="" readonly style='border:none; font-size:24px; color:#666'>
        <button type="button" style="color:#666;" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal Header End-->
      
      <div class="modal-body"> <!-- Modal Body-->
        
        <div class="row"><!-- Row-->
          
          <div id="accountpic" class="img-thumbnail img-responsive">AJAX</div>
          <button class="btn btn-info center-block" style="margin-bottom:10px;" type="submit" onclick="enable()">Enable options <span class="glyphicon glyphicon-pencil"></span></button>
          <script>
				function enable() {
					
   			    document.getElementById("btn1").disabled = false;
				document.getElementById("btn2").disabled = false;
				document.getElementById("btn3").disabled = false;
				
									   }
			 </script>
          <div class="col-md-4">
            <form action="<?php echo site_url(); ?>index.php/administrator/reset_password" method="post">
              <input type='hidden' class='SN_ID' name="R_PASS" value="" readonly>
              <button style="width:100%;" class="btn btn-success center-block" type="submit" id="btn1">Reset Password</button>
            </form>
          </div>
          <div class="col-md-4">
            <form action="<?php echo site_url(); ?>index.php/administrator/reset_email" method="post">
              <input type='hidden' class='SN_ID' name="R_EML" value="" readonly>
              <button style="width:100%;" class="btn btn-success center-block" type="submit" id="btn2">Reset Email</button>
            </form>
          </div>
          <div class="col-md-4">
            <form action="<?php echo site_url(); ?>index.php/administrator/reset_picture" method="post">
              <input type='hidden' class='SN_ID' name="R_PIC" value="" readonly>
              <button style="width:100%;" class="btn btn-success center-block" type="submit" id="btn3">Reset Picture</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Row End--> 
      
    </div>
    <!-- Modal Body End--> 
    
  </div>
  <!--modalend--!--> 
</div>
<script>

function openmodal(){

}
</script> 
<script>
function showpic(str) {
  var xhttp;
  $("#editmodal").modal('show');
  $('.firstname').val(str);
  $('.SN_ID').val(str);
  
  if (str == "") {
    document.getElementById("accountpic").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("accountpic").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/administrator/account_manage?q="+str, true);
  xhttp.send();
  
  
}
</script> 
