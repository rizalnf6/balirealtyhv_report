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
	    $('#reportTargetRevenue').DataTable({
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
	<table class="table table-bordered table-brhv" id="reportTargetRevenue">
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

							<!-- Asia Holiday Retreats-->
							<?php
								$per_reservation_revenue_brhv = $this->db->query("SELECT SUM(revenue_nett) 
								AS revenue_nett FROM balirealtyhv 
								LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
								WHERE user.name='$row->name' 
								AND balirealtyhv.confirm_date>='$enquiry_start' 
								AND balirealtyhv.confirm_date<='$enquiry_end' 
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
								AND balirealtyhv.balirealtyhv_status='1'");

								$hasil_per_reservation_revenue_brhv = $per_reservation_revenue_brhv->result();
								if ($hasil_per_reservation_revenue_brhv['0']->revenue_nett!=0) {
									echo "<td>$ ".number_format($hasil_per_reservation_revenue_brhv['0']->revenue_nett)."</td>";
								} else { 
									echo "<td>-</td>"; 
								}
							?>

							<!-- Bali Villa Escapes-->
							<?php
								$per_reservation_revenue_bve = $this->db->query("SELECT SUM(revenue_nett_usd) 
								AS revenue_nett_usd FROM balivillaescapes 
								LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
								LEFT JOIN villa ON villa.villa_id=balivillaescapes.villa_id
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
								WHERE user.name='$row->name' 
								AND balivillaescapes.confirm_date>='$enquiry_start' 
								AND balivillaescapes.confirm_date<='$enquiry_end' 
								AND villa.management_id!='1'
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
								AND balivillaescapes.balivillaescapes_status='1'");

								$hasil_per_reservation_revenue_bve = $per_reservation_revenue_bve->result();
								if ($hasil_per_reservation_revenue_bve['0']->revenue_nett_usd!=0) {
									echo "<td>$ ".number_format($hasil_per_reservation_revenue_bve['0']->revenue_nett_usd)."</td>";
								} else { 
									echo "<td>-</td>"; 
								}
							?>

							<!-- Bali Villas Online-->
							<?php
								$per_reservation_revenue_bvo = $this->db->query("SELECT SUM(revenue_nett) 
								AS revenue_nett FROM balivillasonline 
								LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
								LEFT JOIN villa ON villa.villa_id=balivillasonline.villa_id
								LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
								WHERE user.name='$row->name' 
								AND balivillasonline.confirm_date>='$enquiry_start' 
								AND balivillasonline.confirm_date<='$enquiry_end' 
								AND villa.management_id!='1'
								AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
								AND balivillasonline.balivillasonline_status='1'");

								$hasil_per_reservation_revenue_bvo = $per_reservation_revenue_bvo->result();
								if ($hasil_per_reservation_revenue_bvo['0']->revenue_nett!=0) {
									echo "<td>$ ".number_format($hasil_per_reservation_revenue_bvo['0']->revenue_nett)."</td>";
								} else { 
									echo "<td>-</td>"; 
								}
							?>

							<?php 
								$hasil_per_reservation_revenue = 
								$hasil_per_reservation_revenue_brhv['0']->revenue_nett 
								+ $hasil_per_reservation_revenue_bve['0']->revenue_nett_usd
								+ $hasil_per_reservation_revenue_bvo['0']->revenue_nett;
								echo "<td style='color: red;'><b>$ ".number_format($hasil_per_reservation_revenue)."</b></td>";
							?>
											
							<?php $no++; } ?>		
						</tr>
				</tbody>

						<tfoot>			
							<tr>
								<th></th>
								<th style="color: red"><b>TOTAL</b></th>
								<?php
									$total_reservation_revenue_brhv = $this->db->query("SELECT SUM(revenue_nett) 
									AS revenue_nett FROM balirealtyhv 
									LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
									WHERE balirealtyhv.confirm_date>='$enquiry_start' 
									AND balirealtyhv.confirm_date<='$enquiry_end' 
									AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
									AND balirealtyhv.balirealtyhv_status='1'");
							
									$result_total_reservation_revenue_brhv = $total_reservation_revenue_brhv->result();
									if ($result_total_reservation_revenue_brhv['0']->revenue_nett!=0) {
										echo "<th style='color: red;'><b>$ ".number_format($result_total_reservation_revenue_brhv['0']->revenue_nett)."</b></th>";
									} else { 
										echo "<th>-</th>"; 
									}
								?>

								<?php
									$total_reservation_revenue_bve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue_nett_usd FROM balivillaescapes 
									LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
									LEFT JOIN villa ON villa.villa_id=balivillaescapes.villa_id
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
									WHERE balivillaescapes.confirm_date>='$enquiry_start' 
									AND balivillaescapes.confirm_date<='$enquiry_end' 
									AND villa.management_id!='1'
									AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
									AND balivillaescapes.balivillaescapes_status='1'");
								
									$result_total_reservation_revenue_bve = $total_reservation_revenue_bve->result();
									if ($result_total_reservation_revenue_bve['0']->revenue_nett_usd!=0) {
										echo "<th style='color: red;'><b>$ ".number_format($result_total_reservation_revenue_bve['0']->revenue_nett_usd)."</b></th>";
									} else { 
										echo "<th>$ ".number_format($result_total_reservation_revenue_bve['0']->revenue_nett_usd)."</th>";
									}
								?>

								<?php
									$total_reservation_revenue_bvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue_nett FROM balivillasonline 
									LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
									LEFT JOIN villa ON villa.villa_id=balivillasonline.villa_id
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
									WHERE balivillasonline.confirm_date>='$enquiry_start' 
									AND balivillasonline.confirm_date<='$enquiry_end' 
									AND villa.management_id!='1'
									AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
									AND balivillasonline.balivillasonline_status='1'");
								
									$result_total_reservation_revenue_bvo = $total_reservation_revenue_bvo->result();
									if ($result_total_reservation_revenue_bvo['0']->revenue_nett!=0) {
										echo "<th style='color: red;'><b>$ ".number_format($result_total_reservation_revenue_bvo['0']->revenue_nett)."</b></th>";
									} else { 
										echo "<th>$ ".number_format($result_total_reservation_revenue_bvo['0']->revenue_nett)."</th>";
									}
								?>

								<?php 
									$hasil_total_reservation_revenue = 
									$result_total_reservation_revenue_brhv['0']->revenue_nett 
									+ $result_total_reservation_revenue_bve['0']->revenue_nett_usd
									+ $result_total_reservation_revenue_bvo['0']->revenue_nett;
									echo "<th style='color: red;'><b> $".number_format($hasil_total_reservation_revenue)."</b></th>";
								?>
							</tr>  	
						</tbody>
					</table>
				</div> <!-- Table End-->