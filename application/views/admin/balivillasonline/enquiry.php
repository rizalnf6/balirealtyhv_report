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
			<img class="logo-table-with-margin" src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> 
		</div>
		<div class="col-sm-1">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">	
			<div class="button-filter-download">
				<?php if ($this->session->userdata('level')=="reservation"): ?>
				<div class="btn-group">
				  	<a href="<?php echo $add; ?>">
						<button class="btn btn-default btn-add btn-xs">
							<i class="fa fa-plus" aria-hidden="true"></i> Add
						</button>
					</a>
				</div>
				<?php endif ?>
				<?php if ($this->session->userdata('level')=="admin"): ?>
					<div class="btn-group">
					  	<button class="btn btn-default btn-export dropdown-toggle btn-xs" type="button" data-toggle="dropdown"><i class="fa fa-download" aria-hidden="true"></i> Export
						<span class="caret"></span></button>
							<ul class="dropdown-menu dropdown-export">
								<li><a data-toggle="modal" data-target="#excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</a></li>
								<li><a data-toggle="modal" data-target="#csv"><i class="fa fa-file" aria-hidden="true"></i></i> CSV</a></li>
							</ul>
					</div>
				<?php endif ?>
			  	<div class="btn-group">
					<a data-toggle="modal" data-target="#filter">
						<button class="btn btn-default btn-filter btn-xs">
							<i class="fa fa-filter" aria-hidden="true"></i> Filter
						</button>
					</a>
				</div>
				<div class="btn-group">
					<a href="<?php echo $reset; ?>">
						<button class="btn btn-default btn-reset btn-xs">
							<i class="fa fa-refresh" aria-hidden="true"></i> Reset
						</button>
					</a>
				</div>
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
			<div class="table-responsive table-scroll">          
		  	<table class="table table-bordered table-ahr">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Enquiry Date</th>
		        <th>Reservation</th>
		        <th>Guest Name</th>
		        <th>Villa Name</th>
		        <th>Management</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>

		    <!-- ISI DATA AKAN MUNCUL DISINI -->
			<script type="text/javascript" language="JavaScript">
				function konfirmasi()
				{
				tanya = confirm("Are you sure want to delete ?");
				if (tanya == true) return true;
				else return false;
			}
			</script>

		      <?php
					$no = 1; //untuk menampilkan no
					foreach($list_enquiry as $row){
						?>
						<tr>
							<td class="no-border-left" align="center"><?php echo $no;?></td>
							<?php 
								if ($row->enquiry_date == "0000-00-00") {
									echo "<td style=color:#d9534f><b><i>T B A</i></b></td>";
								} else {
									echo "<td>".Date("j M Y", strtotime($row->enquiry_date))."</td>";
								}
							?>
							<td><?php echo $row->name;?></td>
							<td class="uppercase-name">
								<?php 
									if ($row->balivillasonline_status != "1") {
										echo $row->guest_name."<b style='color: #d9534f;'> (Deleted Enquiry)";
									} else {
										echo $row->guest_name;
									}
								?>
							</td>
							<?php 
								if ($row->villa == "T B A") {
									echo "<td style=color:#d9534f><b><i>T B A</i></b></td>";
								} else {
									echo "<td>".$row->villa."</td>";
								}
							?>
							<?php 
								if ($row->management == "T B A") {
									echo "<td style=color:#d9534f><b><i>T B A</i></b></td>";
								} else {
									echo "<td>".$row->management."</td>";
								}
							?>
							<td>
								<?php if ($row->status_enquiry == "Cancel"): ?>
									<script>
										$(document).ready(function(){
									   	$('[data-toggle="tooltip"]').tooltip();   
										});
									</script>
									<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $row->cancelation ?>!">
										<span class="glyphicon glyphicon-question-sign">
									</a>
								<?php endif ?>
								<?php echo $row->status_enquiry;?>
							</td>
							<td class="no-border-right">
								<div class="action-button">
									<a href="<?php echo $button_detail."/".$row->report_id;; ?>">
										<span class='glyphicon glyphicon glyphicon-eye-open' aria-hidden='true' alt='See detail'></span>
									</a> 
									<?php if ($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation"): ?>
										<a href="<?php echo $button_edit."/".$row->report_id;; ?>">
											<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
										</a> 
									<?php endif ?>
									<?php if ($this->session->userdata('level')=="admin"): ?>
										<a onclick='return konfirmasi()' href="<?php echo $button_delete."/".$row->report_id;; ?>">
											<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
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
		</div> <!-- Table End-->
			<br /><br />
			<div class="halaman"><p>Page : <?php echo $halaman;?></p></div>
		</div> <!--Col 10-->
		<div class="col-sm-1">
		</div>
	</div> <!--Row-->
</div> <!--Container-->

<div id="filter" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<div class="modal-content">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Filter Form</h4>
			</div> <!-- End modal-header-->
			<div class="modal-body" align="left">
			    <form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
					<div class="form-group form-group-sm">
				        <div class="col-xs-4">
				            Enquiry Date
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="enquiry_start">
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="enquiry_end">
				        </div>
				    </div>
				    <hr />
				    <?php if ($this->session->userdata('level')!="reservation"): ?>
				    <div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Reservation
				        </div>
				        <div class="col-xs-8">
				            <select class='form-control' name='reservation'>
				            <option value="">-</option>
									<?php
									foreach($list_reservation as $row){
										echo 
										'<option value="' . $row[name] . '" ' . ( isset( $default["name"] ) && $default["name"] == $row[name] ? 'selected="selected"' : '' ) . '>' . $row[name] . '</option>';	
									}
									?>
							</select>
				        </div>
				    </div>
				    <?php endif ?>
					<div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Guest Name
				        </div>
				        <div class="col-xs-8">
				            <input type="text" name="guest_name" class="form-control">
				        </div>
				    </div>
				    <div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Villa Name
				        </div>
				        <div class="col-xs-8">
				            <select class='form-control' name='villa'>
								<option value="">-</option>
									<?php
									foreach($list_villa as $row){
										echo 
										'<option value="' . $row[villa] . '" ' . ( isset( $default["villa"] ) && $default["villa"] == $row[villa] ? 'selected="selected"' : '' ) . '>'.$row[villa].' ___ '.$row[management].'</option>';	
									}
									?>
							</select>
				        </div>
				    </div>
				    <div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Status
				        </div>
				        <div class="col-xs-8">
				            <select class='form-control' name='status_enquiry'>
				            	<option value="">-</option>
									<?php
									foreach($list_status_filter_enquiry as $row){
										echo 
										'<option value="' . $row[status_enquiry] . '" ' . ( isset( $default["status_enquiry"] ) && $default["status_enquiry"] == $row[status_enquiry] ? 'selected="selected"' : '' ) . '>' . $row[status_enquiry] . '</option>';	
									}
									?>
							</select>
				        </div>
				    </div>
				    <hr />
				    <div class="form-group form-group-sm">
				        <div class="col-xs-4">
				            Check In Date
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkin_start">
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkin_end">
				        </div>
				    </div>
				    <div class="form-group form-group-sm">
				        <div class="col-xs-4">
				            Check Out Date
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkout_start">
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkout_end">
				        </div>
				    </div>
			    
			<div class="modal-footer">
			    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
			    <button name="submit" class="btn btn-primary btn-sm" align="right">Submit</button>

				</form>
			</div> <!-- End modal-footer-->
		</div><!-- End modal-body-->

	</div> <!-- End modal-content-->
</div> <!-- End modal-dialog-->
</div> <!-- End div id-->

<div id="excel" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<div class="modal-content">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Export to Excel</h4>
			</div> <!-- End modal-header-->
			<div class="modal-body" align="left">
			    <form method="post" class="form-horizontal" action="<?php echo $export_excel; ?>">

					<div class="form-group form-group-sm">
				        <div class="col-xs-4">
				            Enquiry Date
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="enquiry_start">
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="enquiry_end">
				        </div>
				    </div>
				    <hr />
				    <div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Reservation
				        </div>
				        <div class="col-xs-8">
				            <select class='form-control' name='reservation'>
				            <option value="">-</option>
									<?php
									foreach($list_reservation as $row){
										echo 
										'<option value="' . $row[name] . '" ' . ( isset( $default["name"] ) && $default["name"] == $row[name] ? 'selected="selected"' : '' ) . '>' . $row[name] . '</option>';	
									}
									?>
							</select>
				        </div>
				    </div>
					<div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Guest Name
				        </div>
				        <div class="col-xs-8">
				            <input type="text" name="guest_name" class="form-control">
				        </div>
				    </div>
				    <div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Villa Name
				        </div>
				        <div class="col-xs-8">
				            <select class='form-control' name='villa'>
								<option value="">-</option>
									<?php
									foreach($list_villa as $row){
										echo 
										'<option value="' . $row[villa] . '" ' . ( isset( $default["villa"] ) && $default["villa"] == $row[villa] ? 'selected="selected"' : '' ) . '>'.$row[villa].' ___ '.$row[management].'</option>';	
									}
									?>
							</select>
				        </div>
				    </div>
				    <div class="form-group form-group-sm">
						<div class="col-xs-4">
				            Status
				        </div>
				        <div class="col-xs-8">
				            <select class='form-control' name='status_enquiry'>
				            	<option value="">-</option>
									<?php
									foreach($list_status_filter_enquiry as $row){
										echo 
										'<option value="' . $row[status_enquiry] . '" ' . ( isset( $default["status_enquiry"] ) && $default["status_enquiry"] == $row[status_enquiry] ? 'selected="selected"' : '' ) . '>' . $row[status_enquiry] . '</option>';	
									}
									?>
							</select>
				        </div>
				    </div>
				    <hr />
				    <div class="form-group form-group-sm">
				        <div class="col-xs-4">
				            Check In Date
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkin_start">
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkin_end">
				        </div>
				    </div>
				    <div class="form-group form-group-sm">
				        <div class="col-xs-4">
				            Check Out Date
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkout_start">
				        </div>
				        <div class="col-xs-4">
				            <input type="date" class="form-control" name="checkout_end">
				        </div>
				    </div>
			    
			<div class="modal-footer">
			    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
			    <button name="submit" class="btn btn-primary btn-sm" align="right">Submit</button>

				</form>
			</div> <!-- End modal-footer-->
		</div><!-- End modal-body-->

	</div> <!-- End modal-content-->
</div> <!-- End modal-dialog-->
</div> <!-- End div id-->