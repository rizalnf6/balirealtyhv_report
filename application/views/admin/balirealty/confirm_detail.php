<br /><br /><br />
<div class="container-fluid">

  <?php 
  	$edit_success = $this->session->flashdata('edit_success');
  	$delete_success = $this->session->flashdata('delete_success');
  	
  		if (isset($edit_success)) {
  			echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
  				  </a><strong>Well done! </strong>".$this->session->flashdata('edit_success')."</div>";
  		} 
  		elseif (isset($delete_success)) {
  			echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
  			      </a><strong>Well done! </strong>".$this->session->flashdata('delete_success')."</div>";
  		} 
  ?>

  <!-- ISI DATA AKAN MUNCUL DISINI -->
  <script type="text/javascript" language="JavaScript">
    function konfirmasi() {
      tanya = confirm("Are you sure want to delete ?");
      if (tanya == true) return true;
      else return false;
  }
  </script>

  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10"> 
      <div class="logo-table"> 
        <img class="logo-table-with-margin" src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> 
      </div>    
    </div>
    <div class="col-sm-1">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-5">  
      <div class="button-filter-download">
        <!-- Button Edit -->
        <?php if ($default['status_enquiry'] == "Confirm" AND $default['balirealtyhv_status'] == "1" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
          <a href="<?php echo $button_edit_confirm."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-filter btn-xs">Edit</button>
          </a>
        <?php endif ?>

        <?php if ($default['status_enquiry'] == "Proposed" AND $default['balirealtyhv_status'] == "1" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
          <a href="<?php echo $button_edit_propose."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-filter btn-xs">Edit</button>
          </a>
        <?php endif ?>

        <?php if ($default['status_enquiry'] == "Extend Stay" AND $default['balirealtyhv_status'] == "1" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
          <a href="<?php echo $button_edit_extend."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-filter btn-xs">Edit</button>
          </a> 
        <?php endif ?>

        <?php if ($default['balirealtyhv_status'] == "1" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
          <a href="<?php echo $button_propose."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-add btn-xs">Propose</button>
          </a>
          <a href="<?php echo $button_extend."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-add btn-xs">Extend Stay</button>
          </a>
        <?php endif ?>

        <?php if ($this->session->userdata('level')=="admin"): ?>
          <a onclick='return konfirmasi()' href="<?php echo $button_delete."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-reset btn-xs">Delete</button>
          </a> 
          <a href="<?php echo $button_print."/".$default['report_id']."/".$default['villa']."/".$default['guest_name']; ?>">
            <button type="button" class="btn btn-info btn-xs">Print Welcome Letter</button>
          </a> 
        <?php endif ?>
      </div>
    </div>  <!-- End Col 5 -->
    <div class="col-sm-5">  
      <div class="page-header-table">
        <?php echo $page_header; ?>
      </div>
    </div> <!-- End Col 5 -->
    <div class="col-sm-1">
    </div>
  </div> <!-- End Row -->



  <div class="row">
    <div class="col-sm-1">
    </div>
    
    <!--Main column-->
    <div class="col-sm-10">
      <h3 class="form-heading-details-brhv">Guest Details</h3>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Enquiry Id : </b> <?php if(isset($default['report_id'])) {echo $default['report_id'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Reservation : </b> <?php if(isset($default['name'])) {echo $default['name'];} ?> 
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Guest Name : </b> 
            <?php if(isset($default['guest_name'])) {echo $default['guest_name'];} ?>
            <?php 
              if ($default['balirealtyhv_status'] != "1") {
                echo "<b style='color: #d9534f;'> (Deleted Enquiry)</b>";
              } 
            ?>
          </h4>
        </div>
      </div> <!--End Row-->

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Enquiry Date : </b> 
            <?php 
              if($default['enquiry_date'] == "0000-00-00"){ 
                echo "<i style=color:#d9534f;><b>Proposed / Extend Stay</b></i>"; 
              } else { 
                $enquiry_date = Date("j F Y", strtotime($default['enquiry_date'])); echo $enquiry_date;;
              } 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Source : </b> <?php if(isset($default['source'])) {echo $default['source'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Email : </b> <?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?></h4>
        </div>
      </div> <!--End Row-->

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Phone : </b> 
            <?php if(isset($default['phone'])) {echo $default['phone'];} ?>
            <?php 
              if ($default['phone'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Nationality : </b> 
            <?php if(isset($default['nationality'])) {echo $default['nationality'];} ?>
            <?php 
              if ($default['nationality'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Villa : </b> <?php if(isset($default['villa'])) {echo $default['villa'];} ?></h4>
        </div>
      </div> <!--End Row-->

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Checkin Date : </b> 
            <?php 
              if($default['checkin'] == "0000-00-00"){ 
                echo "<b style=color:#d9534f;>T B A</b>"; 
              } else { $checkin = Date("j F Y", strtotime($default['checkin'])); 
                echo $checkin;
              } 
            ?>
            <?php 
              if($default['checkin'] > $default['checkout']){ 
                echo "<i style=color:#d9534f;>Check the Date.</i>"; 
              } else { echo "";} 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Checkout Date : </b> 
            <?php 
              if($default['checkout'] == "0000-00-00"){ 
                echo "<i style=color:#d9534f;>TBA</i>"; 
              } else { $checkout = Date("j F Y", strtotime($default['checkout'])); 
                echo $checkout;
              } 
              ?>
              <?php 
                if($default['checkout'] < $default['checkin']){ 
                  echo "<i style=color:#d9534f;>Check the Date.</i>"; 
                } else { echo "";} 
              ?>
          </h4>
        </div>
      </div> <!--End Row-->

      <hr /> <h3 class="form-heading-details-brhv">Payment Details</h3>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Status : </b> <?php if(isset($default['status_enquiry'])) {echo $default['status_enquiry'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Confirm Date : </b> 
            <?php 
              if($default['confirm_date'] == "0000-00-00"){ 
                echo "<i style=color:#d9534f;>-</i>"; 
              } else { $confirm_date = Date("j F Y", strtotime($default['confirm_date'])); 
                echo $confirm_date;;
              } 
            ?>
            <?php 
              if($default['confirm_date'] == "0000-00-00" AND $default['status_enquiry'] == "Confirm"){
                echo"<i style=color:#d9534f;>Fill the date.</i>";
              } else { echo "";} 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Payment Status : </b> 
            <?php if(isset($default['payment'])) {echo $default['payment'];} ?>
            <?php 
              if($default['payment'] == "" AND $default['status_enquiry'] == "Confirm"){
                echo"<i style=color:#d9534f;>Fill the payment status.</i>";
              } else { echo "";} 
            ?>
          </h4>
        </div>
      </div> <!--End Row-->

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Revenue Nett (USD) : </b> 
            <?php 
              if(isset($default['revenue_nett'])) {
                echo number_format($default['revenue_nett']);
              } 
            ?>
            <?php 
              if($default['revenue_nett'] == "0" AND $default['status_enquiry'] == "Confirm"){ 
                echo "<i style=color:#d9534f;><b>Fill the revenue.</b></i>"; 
              } else if($default['revenue_nett'] > $default['revenue_gross'] AND $default['status_enquiry'] == "Confirm"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] == "0" AND $default['status_enquiry'] == "Proposed"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] > $default['revenue_gross'] AND $default['status_enquiry'] == "Proposed"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] == "0" AND $default['status_enquiry'] == "Extend Stay"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] > $default['revenue_gross'] AND $default['status_enquiry'] == "Extend Stay"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else { echo "";}
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Revenue Gross (USD) : </b> 
            <?php 
              if(isset($default['revenue_gross'])) {
                echo number_format($default['revenue_gross']);
              } 
            ?>
            <?php 
              if($default['revenue_gross'] == "0" AND $default['status_enquiry'] == "Confirm"){ 
                echo "<i style=color:#d9534f;><b>Fill the revenue.</b></i>"; 
              } else if($default['revenue_nett'] > $default['revenue_gross'] AND $default['status_enquiry'] == "Confirm"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] == "0" AND $default['status_enquiry'] == "Proposed"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] > $default['revenue_gross'] AND $default['status_enquiry'] == "Proposed"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] == "0" AND $default['status_enquiry'] == "Extend Stay"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else if($default['revenue_nett'] > $default['revenue_gross'] AND $default['status_enquiry'] == "Extend Stay"){ 
                echo "<i style=color:#d9534f;><b>Check the revenue.</b></i>"; 
              } else { echo "";}
            ?>
          </h4>
        </div>
      </div> <!--End Row-->

      <hr /> <h3 class="form-heading-details-brhv">Arrival & Departure Details</h3>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Adult : </b> 
            <?php if(isset($default['adult'])) {echo $default['adult'];} ?>                
            <?php 
              if ($default['adult'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Children (< 12 Years Old) : </b> 
            <?php if(isset($default['children'])) {echo $default['children'];} ?>
            <?php 
              if ($default['children'] == NULL) {  
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>  
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Infant (< 4 Years Old) : </b> 
            <?php if(isset($default['infant'])) {echo $default['infant'];} ?>
            <?php 
              if ($default['infant'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?> 
          </h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Arrival Flight & Time : </b> <br /> 
            FLIGHT : <?php if(isset($default['arrival_flight'])) {echo $default['arrival_flight'];} ?>
            <?php 
              if ($default['arrival_flight'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?> <br />
            TIME : <?php if(isset($default['arrival_time'])) {echo $default['arrival_time'];} ?>
            <?php 
              if ($default['arrival_time'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Departure Flight & Time : </b> <br /> 
            FLIGHT : <?php if(isset($default['departure_flight'])) {echo $default['departure_flight'];} ?> 
            <?php 
              if ($default['departure_flight'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?> <br />
            TIME : <?php if(isset($default['departure_time'])) {echo $default['departure_time'];} ?>
            <?php 
              if ($default['departure_time'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
          </h4>
        </div>
      </div>

      <hr /> <h3 class="form-heading-details-brhv">Other Details</h3>
      
      <div class="row">
        <div class="col-sm-12">
          <h4 class="guest_detail"><b class="label-detail">Remarks : </b> 
            <?php if(isset($default['remarks'])) {echo $default['remarks'];} ?>
            <?php 
              if ($default['remarks'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
          </h4>
        </div>
        <div class="col-sm-12">
          <h4 class="guest_detail"><b class="label-detail">Last Modified By : </b> <?php if(isset($default['balirealtyhv_modified_by'])) {echo $default['balirealtyhv_modified_by'];} ?></h4>
        </div>
         <div class="col-sm-12">
          <h4 class="guest_detail"><b class="label-detail">Last Modified By Time : </b> 
            <?php 
              if($default['balirealtyhv_last_modified'] == "0000-00-00"){ 
                echo "<i style=color:red>TBA</i>"; 
              } else { $last_modified = Date("j F Y (H:i)", strtotime($default['balirealtyhv_last_modified'])); 
                echo $last_modified;
              } 
            ?>
          </h4>
        </div>
      </div>

    </div> <!--End Col 10-->

    <div class="col-sm-1">
    </div>
  </div> <!--Row-->
</div> <!--Container-->