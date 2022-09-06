<?php include "javascript_formvalidation.php"; ?>

<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">
			<img class="logo-table" src="<?php echo $logoBve; ?>" alt="Bali Villa Escapes"> 
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
					<h4 class="form-heading-bve"> Guest Detail </h4>
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
							<input type="text" class="form-control input-md" name="guest_name" 
							value="<?php 
										if(isset($default['guest_name']) && $default['status_enquiry']!='Extend Stay') {
											echo $default['guest_name']." (By ID ".$default['report_id'].")";
										} else if(isset($default['guest_name']) && $default['status_enquiry']='Extend Stay') {
											echo $default['guest_name'];
										} 
									?>" readonly>
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
							<input type="date" class="form-control" name="enquiry_date" 
								value="<?php if(isset($default['enquiry_date'])){echo $default['enquiry_date'];}?>" readonly>
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
							<input type="text" class="form-control input-md" name="guest_email" 
						value="<?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?>" readonly>
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
							<input type="text" class="form-control input-md" name="phone" 
						value="<?php if(isset($default['phone'])) {echo $default['phone'];} ?>" readonly>
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
							<select class='form-control' name='nationality_id' readonly>
								<option value="<?php echo $default['nationality_id']; ?>"><?php echo $default['nationality']; ?></option>
							</select>
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
							<select class='form-control' name='villa_id' readonly>
								<option value="<?php echo $default['villa_id']; ?>"><?php echo $default['villa'].' ___ '.$default['management']; ?></option>
							</select>
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
							<input type="date" class="form-control" name="checkin" 
								value="<?php if(isset($default['checkin'])){echo $default['checkin'];}?>" required>
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
							<input type="date" class="form-control" name="checkout" 
								value="<?php if(isset($default['checkout'])){echo $default['checkout'];}?>" required>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->

				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-bve"> Payment Detail </h4>
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
							<select class='form-control' name='status_enquiry_id' readonly>
									<option value="6">Extend Stay</option>
							</select>
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
								Confirm Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="date" class="form-control" name="confirm_date" 
								value="<?php if(isset($default['confirm_date'])){echo $default['confirm_date'];}?>" required>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Revenue Nett (AUD)
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="text" class="form-control" name="revenue_nett_aud" 
								value="<?php if(isset($default['revenue_nett_aud'])){echo $default['revenue_nett_aud'];}?>" required>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-2" align="center">
						<div class="form-group form-group-md">
							<label class="control-label">
								Revenue Gross (AUD)
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="text" class="form-control" name="revenue_gross_aud" 
								value="<?php if(isset($default['revenue_gross_aud'])){echo $default['revenue_gross_aud'];}?>" required>
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
							<input type="text" class="form-control" name="revenue_nett_usd" 
								value="<?php if(isset($default['revenue_nett_usd'])){echo $default['revenue_nett_usd'];}?>" required>
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
							<input type="text" class="form-control" name="revenue_gross_usd" 
								value="<?php if(isset($default['revenue_gross_usd'])){echo $default['revenue_gross_usd'];}?>" required>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
				</div> <!--End col-sm-12 -->
				<div class="col-sm-12">
					<br /><br />
					<h4 class="form-heading-bve"> Other Detail </h4>
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
							<button name="submit" class="btn btn-info btn-md" align="right">Submit</button>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					
				</div> <!--End col-sm-12 -->

			</form>
		</div>
	</div>
</div> <!--Container-->