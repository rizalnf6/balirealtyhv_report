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
      <?php echo $page_header; ?>  <br />
      <a href="<?php echo $button_edit."/".$default['manager_id']; ?>"><button type="button" class="btn btn-filter btn-xs">Edit</button></a> 
	  </div

  <div class="table-responsive">          
    <table class="table table-striped table-brhv">
      <thead>
        <tr>
          <th>#</th>
          <th>Villa Manager Detail</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          	<td>Villa Manager Id</td>
          	<td>: <?php if(isset($default['manager_id'])) {echo $default['manager_id'];} ?></td>
        </tr>
        <tr>
            <td>Villa Manager</td>
            <td>: <?php if(isset($default['manager'])) {echo $default['manager'];} ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>: <?php if(isset($default['manager_phone'])) {echo $default['manager_phone'];} ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?php if(isset($default['manager_email'])) {echo $default['manager_email'];} ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <?php if(isset($default['status_other'])) {echo $default['status_other'];} ?></td>
        </tr>
   	  </tbody>
    </table>
  </div> <!--End Table Responsive-->

</div> <!--Container-->