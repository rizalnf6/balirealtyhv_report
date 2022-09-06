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
	    $('#reportVillaWebsite').DataTable({
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
	<table class="table table-bordered table-brhv" id="reportVillaWebsite">
	  	<caption class="table-caption">The revenue is quoted in USD</caption>
	    <thead>
	      <tr>
	      	<th>No</th>
	        <th>Villa Website</th>
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
			foreach($list_website as $row){
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $row->source;?></td>
						<?php
							$villawebsite_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
							LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE source.source='$row->source' AND balirealtyhv.enquiry_date!='0000-00-00' AND balirealtyhv.enquiry_date>='$enquiry_start' AND balirealtyhv.enquiry_date<='$enquiry_end' AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') AND source.category='2' AND balirealtyhv.balirealtyhv_status='1'");
							
							if ($villawebsite_enquiry->num_rows()!=0) {
								echo "<td>".$villawebsite_enquiry->num_rows()."</td>";
							} else {
								echo "<td>-</td>";
							}							
						?>
						<?php
							$villawebsite_booking = $this->db->query("SELECT * FROM balirealtyhv 
							LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE source.source='$row->source' AND balirealtyhv.confirm_date>='$enquiry_start' AND balirealtyhv.confirm_date<='$enquiry_end' AND  source.category='2' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");
							
							if ($villawebsite_booking->num_rows()!=0) {
								echo "<td>".$villawebsite_booking->num_rows()."</td>";
							} else {
								echo "<td>-</td>";
							}
						?>
						<?php
							$villawebsite_revenue = $this->db->query("SELECT SUM(revenue_nett) AS villawebsite_revenue FROM balirealtyhv 
							LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE source.source='$row->source' 
							AND balirealtyhv.confirm_date>='$enquiry_start' 
							AND balirealtyhv.confirm_date<='$enquiry_end' 
							AND source.category='2' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
							AND balirealtyhv.balirealtyhv_status='1'");

							$result = $villawebsite_revenue->result();
							if ($result['0']->villawebsite_revenue!=0) {
								echo "<td>$ ".number_format($result['0']->villawebsite_revenue)."</td>";
							} else {
    							echo "<td>-</td>";
							}
						?>
						<?php 
							if ($villawebsite_enquiry->num_rows()=="0" OR $villawebsite_booking->num_rows()=="0") {
								echo "<td>-</td>";
							} else {
								$villawebsite_conversion = (($villawebsite_booking->num_rows()/$villawebsite_enquiry->num_rows())*100);
								echo "<td>".number_format($villawebsite_conversion, 2)." %</td>";
							}
						?>
						<?php 
							if ($villawebsite_booking->num_rows()=="0" OR $result['0']->villawebsite_revenue=="0") {
								echo "<td>-</td>";
							} else {
								$villawebsite_average = $result['0']->villawebsite_revenue / $villawebsite_booking->num_rows();
								echo "<td>$ ".number_format($villawebsite_average)."</td>";
							}
						?>
				<?php
			$no++;
			}
		?>			
		</tbody>

		<tfoot>
			<tr>
				<th></th>
				<th style="color: red"><b>TOTAL</b></th>
				<?php
					$total_villawebsite_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
					LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
					WHERE balirealtyhv.enquiry_date!='0000-00-00' AND balirealtyhv.enquiry_date>='$enquiry_start' AND balirealtyhv.enquiry_date<='$enquiry_end' AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') AND source.category='2' AND balirealtyhv.balirealtyhv_status='1'");
					
					if ($total_villawebsite_enquiry->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_villawebsite_enquiry->num_rows()."</b></th>";
					} else {
						echo "<th>".$total_villawebsite_enquiry->num_rows()."</th>";
					}							
				?>
				<?php
					$total_villawebsite_booking = $this->db->query("SELECT * FROM balirealtyhv 
					LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
					WHERE balirealtyhv.confirm_date>='$enquiry_start' AND balirealtyhv.confirm_date<='$enquiry_end' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND source.category='2' AND balirealtyhv.balirealtyhv_status='1'");
				
					if ($total_villawebsite_booking->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_villawebsite_booking->num_rows()."</b></th>";
					} else {
						echo "<th>".$total_villawebsite_booking->num_rows()."</th>";
					}
				?>
				<?php
					$total_villawebsite_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_villawebsite_revenue FROM balirealtyhv 
					LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
					WHERE balirealtyhv.confirm_date>='$enquiry_start' 
					AND balirealtyhv.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
					AND source.category='2' 
					AND balirealtyhv.balirealtyhv_status='1'");
				
					$result = $total_villawebsite_revenue->result();
					if ($result['0']->total_villawebsite_revenue!=0) {
						echo "<th style='color: red;'><b>$ ".number_format($result['0']->total_villawebsite_revenue)."</b></th>";
					} else {
    					echo "<th>$ ".number_format($result['0']->total_villawebsite_revenue)."</th>";
					}
				?>
				<?php 
					if ($total_villawebsite_enquiry->num_rows()=="0" OR $total_villawebsite_booking->num_rows()=="0") {
						echo "<th>".$total_villawebsite_conversion="0.00%"."</th>";
					} else {
						$total_villawebsite_conversion = (($total_villawebsite_booking->num_rows()/$total_villawebsite_enquiry->num_rows())*100);
						echo "<th style='color: red;'><b>".$english_format_number = number_format($total_villawebsite_conversion, 2)." %</th>";
					}
				?>
				<?php 
					if ($total_villawebsite_booking->num_rows()=="0" OR $result['0']->total_villawebsite_revenue=="0") {
						echo "<th>$ ".$total_villawebsite_average="0"."</th>";
					} else {
						$total_villawebsite_average = $result['0']->total_villawebsite_revenue / $total_villawebsite_booking->num_rows();
						echo "<th style='color: red;'><b>$ ".number_format($total_villawebsite_average)."</th>";
					}
				?>
			</tr>
	    </tfoot>
	</table>
</div> <!-- Table End-->