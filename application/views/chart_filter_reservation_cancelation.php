<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
			<div class="col-xs-12">
				<h4>Select a Reservation</h4>
			</div>
			<div class="col-xs-12">
				<select class='form-control' name='reservation' required>
					<option value="">-</option>
					<?php
						foreach($list_reservation as $row){
							echo '<option value="' . $row[name] . '" ' . ( isset( $default["name"] ) && $default["name"] == $row[name] ? 'selected="selected"' : '' ) . '>' . $row[name] . '</option>';	
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
						$reservation = $this->input->get('reservation');
							if (empty($reservation) OR empty($year)) { 
								echo "<p style='color:#000;'>No reservation selected</p>";
							} else { 
								echo "Result from all of the enquiries by <br />
								<b style='color:#e84c3d;'> Reservation ".$reservation."</b> <br />
								<b style='color:#e84c3d;'> Year ".$year."</b> <br />" ;} 
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<button name="submit" class="btn btn-default btn-sm">Submit</button>
			</div>
	</div>
</form>