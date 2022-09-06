<br />
<div class="container">

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
      <a href="<?php echo $button_edit."/".$default['supervisor_id']; ?>"><button type="button" class="btn btn-filter btn-xs">Edit</button></a> 
	  </div>

  <div class="table-responsive">          
    <table class="table table-striped table-brhv">
      <thead>
        <tr>
          <th>#</th>
          <th>Villa Supervisor Detail</th>
        </tr>
      </thead
      <tbody>
        <tr>
          	<td>Villa Supervisor Id</td>
          	<td>: <?php if(isset($default['supervisor_id'])) {echo $default['supervisor_id'];} ?></td>
        </tr>
        <tr>
            <td>Villa Supervisor</td>
            <td>: <?php if(isset($default['supervisor'])) {echo $default['supervisor'];} ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>: <?php if(isset($default['supervisor_phone'])) {echo $default['supervisor_phone'];} ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?php if(isset($default['supervisor_email'])) {echo $default['supervisor_email'];} ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <?php if(isset($default['status_other'])) {echo $default['status_other'];} ?></td>
        </tr>
   	  </tbody>
    </table>
  </div> <!--End Table Responsive-->

</div> <!--Container-->