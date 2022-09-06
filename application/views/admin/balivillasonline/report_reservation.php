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
	    $('#reportReservation').DataTable({
	    	"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	        "iDisplayLength": 100,
	        "paging":   false,
	        "ordering": true,
	        "info":     false,
	        "searching": false
	    });
	});
</script>

<div class="table-responsive"> 
  	<table class="table table-bordered table-ahr" id="reportReservation">
	  	<caption class="table-caption">The rates are quoted in USD</caption>
	    <thead>
	      <tr>
	      	<th>No</th>
	        <th>Reservation</th>
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
			foreach($list_reservation as $row){
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $row->name;?></td>
						<?php
							$reservation_enquiry = $this->db->query("SELECT * FROM balivillasonline 
							LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
							WHERE user.name='$row->name' 
							AND balivillasonline.enquiry_date!='0000-00-00' 
							AND balivillasonline.enquiry_date>='$enquiry_start' 
							AND balivillasonline.enquiry_date<='$enquiry_end' 
							AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
							AND balivillasonline.balivillasonline_status='1'");
							
							if ($reservation_enquiry->num_rows()!=0) {
								echo "<td>".$reservation_enquiry->num_rows()."</b></td>";
							} else {
								echo "<td>-</td>";
							}							
						?>
						<?php
							$reservation_booking = $this->db->query("SELECT * FROM balivillasonline 
							LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
							WHERE user.name='$row->name' 
							AND balivillasonline.confirm_date>='$enquiry_start' 
							AND balivillasonline.confirm_date<='$enquiry_end' 
							AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
							AND balivillasonline.balivillasonline_status='1'");
							
							if ($reservation_booking->num_rows()!=0) {
								echo "<td>".$reservation_booking->num_rows()."</b></td>";
							} else {
								echo "<td>-</td>";
							}
						?>
						<?php
							$reservation_revenue = $this->db->query("SELECT SUM(revenue_nett) 
							AS revenue_reservation FROM balivillasonline 
							LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
							WHERE user.name='$row->name' 
							AND balivillasonline.confirm_date>='$enquiry_start' 
							AND balivillasonline.confirm_date<='$enquiry_end' 
							AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
							AND balivillasonline.balivillasonline_status='1'");

							$result = $reservation_revenue->result();
							if ($result['0']->revenue_reservation!=0) {
								echo "<td>$ ".number_format($result['0']->revenue_reservation, 2)."</td>";
							} else {
    							echo "<td>-</td>";
							}
						?>
						<?php 
							if ($reservation_enquiry->num_rows()=="0" OR $reservation_booking->num_rows()=="0") {
								echo "<td>-</td>";
							} else {
								$reservation_conversion = (($reservation_booking->num_rows()/$reservation_enquiry->num_rows())*100);
								echo "<td>".number_format($reservation_conversion, 2)." %</td>";
							}
						?>
						<?php 
							if ($reservation_booking->num_rows()=="0" OR $result['0']->revenue_reservation=="0") {
								echo "<td>-</td>";
							}
							else {
								$reservation_average = $result['0']->revenue_reservation / $reservation_booking->num_rows();
								echo "<td>$ ".number_format($reservation_average)."</td>";
							}
						?>
					<?php
				$no++;
				}
			?>		
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<th></th>
				<th style="color: red"><b>TOTAL</b></th>
				<?php
					$total_reservation_enquiry = $this->db->query("SELECT * FROM balivillasonline 
					LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
					WHERE balivillasonline.enquiry_date!='0000-00-00' 
					AND balivillasonline.enquiry_date>='$enquiry_start' 
					AND balivillasonline.enquiry_date<='$enquiry_end' AND balivillasonline.balivillasonline_status='1'");
					
					if ($total_reservation_enquiry->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_reservation_enquiry->num_rows()."</b></th>";
					} else {
						echo "<th>".$total_reservation_enquiry->num_rows()."</th>";
					}							
				?>
				<?php
					$total_reservation_booking = $this->db->query("SELECT * FROM balivillasonline 
					LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
					WHERE balivillasonline.confirm_date>='$enquiry_start' 
					AND balivillasonline.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balivillasonline.balivillasonline_status='1'");
				
					if ($total_reservation_booking->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_reservation_booking->num_rows()."</b></th>";
					} else {
						echo "<t>".$total_reservation_booking->num_rows()."</th>";
					}
				?>
				<?php
					$total_reservation_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_reservation_revenue FROM balivillasonline 
					LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
					WHERE balivillasonline.confirm_date>='$enquiry_start' 
					AND balivillasonline.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
					AND balivillasonline.balivillasonline_status='1'");
				
					$result = $total_reservation_revenue->result();
					if ($result['0']->total_reservation_revenue!=0) {
						echo "<th style='color: red;'><b>$ ".number_format($result['0']->total_reservation_revenue)."</b></th>";
					} else {
	    				echo "<th>$ ".number_format($result['0']->total_reservation_revenue)."</th>";
					}
				?>
				<?php 
					if ($total_reservation_enquiry->num_rows()=="0" OR $total_reservation_booking->num_rows()=="0") {
						echo "<th>".$total_reservation_conversion="0.00%"."</th>";
					} else {
						$total_reservation_conversion = (($total_reservation_booking->num_rows()/$total_reservation_enquiry->num_rows())*100);
						echo "<th style='color: red;'><b>".number_format($total_reservation_conversion, 2)." %</th>";
					}
				?>
				<?php 
					if ($total_reservation_booking->num_rows()=="0" OR $result['0']->total_reservation_revenue=="0") {
						echo "<th>$ ".$total_reservation_average="0"."</th>";
					} else {
						$total_reservation_average = $result['0']->total_reservation_revenue / $total_reservation_booking->num_rows();
						echo "<th style='color: red;'><b>$ ".number_format($total_reservation_average)."</th>";
					}
				?>
			</tr>		
	    </tfoot>
	</table>
</div> <!-- Table End-->