<form method="get" class="form-horizontal" action="<?php echo $filter; ?>">
	<div class="form-group form-group-sm">
			<div class="col-xs-12">
				<h4>Select a Source :</h4>
			</div>
			<div class="col-xs-12">
				<select class='form-control' name='source' required>
					<option value="">-</option>
					<option value="Agent">Agent</option>
					<option value="Villa Website">Villa Website</option>
					<?php
						foreach($list_ota as $row){
							echo '<option value="' . $row[source] . '" ' . ( isset( $default["source"] ) && $default["source"] == $row[source] ? 'selected="selected"' : '' ) . '>' . $row[source] . '</option>';	
							}
					?>
					<?php
						foreach($list_others as $row){
							echo '<option value="' . $row[source] . '" ' . ( isset( $default["source"] ) && $default["source"] == $row[source] ? 'selected="selected"' : '' ) . '>' . $row[source] . '</option>';	
							}
					?>
				</select>
			</div>
			<div class="col-xs-12" align="right">
			<br />
				<div class="well well-sm">
					<?php 
						$source = $this->input->get('source');
							if (empty($source)) { echo "<p style='color:#000;'>No source selected</p>";} 

							elseif (!empty($source)) { echo "Result from all of the enquiries by<br /><b style='color:#e84c3d;'>".$source."</b>" ;} 
					?>
				</div>
			</div>
			<div class="col-xs-12">
				<button name="submit" class="btn btn-default btn-sm">Submit</button>
			</div>
	</div>
</form>

