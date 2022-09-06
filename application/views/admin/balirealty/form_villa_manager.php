<br />
<div class="container">

	<h4 class="form-heading-brhv"> <?php echo $page_header; ?> </h4>
	<br />

	<form method="post" class="form-horizontal">

		<div class="col-sm-12">
			<div class="col-sm-2" align="center">
				<div class="form-group form-group-md">
					<label class="control-label">
						Villa Manager
					</label>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
			<div class="col-sm-4">
				<div class="form-group form-group-md">
					<input type="text" class="form-control input-sm" name="manager" 
				value="<?php if(isset($default['manager'])) {echo $default['manager'];} ?>" required>
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
					<input type="text" class="form-control input-sm" name="manager_phone" 
				value="<?php if(isset($default['manager_phone'])) {echo $default['manager_phone'];} ?>" required>
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
					<input type="email" class="form-control input-sm" name="manager_email" 
				value="<?php if(isset($default['manager_email'])) {echo $default['manager_email'];} ?>" required>
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
					<select class='form-control' name='manager_status' required>
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
					<button name="submit" class="btn btn-danger btn-md" align="right">Submit</button>
				</div> <!--Form Group End -->
			</div> <!--End col-sm-3 -->
		</div> <!--End col-sm-12 -->

	</form>

</div> <!--Container-->