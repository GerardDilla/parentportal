
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags always come first -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>SDCA Portal</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->
<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">


<style type="text/css">
html, body, header, .view {
	height: 100%;
}
/* Navigation*/

.navbar {
	background-color: transparent;
}
.top-nav-collapse {
	background-color: rgba(128,128,128,1);
}
 @media only screen and (max-width: 768px) {
.navbar {
	background-color: #cc0000;;
}
}
/*Intro*/

.view {
	/* background: url('<?php echo base_url(); ?>Assets/img/altbg.jpg');
no-repeat center center fixed; */
     background: linear-gradient(to right, #FF6464 0%, #FA3535 60%, #FF6464 100%);
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	overflow: hidden;
	background-size: 107% 107%;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
 @media (max-width: 768px) {
.full-bg-img,  .view {
	height: auto;
	position: relative;
}
}
.description {
	padding-top: 5%;
	padding-bottom: 3rem;
	color: #fff
}
 @media (max-width: 992px) {
.description {
	padding-top: 7rem;
	text-align: center;
}
}


@media (min-width: 767px) {
.top-nav-collapse .navbar-nav>li>a {
	font-size: 105% !important;
	font-family::kalinga !important;
	background-color: #cc000 !important;
}
.navbar .navbar-nav>li>a {
	font-size: 150%;
	font-family::kalinga;
	color: #fff;
}
.navbar-fixed-top {
	padding: 10px !important;
	padding-bottom: 5px !important;
	border-bottom:solid thin;
	border-color:#fff;
}
}
.top-nav-collapse {
	background-color: rgba(204, 0, 0, 1) !important;
}
.icon-bar {
	background-color: #fff;
}
.navbar .navbar-nav .nav-item a{
	font-size: 110%;
    font-family::kalinga;
	}
.navbar .navbar-nav .nav-item a:hover{
  color: #ccc;
  }
@font-face {
   font-family:kalinga;
   src: url('<?php echo base_url(); ?>Assets/Fonts/Kalinga.ttf');

} 
</style>
</head>

<body >

<!--Navigation & Intro-->
<header>

<!--Navigation-->
<nav class="navbar navbar-fixed-top" style="display: none">

    <!-- Collapse button-->
    <button style="color:#fff" class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
        <i class="fa fa-bars"></i>
    </button>
	
    <div class="container">
		
        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx">
            <!--Navbar Brand-->
            <a class="navbar-brand waves-effect waves-light" href="#" style="color:#fff; font-family:kalinga">SDCA PORTAL</a>
            <!--Links-->
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item active">
                    <a style="color:#fff" class="nav-link" href="<?php echo base_url(); ?>index.php/Activate_Account">Activate Account <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a style="color:#fff" class="nav-link" href="#">Helpdesk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-wow-delay="0.3s"  data-toggle="modal" data-target="#myModal">Login</a>
                </li>
              
            </ul>
            <!--Search form-->
            
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
<!--/.Navigation--> 

<!--Mask-->
<div class="view hm-black-light">
  <div class="full-bg-img flex-center">
    <div class="container" style="padding-top:5%;">
      <div class="row" id="home"> 
        
     
        <div class="col-lg-6 fadeInRight" data-wow-delay="0.3s">
          <video class="wow fadeInRight" data-wow-delay="0.3s" width="100%" height="auto" controls muted autoplay style="margin-top:7%;" controlsList="nodownload">
            <source src="<?php echo base_url(); ?>Assets/img/bg.mp4" type="video/mp4">
          </video>
        </div>


        <div class="col-lg-6">
          <div class="description">
            <div class="wow fadeInLeft" data-wow-delay="0.2s"> <img src="<?php echo base_url(); ?>Assets/img/Portal_side.png" width="100%" /> </div>
            <hr class="wow fadeInLeft" data-wow-delay="0.3s">
            <p class="wow fadeInLeft" data-wow-delay="0.3s" style="font-size:120%; font-family:kalinga">Access the information you'll need for your student career as well as more features to aid you academically, anywhere and anytime! </p>
            <br>
            <a class="btn btn-primary btn-lg wow fadeInLeft" style="background-color:transparent; font-family:kalinga; border-color: white; border: solid thin;" data-wow-delay="0.3s"  data-toggle="modal" data-target="#myModal">Sign In!</a> </div>
        </div>
      
 
        
      </div>

    </div>
  </div>
</div>
</div>
<!--/.Mask--> 

<!--Content-->
<div style="display:none"> 
  <!--Features-->
  <div id="Features" style="width:100%; background-color:#FFF; padding-left:10%; padding-right:10%; padding-bottom:50px; padding-top:50px;"> </br>
    <h1>Features</h1>
    </br>
    </br>
    </br>
    </br>
    <div class="row"><!--Basic Features-->
      <div class="col-md-6"> <img src="<?php echo base_url(); ?>Assets/img/Basic Features.png" width="60%" style="float:right" /> </div>
      <div class="col-md-6" style="padding:30px"> </br>
        </br>
        <h5> Essential features provided: Viewing of <strong>Grades, Balance, Schedule of Enrolled Subjects, Violations, Curriculum</strong> and <strong>Awards</strong></h5>
      </div>
    </div>
    <!--Basic Features--> 
    </br>
    <hr/>
    </br>
    <div class="row"><!--Added features-->
      <div class="col-md-6"> </br>
        </br>
        </br>
        </br>
        <h5 style="text-align:right"> Additional Features Provided:<strong>Notification system, Resume Builder, Student Diary and Print options</strong></h5>
      </div>
      <div class="col-md-6" style="padding:30px"> <img src="<?php echo base_url(); ?>Assets/img/Additional.png" width="60%" /> </div>
    </div>
    <!--Added features--> 
    
  </div>
  <!--Features--> 
  
  <!--1st Parallax-->
  <div class="parallax par_one" style="width:100%; height:50%; background-image:url(<?php echo base_url(); ?>Assets/img/BG.jpg)"></div>
  <!--1st Parallax--> 
  
  <!--Content Section-->
  <div  id="About" style="width:100%; background-color:#FFF; padding:50px; color:#666">
    <div class="row">
      <div class="col-md-6"> <img src="<?php echo base_url(); ?>Assets/img/St._Dominic_College_Of_Asia_Logo.png" width="100%" /> </div>
      <div class="col-md-6" style="padding:30px">
        <h4> The St. Dominic College of Asia Portal makes it easier for students to access their information from anywhere at any time. </h4>
      </div>
    </div>
  </div>
  <!--Content Section--> 
  
  <!--1st Parallax-->
  <div class="parallax par_one" style="width:100%; height:50%; background-image:url(<?php echo base_url(); ?>Assets/img/BG.jpg)"></div>
  <!--1st Parallax--> 
  
  <!--/Content--> 
</div>
</header>


<!-- Modal -->
<div id="myModal2" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModal2" >
  <div class="modal-dialog" role="document"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px; color:#666; font-family:kalinga, Geneva, sans-serif; padding:20px;">
    
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title w-100" id="myModalLabel">Welcome to the SDCA Portal!</h5>
        </div>
      
      
        <div class="modal-body">
            This is currently in the Testing phase, some data and features may not be complete. Feel free to explore the New Portal!
        </div>
      
        <div class="modal-footer">
            
        </div>
    </div>
  </div>
</div>
<!-- Modal -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModal" >
  <div class="modal-dialog" role="document"> 
    
    <!-- Modal content-->
    <div class="modal-content" id="login" style="margin-top:150px; color:#666; font-family:kalinga, Geneva, sans-serif; padding:20px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login to Portal</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo site_url();?>index.php/Parent/login">
      <label for="ID">Username:</label>
      <input type="number" class="form-control" id="U_ID" name="U_ID" value="<?php echo set_value('U_ID'); ?>">
      <label for="Password">Password:</label>
      <input type="password" class="form-control" id="U_Password" name="U_Password" value="<?php echo set_value('U_Password'); ?>">
      <span style="color:#F00; font-size:14px;"><?php echo $error ?></span></br>
      </div>
      <div class="modal-footer">
        <button type="submit" id="show" class="btn btn-info center-block">Login</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal --> 







<!-- SCRIPTS --> 

<!-- JQuery --> 
<script type="text/javascript" src="<?php echo base_url(); ?>JS/jquery-3.2.1.min.js"></script> 

<!-- Tooltips --> 
<script type="text/javascript" src="<?php echo base_url(); ?>JS/tether.js"></script> 

<!-- Bootstrap core JavaScript --> 
<script type="text/javascript" src="<?php echo base_url(); ?>JS/bootstrap.min.js"></script> 

<!-- MDB core JavaScript --> 
<script type="text/javascript" src="<?php echo base_url(); ?>JS/mdb.min.js"></script> 

<script>
        new WOW().init();
</script> 

<script>
	$(document).ready(function(){
	  $('.thingy').mousemove(function(e){
		var x = -(e.pageX + this.offsetLeft) / 20;
		var y = -(e.pageY + this.offsetTop) / 20;
		$('.thingy').css('background-position', x + 'px ' + y + 'px');
	  });    
	});
	
</script>

<script type="text/javascript">

 $( document ).ready(function(){
        $('#myModal').modal('<?php echo $modal; ?>');
    });
	
</script>

<script type="text/javascript">
    $( document ).ready(function () {
	
		$('#myModal2').modal('');
	
	});
</script>

</body>
</html>