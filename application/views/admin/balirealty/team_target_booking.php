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
	    $('#reportTargetBooking').DataTable({
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
  	<table class="table table-bordered table-brhv" id="reportTargetBooking">
	    <thead>
	      	<tr>
		        <th>#</th>
			    <th>Reservation</th>
			    <th>Bali Realty Holiday Villas</th>
			    <th>Bali Villa Escapes</th>
			    <th>Asia Holiday Retreats</th>
			    <th>Total</th>
			</tr>
		</thead>
		<tbody>
		    <!-- ISI DATA AKAN MUNCUL DISINI -->
			<script type="text/javascript" language="JavaScript">
				function konfirmasi() {
					tanya = confirm("Are you sure want to delete ?");
					if (tanya == true) return true;
					else return false;
				}
			</script>

	      	<?php
				$no = 1; //untuk menampilkan no
				foreach($list_reservation as $row){
			?>

			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->name;?></td>
				<?php
					$per_reservation_booking_brhv = $this->db->query("SELECT * FROM balirealtyhv 
					LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
					WHERE user.name='$row->name' 
					AND balirealtyhv.confirm_date>='$enquiry_start' 
					AND balirealtyhv.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balirealtyhv.balirealtyhv_status='1'");
					if ($per_reservation_booking_brhv->num_rows()!=0) {
						echo "<td>".$per_reservation_booking_brhv->num_rows()."</b></td>";
					} else {
						echo "<td>-</td>";
					}
				?>

				<?php
					$per_reservation_booking_bve = $this->db->query("SELECT * FROM balivillaescapes 
					LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
					LEFT JOIN villa ON villa.villa_id=balivillaescapes.villa_id
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
					WHERE user.name='$row->name' 
					AND villa.management_id!='1'
					AND balivillaescapes.confirm_date>='$enquiry_start' 
					AND balivillaescapes.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balivillaescapes.balivillaescapes_status='1'");
					if ($per_reservation_booking_bve->num_rows()!=0) {
						echo "<td>".$per_reservation_booking_bve->num_rows()."</b></td>";
					} else {
						echo "<td>-</td>";
					}
				?>

				<?php
					$per_reservation_booking_bvo = $this->db->query("SELECT * FROM balivillasonline 
					LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
					LEFT JOIN villa ON villa.villa_id=balivillasonline.villa_id
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
					WHERE user.name='$row->name' 
					AND villa.management_id!='1'
					AND balivillasonline.confirm_date>='$enquiry_start' 
					AND balivillasonline.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balivillasonline.balivillasonline_status='1'");
					
					if ($per_reservation_booking_bvo->num_rows()!=0) {
						echo "<td>".$per_reservation_booking_bvo->num_rows()."</b></td>";
					} else {
						echo "<td>-</td>";
					}
				?>

						<td style='color: red;'>
							<b>
							<?php $hasil_per_reservation_booking = 
							$per_reservation_booking_brhv->num_rows() 
							+ $per_reservation_booking_bve->num_rows()
							+ $per_reservation_booking_bvo->num_rows();
							echo $hasil_per_reservation_booking; ?>
							</b>
						</td>
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
					$total_reservation_booking_brhv = $this->db->query("SELECT * FROM balirealtyhv 
					LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
					WHERE balirealtyhv.confirm_date>='$enquiry_start' 
					AND balirealtyhv.confirm_date<='$enquiry_end' 
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balirealtyhv.balirealtyhv_status='1'");
					
					if ($total_reservation_booking_brhv->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_reservation_booking_brhv->num_rows()."</b></th>";
					} else {
						echo "<th>-</th>";
					}
				?>

				<?php
					$total_reservation_booking_bve = $this->db->query("SELECT * FROM balivillaescapes 
					LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
					LEFT JOIN villa ON villa.villa_id=balivillaescapes.villa_id
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
					WHERE balivillaescapes.confirm_date>='$enquiry_start' 
					AND balivillaescapes.confirm_date<='$enquiry_end' 
					AND villa.management_id!='1'
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balivillaescapes.balivillaescapes_status='1'");
					
					if ($total_reservation_booking_bve->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_reservation_booking_bve->num_rows()."</b></th>";
					} else {
						echo "<th>".$total_reservation_booking_bve->num_rows()."</th>";
					}
				?>

				<?php
					$total_reservation_booking_bvo = $this->db->query("SELECT * FROM balivillasonline 
					LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
					LEFT JOIN villa ON villa.villa_id=balivillasonline.villa_id
					LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
					WHERE balivillasonline.confirm_date>='$enquiry_start' 
					AND balivillasonline.confirm_date<='$enquiry_end' 
					AND villa.management_id!='1'
					AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
					AND balivillasonline.balivillasonline_status='1'");
					
					if ($total_reservation_booking_bvo->num_rows()!=0) {
						echo "<th style='color: red;'><b>".$total_reservation_booking_bvo->num_rows()."</b></th>";
					} else {
						echo "<th>".$total_reservation_booking_bvo->num_rows()."</th>";
					}
				?>

				<th style='color: red;'>
					<b>
						<?php $hasil_total_reservation_booking = 
						$total_reservation_booking_brhv->num_rows() 
						+ $total_reservation_booking_bve->num_rows()
						+ $total_reservation_booking_bvo->num_rows();
						echo $hasil_total_reservation_booking; ?>
					</b>
				</th>
			</tr>
		</tfoot>
	</table>
</div> <!-- Table End-->