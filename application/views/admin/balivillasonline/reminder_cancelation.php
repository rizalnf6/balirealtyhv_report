<script type="text/javascript">
	$(document).ready( function () {
	    $('#reminderCancelation').DataTable({
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
			  	<table class="table table-striped table-ahr" id="reminderCancelation">
			  	<caption class="table-caption">Canceled enquiry with no Cancelation Reason</caption>
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Reservation</th>
			        <th>Guest</th>
			        <th>Villa</th>
			        <th>Status</th>
			        <th>Cancelation Reason</th>
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
						foreach($list_reminder_cancelation as $row){
							?>
							<tr>
								<td class="no-border-left"><?php echo $no;?></td>
								<td><?php echo $row->name;?></td>
								<td><?php echo $row->guest_name;?></td>
								<td><?php echo $row->villa;?></td>
								<td><?php echo $row->status_enquiry;?></td>
								<td style='background-color: grey; color: white;'><?php echo $row->cancelation;?></td>
								<td class="no-border-right">
									<div class="action-button">
										<a href="<?php echo $button_detail_enquiry."/".$row->report_id; ?>">
											<span class='glyphicon glyphicon glyphicon-eye-open' aria-hidden='true' alt='See detail'></span>
										</a> 
										<?php if ($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation"): ?>
											<a href="<?php echo $button_edit_enquiry."/".$row->report_id;; ?>">
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