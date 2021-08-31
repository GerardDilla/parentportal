
<!--content--!-->
<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                               <h4 class="card-title" style="font-weight: 700; color: #800;"> Select which student to view:</h4>
                            </div>
                            <hr />
  		  <div style="margin: 30px; margin-top: 40px; padding:10px">
          <div style="overflow-y: auto; min-height:500px">
          <?php echo '<h3 style="color:#cc0000">'.$this->data['choose_student_message'].'</h3>'; ?>
          <?php echo '<h3 style="color:#cc0000">'.$this->session->flashdata('Balance_msg').'</h3>'; ?>
          

          <?php if($this->session->flashdata('Balance_msg') == ''): ?>
          <!--Content--!-->
          <table class="table">
            <thead>
              <tr>
                <th>Student Number</th>
                <th>NAME</th>
                <th>SCHOOL LEVEL</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
          
          <?php $result = $this->data['Handled_Students_result']; ?>
          <?php foreach($result as $row): ?>
          
              <tr>
                <td><b style='text-transform:uppercase'><u><?php echo $row['SN']; ?></u></b></td>
                <td><p style='text-transform:uppercase'><?php echo $row['NAME']; ?></p></td>
                <td>
                <?php
                if($row['DEPT'] != ''){
                  if($row['DEPT'] == 'HED'){
                    echo 'College'; 
                  }
                  else if($row['DEPT'] == 'SHS'){
                    echo 'Senior Highschool';
                  }
                  else{
                    echo 'Basic Education';
                  }
                 
                }else{
                 echo '<span style="color:#cc0000"><strong>Not Set</strong></span>';
                }
                ?>
                </td>
                <td>
                <?php if($row['DEPT'] != ''): ?>
                  <form action="<?php echo base_url() ?>index.php/ParentPortal/Set_student" method="post">
                  <input type="hidden" name="ppa_id" value="<?php echo $row['ID']; ?>">
                  <input type="hidden" name="student_fullname" value="<?php echo $row['NAME']; ?>">
                  <input type="hidden" name="RF" value="<?php echo $row['REF']; ?>">
                  <input type="hidden" name="dept" value="<?php echo $row['DEPT']; ?>">
                  <button style="min-width:143px" name="student_ref" value="<?php echo $row['SN']; ?>" type="submit" class="btn btn-info">Select
                  </button>
                  </form>
                <?php endIf; ?>
                </td>
                <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-default dropdown-toggle btn-simple" data-toggle="dropdown" aria-expanded="false">
                    <i class="now-ui-icons loader_gear"></i> Set Student 
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-135px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <span class="dropdown-item" href="#"><h5>Choose the School Level of the Student:</h5></span>
                    <form action="<?php echo base_url() ?>index.php/ParentPortal/student_setup" method="post">
                    <input type="hidden" name="ppa_id" value="<?php echo $row['ID']; ?>">
                    <input type="hidden" name="student_ref" value="<?php echo $row['SN']; ?>">
                    <button type="submit" name="dept" class="dropdown-item" value="HED" style="cursor:pointer"><h6>> Higher Education</h6></button>
                    <button type="submit" name="dept" class="dropdown-item" value="SHS" style="cursor:pointer"><h6>> Senior Highschool</h6></button>
                    <button type="submit" name="dept" class="dropdown-item" value="BED" style="cursor:pointer"><h6>> Basic Education</h6></button>
                    </form>
                  </div>
                </div>
                </td>
              
              </tr>
          <?php endForeach; ?>

          
          </tbody>
          </table>
          <?php else: ?>
          <form action='' method='post'>
          <button style="min-width:143px;" type="submit" class="btn btn-lg">
          Back
          </button>
          </form>
          <?php endIf; ?>
          <?php unset($_SESSION['Balance_msg']); ?>
          <br><br>
                
          

          </div>
          <!--Content--!-->
          </div>
          </div>
        </div><!--BODY--!-->
      </div>
    </div>