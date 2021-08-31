

<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card" style="padding:15px">
                            <div class="card-header">
                               <h4 class="card-title" style="font-weight: 700; color: #800;"> Schedule</h4>
                            </div>
                            <hr />
           <div class="container">
            <div class="row">
              <div class="col-md-12">
  
              
              <form action="" method="post" style="margin-top:30px;">
                <div class="form-group">
                  <label for="sel1" style="font-size: 20px; font-weight: 700; color: #800;" >Academic Year:</label>
                  <select class="form-control" name="schedSY" id="sel1" onchange="showcont_sched(this.value)">
                    <!--School Year--!-->
                    <?php
  	  			  
          				  echo $this->data['SYlist'];
          					
          	  			?>
                    <!--School Year--!-->
                  </select>
                </div>
                <div id="cont_appear" class="form-group" style="display:none;">
                  <label for="sel2" style="font-size: 20px; font-weight: 700; color: #800;">Semester:</label>
                  <div id="acad_sem">
                      <!--AJAX--!--> 
                      <!--CONTENT HERE DEPENDS ON THE SCHOOL YEAR CHOICE, IT DOES THIS VIA AJAX--!--> 
                      <!--AJAX--!-->
                  </div>
                </div>
                <button id="btn_appear" class="btn btn-primary" style="margin:auto; margin-bottom:30px; margin-top:20px; background-color: #800; width:100px; display:none;	" name="submit_sched" value="1" id="submitD" type="button">
                Select
                </button>
              </form>


              <div style="text-align:center; margin-bottom:40px;">
              <h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;">
                School year:
                <span id="sy_label"></span>
                </br>
                </br>
                Semester:
                <span id="sem_label"></span>
              </h4>
              </div>
              <div id="list_table" style="max-height:400px; overflow-y:auto; margin-top:20px; border-top:solid thin #ccc; border-bottom:solid thin #ccc;">

                
                <table class="table table-striped" style="color:#666">
                <thead>
                  <tr>
                  <th>Title</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Instructor</th>
                  </tr>
                </thead>
                <tbody id="sched_table">


                  
                </tbody>
                </table>
                

              </div>

    
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


$(document).ready(function(){

  $('#btn_appear').click(function(){
    schedule_api();
  });

});


function schedule_api(){

  $('#sched_table').html('');

  ajax = $.ajax({
      url: 'https://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/ScheduleAPI',
      type: 'GET',
      data: {
        Reference_Number: '<?php echo md5($this->data['RF']); ?>',
        School_Year: $('#sel1').val(),
        Semester: $('#sel2').val(),
      },
      success: function(response){

          result = JSON.parse(response);
          if(result['ResultCount']  != 0){

            $.each(result['data'], function(index, row) 
              {
                  $('#sched_table').append(
                    $('<tr>')
                    .append($('<td>').text(row['Course_Code']))
                    .append($('<td>').text(row['Day']))
                    .append($('<td>').text(row['Time']))
                    .append($('<td>').text(row['Instructor']))
                  );
              });

            $('#sy_label').html($('#sel1').val());
            $('#sem_label').html($('#sel2').val());

          }else{

            $('#sched_error').html(result['ErrorMessage']);
            
          }

      },
      fail: function(){

          alert('Error: request failed');
          return;

      }
  });

}


</script>