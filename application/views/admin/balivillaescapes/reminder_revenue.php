<script type="text/javascript">
	$(document).ready( function () {
	    $('#reminderRevenue').DataTable({
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
			  	<table class="table table-bordered table-bve" id="reminderRevenue">
			  	<caption class="table-caption">Please check the revenue !</caption>
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Reservation</th>
			        <th>Guest</th>
			        <th>Villa</th>
			        <th>Status</th>
			        <th>Nett AUD</th>
			        <th>Gross AUD</th>
			        <th>Nett USD</th>
			        <th>Gross USD</th>
			        <th>Notes</th>
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
						foreach($list_reminder_revenue as $row){
							?>
							<tr>
								<td class="no-border-left"><?php echo $no;?></td>
								<td><?php echo $row->name;?></td>
								<td><?php echo $row->guest_name;?></td>
								<td><?php echo $row->villa;?></td>
								
								<?php 
									if ($row->status_enquiry == "Extend Stay") {
										echo "<td style=color:#d9534f><b><i>".$row->status_enquiry."</i></b></td>";
									} else if ($row->status_enquiry == "Proposed") {
										echo "<td style=color:#5cb85c><b><i>".$row->status_enquiry."</i></b></td>";
									} else {
										echo "<td>".$row->status_enquiry."</td>";
									}
								?>

								<?php if ($row->revenue_nett_aud == "0"): ?> 
									<td style='background-color: #e1e0de; color: #000;'>$ <?php echo number_format($row->revenue_nett_aud);?></td>
								<?php endif ?>
								<?php if ($row->revenue_nett_aud != "0"): ?> 
									<td>$ <?php echo number_format($row->revenue_nett_aud);?></td>
								<?php endif ?>

								<?php if ($row->revenue_gross_aud == "0"): ?> 
									<td style='background-color: #e1e0de; color: #000;'>$ <?php echo number_format($row->revenue_gross_aud);?></td>
								<?php endif ?>
								<?php if ($row->revenue_gross_aud != "0"): ?> 
									<td>$ <?php echo number_format($row->revenue_gross_aud);?></td>
								<?php endif ?>

								<?php if ($row->revenue_nett_usd == "0"): ?> 
									<td style='background-color: #e1e0de; color: #000;'>$ <?php echo number_format($row->revenue_nett_usd);?></td>
								<?php endif ?>
								<?php if ($row->revenue_nett_usd != "0"): ?> 
									<td>$ <?php echo number_format($row->revenue_nett_usd);?></td>
								<?php endif ?>

								<?php if ($row->revenue_gross_usd == "0"): ?> 
									<td style='background-color: #e1e0de; color: #000;'>$ <?php echo number_format($row->revenue_gross_usd);?></td>
								<?php endif ?>
								<?php if ($row->revenue_gross_usd != "0"): ?> 
									<td>$ <?php echo number_format($row->revenue_gross_usd);?></td>
								<?php endif ?>

								<td>
									<?php if ($row->revenue_nett_aud == "0"): ?> 
										Revenue nett AUD is empty ! <br />
									<?php endif ?>

									<?php if ($row->revenue_gross_aud == "0"): ?> 
										Revenue gross AUD is empty ! <br />
									<?php endif ?>

									<?php if ($row->revenue_nett_aud > $row->revenue_gross_aud): ?> 
										Revenue <b style="color: green">Nett AUD</b> is more than Revenue <b style="color: green;">Gross AUD</b> ! <br />
									<?php endif ?>

									<?php if ($row->revenue_nett_usd == "0"): ?> 
										Revenue nett USD is empty ! <br />
									<?php endif ?>

									<?php if ($row->revenue_gross_usd == "0"): ?> 
										Revenue gross USD is empty ! <br />
									<?php endif ?>

									<?php if ($row->revenue_nett_usd > $row->revenue_gross_usd): ?> 
										Revenue <b style="color: green">Nett USD</b> is more than Revenue <b style="color: green;">Gross USD</b> ! <br />
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
									<?php if ($row->status_enquiry == "Extend Stay" AND($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="reservation")): ?>
								    	<a href="<?php echo $button_edit_extend."/".$row->report_id;; ?>">
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