<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
			<div class="col-xs-12">
				<h4>Select a Villa</h4>
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
			<div class="col-xs-12">
				<h4>Select a Year</h4>
			</div>
			<div class="col-xs-12">
				<select class='form-control' name='year' required>
					<option value="">-</option>
					<?php
			            $startyear = '2017';
			            $endyear = date('Y');
						while($startyear <= $endyear)
						{
						    echo "<option value='$startyear'>".$startyear."</option>";
						    $startyear++;
						}
					?>
				</select>
			</div>
			<div class="col-xs-12" align="right">
			<br />
				<div class="well well-sm">
					<?php 
						$villa = $this->input->get('villa');
							if (empty($villa) OR empty($year)) { 
								echo "<p style='color:#000;'>No villa selected</p>";
							} else { 
								echo "Result from all of the enquiries by <br />
								<b style='color:#e84c3d;'> Villa ".$villa."</b> <br />
								<b style='color:#e84c3d;'> Year ".$year."</b> <br />" ;} 
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<button name="submit" class="btn btn-default btn-sm">Submit</button>
			</div>
	</div>
</form>