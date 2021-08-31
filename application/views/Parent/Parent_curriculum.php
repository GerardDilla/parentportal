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
	  
			echo $this->data['Cur_list'];
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


