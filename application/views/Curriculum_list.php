<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                               <h4 class="card-title"> Curicullum</h4>
                            </div>
  		<div class="curi" style="margin-left:40px; margin-right:40px;">
  		<form action="#" method="post" style="margin-top:30px;">
    	<div class="form-group">
      	<label for="get_c">Course:</label>
      	<select class="form-control" name="get_c" id="get_c" onchange="show_c(this.value)">
     	 <option style="color:#CCC">Select Course:</option>
      
     	 <?php
	  
			echo $Cur_list;
		  ?>
      
     	 </select> 
         </div>
         </form>
         
         <div id="curriculum" style="max-height:400px; overflow-y:auto;">
         
         </div>
         
         
</div>    
</div>
           
</div>
</div>

<script>

 function printpage(){
				window.print();
				}

function show_c(str) {
  var xhttp;
 
  if (str == "") {
    document.getElementById("curriculum").innerHTML = "";
    return;
  }
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("curriculum").innerHTML = this.responseText;
	
    }
  };
  
  xhttp.open("GET", "<?php echo base_url(); ?>index.php/Student/get_curriculum?q="+str, true);
  xhttp.send();
  
  
}
</script>
