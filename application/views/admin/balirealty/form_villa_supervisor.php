<br />
<div class="container">

	<h4 class="form-heading-brhv"> <?php echo $page_header; ?> </h4>
	<br />

	<form method="post" class="form-horizontal">

		<div class="col-sm-12">
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Villa Supervisor
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-sm" name="supervisor" 
				value="<?php if(isset($default['supervisor'])) {echo $default['supervisor'];} ?>" required>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-12 -->
		<div class="col-sm-12">
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Phone
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-sm" name="supervisor_phone" 
				value="<?php if(isset($default['supervisor_phone'])) {echo $default['supervisor_phone'];} ?>" required>
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
					<input type="email" class="form-control input-sm" name="supervisor_email" 
				value="<?php if(isset($default['supervisor_email'])) {echo $default['supervisor_email'];} ?>" required>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-12 -->		
		<div class="col-sm-12">
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Status
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<select class='form-control' name='supervisor_status' required>
							<?php
							foreach($list_status as $row){
								echo 
								'<option value="' . $row[status_other_id] . '" ' . ( isset( $default["status_other"] ) && $default["status_other"] == $row[status_other] ? 'selected="selected"' : '' ) . '>' . $row[status_other] . '</option>';	
							}
							?>
					</select>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-12 -->
		<div class="col-sm-12">
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">

				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<button name="submit" class="btn btn-danger btn-md">Submit</button>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-12 -->

	</form>

</div> <!--Container-->