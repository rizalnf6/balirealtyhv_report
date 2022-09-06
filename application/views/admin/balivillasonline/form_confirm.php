<?php include "javascript_formvalidation.php"; ?>

<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">
			<img class="logo-table" src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> 
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
					<h4 class="form-heading-ahr"> Guest Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Reservation
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='reservation_id' readonly>
								<option value="<?php echo $default['user_id']; ?>"><?php echo $default['name']; ?></option>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Guest Name
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="text" class="form-control input-md" name="guest_name" value="<?php if(isset($default['guest_name'])) {echo $default['guest_name'];} ?>" required>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="text" class="form-control input-md" name="guest_name" value="<?php if(isset($default['guest_name'])) {echo $default['guest_name'];} ?>" required readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Enquiry Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
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
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
				<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Email
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="email" class="form-control input-md" name="guest_email" value="<?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?>" required>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="email" class="form-control input-md" name="guest_email" value="<?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?>" required readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Phone Number
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="text" class="form-control input-md" name="phone" value="<?php if(isset($default['phone'])) {echo $default['phone'];} ?>">
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="text" class="form-control input-md" name="phone" value="<?php if(isset($default['phone'])) {echo $default['phone'];} ?>" readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Nationality
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<select class='form-control' name='nationality_id'>
									<option value="">-</option>
										<?php
										foreach($list_nationality as $row){
											echo 
											'<option value="' . $row[nationality_id] . '" ' . ( isset( $default["nationality"] ) && $default["nationality"] == $row[nationality] ? 'selected="selected"' : '' ) . '>' . $row[nationality] . '</option>';	
										}
										?>
								</select>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<select class='form-control' name='nationality_id' readonly>
									<option value="<?php echo $default['nationality_id']; ?>"><?php echo $default['nationality']; ?></option>
								</select>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Villa Name
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<select class='form-control' name='villa_id' required>
									<?php
									foreach($list_villa as $row){
										echo 
										'<option value="' . $row[villa_id] . '" ' . ( isset( $default["villa"] ) && $default["villa"] == $row[villa] ? 'selected="selected"' : '' ) . '>'.$row[villa].' ___ '.$row[management].'</option>';	
									}
									?>
								</select>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<select class='form-control' name='villa_id' readonly>
									<option value="<?php echo $default['villa_id']; ?>"><?php echo $default['villa'].' ___ '.$default['management']; ?></option>
								</select>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Checkin Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="date" class="form-control" name="checkin" value="<?php if(isset($default['checkin'])){echo $default['checkin'];}?>">
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="date" class="form-control" name="checkin" value="<?php if(isset($default['checkin'])){echo $default['checkin'];}?>" readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Checkout Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="date" class="form-control" name="checkout" value="<?php if(isset($default['checkout'])){echo $default['checkout'];}?>">
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="date" class="form-control" name="checkout" value="<?php if(isset($default['checkout'])){echo $default['checkout'];}?>" readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				
				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-ahr"> Payment Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Status
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<select class='form-control' name='status_enquiry_id'>
										<?php
										foreach($list_status as $row){
											echo 
											'<option value="' . $row[status_enquiry_id] . '" ' . ( isset( $default["status_enquiry"] ) && $default["status_enquiry"] == $row[status_enquiry] ? 'selected="selected"' : '' ) . '>' . $row[status_enquiry] . '</option>';	
										}
										?>
								</select>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<select class='form-control' name='status_enquiry_id' readonly>
									<option value="<?php echo $default['status_enquiry_id']; ?>"><?php echo $default['status_enquiry']; ?></option>
								</select>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Confirm Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="date" class="form-control" name="confirm_date" value="<?php if(isset($default['confirm_date'])){echo $default['confirm_date'];}?>" required>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="date" class="form-control" name="confirm_date" value="<?php if(isset($default['confirm_date'])){echo $default['confirm_date'];}?>" required readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Payment Status
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<select class='form-control' name='payment_id' required>
								<option value="">-</option>
									<?php
									foreach($list_payment as $row){
										echo 
										'<option value="' . $row[payment_id] . '" ' . ( isset( $default["payment"] ) && $default["payment"] == $row[payment] ? 'selected="selected"' : '' ) . '>' . $row[payment] . '</option>';	
									}
									?>
							</select>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
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
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="number" class="form-control" name="revenue_nett" value="<?php if(isset($default['revenue_nett'])){echo $default['revenue_nett'];}?>" required>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="number" class="form-control" name="revenue_nett" value="<?php if(isset($default['revenue_nett'])){echo $default['revenue_nett'];}?>" required readonly>
							<?php endif ?>
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
							<?php if ($this->session->userdata('level')=="admin"): ?>
								<input type="number" class="form-control" name="revenue_gross" value="<?php if(isset($default['revenue_gross'])){echo $default['revenue_gross'];}?>" required>
							<?php endif ?>
							<?php if ($this->session->userdata('level')=="reservation"): ?>
								<input type="number" class="form-control" name="revenue_gross" value="<?php if(isset($default['revenue_gross'])){echo $default['revenue_gross'];}?>" required readonly>
							<?php endif ?>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->

				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-ahr"> Arrival Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Adult
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<input type="number" class="form-control" name="adult" 
								value="<?php if(isset($default['adult'])){echo $default['adult'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Children (< 12 years Old)
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<input type="number" class="form-control" name="children" 
								value="<?php if(isset($default['children'])){echo $default['children'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Infant (< 4 years Old)
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<input type="number" class="form-control" name="infant" 
								value="<?php if(isset($default['infant'])){echo $default['infant'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Arrival Flight
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<textarea class="form-control" rows="2" name="arrival_flight"><?php if(isset($default['arrival_flight']))
								{echo $default['arrival_flight'];}?></textarea>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Arival Time
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<input type="text" class="form-control" name="arrival_time" 
								value="<?php if(isset($default['arrival_time'])){echo $default['arrival_time'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Departure Flight
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<textarea class="form-control" rows="2" name="departure_flight"><?php if(isset($default['departure_flight']))
								{echo $default['departure_flight'];}?></textarea>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Departure Time
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2">
						<div class="form-group form-group-md">
							<input type="text" class="form-control" name="departure_time" 
								value="<?php if(isset($default['departure_time'])){echo $default['departure_time'];}?>">
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				
				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-ahr"> Other Detail </h4>
					<br />
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Remarks
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-10">
						<div class="form-group form-group-md">
							<textarea id="remarks" class="form-control" rows="4" name="remarks">
								<?php if(isset($default['remarks'])){echo $default['remarks'];}?>
							</textarea>
							<script>
      							$('#remarks').summernote({ placeholder: 'Put your notes here', tabsize: 2, height: 200 });
    						</script>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">

					</div> <!--End col-sm-3 -->
					<div class="col-sm-10">
						<div class="form-group form-group-md">
							<button name="submit" class="btn btn-warning btn-md" align="right">Submit</button>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					
				</div> <!--End col-sm-12 -->

			</form>
		</div> <!--Col 10-->
	</div> <!--Row-->
</div> <!--Container-->