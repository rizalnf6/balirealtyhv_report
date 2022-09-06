<br />

<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <ul class="nav nav-tabs nav-pills">
          <li class="active"><a data-toggle="tab" href="#enquiry">Enquiry</a></li>
          <li><a data-toggle="tab" href="#booking">Booking</a></li>
          <li><a data-toggle="tab" href="#revenue">Revenue</a></li>
      </ul>

      <div class="tab-content">
        <!-- ENQUIRY TAB -->
        <div id="enquiry" class="tab-pane fade in active">
            <?php $this->load->view($dashboard_enquiry); ?>
        </div> <!-- End enquiry -->

        <!-- BOOKING TAB -->
        <div id="booking" class="tab-pane fade">
            <?php $this->load->view($dashboard_booking); ?>
        </div> <!-- End Booking -->

        <!-- REVENUE TAB -->
        <div id="revenue" class="tab-pane fade">
            <?php $this->load->view($dashboard_revenue); ?>
        </div> <!-- End Revenue -->

      </div> <!--Tab Content-->

    </div> <!--Col 12-->
  </div> <!--Row-->
</div> <!--Container Fluid-->