<?php $student_fullname = $this->session->userdata('student_fullname'); ?>
<?php $student_dept = $this->session->userdata('student_dept'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>Assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/Assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Parents Portal (BETA)</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>Assets/CSS/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>Assets/CSS/now-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url(); ?>Assets/demo/demo.css" rel="stylesheet" />
     <link href="<?php echo base_url(); ?>Assets/CSS/style.css" rel="stylesheet" />
     <link href="<?php echo base_url(); ?>Assets/CSS/Styles.css" rel="stylesheet" />
     <script src="<?php echo base_url(); ?>JS/jquery-3.1.0.min.js"></script>

</head>
<style type="text/css">
    
.bg-white {
    background: linear-gradient(to right, #FF6464 0%, #FA3535 60%, #FF6464 100%); !important;
}
.navbar.bg-white:not(.navbar-transparent) .navbar-toggler-bar {
    background-color: #fff;
}
.modal-backdrop{
    background-color: rgba(0,0,0,0.7) !important;
    opacity: 1;
    transition: opacity .25s ease-in-out;
   -moz-transition: opacity .25s ease-in-out;
   -webkit-transition: opacity .25s ease-in-out;
}
</style>
<body class="">

    <div class="wrapper">
     
        <div class="sidebar"  data-color="gray" style="z-index:999">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="" class="simple-text logo-normal" style="text-align: center; font-weight: 600; font-size: 20px; ">
                         Parents Portal <br>(BETA TESTING)
                </a>
            </div>

            <div class="sidebar-wrapper">


                <div class="imgss" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom: 50px;">
                    <img  src="<?php echo base_url(); ?>Profile/default.png" alt="...">
                </div>

             
                   <div class="label" style="background-color: #800; color: #fff">        
                 <div class="name" style="font-weight: lighter; margin-left: 60px; margin-top: 20px; margin-right: 50px; font-size: 18px;">
                  <p class="text-center"><?php echo $this->data['fname'].' '.$this->data['lname']; ?></p>
                 </div>
                 </div>
                 
                 
                 <div class="label" style="background-color: #800; color: #fff"> 
                    <div class="snum" style="font-weight: lighter; margin-top: 20px; text-align: center; font-size: 18px;">
                       <p class="text-center">Parent/Guardian</p>
                   </div>
                   </div>
                   
                <ul class="nav"> 
                   
                <?php if($student_dept == 'HED'): ?>
                   
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/Handled" class="active">
                          <i class="fa fa-users" aria-hidden="true"></i>

                            <p>Handled Students</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/Dashboard" disabled>
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/Grades">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <p>Grades</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/Schedule">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            
                            <p>Schedule</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/balance">
                            <i class="fa fa-calculator" aria-hidden="true"></i>
                            <p>Balance</p>
                        </a>
                    </li>

                <?php elseif($student_dept == 'BED'): ?> 
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/Handled" class="active">
                          <i class="fa fa-users" aria-hidden="true"></i>

                            <p>Handled Students</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/BEDBalance">
                            <i class="fa fa-calculator" aria-hidden="true"></i>
                            <p>Balance</p>
                        </a>
                    </li>
                <?php elseif($student_dept == 'SHS'): ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/Handled" class="active">
                          <i class="fa fa-users" aria-hidden="true"></i>

                            <p>Handled Students</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/BEDGrade">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <p>Grades</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/ParentPortal/BEDbalance">
                            <i class="fa fa-calculator" aria-hidden="true"></i>
                            <p>Balance</p>
                        </a>
                    </li>
                <?php endIf; ?>

                    <li>
                    <a  data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                            Logout
                    </a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top" >
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    

                    
                        <a class="navbar-brand" href="#pablo" style="color:#fff; font-weight: 700;">
                        <br>
                        <h5>Displaying information for: 
                        <u style="font-weight: 700; color: #FFF;"><?php echo $student_fullname; ?></u>, 
                        <?php 
                        
                        if($student_dept == 'HED'){
                            echo 'Higher Education';
                        }
                        else if($student_dept == 'SHS'){
                            echo 'Senior High';
                        }
                        else if($student_dept == 'BED'){
                            echo 'Basic Education';
                        }else{
                            echo '';
                        }

                        ?>
                        </h5></a>
                 

                    
                    

                    </div>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>

      



