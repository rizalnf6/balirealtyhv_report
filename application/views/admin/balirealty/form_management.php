<br /><br /><br />
<div class="container-fluid">

	<h3 class="form-heading-details-brhv text-center"><?php echo $page_header; ?></h3>
	<br />

	<form method="post" class="form-horizontal">

		<div class="col-sm-1"> </div>
		<div class="col-sm-10">
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Management Name
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-md" name="management" 
				value="<?php if(isset($default['management'])) {echo $default['management'];} ?>" required>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Website
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-md" name="management_website" 
				value="<?php if(isset($default['management_website'])) {echo $default['management_website'];} ?>"> <br />
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Contact
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">										
					<textarea id="management_contact" class="form-control" rows="5" name="management_contact"><?php if(isset($default['management_contact']))
						{echo $default['management_contact'];}?></textarea> 
					<!-- <script>
				    	$('#management_contact').summernote({placeholder: 'Management contact detail', tabsize: 2, height: 100 });
				    </script> -->
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Address
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">										
					<textarea id="management_address" class="form-control" rows="5" name="management_address"><?php if(isset($default['management_address']))
						{echo $default['management_address'];}?></textarea> 
					<!-- <script>
				    	$('#management_address').summernote({placeholder: 'Management address', tabsize: 2, height: 100 });
				    </script> -->
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Availability
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">										
					<textarea id="management_availability" class="form-control" rows="15" name="management_availability"><?php if(isset($default['management_availability']))
						{echo $default['management_availability'];}?></textarea> 
					<script>
				    	$('#management_availability').summernote({placeholder: 'Information like Calendar link here', tabsize: 2, height: 200 });
				    </script>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Dropbox / Rates
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">
					<textarea id="management_dropbox" class="form-control" rows="5" name="management_dropbox"><?php if(isset($default['management_dropbox']))
						{echo $default['management_dropbox'];}?></textarea> 
					<script>$('#management_dropbox').summernote({placeholder: 'Information like Dropbox, Contract Rate, Portal.', tabsize: 2, height: 200 });</script>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->

			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Status
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">
					<select class='form-control' name='management_status' required>
							<?php
							foreach($list_status as $row){
								echo 
								'<option value="' . $row[status_other_id] . '" ' . ( isset( $default["status_other"] ) && $default["status_other"] == $row[status_other] ? 'selected="selected"' : '' ) . '>' . $row[status_other] . '</option>';	
							}
							?>
					</select>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">

				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">
					<button name="submit" class="btn btn-danger btn-md" align="right">Submit</button>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-12 -->

	</form>

</div> <!--Container-->