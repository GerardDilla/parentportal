
<!--content--!-->
<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                               <h4 class="card-title" style="font-weight: 700; color: #800;"> Student Grades</h4>
                            </div>
                            <hr />
  		  <div style="margin: 30px; margin-top: 40px; padding:10px">
          <div style="overflow-y: auto">
          

                <h3 id="ErrorMessage"></h3>
                <form action="" method="post" style="margin-top:30px;">
                  <div class="form-group">
                    <label for="sel1" style="font-size: 20px; font-weight: 700; color: #800;">Academic Year:</label>
                    <select class="form-control" name="getSY" id="sel1" onchange="showcont(this.value)">
                    
                     
                  <?php
                  echo $this->data['resultSY']; 
                  ?>
                    
                    </select> 
                  </div>
                  
                  <div id="cont_appear" class="form-group" style="display:none;">
                    <label for="sel1" style="font-size: 20px; font-weight: 700; color: #800;">Semester:</label>
                      <div id="acad_sem">
                        <select class="form-control" name="getSEM" id="sel2">
                        
                       
                        
                        </select> 
                      </div>
                  </div>
                 
                 
                  <button type="button" id="btn_appear" class="btn center-block" style="margin:auto; margin-bottom:30px; background-color: #800; margin-top:20px; width:100px; display:none;" name="submit">Select</button>
                  
                </form>
        
              
              <table class="table table-striped" style="color:#666">

                <thead>
                  <tr>
                  <th>Subject Code</th>
                  <th>Description</th>
                  <th>Prelim</th>
                  <th>Midterm</th>
                  <th>Finals</th>
                  <th>Final Grade</th>
                  <th>Remark</th>
                  </tr>
                </thead>
						 
                <tbody id="grade_table">
              
                </tbody>

						  </table>
                     
                    


          </div>
          <!--Content--!-->
          </div>
          </div>
        </div><!--BODY--!-->
      </div>
    </div>



    <script>


$(document).ready(function(){

  $('#btn_appear').click(function(){
    
    grade_api();

  });
  

});

function grade_api(){

$('#grade_table').html('');
input = {
          Reference_Number: '<?php echo md5($this->data['RF']); ?>',
          School_Year: $('#sel1').val(),
          Semester: $('#sel2').val(),
        }
api_url = 'https://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/GradingAPI';
api_url_bal = 'https://www.stdominiccollege.edu.ph/SDCALMSv2/index.php/API/BalanceAPI';
ajax = $.ajax({
      url: api_url,
      type: 'GET',
      data: input,
      success: function(response){

          result = JSON.parse(response);
          if(result['ResultCount']  != 0){
            
            balanceresult = checkbalance(api_url_bal,input);
            balanceresult.done(function(balresult){


              balresult = JSON.parse(balresult);
              SemestralData = balresult['Output']['SemestralData'];
              if(SemestralData.length != 0){
                  console.log('has semestral data');
                  if(SemestralData[0]['balance'] <= 0){

                      console.log('has no balance');
                      $('.grade_table').html('');
                      $('#ErrorMessage').html('');
                      displaygrade(result);
                      return;

                  }
                  else{


                    console.log('has balance');
                    
                    $('#ErrorMessage').html('Student must settle Outstanding balance for this chosen semester to see the grade. <br> Visit <a href="https://www.stdominiccollege.edu.ph/parentportal/index.php/ParentPortal/balance">Here</a> to see the balance');
                    $('#grade_table').html('');
                    return;

                  }
                  

              }else{
                  

                  $('#ErrorMessage').html('Error: Could not find Balance data');
                  $('#gradingsheet').html('');


              }

            });

          }else{

            $('#grade_table').append(
              $('<tr>')
              .append(
                $('<td>').text(result['ErrorMessage'])
              )
            );
            
          }

      },
      fail: function(){

          alert('Error: request failed');
          return;

      }
  });

}

function checkbalance(balanceapi = '',input={}){

  //console.log(url);
  if(balanceapi == ''){
      message = {
          'message':'Error: You must provide the API URL',
          'type':'warning'
      }
      console.log(message);
      return;
  }
  return ajax = $.ajax({
      url: balanceapi,
      type: 'GET',
      data: input,
  });

}

function displaygrade(result = []){

  $.each(result['data'], function(index, row) 
  {
      $('#grade_table').append(
        $('<tr>')
        .append(
          $('<td>').text(row['Course_Code'])
        )
        .append(
          $('<td>').text(row['Course_Title'])
        )
        .append(
          $('<td>').text(row['Prelim'])
        )
        .append(
          $('<td>').text(row['Midterm'])
        )
        .append(
          $('<td>').text(row['Finals'])
        )
        .append(
          $('<td>').text(row['FINALGRADE'])
        )
        .append(
          $('<td>').text(row['REMARKS'])
        )
      );
  });
}
</script>


    