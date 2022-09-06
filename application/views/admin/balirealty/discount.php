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
		    $('#discount').DataTable({
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
			  	<table class="table table-striped table-brhv" id="discount">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Dicsount Title</th>
			        <th>Villa</th>
			        <th>Start Date</th>
			        <th>End Date</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>

			      <?php
						$no = 1; //untuk menampilkan no
						foreach($list_discount as $row){
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td>
									<?php echo $row->discount_title;?>
								</td>
								<td>
									<?php echo $row->villa_discount;?></td>
								<td><?php echo Date("j F Y", strtotime($row->start_date));?></td>
								<td><?php echo Date("j F Y", strtotime($row->end_date))?></td>
								<td>
									<?php 
										if (date("Y-m-d") <= $row->end_date AND $row->discount_status=="1") {
											echo "<b style=color:#3c763d>Active</b>";
										} elseif (date("Y-m-d") < $row->end_date AND $row->discount_status!="1") {
											echo "<b style=color:#d9534f>Deleted</b>";
										} elseif (date("Y-m-d") > $row->end_date AND $row->discount_status=="1") {
											echo "<b style=color:#e206ef>Follow Up</b>";
										} elseif (date("Y-m-d") > $row->end_date AND $row->discount_status=="2") {
											echo "<b style=color:#d9534f>Deleted</b>";
										}
									?>
								</td>
								<td>
									<div class="action-button">
										<a href="<?php echo $button_detail."/".$row->discount_id;; ?>">
											<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
										</a>
										<?php if ($this->session->userdata('level')=="admin"): ?>
											<a href="<?php echo $button_edit."/".$row->discount_id;; ?>">
												<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
											</a>
											<a href="<?php echo $button_copy."/".$row->discount_id;; ?>">
												<span class='glyphicon glyphicon-duplicate' aria-hidden='true'></span>
											</a> 
										<?php endif ?>
									</div>
								</td>
							<?php
							$no++;
						}
						?>
			      	
			    </tbody>
			  	</table>
			</div> <!-- Table End -->
		</div> <!-- Col 10 -->

		<div class="col-sm-1"></div>
	</div> <!--Row-->

</div> <!--Container-->