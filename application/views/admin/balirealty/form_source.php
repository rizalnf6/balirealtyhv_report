<br />
<div class="container">

	<h4 class="form-heading-brhv"> <?php echo $page_header; ?> </h4>
	<br />

	<form method="post" class="form-horizontal">

		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-2" align="center">
					<div class="form-group form-group-md">
						<label class="control-label">
							Source
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<input type="text" class="form-control input-sm" name="source" 
					value="<?php if(isset($default['source'])) {echo $default['source'];} ?>" required>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
			</div> <!--End col-sm-12 -->
			<div class="col-sm-12">
				<div class="col-sm-2" align="center">
					<div class="form-group form-group-md">
						<label class="control-label">
							Category
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<select class='form-control' name='category' required>
								<?php
								foreach($list_source_category as $row){
									echo 
									'<option value="' . $row[source_category_id] . '" ' . ( isset( $default["source_category"] ) && $default["source_category"] == $row[source_category] ? 'selected="selected"' : '' ) . '>' . $row[source_category] . '</option>';	
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
							Status
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<select class='form-control' name='source_status' required>
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
					<div class="form-group form-group-sm">

					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-sm">
						<button name="submit" class="btn btn-danger btn-md">Submit</button>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
			</div> <!--End col-sm-12 -->
		</div> <!--Row-->
	</form>

</div> <!--Container-->