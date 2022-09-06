<script type="text/javascript">
	$(document).ready( function () {
	    $('#reminderEnquiryStatus').DataTable({
	    	"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	        "iDisplayLength": 25,
	        "paging":   false,
	        "ordering": true,
	        "info":     false,
	        "searching": true
	    });
	});
</script>

			<div class="table-responsive">          
			  	<table class="table table-bordered table-ahr" id="reminderEnquiryStatus">
			  	<caption class="table-caption">Enquiry Status</caption>
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Reservation</th>
			        <th style='background-color: pink; color: black;'>Enquiry</th>
			        <th style='background-color: yellow; color: black;'>Open</th>
			        <th style='background-color: green; color: white;'>Hold</th>
			        <th style='background-color: orange; color: black;'>Decision Pending</th>
			        <th style='background-color: purple; color: white;'>Outstanding</th>
			      </tr>
			    </thead>
			    <tbody>

			    <!-- ISI DATA AKAN MUNCUL DISINI -->
				<script type="text/javascript" language="JavaScript">
					function konfirmasi()
					{
					tanya = confirm("Are you sure want to proccess ?");
					if (tanya == true) return true;
					else return false;
				}
				</script>

			      <?php
						$no = 1; //untuk menampilkan no
						foreach($list_reservation as $row){
							?>
							<tr>
								<td class="no-border-left"><?php echo $no;?></td>
								<td><?php echo $row->name;?></td>
								<?php
									$reservation_enquiry = $this->db->query("SELECT * FROM balivillasonline 
										LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
										LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
										WHERE user.name='$row->name' 
										AND status_enquiry.status_enquiry='Enquiry' 
										AND balivillasonline.balivillasonline_status='1'");
									if ($reservation_enquiry->num_rows()!=0) {
										echo "<td style='background-color: pink; color: black;'>
												<b>".$reservation_enquiry->num_rows()."</b>
											</td>";
									} else {
										echo "<td>".$reservation_enquiry->num_rows()."</td>";
									}
								?>
								<?php
									$reservation_open = $this->db->query("SELECT * FROM balivillasonline 
										LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
										LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
										WHERE user.name='$row->name' 
										AND status_enquiry.status_enquiry='Open' 
										AND balivillasonline.balivillasonline_status='1'");
									if ($reservation_open->num_rows()!=0) {
										echo "<td style='background-color: yellow; color: black;'>
												<b>".$reservation_open->num_rows()."</b>
											</td>";
									} else {
										echo "<td>".$reservation_open->num_rows()."</td>";
									}
								?>
								<?php
									$reservation_hold = $this->db->query("SELECT * FROM balivillasonline 
										LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
										LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
										WHERE user.name='$row->name' 
										AND status_enquiry.status_enquiry='Hold' 
										AND balivillasonline.balivillasonline_status='1'");
									if ($reservation_hold->num_rows()!=0) {
										echo "<td style='background-color: green; color: white;'>
												<b>".$reservation_hold->num_rows()."</b>
											</td>";
									} else {
										echo "<td>".$reservation_hold->num_rows()."</td>";
									}
								?>
								<?php
									$reservation_decision = $this->db->query("SELECT * FROM balivillasonline 
										LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
										LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
										WHERE user.name='$row->name' 
										AND status_enquiry.status_enquiry='Decision Pending' 
										AND balivillasonline.balivillasonline_status='1'");
									if ($reservation_decision->num_rows()!=0) {
										echo "<td style='background-color: orange; color: black;'>
												<b>".$reservation_decision->num_rows()."</b>
											</td>";
									} else {
										echo "<td>".$reservation_decision->num_rows()."</td>";
									}
								?>
								<?php
									$reservation_outstanding = $this->db->query("SELECT * FROM balivillasonline 
										LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
										LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
										WHERE user.name='$row->name' 
										AND status_enquiry.status_enquiry='outstanding' 
										AND balivillasonline.balivillasonline_status='1'");
									if ($reservation_outstanding->num_rows()!=0) {
										echo "<td class='no-border-right' style='background-color: purple; color: white;'>
												<b>".$reservation_outstanding->num_rows()."</b>
											</td>";
									} else {
										echo "<td class='no-border-right'>".$reservation_outstanding->num_rows()."</td>";
									}
								?>
							<?php
							$no++;
						}
						?>
			      	
			    </tbody>
			  	</table>
			</div> <!-- Table End -->