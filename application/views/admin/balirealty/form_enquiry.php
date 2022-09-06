<?php include "javascript_formvalidation.php"; ?>

<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">
			<img class="logo-table" src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> 
		</div>
		<div class="col-sm-5">
			<div class="page-header-with-margin">
				<?php echo $page_header; ?>
			</div>
		</div>
		<div class="col-sm-1">
		</div>
	</div>  <!-- End Row -->

	<br />

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<form method="post" class="form-horizontal" name="MyForm" onsubmit="return(validate())">

				<div class="col-sm-12">
					<h4 class="form-heading-brhv"> Guest Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Reservation
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<select class='form-control' name='reservation_id' required>
									<option value="">-</option>
										<?php
										foreach($list_reservation as $row){
											echo 
											'<option value="' . $row[user_id] . '" ' . ( isset( $default["name"] ) && $default["name"] == $row[name] ? 'selected="selected"' : '' ) . '>' . $row[name] . '</option>';	
											}
										?>
								</select>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<select class='form-control' name='reservation_id' readonly>
										<?php
										foreach($list_reservation as $row){
											echo 
											'<option value="' . $row[user_id] . '" ' . ( isset( $default["name"] ) && $default["name"] == $row[name] ? 'selected="selected"' : '' ) . '>' . $row[name] . '</option>';	
										}
										?>
								</select>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Guest Name
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="text" class="form-control input-md" name="guest_name" value="<?php if(isset($default['guest_name'])) {echo $default['guest_name'];} ?>" required>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Enquiry Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="date" class="form-control" name="enquiry_date" 
								value="<?php if(isset($default['enquiry_date'])){echo $default['enquiry_date'];}?>">
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="date" class="form-control" name="enquiry_date" 
								value="<?php if(isset($default['enquiry_date'])){echo $default['enquiry_date'];}?>" readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Source
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='source_id' required>
								<option value="">-</option>
									<?php
									foreach($list_source as $row){
										echo 
										'<option value="' . $row[source_id] . '" ' . ( isset( $default["source"] ) && $default["source"] == $row[source] ? 'selected="selected"' : '' ) . '>' . $row[source] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Email
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="email" class="form-control input-md" name="guest_email" value="<?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Phone Number
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="text" class="form-control input-md" name="phone" value="<?php if(isset($default['phone'])) {echo $default['phone'];} ?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Nationality
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='nationality_id'>
								<option value="">-</option>
									<?php
									foreach($list_nationality as $row){
										echo 
										'<option value="' . $row[nationality_id] . '" ' . ( isset( $default["nationality"] ) && $default["nationality"] == $row[nationality] ? 'selected="selected"' : '' ) . '>' . $row[nationality] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Villa Name
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='villa_id' required>
								<option value="">-</option>
									<?php
									foreach($list_villa as $row){
										echo 
										'<option value="' . $row[villa_id] . '" ' . ( isset( $default["villa"] ) && $default["villa"] == $row[villa] ? 'selected="selected"' : '' ) . '>' . $row[villa] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Checkin Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="date" class="form-control" name="checkin" value="<?php if(isset($default['checkin'])){echo $default['checkin'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Checkout Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="date" class="form-control" name="checkout" value="<?php if(isset($default['checkout'])){echo $default['checkout'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-brhv"> Payment Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Status
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='status_enquiry_id'>
									<?php
									foreach($list_status as $row){
										echo 
										'<option value="' . $row[status_enquiry_id] . '" ' . ( isset( $default["status_enquiry"] ) && $default["status_enquiry"] == $row[status_enquiry] ? 'selected="selected"' : '' ) . '>' . $row[status_enquiry] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Cancelation Reason
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='cancelation_id'>
								<option value="">-</option>
									<?php
									foreach($list_cancelation as $row){
										echo 
										'<option value="' . $row[cancelation_id] . '" ' . ( isset( $default["cancelation"] ) && $default["cancelation"] == $row[cancelation] ? 'selected="selected"' : '' ) . '>' . $row[cancelation] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Confirm Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="date" class="form-control" name="confirm_date" value="<?php if(isset($default['confirm_date'])){echo $default['confirm_date'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Payment Status
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='payment_id'>
								<option value="">-</option>
									<?php
									foreach($list_payment as $row){
										echo 
										'<option value="' . $row[payment_id] . '" ' . ( isset( $default["payment"] ) && $default["payment"] == $row[payment] ? 'selected="selected"' : '' ) . '>' . $row[payment] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-4 -->
				</div> <!--End col 12 -->

				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Revenue Nett (USD)
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="number" class="form-control" name="revenue_nett" 
								value="<?php if(isset($default['revenue_nett'])){echo $default['revenue_nett'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Revenue Gross (USD)
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="number" class="form-control" name="revenue_gross" 
								value="<?php if(isset($default['revenue_gross'])){echo $default['revenue_gross'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->

				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-brhv"> Other Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Remarks
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-2 -->
					<div class="col-sm-10">
						<div class="form-group form-group-md">
							<textarea id="remarks" class="form-control" rows="4" name="remarks">
								<?php if(isset($default['remarks'])) {echo $default['remarks'];}?>
							</textarea>
							<script>
      							$('#remarks').summernote({ placeholder: 'Put your notes here', tabsize: 2, height: 200 });
    						</script>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-10 -->
					<div class="col-sm-2" align="center">

					</div> <!--End col-sm-3 -->
					<div class="col-sm-10">
						<div class="form-group form-group-sm">
							<button name="submit" class="btn btn-primary btn-md" align="right">Submit</button>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col 12 -->

			</form>
		</div>  <!--End col-sm-10 -->
		<div class="col-sm-1">
		</div>
	</div>  <!-- End Row -->

</div> <!-- End Container -->

