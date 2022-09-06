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
    function konfirmasi()
    {
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
        <img class="logo-table-with-margin" src="<?php echo $logoBve; ?>" alt="Bali Villa Escapes"> 
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
        <!--Button Edit-->
        <?php if ($default['balivillaescapes_status'] == "1" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
          <a href="<?php echo $button_edit."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-filter btn-xs">Edit</button> 
          </a>  
        <?php endif ?>
        <!--Button Propose-->
        <?php if ($default['status_enquiry'] == "Cancel" AND $default['balivillaescapes_status'] == "1" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
          <a href="<?php echo $button_propose."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-add btn-xs">Propose</button> 
          </a> 
        <?php endif ?>
        <!--Button Extend Stay-->
        <?php if ($default['status_enquiry'] == "Confirm" OR $default['status_enquiry'] == "proposed" OR $default['status_enquiry'] == "Extend Stay"): ?>
          <a href="<?php echo $button_extend."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-add btn-xs">Extend Stay</button>
          </a> 
        <?php endif ?>
        <?php if ($this->session->userdata('level')=="admin"): ?>
          <a onclick='return konfirmasi()' href="<?php echo $button_delete."/".$default['report_id']; ?>">
            <button type="button" class="btn btn-reset btn-xs">Delete</button>
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

    <div class="col-sm-10">

      <h3 class="form-heading-details-bve">Guest Details</h3>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Enquiry Id : </b> <?php if(isset($default['report_id'])) {echo $default['report_id'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Reservation : </b> <?php if(isset($default['name'])) {echo $default['name'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Guest Name : </b> 
            <?php if(isset($default['guest_name'])) {echo $default['guest_name'];} ?>
            <?php 
              if ($default['balivillaescapes_status'] != "1") {
                echo "<b style='color: #d9534f;'> (Deleted Enquiry)";
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
                echo "<b style=color:#d9534f>TBA</b>"; 
              } else { $enquiry_date = Date("j F Y", strtotime($default['enquiry_date'])); 
                echo $enquiry_date;;
              } 
            ?>
          </h4>
        </div> 
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Email : </b> <?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?></h4>
        </div>
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
      </div> <!--End Row-->

      <div class="row">
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
          <h4 class="guest_detail"><b class="label-detail">Villa : </b> <?php if(isset($default['villa'])) {echo $default['villa'].' <b style=color:#d9534f> <br /> ('.$default['management'].')</b>';} ?></h4>
        </div>
      </div> <!--End Row-->

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Checkin Date : </b> 
            <?php 
              if($default['checkin'] == "0000-00-00"){ 
                echo "<i style=color:#d9534f>TBA</i>"; 
              } else { $checkin = Date("j F Y", strtotime($default['checkin'])); 
                echo $checkin;
              } 
            ?>
            <?php 
              if($default['checkin'] > $default['checkout']){ 
                echo "<i style=color:#d9534f>Check the Date.</i>"; 
              } else { echo ""; } 
            ?>
          </h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Checkout Date : </b> 
            <?php 
              if($default['checkout'] == "0000-00-00"){ 
                echo "<i style=color:#d9534f>TBA</i>"; 
              } else { $checkout = Date("j F Y", strtotime($default['checkout'])); 
                echo $checkout;
              } 
            ?>
            <?php 
              if($default['checkout'] < $default['checkin']){ 
                echo "<i style=color:#d9534f>Check the Date.</i>"; 
              } else { echo "";} 
            ?>
          </h4>
        </div>
      </div> <!--End Row-->

      <hr /> <h3 class="form-heading-details-bve">Payment Details</h3>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Status : </b> <?php if(isset($default['status_enquiry'])) {echo $default['status_enquiry'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Cancelation Reason : </b> 
            <?php if(isset($default['cancelation'])) {echo $default['cancelation'];} ?>
            <?php 
              if($default['status_enquiry'] == "Cancel" AND $default['cancelation'] == ""){ 
                echo "<i style=color:#d9534f>Fill the cancelation reason.</i>"; 
              } else { echo "";} 
            ?>
          </h4>
        </div>
      </div> <!--End Row-->

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
          <h4 class="guest_detail"><b class="label-detail">Last Modified By : </b> <?php if(isset($default['balivillaescapes_modified_by'])) {echo $default['balivillaescapes_modified_by'];} ?></h4>
        </div>
         <div class="col-sm-12">
          <h4 class="guest_detail"><b class="label-detail">Last Modified By Time : </b> 
            <?php 
              if($default['balivillaescapes_last_modified'] == "0000-00-00"){ 
                echo "<i style=color:red>TBA</i>"; 
              } else { $last_modified = Date("j F Y (H:i)", strtotime($default['balivillaescapes_last_modified'])); 
                echo $last_modified;
              } 
            ?>
          </h4>
        </div>
      </div>
      
    </div> <!--Col 10-->
    
    <div class="col-sm-1">
    </div>
  </div> <!--Row-->
</div> <!--Container-->