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
						Villa Name
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-md" name="villa" 
				value="<?php if(isset($default['villa'])) {echo $default['villa'];} ?>" required>
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
					<input type="text" class="form-control input-md" name="website" value="<?php if(isset($default['website'])) {echo $default['website'];} ?>">
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
					<textarea id="villa_contact" class="form-control" rows="5" name="villa_contact"><?php if(isset($default['villa_contact']))
						{echo $default['villa_contact'];}?></textarea> 
					<!-- <script>
				    	$('#villa_contact').summernote({placeholder: 'Villa contact detail', tabsize: 2, height: 100 });
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
					<textarea id="address" class="form-control" rows="5" name="address"><?php if(isset($default['address']))
						{echo $default['address'];}?></textarea> 
					<!-- <script>
				    	$('#address').summernote({placeholder: 'Villa address', tabsize: 2, height: 100 });
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
					<textarea id="availability" class="form-control" rows="15" name="availability"><?php if(isset($default['availability']))
						{echo $default['availability'];}?></textarea> 
					<script>
				    	$('#availability').summernote({placeholder: 'Information like Calendar link here', tabsize: 2, height: 200 });
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
					<textarea id="dropbox" class="form-control" rows="5" name="dropbox"><?php if(isset($default['dropbox']))
						{echo $default['dropbox'];}?></textarea> 
					<script>$('#dropbox').summernote({placeholder: 'Information like Dropbox, Contract Rate, Portal.', tabsize: 2, height: 200 });</script>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Special Remarks
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">
					<textarea id="villa_remarks" class="form-control" rows="5" name="villa_remarks"><?php if(isset($default['villa_remarks']))
						{echo $default['villa_remarks'];}?></textarea> 
					<script>$('#villa_remarks').summernote({placeholder: 'Information about Checkin/out time, Security deposit, Late check out, Etc. ', tabsize: 2, height: 400 });</script> 
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Promotion
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-10">
				<div class="form-group form-group-md">
					<textarea id="villa_promotion" class="form-control" rows="5" name="villa_promotion"><?php if(isset($default['villa_promotion']))
						{echo $default['villa_promotion'];}?></textarea> 
					<script>$('#villa_promotion').summernote({placeholder: 'Information about Villa Promotion. ', tabsize: 2, height: 400 });</script>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<hr />
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Management / Owner
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<select class='form-control' name='management_id' required>
						<option value="">-</option>
							<?php
							foreach($list_management as $row){
								echo 
								'<option value="' . $row[management_id] . '" ' . ( isset( $default["management"] ) && $default["management"] == $row[management] ? 'selected="selected"' : '' ) . '>' . $row[management] . '</option>';	
							}
							?>
					</select>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Villa Manager
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<select class='form-control' name='manager_id'>
						<option value="">-</option>
							<?php
							foreach($list_manager as $row){
								echo 
								'<option value="' . $row[manager_id] . '" ' . ( isset( $default["manager"] ) && $default["manager"] == $row[manager] ? 'selected="selected"' : '' ) . '>' . $row[manager] . '</option>';	
							}
							?>
					</select>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Villa Supervisor
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<select class='form-control' name='supervisor_id'>
						<option value="">-</option>
							<?php
							foreach($list_supervisor as $row){
								echo 
								'<option value="' . $row[supervisor_id] . '" ' . ( isset( $default["supervisor"] ) && $default["supervisor"] == $row[supervisor] ? 'selected="selected"' : '' ) . '>' . $row[supervisor] . '</option>';	
							}
							?>
					</select>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Butler
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-md" name="butler" 
				value="<?php if(isset($default['butler'])) {echo $default['butler'];} ?>">
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Houskeeper
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-sm" name="housekeeper" 
				value="<?php if(isset($default['housekeeper'])) {echo $default['housekeeper'];} ?>">
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Status
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<select class='form-control' name='villa_status' required="">
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
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<button name="submit" class="btn btn-danger btn-md" align="right">Submit</button>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-10 -->

		<div class="col-sm-1"> </div>

	</form>

</div> <!--Container-->