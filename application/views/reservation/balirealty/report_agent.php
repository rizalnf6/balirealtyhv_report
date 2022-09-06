<!-- Set filter date default-->
<?php
    if (empty($enquiry_start)) {
    	$enquiry_start = date('Y-m-01');
    }
    if (empty($enquiry_end)) {
    	$enquiry_end = date('Y-m-d');
    }
?>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#reportAgent').DataTable({
	    	"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	        "iDisplayLength": 100,
	        "paging":   false,
	        "ordering": true,
	        "info":     false,
	        "searching": true,
	    });
	});
</script>

<div class="table-responsive"> 
	<table class="table table-bordered table-brhv" id="reportAgent">
	  	<caption class="table-caption">The rates are quoted in USD</caption>
	    <thead>
	      <tr>
	      	<th>No</th>
	        <th>Agent</th>
	        <th>Enquiry</th>
	        <th>Booking</th>
	        <th>Revenue Nett (USD)</th>
	        <th>Conversion %</th>
	        <th>Average</th>
	      </tr>
	    </thead>
	    <tbody>
   
	   	<?php
			$no = 1; //untuk menampilkan no
			foreach($list_agent as $row){
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $row->source;?></td>
						<?php
							$agent_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id
								LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
								WHERE user.name='$session_login'
								AND source.source='$row->source' 
								AND balirealtyhv.enquiry_date!='0000-00-00' 
								AND balirealtyhv.enquiry_date>='$enquiry_start' 
								AND balirealtyhv.enquiry_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
								AND source.category='1' 
								AND balirealtyhv.balirealtyhv_status='1'");
							if ($agent_enquiry->num_rows()!=0) {
							echo "<td>".$agent_enquiry->num_rows()."</b></td>";
							} else {
							echo "<td>-</td>";
							}							
						?>
						<?php
							$agent_booking = $this->db->query("SELECT * FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id
								LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
								WHERE user.name='$session_login'
								AND source.source='$row->source' 
								AND balirealtyhv.confirm_date>='$enquiry_start' 
								AND balirealtyhv.confirm_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
								AND source.category='1' 
								AND balirealtyhv.balirealtyhv_status='1'");
							if ($agent_booking->num_rows()!=0) {
							echo "<td>".$agent_booking->num_rows()."</b></td>";
							} else {
							echo "<td>-</td>";
							}
						?>
						<?php
							$agent_revenue = $this->db->query("SELECT SUM(revenue_nett) AS agent_revenue FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id
								LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
								WHERE user.name='$session_login'
								AND source.source='$row->source' 
								AND balirealtyhv.confirm_date>='$enquiry_start' 
								AND balirealtyhv.confirm_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
								AND source.category='1' 
								AND balirealtyhv.balirealtyhv_status='1'");
							$result = $agent_revenue->result();
							if ($result['0']->agent_revenue!=0) {
							echo "<td>$ ".number_format($result['0']->agent_revenue)."</b></td>";
							} else {
    						echo "<td>-</td>";
							}
						?>
						<?php 
							if ($agent_enquiry->num_rows()=="0" OR $agent_booking->num_rows()=="0") {
							echo "<td>-</td>";
							}
							else {
							$agent_conversion = (($agent_booking->num_rows()/$agent_enquiry->num_rows())*100);
							echo "<td>".number_format($agent_conversion, 2)." %</td>";
							}
						?>
						<?php 
							if ($agent_booking->num_rows()=="0" OR $result['0']->agent_revenue=="0") {
							echo "<td>-</td>";
							}
							else {
							$agent_average = $result['0']->agent_revenue / $agent_booking->num_rows();
							echo "<td>$ ".number_format($agent_average)."</td>";
							}
						?>
				<?php
			$no++;
			}
		?>
		</body>

		<tfoot>		
				<tr>
					<th></th>
					<th style="color: red"><b>TOTAL</b></th>
						<?php
							$total_agent_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id
								LEFT JOIN source ON source.source_id=balirealtyhv.source_id
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
								WHERE user.name='$session_login'
								AND balirealtyhv.enquiry_date!='0000-00-00' 
								AND balirealtyhv.enquiry_date>='$enquiry_start' 
								AND balirealtyhv.enquiry_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
								AND source.category='1' 
								AND balirealtyhv.balirealtyhv_status='1'");
							if ($total_agent_enquiry->num_rows()!=0) {
								echo "<th style='color: red;'><b>".$total_agent_enquiry->num_rows()."</b></th>";
							} else {
								echo "<th>".$total_agent_enquiry->num_rows()."</th>";
							}							
						?>
						<?php
							$total_agent_booking = $this->db->query("SELECT * FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id
								LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
								WHERE user.name='$session_login'
								AND balirealtyhv.confirm_date>='$enquiry_start' 
								AND balirealtyhv.confirm_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
								AND source.category='1' 
								AND balirealtyhv.balirealtyhv_status='1'");
							if ($total_agent_booking->num_rows()!=0) {
								echo "<th style='color: red;'><b>".$total_agent_booking->num_rows()."</b></th>";
							} else {
								echo "<th>".$total_agent_booking->num_rows()."</th>";
							}
						?>
						<?php
							$total_agent_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_agent_revenue FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id
								LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
								WHERE user.name='$session_login'
								AND balirealtyhv.confirm_date>='$enquiry_start'
								AND balirealtyhv.confirm_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
								AND source.category='1' 
								AND balirealtyhv.balirealtyhv_status='1'");
							$result = $total_agent_revenue->result();
							if ($result['0']->total_agent_revenue!=0) {
								echo "<th style='color: red;'><b>$ ".number_format($result['0']->total_agent_revenue)."</b></th>";
							} else {
    						echo "<th>$ ".number_format($result['0']->total_agent_revenue)."</th>";
							}
						?>
						<?php 
							if ($total_agent_enquiry->num_rows()=="0" OR $total_agent_booking->num_rows()=="0") {
							echo "<th>".$total_agent_conversion="0.00%"."</th>";
							}
							else {
							$total_agent_conversion = (($total_agent_booking->num_rows()/$total_agent_enquiry->num_rows())*100);
							echo "<th style='color: red;'><b>".$english_format_number = number_format($total_agent_conversion, 2)." %</th>";
							}
						?>
						<?php 
							if ($total_agent_booking->num_rows()=="0" OR $result['0']->total_agent_revenue=="0") {
								echo "<th>$ ".$total_agent_average="0"."</th>";
							}
							else {
								$total_agent_average = $result['0']->total_agent_revenue / $total_agent_booking->num_rows();
								echo "<th style='color: red;'><b>$ ".number_format($total_agent_average)."</th>";
							}
						?>
				</tr>
	    </tfoot>
	</table>
</div> <!-- Table End-->