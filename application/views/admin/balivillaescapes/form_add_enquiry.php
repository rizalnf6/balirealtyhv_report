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
							<input type="text" class="form-control input-sm" name="guest_name" 
						value="<?php if(isset($default['guest_name'])) {echo $default['guest_name'];} ?>" required>
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
							<input type="email" class="form-control input-sm" name="guest_email" 
						value="<?php if(isset($default['guest_email'])) {echo $default['guest_email'];} ?>" required>
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
							<input type="text" class="form-control input-sm" name="phone" 
						value="<?php if(isset($default['phone'])) {echo $default['phone'];} ?>">
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
							<select class='form-control' name='villa_id' required>
								<option value="">-</option>
									<?php
									foreach($list_villa as $row){
										echo 
										'<option value="' . $row[villa_id] . '" ' . ( isset( $default["villa"] ) && $default["villa"] == $row[villa] ? 'selected="selected"' : '' ) . '>'.$row[villa].' ___ '.$row[management].'</option>';	
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
								Checkin Date
							</label>
						</div> <!--Form Group End -->
					</div> <!--End col-sm-3 -->
					<div class="col-sm-4">
						<div class="form-group form-group-md">
							<input type="date" class="form-control" name="checkin" 
								value="<?php if(isset($default['checkin'])){echo $default['checkin'];}?>">
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
								value="<?php if(isset($default['checkout'])){echo $default['checkout'];}?>">
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
								<option value="1">Enquiry</option>
							</select>
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
		</div>  <!--End col-sm-10 -->
		<div class="col-sm-1">
		</div>
	</div>  <!-- End Row -->

</div> <!-- End Container -->