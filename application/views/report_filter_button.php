<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
	    <div class="col-xs-12">
	    	<h4>Start Date</h4>
		</div>
		<div class="col-xs-12">
			<input type="date" class="form-control" name="enquiry_start">
		</div>
		<div class="col-xs-12">
			<h4>End Date</h4>
		</div>
		<div class="col-xs-12">
			<input type="date" class="form-control" name="enquiry_end">
		</div>
		<div class="col-xs-12">
		    <br />
			<a href="<?php echo $reset; ?>">
				<button name="reset" class="btn btn-default btn-sm" align="right">Reset</button>
			</a>
				<button name="submit" class="btn btn-default btn-sm" align="right">Submit</button>
		</div>
		<div class="col-xs-12" align="right">
			
		<br />

		<div class="well well-sm">

			<?php 
				$enquiry_start = $this->input->get('enquiry_start');
				$enquiry_end = $this->input->get('enquiry_end');

					if (empty($enquiry_start) AND empty($enquiry_end)) { 
						echo "Result of the the month <br /> 
						<b style='color:#e84c3d;'> ".date('1 F Y')." </b> until  
						<b style='color:#e84c3d;'> ".date('j F Y')." </b> ";
					}  
					
					elseif (!empty($enquiry_start) AND empty($enquiry_end)) { 
						echo "Result of enquiry from <br />
						<b style='color:#e84c3d;'>".Date("j F Y", strtotime($enquiry_start))."</b> until 
						<b style='color:#e84c3d;'>Today</b>";
					} 
					
					elseif (empty($enquiry_start) AND !empty($enquiry_end)) { 
						$enquiry_start = date('2017-01-01');

						echo "Result of enquiry from <br /> 
						<b style='color:#e84c3d;'>Beginning</b> until 
						<b style='color:#e84c3d;'>".Date("j F Y", strtotime($enquiry_end))."</b>";
					} 

					elseif ($enquiry_start > $enquiry_end) { 
						echo "There is no result <br /> 
						The <b style='color:#e84c3d;'>Start Date</b> 
						is bigger than <b style='color:#e84c3d;'> End Date </b>";
					} 

					elseif (!empty($enquiry_start) AND !empty($enquiry_end)) { 
						echo "Result of enquiry from <br />
						<b style='color:#e84c3d;'>".Date("j F Y", strtotime($enquiry_start))."</b> until 
						<b style='color:#e84c3d;'>".Date("j F Y", strtotime($enquiry_end))."</b>";
					} 

					else { echo "Result of enquiry from <br />
						<b style='color:#e84c3d;'>".Date("j F Y", strtotime($enquiry_start))."</b> until 
						<b style='color:#e84c3d;'>".Date("j F Y", strtotime($enquiry_start))."</b>";
					}
			?>
			</div>
		</div>
	</div>
</form>

