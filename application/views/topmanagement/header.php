  <head>
    <title>Bali Realty HV - Reservation Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

  <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="<?php echo base_url('topmanagement/dashboard'); ?>">
            <!--<img src="<?php echo base_url('assets/images/ahris.png'); ?>">-->
            Dashboard
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Report <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('topmanagement/report/brhv'); ?>">Bali Realty Holiday Villas</a></li>
                <li><a href="<?php echo base_url('topmanagement/report/bve'); ?>">Bali Villa Escapes</a></li>
                <li><a href="<?php echo base_url('topmanagement/report/bvo'); ?>">Asia Holiday Retreats</a></li>
                <hr />
                <li><a href="<?php echo base_url('topmanagement/report/team_target'); ?>">Team & Personal Target</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chart <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('topmanagement/chart/brhv'); ?>">Bali Realty Holiday Villas</a></li>
                <li><a href="<?php echo base_url('topmanagement/chart/bve'); ?>">Bali Villa Escapes</a></li>
                <li><a href="<?php echo base_url('topmanagement/chart/bvo'); ?>">Asia Holiday Retreats</a></li> 
                <hr />
                <li><a href="<?php echo base_url('topmanagement/chart/summary'); ?>">Summary</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reminder <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('topmanagement/reminder/brhv'); ?>">Bali Realty Holiday Villas</a></li>
                <li><a href="<?php echo base_url('topmanagement/reminder/bve'); ?>">Bali Villa Escapes</a></li>
                <li><a href="<?php echo base_url('topmanagement/reminder/bvo'); ?>">Asia Holiday Retreats</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Marketing <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('topmanagement/setting_villa'); ?>">Villa</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
           <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $session_login; ?></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('auth/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>


    