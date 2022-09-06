<script type="text/javascript">
	$(document).ready( function () {
	    $('#reminderGuestArrival').DataTable({
	    	"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	        "iDisplayLength": 25,
	        "paging":   false,
	        "ordering": true,
	        "info":     false,
	        "searching": true
	    });
	});
</script>

			<div class="table-responsive table-scroll">          
			  	<table class="table table-striped table-ahr" id="reminderGuestArrival">
			  	<caption class="table-caption">Guest detail must be complete</caption>
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Reservation</th>
			        <th>Guest</th>
			        <th>Villa</th>
			        <th>Management</th>
			        <th>Status</th>
			        <th>Checkin</th>
			        <th>Checkout</th>
			        <th>Details Required</th>
			        <th>Action</th>
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
						foreach($list_reminder_guest_arrival as $row){
							?>
							<tr>
								<td class="no-border-left"><?php echo $no;?></td>
								<td><?php echo $row->name;?></td>
								<td><?php echo $row->guest_name;?></td>
								<td><?php echo $row->villa;?></td>
								<td><?php echo $row->management;?></td>
								
								<?php 
									if ($row->status_enquiry == "Extend Stay") {
										echo "<td style=color:#d9534f><b><i>".$row->status_enquiry."</i></b></td>";
									} else if ($row->status_enquiry == "Proposed") {
										echo "<td style=color:#5cb85c><b><i>".$row->status_enquiry."</i></b></td>";
									} else {
										echo "<td>".$row->status_enquiry."</td>";
									}
								?>
								
								<td><?php echo Date("j M Y", strtotime($row->checkin));?></td>
								<td><?php echo Date("j M Y", strtotime($row->checkout));?></td>

								<td>
									<?php if ($row->adult == NULL): ?> 
										Adult,
									<?php endif ?>
									<?php if ($row->adult != NULL): ?>  
									<?php endif ?>

									<?php if ($row->children == NULL): ?> 
										Children,
									<?php endif ?>
									<?php if ($row->children != NULL): ?> 
									<?php endif ?>

									<?php if ($row->infant == NULL): ?> 
										Infant. <br />
									<?php endif ?>
									<?php if ($row->infant != NULL): ?> 
									<?php endif ?>

									<?php if ($row->arrival_flight == NULL): ?> 
										Arrival Flight,
									<?php endif ?>
									<?php if ($row->arrival_flight != NULL): ?> 
									<?php endif ?>

									<?php if ($row->arrival_time == NULL): ?> 
										Arrival Time. <br />
									<?php endif ?>
									<?php if ($row->arrival_time != NULL): ?> 
									<?php endif ?>

									<?php if ($row->departure_flight == NULL): ?> 
										Departure Flight,
									<?php endif ?>
									<?php if ($row->departure_flight != NULL): ?> 
									<?php endif ?>

									<?php if ($row->departure_time == NULL): ?> 
										Departure Time.
									<?php endif ?>
									<?php if ($row->departure_time != NULL): ?> 
									<?php endif ?>
								</td>
				
								<td class="no-border-right">
									<div class="action-button">
										<a href="<?php echo $button_detail_confirm."/".$row->report_id; ?>">
											<span class='glyphicon glyphicon glyphicon-eye-open' aria-hidden='true' alt='See detail'></span>
										</a> 
										<?php if ($row->status_enquiry == "Confirm" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
									    	<a href="<?php echo $button_edit_confirm."/".$row->report_id;; ?>">
												<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
											</a> 
									    <?php endif ?> 
									    <?php if ($row->status_enquiry == "Proposed" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
									    	<a href="<?php echo $button_edit_propose."/".$row->report_id;; ?>">
												<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
											</a>
									    <?php endif ?> 
									</div>
								</td>
							<?php
							$no++;
						}
						?>
			      	
			    </tbody>
			  	</table>
			</div> <!-- Table End-->