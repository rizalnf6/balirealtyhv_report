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

    <div class="page-header">
        <?php echo $page_header; ?> <br />
        <?php if ($this->session->userdata('level')=="admin"): ?>
        <a href="<?php echo $button_edit."/".$default['management_id']; ?>"><button type="button" class="btn btn-filter btn-xs">Edit</button></a> 
        <?php endif ?>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        
        <div class="col-sm-10">
            <h3 class="form-heading-details-brhv">Management Details</h3>

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Management Id : </b> <?php if(isset($default['management_id'])) {echo $default['management_id'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Management Name : </b> <?php if(isset($default['management'])) {echo $default['management'];} ?></h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Management Website : </b> <?php if(isset($default['management_website'])) {echo $default['management_website'];} ?>
                    <?php 
                        if ($default['management_website'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Management Contact : </b> <?php if(isset($default['management_contact'])) {echo $default['management_contact'];} ?>
                    <?php 
                        if ($default['management_contact'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Management Address : </b> <?php if(isset($default['management_address'])) {echo $default['management_address'];} ?>
                    <?php 
                        if ($default['management_address'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Availability : </b> <?php if(isset($default['management_availability'])) {echo $default['management_availability'];} ?>
                    <?php 
                        if ($default['management_availability'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Dropbox / Rates : </b> <?php if(isset($default['management_dropbox'])) {echo $default['management_dropbox'];} ?>
                    <?php 
                        if ($default['management_dropbox'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Status : </b> <?php if(isset($default['status_other'])) {echo $default['status_other'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Modified By : </b> <?php if(isset($default['management_modified_by'])) {echo $default['management_modified_by'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Last Modified by Time : </b> <?php if($default['management_last_modified'] == "0000-00-00"){ echo "<i style=color:red>TBA</i>"; } 
          else { $last_modified = Date("d F Y (H:i)", strtotime($default['management_last_modified'])); echo $last_modified;;} ?></h4>
                </div>
            </div> <!--End Row-->

        </div> <!--Col 10-->
        
        <div class="col-sm-1"></div>
    </div> <!--Row-->



</div> <!--Container-->