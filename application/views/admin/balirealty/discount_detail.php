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
        <!--Button Edit-->
        <?php if ($default['discount_status'] == "1" AND $this->session->userdata('level')=="admin"): ?>
          <a href="<?php echo $button_edit."/".$default['discount_id']; ?>">
            <button type="button" class="btn btn-filter btn-xs">Edit</button>
          </a> 
        <?php endif ?>
        <?php if ($this->session->userdata('level')=="admin"): ?>
          <a onclick='return konfirmasi()' href="<?php echo $button_delete."/".$default['discount_id']; ?>">
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
      <h3 class="form-heading-details-brhv">Details</h3>

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Discount Id : </b> <?php if(isset($default['discount_id'])) {echo $default['discount_id'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Discount Title : </b> <?php if(isset($default['discount_title'])) {echo $default['discount_title'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Villa : </b> <?php if(isset($default['villa_discount'])) {echo $default['villa_discount'];} ?></h4>
        </div>
      </div> <!--End Row-->

      <div class="row">
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">Start Date : </b> <?php if(isset($default['start_date'])) {echo $default['start_date'];} ?></h4>
        </div>
        <div class="col-sm-4">
          <h4 class="guest_detail"><b class="label-detail">End Date : </b> <?php if(isset($default['end_date'])) {echo $default['end_date'];} ?></h4>
        </div>
      </div> <!--End Row-->

      <br ><br >
      <div class="row">
        <div class="col-sm-8">
          <h4 class="guest_detail"><b class="label-detail">Discount Detail : </b> <br /><br /> <?php if(isset($default['discount_detail'])) {echo nl2br($default['discount_detail']);} ?></h4>
        </div>
        <div class="col-sm-4">
          <br />
          <h4 class="guest_detail"><b class="label-detail">Remarks : </b> <br /><br /> <?php if(isset($default['discount_remarks'])) {echo nl2br($default['discount_remarks']);} ?></h4>
            <?php 
              if ($default['discount_remarks'] == NULL) {
                echo "<b style='color: #d9534f;'> X X X</b>";
              } 
            ?>
        </div>
      </div> <!--End Row-->

      <br ><br >
      <div class="row">
        <div class="col-sm-12">
          <h4 class="guest_detail"><b class="label-detail">Last Modified By : </b> <?php if(isset($default['discount_modified_by'])) {echo $default['discount_modified_by'];} ?></h4>
        </div>
         <div class="col-sm-12">
          <h4 class="guest_detail"><b class="label-detail">Last Modified By Time : </b> 
            <?php 
              if($default['discount_last_modified'] == "0000-00-00"){ 
                echo "<i style=color:red>TBA</i>"; 
              } else { $last_modified = Date("j F Y (H:i)", strtotime($default['discount_last_modified'])); 
                echo $last_modified;
              } 
            ?>
          </h4>
        </div>
      </div> <!--End Row-->

    </div> <!--Col 10-->
    
    <div class="col-sm-1">
    </div>
  </div> <!--Row-->

</div> <!--Container-->