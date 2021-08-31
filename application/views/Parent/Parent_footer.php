



            <footer class="footer">
              <div class="container-fluid">
                  <nav>
                      <ul>
                          <li>
                              <a href="">
                              </a>
                          </li>
                          <li>
                              <a href="">
                              </a>
                          </li>
                          <li>
                              <a href="">
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </footer>

        </div>
    </div>
</body>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    

      <?php echo form_open('index.php/ParentPortal/feedback',array('id'=>'feedback_form','method'=>'post')); ?>
      <!-- Modal Header -->
      <div class="modal-header" id="feedback_head">
        <h4 class="modal-title" style="text-align:center">Let Us Hear Your Feedback!</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div id="feedback_msg">
          <p id="feedback_error"></p>
          <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input  type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
            <input  type="hidden" name="parent_id" value="<?php echo $this->session->userdata('p_id'); ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input  type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Feedback</label>
            <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="feedback_buttons">
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="<?php echo base_url(); ?>index.php/ParentPortal/Logout"><button type="button" class="btn btn-danger">Logout</button></a>
      </div>
      </form>
    </div>
  </div>
</div>



<!--   Core JS Files   -->

<script src="<?php echo base_url(); ?>Assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url(); ?>Assets/js/plugins/bootstrap-switch.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/plugins/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?php echo base_url(); ?>Assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>Assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>Assets/js/now-ui-dashboard.js?v=1.0.0"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>Assets/demo/demo.js"></script>
<script src="<?php echo base_url();?>JS/jquery-3.1.0.min.js"></script>

    <script src="<?php echo base_url();?>JS/Pace.js"></script>
    <script src="<?php echo base_url();?>JS/additem.js"></script>
    <script src="<?php echo base_url();?>C_editor/ckeditor.js"></script>
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js'></script>
    <link rel="shortcut icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png">
    <link rel="icon" href="<?php echo base_url();?>Assets/img/SoloLogo.png" type="image/gif">



<script type="text/javascript">

      function showcont_bal(str) {
        var xhttp;
        
        if (str == "") {
          document.getElementById("bal_sem").innerHTML = "";
          return;
        }
        
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          document.getElementById("bal_sem").innerHTML = this.responseText;
        
          }
        };
        
        xhttp.open("GET", "<?php echo base_url(); ?>index.php/ParentPortal/balance_semlist?q="+str, true);
        xhttp.send();
        cont_appear.style.display="block";
        
        }


</script>
<script type="text/javascript">

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
        
        xhttp.open("GET", "<?php echo base_url(); ?>index.php/ParentPortal/get_sem?q="+str, true);
        xhttp.send();
        cont_appear.style.display="block";  
        btn_appear.style.display="block"; 
        
        }


</script>
<script>

      function showcont_sched(str) {
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
        
        xhttp.open("GET", "<?php echo base_url(); ?>index.php/ParentPortal/sched_sem?q="+str, true);
        xhttp.send();
        cont_appear.style.display="block";    
        btn_appear.style.display="block"; 
        
      }

</script>
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
        
        xhttp.open("GET", "<?php echo base_url(); ?>index.php/ParentPortal/get_curriculum?q="+str, true);
        xhttp.send();
        
        
      }
</script>
<script type="text/javascript">
    var frm = $('#feedback_form');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                if(data == 1){
                  //If Feedback submission was successful
                  console.log('Submission was successful.');
                  var msg = '<div style="text-align:center">';
                  msg += '<h4>Thank You For Your Feedback! <br><br>';
                  msg += '<a style="color:#cc0000" href="<?php echo base_url(); ?>index.php/ParentPortal/Logout"><u>Logout<u></a></h4>';
                  msg += '</div>';
                  $("#feedback_msg").html(msg);
                  $("#feedback_buttons").html('');
                  $("#feedback_head").html('');

                }
                else{
                  console.log('Returned form errors.');
                  console.log(data);
                  $("#feedback_error").html(data);
                }


            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
                //$("#feedback_msg").html(data);
            },
        });
    });
</script>

</html>

</body>



</html>
