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
							Discount Title
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<textarea class="form-control" rows="2" name="discount_title" required><?php if(isset($default['discount_title']))
								{echo $default['discount_title'];}?></textarea>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-2" align="center">
					<div class="form-group form-group-md">
						<label class="control-label">
							Villa
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<select class='form-control' name='villa_discount' required>
								<?php
								foreach($list_villa as $row){
									echo 
									'<option value="' . $row[villa] . '" ' . ( isset( $default["villa_discount"] ) && $default["villa_discount"] == $row[villa] ? 'selected="selected"' : '' ) . '>' . $row[villa] . '</option>';	
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
							Start Date
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<input type="date" class="form-control" name="start_date" value="<?php if(isset($default['start_date'])){echo $default['start_date'];}?>" required>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-2" align="center">
					<div class="form-group form-group-md">
						<label class="control-label">
							End Date
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<input type="date" class="form-control" name="end_date" value="<?php if(isset($default['end_date'])){echo $default['end_date'];}?>" required>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
			</div> <!--End col-sm-12 -->
			<div class="col-sm-12">
				<div class="col-sm-2" align="center">
					<div class="form-group form-group-md">
						<label class="control-label">
							Discount Detail
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-10">
					<div class="form-group form-group-md">
						<textarea id="discount_detail" class="form-control" rows="15" name="discount_detail" required>
							<?php if(isset($default['discount_detail'])) {echo $default['discount_detail'];}?>
						</textarea>
						<script>
					    	$('#discount_detail').summernote({placeholder: 'Paste the email detail here', tabsize: 2, height: 300 });
					    </script>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
			</div> <!--End col-sm-12 -->	
			<div class="col-sm-12">
				<div class="col-sm-2" align="center">
					<div class="form-group form-group-md">
						<label class="control-label">
							Remarks
						</label>
					</div> <!--Form Group End -->
				</div> <!--End col-sm-3 -->
				<div class="col-sm-4">
					<div class="form-group form-group-md">
						<textarea class="form-control" rows="5" name="discount_remarks"><?php if(isset($default['discount_remarks']))
								{echo $default['discount_remarks'];}?></textarea>
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
						<select class='form-control' name='discount_status' required>
								<?php
							foreach($list_status as $row){
								echo 
								'<option value="' . $row[status_other_id] . '" ' . ( isset( $default["discount_status"] ) && $default["discount_status"] == $row[status_other_id] ? 'selected="selected"' : '' ) . '>' . $row[status_other] . '</option>';	
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