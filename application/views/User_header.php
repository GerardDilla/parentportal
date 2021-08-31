<?php 

$First_Name = $this->session->userdata('First_Name');
$Middle_Name = $this->session->userdata('Middle_Name');
$Last_Name = $this->session->userdata('Last_Name');
$Course = $this->session->userdata('Course');
$YearLevel = $this->session->userdata('YearLevel');
$Address_No = $this->session->userdata('Address_No');
$Address_Street = $this->session->userdata('Address_Street');
$Address_Subdivision = $this->session->userdata('Address_Subdivision');
$Address_Barangay = $this->session->userdata('Address_Barangay');
$Address_City = $this->session->userdata('Address_City');
$Address_Province = $this->session->userdata('Address_Province');
$Email = $this->session->userdata('Email');
$Cp_No = $this->session->userdata('Cp_No');
$Tel_No = $this->session->userdata('Tel_No');
$Student_Number = $this->session->userdata('Student_Number');
$Reference_Number = $this->session->userdata('Reference_Number');
$picture = $this->session->userdata('picture');
$logged_in = $this->session->userdata('logged_in');
$Account_Number = $this->session->userdata('Account_Number');

?>
<?php 

$fileT = './Profile/';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Now UI Dashboard Pro by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/now-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
     <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
</head>

<style type="text/css">
    
.bg-white {
    background: linear-gradient(to right, #FF6464 0%, #FA3535 60%, #FF6464 100%); !important;
}
.navbar.bg-white:not(.navbar-transparent) .navbar-toggler-bar {
    background-color: #fff;
}
</style>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="red">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="" class="simple-text logo-normal">
                            SDCAP   Mobile
                </a>
            </div>

            <div class="sidebar-wrapper">


                <div class="imgss" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom: 50px;">
                    <img  src="<?php echo base_url(); ?>Profile/default.PNG" alt="...">
                </div>

             
                   <div class="label" style="background-color: yellow; color: #000">        
                 <div class="name" style="font-weight: 800; margin-left: 50px; margin-top: 20px; margin-right: 50px;">
                  <p class="text-center"><?php echo $First_Name." ".$Last_Name  ?></p>
                 </div>
                 </div>
                 
                 
                 <div class="label" style="background-color: yellow; color: #000"> 
                    <div class="snum" style="font-weight: 800; margin-left: 50px; margin-top: 20px;   margin-right: 50px;">
                       <p class="text-center">Student ID: <?php echo $Student_Number ?></p>
                   </div>
                   </div>
                   
                   
                   
                   
                   
                   
                   
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url();?>index.php/Student/Profile" class="active">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Student/grades">
                            <i class="now-ui-icons education_atom"></i>
                            <p>Grades</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Student/schedule">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>Schedule</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/Student/balance">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Balance</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url();?>index.php/Student/Curriculum">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Curriculum</p>
                        </a>
                    </li>
                     <li class="">
                        <a href="<?php echo base_url();?>index.php/Student/Event">
                            <i class="now-ui-icons ui-1_calendar-60"></i>
                            <p>Events</p>
                        </a>
                    </li>
                    <li>
                    <a href="<?php echo base_url();?>index.php/Student/Logout">
                    <i class="now-ui-icons users_single-02"></i>
                    Logout
                    </a>
                 
                    </li> 
                    
                   
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"></a>
                    </div>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>

      



<script type="text/javascript" charset="utf-8">
    function addmsg(msg){

        $("#messages").append(msg);
    }
	function dismiss(elem){
		
		$(elem).parent().hide();
		
		
		}
    function waitForMsg(){
 
        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>index.php/Student/Notif",

            async: true, /* If set to non-async, browser shows page as "Loading.."*/
            cache: false,
            timeout:50000, /* Timeout in ms */

            success: function(data){ /* called when request to barge.php completes */
                addmsg(data); /* Add response to a .msg div (with the "new" class)*/
                setTimeout(
                    waitForMsg, /* Request next message */
                    5000 /* ..after 1 seconds */
                );
            },
           
        });
    };

    $(document).ready(function(){
        waitForMsg(); /* Start the inital request */
    });
</script>



<script type="text/javascript" charset="utf-8">
    function notify(msg){
        $("#notif_bell").html(msg);
    }

    function checknotif(){
 
        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>index.php/Student/Notif_bell",

            async: true, 
            cache: false,
            timeout:50000, 

            success: function(data){ 
                notify(data);
                setTimeout(
                    checknotif, 
                    5000 
                );
            },
           
        });
    };

    $(document).ready(function(){
        checknotif(); 
    });
	
</script>
