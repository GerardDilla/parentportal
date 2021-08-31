<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card" style="padding:15px">
                            <div class="card-header">
                               <h4 class="card-title" style="font-weight: 700; color: #800;"> Dashboard</h4>
                            </div>
                            <br>
                            <br>
  
       
<div class="container">
  
<div class="row" id="legend" data-schoolyear="<?php echo $this->data['legend'][0]['School_Year'] ?>" data-semester="<?php echo $this->data['legend'][0]['Semester'] ?>">

<!-- CARD -->
 <div class="col-md-6" style="padding: 10px">
  <div class="card">
    <div class="row">
      <div class="col-md-6">
      <div class="card-balance">
        <div class="balance-card">
           <i class="fa fa-calculator" aria-hidden="true"></i>
        </div>
      </div>
      </div>
      <div class="col-md-6">
        <label style="font-weight: 700; color: #800; font-size: 18px;">Balance:</label>
      </div>
    </div>
    <div style="max-height:200px; min-height:200px; overflow:auto">

          <table class="table table-striped" id="balance_table">
            <thead>
                <tr>
                <th></th>
                <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            <tr class="balance_upper">
            <td>Total Assesment</td>
            <td class="balance_upper_value" id="sem_balance"><b></b></td>
            </tr>
            <tr class="balance_upper">
                <td>Payments</td>
                <td class="balance_upper_value" id="sem_paid"></td>
            </tr>
            <tr class="balance_lower">
                <td>Semestral Balance :</td>
                <td class="balance_lower_value" id="sem_total_balance">
                        
                </td>
            </tr>
            </tbody>
        </table>

    </div>
          <div  style="text-align: right;">
          <a  href="<?php echo base_url();?>index.php/ParentPortal/balance"><span style="color: #800; font-weight: 700;">View more</span></a>  
          </div>
  </div>
  </div>
 <!--////// CARD -->


 <!-- CARD -->
 <div class="col-md-6" style="padding: 10px">
  <div class="card">
    <div class="row">
      <div class="col-md-6">
      <div class="card-balance">
        <div class="grade-card">
           <i class="fa fa-tasks" aria-hidden="true"></i>
        </div>
      </div>
      </div>
      <div class="col-md-6">
        <label style="font-weight: 700; color: #800; font-size: 18px;">Grade:</label>
      </div>
    </div>
    <div style="max-height:200px; min-height:200px; overflow:auto;">


      <table class="table table-striped" style="color:#666">
        <thead>
          <tr>
            <th>Course</th>
            <th>Remark</th>
          </tr>
        </thead>
        <tbody id="grade_table">

        </tbody>
      </table>


    </div>
          <div  style="text-align: right;">
          <a  href="<?php echo base_url();?>index.php/ParentPortal/balance"><span style="color: #800; font-weight: 700;">View more</span></a>  
          </div>
  </div>
  </div>
 <!--////// CARD -->


 <!-- SCHEDULE CARD CARD -->
  <div class="col-md-12" style="padding: 10px">
          <div class="card">
            <div class="row">
              <div class="col-md-6">
                <div class="card-balance">
                  <div class="sched-card">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label style="font-weight: 700; color: #800; font-size: 18px;">Schedule:</label>
              </div>
          </div>
          <div style="max-height:500px; min-height:200px; min-width:300px; overflow:auto; z-index: 100;">

                <table class="table table-striped" style="color:#666">
                  <thead>
                    <tr>
                    <th>Title</th>
                    <th>Day</th>
                    <th>Time</th>
                    </tr>
                  </thead>
                  <tbody id="sched_table">


                  </tbody>
                </table>

                <h3 id="sched_error"></h3>

            <div  style="text-align: right;">
            <a  href="<?php echo base_url();?>index.php/ParentPortal/Schedule"><span style="color: #800; font-weight: 700;">View more</span></a>  
            </div>
  </div>
  </div>
 <!--////// CARD -->


  </div>


  </div>
 




</div>
</div>
<!--BODY--!--> 



</div>
</div>
</div>
</div>

<script>


$(document).ready(function(){

  grade_api();

  schedule_api();

  balance_api();

});


function grade_api(){

    $('#grade_table').html('');
    ajax = $.ajax({
          url: 'https://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/GradingAPI',
          type: 'GET',
          data: {
              Reference_Number: '<?php echo md5($this->data['RF']); ?>',
              School_Year: $('#legend').data('schoolyear'),
              Semester: $('#legend').data('semester'),
              Checkbal: 1,
          },
          success: function(response){

              result = JSON.parse(response);
              if(result['ResultCount']  != 0){
                
                $.each(result['data'], function(index, row) 
                {
                    $('#grade_table').append(
                      $('<tr>')
                      .append(
                        $('<td>').text(row['Course_Code'])
                      )
                      .append(
                        $('<td>').text(row['REMARKS'])
                      )
                    );
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

function schedule_api(){

  $('#sched_table').html('');
  ajax = $.ajax({
        url: 'https://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/ScheduleAPI',
        type: 'GET',
        data: {
          Reference_Number: '<?php echo md5($this->data['RF']); ?>',
          School_Year: $('#legend').data('schoolyear'),
          Semester: $('#legend').data('semester'),
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
                    );
                });

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

function balance_api(){

  ajax = $.ajax({
        url: 'https://stdominiccollege.edu.ph/SDCALMSv2/index.php/API/BalanceAPI',
        type: 'GET',
        data: {
          Reference_Number: '<?php echo md5($this->data['RF']); ?>',
              School_Year: $('#legend').data('schoolyear'),
              Semester: $('#legend').data('semester'),
              Checkbal: 1,
        },
        success: function(response){

            result = JSON.parse(response);
            $('#sem_balance').html(result['Output']['Semestral_Fee']);
            $('#sem_paid').html(result['Output']['Semestral_Paid']);
            $('#sem_total_balance').html(result['Output']['Semestral_Balance']);

        

        },
        fail: function(){

            alert('Error: request failed');
            return;

        }
    });

}

</script>