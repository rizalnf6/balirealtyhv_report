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
        <?php echo $page_header; ?>  <br />
        <?php if ($this->session->userdata('level')=="admin"): ?>
        <a href="<?php echo $button_edit."/".$default['villa_id']; ?>">
            <button type="button" class="btn btn-filter btn-xs">Edit</button>
        </a> 
        <?php endif ?>
	</div>

    <div class="row">
        <div class="col-sm-1"></div>
        
        <div class="col-sm-10">
            <h3 class="form-heading-details-brhv">Villa Details</h3>

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Villa Id : </b> <?php if(isset($default['villa_id'])) {echo $default['villa_id'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Villa Name : </b> <?php if(isset($default['villa'])) {echo $default['villa'];} ?></h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Website : </b> <?php if(isset($default['website'])) {echo $default['website'];} ?>
                    <?php 
                      if ($default['website'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Contact : </b> <?php if(isset($default['villa_contact'])) {echo nl2br($default['villa_contact']);} ?>
                    <?php 
                      if ($default['villa_contact'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Address : </b> <?php if(isset($default['address'])) {echo nl2br($default['address']);} ?>
                    <?php 
                      if ($default['address'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Availability : </b> <?php if(isset($default['availability'])) {echo nl2br($default['availability']);} ?>
                    <?php 
                      if ($default['availability'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Villa Dropbox / Rates : </b> <?php if(isset($default['dropbox'])) {echo nl2br($default['dropbox']);} ?>
                    <?php 
                      if ($default['dropbox'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-12" style="border: 1px solid red">
                    <h4 class="guest_detail"><b class="label-detail">Special Remarks : </b> <?php if(isset($default['villa_remarks'])) {echo nl2br($default['villa_remarks']);} ?>
                    <?php 
                      if ($default['villa_remarks'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-12">
                    <h4 class="guest_detail"><b class="label-detail">Promotion : </b> <?php if(isset($default['villa_promotion'])) {echo nl2br($default['villa_promotion']);} ?>
                    <?php 
                      if ($default['villa_promotion'] == NULL) {
                        echo "<b style='color: #d9534f;'> X X X</b>";
                      } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

        </div> <!--Col 10-->
        
        <div class="col-sm-1"></div>
    </div> <!--Row-->

    <br /><br />

    <div class="row">
        <div class="col-sm-1"></div>
        
        <div class="col-sm-10">
            <h3 class="form-heading-details-brhv">Management Details</h3>

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Management Id : </b> <?php if(isset($default['management_id'])) {echo $default['management_id'];} ?>
                  </h4>
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
                    <h4 class="guest_detail"><b class="label-detail">Management Contact : </b> <?php if(isset($default['management_contact'])) {echo nl2br($default['management_contact']);} ?>
                    <?php 
                        if ($default['management_contact'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Management Address : </b> <?php if(isset($default['management_address'])) {echo nl2br($default['management_address']);} ?>
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
                    <h4 class="guest_detail"><b class="label-detail">Management Availability : </b> <?php if(isset($default['management_availability'])) {echo nl2br($default['management_availability']);} ?>
                    <?php 
                        if ($default['management_availability'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="guest_detail"><b class="label-detail">Management Dropbox / Rates : </b> <?php if(isset($default['management_dropbox'])) {echo nl2br($default['management_dropbox']);} ?>
                    <?php 
                        if ($default['management_dropbox'] == NULL) {
                            echo "<b style='color: #d9534f;'> X X X</b>";
                        } 
                    ?>
                    </h4>
                </div>
            </div> <!--End Row-->

        </div> <!--Col 10-->
        
        <div class="col-sm-1"></div>
    </div> <!--Row-->

    <br /><br />

    <?php if ($default['management_id'] == "1"): ?>
    <div class="row">
        <div class="col-sm-1"></div>
        
        <div class="col-sm-10">
            <h3 class="form-heading-details-brhv">Staff Details</h3>

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Villa Manager : </b> <?php if(isset($default['manager'])) {echo $default['manager'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Villa Supervisor : </b> <?php if(isset($default['supervisor'])) {echo $default['supervisor'];} ?></h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Butler : </b> <?php if(isset($default['butler'])) {echo $default['butler'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Housekeeper : </b> <?php if(isset($default['housekeeper'])) {echo $default['housekeeper'];} ?></h4>
                </div>
            </div> <!--End Row-->

            <div class="row">
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Status : </b> <?php if(isset($default['status_other'])) {echo $default['status_other'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Modified By : </b> <?php if(isset($default['villa_modified_by'])) {echo $default['villa_modified_by'];} ?></h4>
                </div>
                <div class="col-sm-4">
                  <h4 class="guest_detail"><b class="label-detail">Last Modified by Time : </b> <?php if($default['villa_last_modified'] == "0000-00-00"){ echo "<i style=color:red>TBA</i>"; } 
          else { $last_modified = Date("d F Y (H:i)", strtotime($default['villa_last_modified'])); echo $last_modified;;} ?></h4>
                </div>
            </div> <!--End Row-->

        </div> <!--Col 10-->
        
        <div class="col-sm-1"></div>
    </div> <!--Row-->
    <?php endif ?>


</div> <!--Container-->