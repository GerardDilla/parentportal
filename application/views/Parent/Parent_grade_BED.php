<?php $result = $this->data['BED_Grade_Output']; ?>
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
            <?php $row = $result->row(); ?>
            <h3>ACADEMIC YEAR: <u><?php echo $row->School_Year; ?></u></h3>
            <h3>SEMESTER: <u style="text-transform: uppercase"><?php echo $row->semester; ?></u></h3>
            <h3>QUARTER: <u style="text-transform: uppercase"><?php echo $row->Quarter; ?></u></h3>

            <table class="table table-striped" style="color:#666">
              <tr>
              <th>Subject:</th>
              <th>Final Grade:</th>
              <tr>

              <?php foreach($result->result_array() as $row): ?>
              <tr>
              <td><?php echo $row['subject_title']; ?></td>
              <td><?php echo $row['finGrade']; ?></td>
              </tr>
              <?php endForeach; ?>

            </table>

            </br>
            <button class="btn btn-success center-block" data-toggle="modal" data-target="#myModal" style="display:none">Complete List</button>  
            </br>


          </div>
          <!--Content--!-->
          </div>
      </div>
    </div><!--BODY--!-->
  </div>
</div>


    