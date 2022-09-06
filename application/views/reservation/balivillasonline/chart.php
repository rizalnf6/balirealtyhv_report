<br /><br /><br />
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-1">
    </div> 
    <div class="col-sm-5">
        <img class="logo-table" src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> 
    </div> <!--End Col 5-->
    <div class="col-sm-5">
      <div class="page-header-with-margin">
        <?php echo $page_header; ?>
      </div>
    </div> <!--End Col 5-->
    <div class="col-sm-1">
    </div>
  </div> <!--End Row-->

  <br />
   
  <div class="row">
    <div class="col-sm-1">
    </div> 
    <div class="col-sm-10">

        <div class="col-sm-6">
          <div class="logo-chart"> 
            <a href="<?php echo base_url('reservation/chart/bvo_daily'); ?>">
              <img src="<?php echo $logoDaily; ?>" alt="Daily Chart"> 
            </a>
            <div class="chart-text"><?php echo $textDaily; ?></div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="logo-chart"> 
            <a href="<?php echo base_url('reservation/chart/bvo_monthly'); ?>">
              <img src="<?php echo $logoMonthly; ?>" alt="Monthly Chart"> 
            </a>
            <div class="chart-text"><?php echo $textMonthly; ?></div>
          </div>
        </div>
      
      </div> <!--End Col 10-->
    <div class="col-sm-1">
    </div>
  </div> <!--End Row-->

</div> <!--Container-->