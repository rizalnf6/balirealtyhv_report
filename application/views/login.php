<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Reservation's Sales Report</title>
</head>

<?php 
	$login = $this->session->flashdata('login_failed');
		if (isset($login)) {
			echo "<div class='alert alert-danger page-alert' role='alert' align='center'>".$this->session->flashdata('login_failed')."</div>";
	}
?>

<style>
body {
  /* The image used */
  background-image: url("assets/images/login.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.mainbox {width: 350px;}
.input-group-addon {
    background-color: #ff9028;
    color: #fff;
}

.input-group .form-control, .input-group-addon, .input-group-btn {
    display: table-cell;
    border-radius: 0px;
}

@media (max-width: 768px) {
.panel-body {padding-left: 30px!important; padding-right: 30px!important;}
.header-welcome {text-align: center!important; margin-top: 20px!important;}
.header-reservation {text-align: center!important;}
.mainbox {display: block; margin-left: auto;margin-right: auto;}
}
</style>

<body>
  <div class="container">    
  
   	<div class="header-welcome" style="font-size: 22px;margin-top: 10px;font-family: 'Raleway'; color: #2f3f56;">Welcome to
    </div>
    <div class="header-reservation" style="font-family: 'Lato';font-size: 36px;font-weight: bold;margin-bottom: 30px;margin-top: -5px; color: #2f3f56;">
    Reservation Report
    </div>

    <div id="loginbox" class="mainbox">                   
      <div style="border-color:#bcbdc2; border-radius: 0px;" class="panel panel-primary">
        <div style="background-color: #2f3f56; border-color: #2f3f56; border-radius: 0px; font-family: 'raleway'; font-size: 14px; text-align: center; font-weight: bold;" class="panel-heading">
          Please Login
          <!--<div style="margin-top: 20px;" class="panel-title" align="center">
           	<img src="<?php echo base_url('assets/images/ahris.png'); ?>" width="40%">
          </div>-->
        </div>     

        <div class="col-sm-6">
        </div>

        <div style="background-color: #bcbdc2; padding-top:0px; padding-left: 15px; padding-right: 15px; opacity: 1;" class="panel-body">
        
          <div class="col-sm-6">
          </div>

            <!--<h4 style="color: #fff; text-align: center; padding-bottom: 20px; font-family: 'Lato'; margin-top: 0px; font-size: 18px;">Please Login</h4>-->
    		    <br /><br />
	          
            <?php echo form_open("auth/check_login"); ?>     
	            <form id="loginform" class="form-horizontal" role="form">
	                                    
	            <div style="margin-bottom: 25px" class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	              <input type="text" class="form-control" name="email" placeholder="email " style="font-family: 'raleway';">
	            </div>
	                                
	             <div style="margin-bottom: 25px" class="input-group">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                <input type="password" class="form-control form-dimas" name="password" placeholder="password" style="font-family: 'raleway';">
	              </div>	                                   

		            <button style="background-color: #fc902d!important; border-color: #fc902d!important; font-size: 14px; font-family: 'Lato'; border-radius: 0px; width: 100px; display: block; margin-left: auto;margin-right: auto; margin-bottom: -30px;" class="btn btn-success btn-block">Login  </button> <br />

		            </form>  
		          <?php echo form_close(); ?>
	              
	          </div> <!--Panel Body-->

            </div> <!--Panel Primary-->                     
        </div> <!--Login Box-->
        <div class="backtoahris"><a href="http://ahris.balirealtyhv.com" style="color: #2f3f56;">Back to AHRIS</a></div>
    </div> <!--Container-->

<div style="background: #2f3f56; color: #fff; height: 40px; font-family: 'raleway'; font-size: 12px;" class="footer navbar-fixed-bottom">
	<p align="center" style="margin-top: 10px;"> Copyright © 2017 - <?php echo date('Y'); ?>  IT Department. All rights reserved. </p>
</div>

</body>
</html>