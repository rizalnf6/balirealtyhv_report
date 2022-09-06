<br /><br /><br />
<div class="container-fluid">

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
		<?php if ($this->session->userdata('level')=="admin"): ?>
			<a href="<?php echo $button_add; ?>"><button type="button" class="btn btn-add btn-xs">Add</button></a>
		<?php endif ?>
	</div>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#management').DataTable({
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

	<div class="row">

		<div class="col-sm-1"></div>

		<div class="col-sm-10">
			<div class="table-responsive">          
			  	<table class="table table-striped table-brhv" id="management">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Management</th>
			        <th>Contact</th>
			        <th>Availability</th>
			        <th>Dropbox / Rates</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php
					$no = 1; //untuk menampilkan no
					foreach($list_management as $row){
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><a class="villa-link" href="<?php echo $row->management_website; ?>" target="_blank"><?php echo $row->management;?></a></td>
						<?php 
							if ($row->management_contact == NULL) { echo "<td style=color:#d9534f><b><i>x</i></b></td>"; } 
							else { echo "<td>".nl2br($row->management_contact)."</td>"; }
						?>
						<?php 
							if ($row->management_availability == NULL) { echo "<td style=color:#d9534f><b><i>x</i></b></td>"; } 
							else { echo "<td>".nl2br($row->management_availability)."</td>"; }
						?>
						<?php 
							if ($row->management_dropbox == NULL) { echo "<td style=color:#d9534f><b><i>x</i></b></td>"; } 
							else { echo "<td>".nl2br($row->management_dropbox)."</td>"; }
						?>
						<td><?php echo $row->status_other;?></td>
						<td>
							<div class="action-button">
								<a href="<?php echo $button_detail."/".$row->management_id;; ?>">
									<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
								</a> 
								<?php if ($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="resmanager"): ?>
								<a href="<?php echo $button_edit."/".$row->management_id;; ?>">
									<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
								</a> 
								<?php endif ?>
							</div>
						</td>
					<?php $no++; } ?>
			      	
			    </tbody>
		  		</table>
			</div> <!-- Table End -->
		</div> <!-- Col 10 -->

		<div class="col-sm-1"></div>
	
	</div> <!--Row-->
</div> <!--Container-->