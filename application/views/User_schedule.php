<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card" style="padding:15px">
                            <div class="card-header">
                               <h4 class="card-title"> Schedule</h4>
                            </div>
  
  
  
  
            <form action="" method="post" style="margin-top:30px;">
              <div class="form-group">
                <label for="sel1">Academic Year:</label>
                <select class="form-control" name="schedSY" id="sel1" onchange="showcont(this.value)">
                  <!--School Year--!-->
                  <?php
	  			  
				  echo $SYlist;
					
	  			  ?>
                  <!--School Year--!-->
                </select>
              </div>
              <div id="cont_appear" class="form-group" style="display:none;">
                <label for="sel1">Semester:</label>
                <div id="acad_sem">
                  <select class="form-control" name="getSEM" id="sel2">
                    <!--AJAX--!--> 
                    
                    <!--AJAX--!-->
                  </select>
                </div>
              </div>
              <button id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; margin-top:20px; width:100px; display:none;	" name="submit" id="submitD" type="submit">
              Select
              </button>
            </form>
   
    
    <?php
	
		echo $Schedule_Output;
		
	?>
    
    <button class="btn btn-success center-block" style="margin:auto; margin-bottom:30px; margin-top:50px; display:none;" 
	data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-print"> </span> </button>
    <!--CONTENT--!--> 
    
    <script type="text/javascript">
			
            function printpage(){
				window.print();
				}
    </script>
    
  </div>
  
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog" >
    <div class="modal-dialog"> 
      
      <!-- Modal content-->
      <div class="modal-content" id="login" style="margin-top:150px; color:#666; font-family:Verdana, Geneva, sans-serif; padding:20px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body divprint"> 
          
          <!--CONTENT--!-->
          <?php
				echo $Schedule_Output;
			?>
          <!--CONTENT--!--> 
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-success center-block" onclick="printpage()">Print</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal --> 
  
</div>
<!--BODY--!--> 



</div>
</div>
</div>
</div>





<script>
function showcont(str) {
  var xhttp;
 
  if (str == "") {
    document.getElementById("acad_sem").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("acad_sem").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/sched_sem?q="+str, true);
  xhttp.send();
  cont_appear.style.display="block";	
  btn_appear.style.display="block";	
  
}
</script> 
