<br />
<div class="container">

	<?php 
		$add_sukses = $this->session->flashdata('add_sukses');
		$edit_success = $this->session->flashdata('edit_success');
		$delete_success = $this->session->flashdata('delete_success');
		
			if (isset($add_sukses)) {
				echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
					  </a><strong>Well done! </strong>".$this->session->flashdata('add_sukses')."</div>";
			} 
			elseif (isset($edit_success)) {
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
		<a href="<?php echo $button_add; ?>"><button type="button" class="btn btn-add btn-xs">Add</button></a>
	</div>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#villaSupervisor').DataTable({
		    	"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		        "iDisplayLength": 10,
		        "paging":   true,
		        "ordering": true,
		        "info":     true,
		        "searching": true,
		    });
		});
	</script>

	<style type="text/css">
		.dataTables_filter {float: right!important;}
	</style>

	<div class="table-responsive">          
	  	<table class="table table-striped table-brhv" id="villaSupervisor">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Supervisor</th>
	        <th>Phone</th>
	        <th>Email</th>
	        <th>Status</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>

	      <?php
				$no = 1; //untuk menampilkan no
				foreach($list_villa_supervisor as $row){
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->supervisor;?></td>
						<td><?php echo $row->supervisor_phone;?></td>
						<td><?php echo $row->supervisor_email;?></td>
						<td><?php echo $row->status_other;?></td>
						<td>
							<div class="action-button">
								<a href="<?php echo $button_detail."/".$row->supervisor_id;; ?>">
									<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
								</a> 
								<a href="<?php echo $button_edit."/".$row->supervisor_id;; ?>">
									<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
								</a> 
							</div>
						</td>
					<?php
					$no++;
				}
				?>
	      	
	    </tbody>
	  	</table>
	</div> <!-- Table End-->
</div> <!--Container-->