<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
			<div class="col-xs-12">
				<h4>Select Month :</h4>
			</div>
			<div class="col-xs-12">
				<select class='form-control' name='month'>
					<option value="">-</option>
					<?php
			            $m = 1;
						while($m <= 12)
						{
						    echo "<option value='$m'>".date("F", mktime(0, 0, 0, $m, 10))."</option>";
						    $m++;
					}?>
				</select>
			</div>
			<div class="col-xs-12" align="right">
			<br />
				<div class="well well-sm">
					<?php 
						$month = $this->input->get('month');
							if (empty($month)) { echo "<p style='color:#000;'>Result from all of the enquiries on this month</p>";} 

							elseif (!empty($month)) { echo "Result from all of the enquiries on<br /><b style='color:#e84c3d;'>Month : ".date("F", mktime(0, 0, 0, $month, 10))."</b>" ;} 
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<button name="submit" class="btn btn-default btn-sm">Submit</button>
			</div>
	</div>
</form>

