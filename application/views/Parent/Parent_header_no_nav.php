
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>Assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/Assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Parent Portal (BETA)</title>
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

        
        
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm" style="padding:10px">
                <br>
                <br>
                <div class="row">
                <div class="col-md-6">
                <h3 style="color:#fff; margin-left: 50px; text-transform: uppercase;">Welcome <span style="color: #800"><?php echo $this->data['fname'].' '.$this->data['lname']; ?>!</span></h3>
                 </div>
                 <div class="col-md-6">
                  
                   <a  style="color: #fff; font-size: 24px; " href="<?php echo base_url();?>index.php/ParentPortal/Logout">
                    <i class="now-ui-icons users_single-02"></i>
                    Logout
                    </a>
              
                     </div>
                    </div>
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
