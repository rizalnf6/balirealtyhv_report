<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
			<div class="col-xs-12">
				<h4>Select a Villa :</h4>
			</div>
			<div class="col-xs-12">
				<select class='form-control' name='villa' required>
					<option value="">-</option>
					<?php
						foreach($list_villa as $row){
							echo '<option value="' . $row[villa] . '" ' . ( isset( $default["villa"] ) && $default["villa"] == $row[villa] ? 'selected="selected"' : '' ) . '>' . $row[villa] . '</option>';	
							}
					?>
				</select>
			</div>
			<div class="col-xs-12" align="right">
			<br />
				<div class="well well-sm">
					<?php 
						$villa = $this->input->get('villa');
							if (empty($villa)) { echo "<p style='color:#000;'>No villa selected</p>";} 

							elseif (!empty($villa)) { echo "Result from all of the enquiries by<br /><b style='color:#e84c3d;'>".$villa."</b>" ;} 
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<button name="submit" class="btn btn-default btn-sm">Submit</button>
			</div>
	</div>
</form>