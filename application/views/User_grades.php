<meta charset="UTF-8">
<?php 

		$sem = $this->input->post('getSEM');
	  	$sy = $this->input->post('getSY');
			
			if($sy == ""){
				$test3 = 1;
				$css = "panel-collapse collapse in";
				
							}
				else{
					$test3 = 2;
					$css = "panel-collapse collapse";
				
					}
?>
<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card" style="padding:15px">
                            <div class="card-header">
                               <h4 class="card-title"> Grades</h4>
                            </div>
  		
 
<hr />
 

               <form action="<?php echo site_url();?>index.php/Student/grades" method="post" style="margin-top:30px;">
                <div class="form-group">
                  <label for="sel1">Academic Year:</label>
                  <select class="form-control" name="getSY" id="sel1" onchange="showcont(this.value)">

                  
                  <?php
            	  echo $resultSY;	
            	  ?>
                  
                  </select> 
                </div>
                
                 <div id="cont_appear" class="form-group" style="display:none;">
                  <label for="sel1">Semester:</label>
                  <div id="acad_sem">
                  <select class="form-control" name="getSEM" id="sel2">
                  
              	 
            	  	
                  </select> 
                  </div>
                </div>
               
               
                      <button id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; margin-top:20px; width:100px; display:none;	" name="submit" id="submitD" type="submit">Select</button>
            		
              </form>

  


        <div id="hidden">
        
        <div class="section-to-print">
        
             <?php 	
			 
			  //DISPLAYS THE TABLE OUTPUT
                 echo $Grade_Output;
				 
				 
				 
             ?>
             
            
        </div>
            
		    </br>
        <button class="btn btn-success center-block" data-toggle="modal" data-target="#myModal" style="display:none">Complete List</button>  
      	</br>
      
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="margin-top:50px;" tabindex="-1">
<div class="modal-dialog">
      
    <!-- Modal content-->
    <div class="modal-content" id="login" style="display:block; width:100%;">
	  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="color:#666">&times;</button>
        <h3 class="modal-title" style="color:#666">Grades</h3>
        
      </div>
      
      <div class="">
      <div class="modal-body divprint" style="min-width:auto; overflow:auto; min-height:400px; font-size:14px;">
         
                <?php 
				echo $All_Grades;
				?>
          </br></br>   
         	
       
      </div>
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
</div>
</div>
</div>
            
<script>
            var hidden = document.getElementById('hidden');
			var active = "<?php echo $test3 ?>";
			if(active == 1){
			hidden.style.display ="none";
			
			}
			else{
				hidden.style.display ="block";
				}


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
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/get_sem?q="+str, true);
  xhttp.send();
  cont_appear.style.display="block";	
  btn_appear.style.display="block";	
  
}
</script>

          </div>
         
        </div><!--BODY--!-->