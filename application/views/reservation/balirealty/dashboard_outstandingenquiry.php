<br />

<div class="table-responsive table-scroll">         
  	<table class="table table-bordered table-brhv">
	   	<thead>
		    <tr>
			    <th>#</th>
			    <th>Reservation</th>
			    <th>Guest Name</th>
			    <th>Enquiry Date</th>
			    <th>Source</th>
			    <th>Status</th>
			    <th>Days Since The Enquiry Received</th>
			    <th>Remarks</th>
			    <th>Actions</th>
			</tr>
		</thead>
		<tbody>
		    <?php 
				$brhvOutstanding = $this->db->query("SELECT * FROM balirealtyhv  
				LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
				LEFT JOIN source ON source.source_id=balirealtyhv.source_id
				LEFT JOIN nationality ON nationality.nationality_id=balirealtyhv.nationality_id
				LEFT JOIN villa ON villa.villa_id=balirealtyhv.villa_id
				LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
				LEFT JOIN payment ON payment.payment_id=balirealtyhv.payment_id
				LEFT JOIN cancelation ON cancelation.cancelation_id=balirealtyhv.cancelation_id
				WHERE user.name='$session_login' 
				AND status_enquiry.status_enquiry='Outstanding' 
				AND balirealtyhv.balirealtyhv_status='1'
				ORDER BY balirealtyhv.enquiry_date ASC");

			    	$no = 1;
			    	foreach ($brhvOutstanding->result() as $row) {
			    		$today = date("Y-m-d");
			    		$date1 = date_create($row->enquiry_date);
						$date2 = date_create($today);

						//difference between two dates
						$diff = date_diff($date2,$date1);

							if ($diff->format("%a")>3) {
								echo "<tr>";
								echo "<td>".$no."</td>";
								echo "<td>".$row->name."</td>";
								echo "<td>".$row->guest_name."</td>";
								echo "<td>".Date("j M Y", strtotime($row->enquiry_date))."</td>";
								echo "<td>".$row->source."</td>";
								echo "<td>".$row->status_enquiry."</td>";
								echo "<td>".$diff->format("%a")." Days</td>";
								echo "<td>".$row->remarks."</td>";
								echo 
								"<td class='no-border-right'> 
								<div class='action-button'>
									<a href='".base_url('reservation/brhv_enquiry/details')."/".$row->report_id."'>
										<span class='glyphicon glyphicon glyphicon-eye-open' aria-hidden='true' alt='See detail'></span>
									</a> 
									<a href='".base_url('reservation/brhv_enquiry/edit')."/".$row->report_id."'>
										<span class='glyphicon glyphicon glyphicon-edit' aria-hidden='true' alt='Edit'></span>
									</a>
								<div>
								</td>";
								echo "</tr>";
							$no++;
						};				    		
					}
				?>
		</tbody>
	</table>
</div> <!-- Table End-->