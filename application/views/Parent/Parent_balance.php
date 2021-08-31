<?php $student_dept = $this->session->userdata('student_dept'); ?>
<?php
$msg = "";
$msg2 = "";
$hide = "";
?>
<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                               <h4 class="card-title" style="font-weight: 700; color: #800;"> Student Balance</h4>
                            </div>
<hr />
              


<?php //print_r($this->data['SY_list']); ?>

<!--BODY--!-->
<div class="container row" id="alignment" style="margin-top:50px; margin-bottom:20px; min-height:auto; overflow-y:auto;">

	  <div style="margin: 20px;">
          <div style="overflow-y: auto">
                
                  
                <div style="text-align:center;" id="legend" data-schoolyear="<?php //echo $this->data['legend'][0]['School_Year']; ?>" data-semester="<?php //echo $this->data['legend'][0]['Semester']; ?>" style="margin-bottom:40px; min-width:250px; overflow:auto;">
        						<h4 style="font-family:Verdana, Geneva, sans-serif; color:#666;">
                                Academic Year: <?php echo $this->data['legend'][0]['School_Year']; ?>
                                <?php if($student_dept == 'HED'): ?>
                                    <br><br> 
                                    Semester: <?php echo $this->data['legend'][0]['Semester']; ?>
                                <?php endIf; ?>
                                </h4>
        		</div>



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
                    <td class="balance_upper_value" id="sem_balance"><b>0.00</b></td>
                    </tr>
                    <tr class="balance_upper">
                        <td>Payments</td>
                        <td class="balance_upper_value" id="sem_paid">0.00</td>
                    </tr>
                    <tr class="balance_lower">
                        <td>Semestral Balance :</td>
                        <td class="balance_lower_value" id="sem_total_balance">
                                0.00  
                        </td>
                    </tr>
                    <tr class="balance_lower">
                        <td>Previous Balance :</td>
                        <td class="balance_lower_value" id="previous_balance">
                                0.00
                        </td>
                    </tr>
                    <tr class="balance_lower">
                        <td>OUTSTANDING BALANCE :</td>
                        <td class="balance_lower_value" id="outstanding_balance">
                                0.00
                        </td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <div style="text-align:center">

                    <a href="https://stdominiccollege.edu.ph/SDCAPayment/" id="paymentlink" class="btn btn-info btn-lg" target="_blank">Pay Online</a>

                </div>
                 
                <br><br>

                <h3>Payment Options</h3>
                <br>
                <h4><u>Payment Facilities</u></h4>
                <h5>1. BANKS (HIGHER ED)</h5>
                <table class="table table-striped" style="color:#666">
                    <thead>
                        <tr>
                        <th>EASTWEST BANK</th>
                        <th>SA#2000-000-65641-7</th>
                        </tr>
                        <tr>
                        <th>ASIA UNITED BANK</th>
                        <th>SA#120-11-890730-3</th>
                        </tr>
                        <tr>
                        <th>RCBC</th>
                        <th>SA#1-345-00086-7</th>
                        </tr>
                        <tr>
                        <th>BDO</th>
                        <th>SA#0000-70-16129-1</th>
                        </tr>
                    </thead>
                </table>
                <h5>-BILLS PAYMENTS SECTION (SM MALLS)</h5>
                <table class="table table-striped" style="color:#666">
                    <thead>
                        <tr>
                        <th>SM BACOOR DEPARTMENT STORE</th>
                        </tr>
                        <tr>
                        <th>SM HYPERMARKET - MOLINO</th>
                        </tr>
                        <tr>
                        <th>SM HYPERMARKET - IMUS</th>
                        </tr>
                        <tr>
                        <th>SM SAVEMORE FRC - ZAPOTE</th>
                        </tr>
                    </thead>
                </table>
                <h5>2. BANK (BASIC EDUCATION & SENIOR HIGHSCHOOL)</h5>
                <table class="table table-striped" style="color:#666">
                    <thead>
                        <tr>
                        <th>EASTWEST BANK</th>
                        <th>SA#200-200240-2</th>
                        </tr>
                    </thead>
                </table>
                <h5>-BILLS PAYMENTS SECTION (SM MALLS)</h5>
                <table class="table table-striped" style="color:#666">
                    <thead>
                        <tr>
                        <th>SM BACOOR DEPARTMENT STORE</th>
                        </tr>
                        <tr>
                        <th>SM HYPERMARKET - MOLINO</th>
                        </tr>
                        <tr>
                        <th>SM HYPERMARKET - IMUS</th>
                        </tr>
                        <tr>
                        <th>SM SAVEMORE FRC - ZAPOTE</th>
                        </tr>
                    </thead>
                </table>
                <h5>3. WIRE TRANSFER PAYMENT INFORMATION</h5>
                <table class="table table-striped" style="color:#666">
                    <thead>
                        <tr>
                        <th>BANK NAME: EASTWEST BANKING CORPORATION
</th>
                        </tr>
                        <tr>
                        <th>BANK ADDRESS: TALABA IV, CITY OF BACOOR, PHL 4102
</th>
                        </tr>
                        <tr>
                        <th>ACCOUNT NAME: ST.DOMINIC COLLEGE OF ASIA INC.</th>
                        </tr>
                        <tr>
                        <th>ACCOUNT NUMBER: 200-000-65641-7</th>
                        </tr>
                        <tr>
                        <th>SWIFT CODE: EWBCPHMM</th>
                        </tr>
                    </thead>
                </table>
                <h4>Please present Deposit Slip/Receipt/charge slip to claim your O.R. at SDCA cashier.</h4>

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


  balance_api();

});

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
            $('#previous_balance').html(result['Output']['Previous_Balance']);
            $('#outstanding_balance').html(result['Output']['Outstanding_Balance'] < 0 ? '0.00' : result['Output']['Outstanding_Balance']);

            if(result['Output']['Outstanding_Balance'] <= 0){

                $('#paymentlink').hide();

            }

        },
        fail: function(){

            alert('Error: request failed');
            return;

        }
    });

}

</script>