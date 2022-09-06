<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
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
						$year = $this->input->get('year');
							if (empty($year)) { 
								echo "<p style='color:#000;'> Cancelation of <b style='color:#e84c3d;'>".date('Y')."</b> </p>";
							} else { 
								echo "Cancelation of <b style='color:#e84c3d;'>".$year."</b> <br />" ;} 
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<button name="submit" class="btn btn-default btn-sm">Submit</button>
			</div>
	</div>
</form>