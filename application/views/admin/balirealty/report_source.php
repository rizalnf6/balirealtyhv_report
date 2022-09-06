<!-- Set filter date default-->
<?php
    if (empty($enquiry_start)) {
    	$enquiry_start = date('Y-m-01');
    }
    if (empty($enquiry_end)) {
    	$enquiry_end = date('Y-m-d');
    }

	//Hide Erros Message
	error_reporting(0);
	ini_set('display_errors', 0);
?>

<?php
  $total_source_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
  LEFT JOIN source ON source.source_id = balirealtyhv.source_id
  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
  WHERE balirealtyhv.enquiry_date!='0000-00-00' 
  AND balirealtyhv.enquiry_date>='$enquiry_start' 
  AND balirealtyhv.enquiry_date<='$enquiry_end' 
  AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
  AND balirealtyhv.balirealtyhv_status='1'");
?>
<?php
  $total_source_booking = $this->db->query("SELECT * FROM balirealtyhv 
  LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id 
  WHERE balirealtyhv.confirm_date>='$enquiry_start' 
  AND balirealtyhv.confirm_date<='$enquiry_end' 
  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
  AND balirealtyhv.balirealtyhv_status='1'");
?>

	<div class="table-responsive"> 
	  	<table class="table table-bordered table-brhv">
	  	<caption class="table-caption"> The revenue is quoted in USD
	  		<div class="btn-group">
			  	<button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">
			  		<i class="fa fa-pie-chart" aria-hidden="true"></i> View Chart
					<span class="caret"></span>
				</button>
					<ul class="dropdown-menu">
						<li>
							<a data-toggle="modal" data-target="#pieEnquiry">
								<i class="fa fa-pie-chart" aria-hidden="true"></i> Enquiry
							</a>
						</li>
					</ul>
			</div>
	  	</caption>
	    <thead>
	      <tr>
	      	<th>No</th>
	        <th>Source</th>
	        <th>Enquiry ~ %</th>
	        <th>Booking ~ %</th>
	        <th>Revenue Nett (USD)</th>
	        <th>Conversion %</th>
	        <th>Average</th>
	      </tr>
	    </thead>
	    <tbody>

		    <tr>
		    	<td colspan="7" style="font-size: 12px; color: #000; background-color: #e1e0de; text-align: left;"> <i>Agent & Villa Website</i></td>
		    </tr>

	    <!-- Tabel Agent & Villa Website-->
			<tr>
			  	<td>1</td>
			   	<td>Agent</td>
			   		<?php
						$agent_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
							LEFT JOIN source ON source.source_id = balirealtyhv.source_id
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
							 WHERE balirealtyhv.enquiry_date!='0000-00-00' 
							 AND balirealtyhv.enquiry_date>='$enquiry_start' 
							 AND balirealtyhv.enquiry_date<='$enquiry_end' 
							 AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
							 AND source.category='1' 
							 AND balirealtyhv.balirealtyhv_status='1'");
							
							$agent_enquiry_percentage= ($agent_enquiry->num_rows()/$total_source_enquiry->num_rows())*100;

							if ($agent_enquiry->num_rows()!=0) {
								echo "<td>".$agent_enquiry->num_rows()." ~ (".number_format($agent_enquiry_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}							
					?>			
					<?php
						$agent_booking = $this->db->query("SELECT * FROM balirealtyhv 
							LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id 
							WHERE balirealtyhv.confirm_date>='$enquiry_start' 
							AND balirealtyhv.confirm_date<='$enquiry_end' 
							AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
							AND source.category='1' 
							AND balirealtyhv.balirealtyhv_status='1'");
							
							$agent_booking_percentage= ($agent_booking->num_rows()/$total_source_booking->num_rows())*100;

							if ($agent_booking->num_rows()!=0) {
								echo "<td>".$agent_booking->num_rows()." ~ (".number_format($agent_booking_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}
					?>		
					<?php
						$agent_revenue = $this->db->query("SELECT SUM(revenue_nett) AS revenue_agent FROM balirealtyhv 
							LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE balirealtyhv.confirm_date>='$enquiry_start' AND balirealtyhv.confirm_date<='$enquiry_end' AND source.category='1' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') AND balirealtyhv.balirealtyhv_status='1'");
							$result = $agent_revenue->result();
							if ($result['0']->revenue_agent!=0) {
								echo "<td>$ ".number_format($result['0']->revenue_agent)."</td>";
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
							echo "<td>".$english_format_number = number_format($agent_conversion, 2)." %</td>";
							}
					?>
					<?php 
							if ($agent_booking->num_rows()=="0" OR $result['0']->revenue_agent=="0") {
								echo "<td>-</td>";
							}
							else {
								$agent_average = $result['0']->revenue_agent / $agent_booking->num_rows();
								echo "<td>$ ".number_format($agent_average)."</td>";
							}
					?>
			</tr>
			<tr>
			   	<td>2</td>
			   	<td>Villa Website</td>
			   		<?php
						$website_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
							LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE balirealtyhv.enquiry_date!='0000-00-00' 
							AND balirealtyhv.enquiry_date>='$enquiry_start' 
							AND balirealtyhv.enquiry_date<='$enquiry_end' 
							AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
							AND source.category='2' 
							AND balirealtyhv.balirealtyhv_status='1'");

							$website_enquiry_percentage= ($website_enquiry->num_rows()/$total_source_enquiry->num_rows())*100;

							if ($website_enquiry->num_rows()!=0) {
								echo "<td>".$website_enquiry->num_rows()." ~ (".number_format($website_enquiry_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}							
					?>			
					<?php
						$website_booking = $this->db->query("SELECT * FROM balirealtyhv 
							LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id 
							WHERE balirealtyhv.confirm_date>='$enquiry_start' 
							AND balirealtyhv.confirm_date<='$enquiry_end' 
							AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
							AND source.category='2' 
							AND balirealtyhv.balirealtyhv_status='1'");
							
							$website_booking_percentage= ($website_booking->num_rows()/$total_source_booking->num_rows())*100;

							if ($website_booking->num_rows()!=0) {
								echo "<td>".$website_booking->num_rows()." ~ (".number_format($website_booking_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}
					?>		
					<?php
						$website_revenue = $this->db->query("SELECT SUM(revenue_nett) AS revenue_website FROM balirealtyhv 
							LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE balirealtyhv.confirm_date>='$enquiry_start' AND balirealtyhv.confirm_date<='$enquiry_end' AND source.category='2' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') AND balirealtyhv.balirealtyhv_status='1'");
							$result = $website_revenue->result();
							if ($result['0']->revenue_website!=0) {
								echo "<td>$ ".number_format($result['0']->revenue_website)."</td>";
							} else {
    						echo "<td>-</td>";
							}
					?>
					<?php 
						if ($website_enquiry->num_rows()=="0" OR $website_booking->num_rows()=="0") {
							echo "<td>-</td>";
							}
							else {
							$website_conversion = (($website_booking->num_rows()/$website_enquiry->num_rows())*100);
							echo "<td>".$english_format_number = number_format($website_conversion, 2)." %</td>";
							}
					?>
					<?php 
						if ($website_booking->num_rows()=="0" OR $result['0']->revenue_website=="0") {
							echo "<td>-</td>";
							}
						else {
							$website_average = $result['0']->revenue_website / $website_booking->num_rows();
							echo "<td>$ ".$english_format_number = number_format($website_average)."</td>";
							}
					?>
			</tr>

			 <tr>
		    	<td colspan="7" style="font-size: 12px; color: #000; background-color: #e1e0de; text-align: left;"> <i>Online Travel Agent</i></td>
		    </tr>
			<?php
			$no = 3; //untuk menampilkan no
			foreach($list_ota as $row){
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->source;?></td>
					<?php
					$ota_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
						LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
						LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
						WHERE source.source='$row->source' 
						AND balirealtyhv.enquiry_date!='0000-00-00' 
						AND balirealtyhv.enquiry_date>='$enquiry_start' 
						AND balirealtyhv.enquiry_date<='$enquiry_end' 
						AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
						AND source.category='3' 
						AND balirealtyhv.balirealtyhv_status='1'");
							
							$ota_enquiry_percentage= ($ota_enquiry->num_rows()/$total_source_enquiry->num_rows())*100;

							if ($ota_enquiry->num_rows()!=0) {
								echo "<td>".$ota_enquiry->num_rows()." ~ (".number_format($ota_enquiry_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}							
					?>	
					<?php
					$ota_booking = $this->db->query("SELECT * FROM balirealtyhv 
						LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
						LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id
						WHERE source.source='$row->source' 
						AND balirealtyhv.confirm_date>='$enquiry_start' 
						AND balirealtyhv.confirm_date<='$enquiry_end' 
						AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
						AND source.category='3' 
						AND  balirealtyhv.balirealtyhv_status='1'");
							
							$ota_booking_percentage= ($ota_booking->num_rows()/$total_source_booking->num_rows())*100;

							if ($ota_booking->num_rows()!=0) {
								echo "<td>".$ota_booking->num_rows()." ~ (".number_format($ota_booking_percentage)."%)</td>";
							} else {
								echo "<td>-</td>";
							}
					?>	
					<?php
					$ota_revenue = $this->db->query("SELECT SUM(revenue_nett) AS ota_revenue FROM balirealtyhv 
						LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
						LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
						WHERE source.source='$row->source' AND balirealtyhv.confirm_date>='$enquiry_start' AND balirealtyhv.confirm_date<='$enquiry_end' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') AND source.category='3' AND balirealtyhv.balirealtyhv_status='1'");
							$result = $ota_revenue->result();
							if ($result['0']->ota_revenue!=0) {
								echo "<td>$ ".number_format($result['0']->ota_revenue)."</td>";
							} else {
    						echo "<td>-</td>";
							}
					?>
					<?php 
					if ($ota_enquiry->num_rows()=="0" OR $ota_booking->num_rows()=="0") {
						echo "<td>-</td>";
						}
						else {
						$ota_conversion = (($ota_booking->num_rows()/$ota_enquiry->num_rows())*100);
						echo "<td>".number_format($ota_conversion, 2)." %</td>";
						}
					?>
					<?php 
					if ($ota_booking->num_rows()=="0" OR $result['0']->ota_revenue=="0") {
						echo "<td>-</td>";
						}
					else {
						$ota_average = $result['0']->ota_revenue / $ota_booking->num_rows();
						echo "<td>$ ".number_format($ota_average, 2)."</td>";
						}
					?>
				<?php
			$no++;
			}
			?>


			<tr>
		    	<td colspan="7" style="font-size: 12px; color: #000; background-color: #e1e0de; text-align: left;"> <i>Bali Realty Holiday Villas</i></td>
		    </tr>
			<?php
			$no = 8; //untuk menampilkan no
			foreach($list_others as $row){
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->source;?></td>
					<?php
					$others_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
						LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
						LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id
						WHERE source.source='$row->source' 
						AND balirealtyhv.enquiry_date!='0000-00-00' 
						AND balirealtyhv.enquiry_date>='$enquiry_start' 
						AND balirealtyhv.enquiry_date<='$enquiry_end' 
						AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
						AND source.category='4' 
						AND balirealtyhv.balirealtyhv_status='1'");
							
							$others_enquiry_percentage= ($others_enquiry->num_rows()/$total_source_enquiry->num_rows())*100;

							if ($others_enquiry->num_rows()!=0) {
								echo "<td>".$others_enquiry->num_rows()." ~ (".number_format($others_enquiry_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}							
					?>	
					<?php
					$others_booking = $this->db->query("SELECT * FROM balirealtyhv 
						LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
						LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id
						WHERE source.source='$row->source' 
						AND balirealtyhv.confirm_date>='$enquiry_start' 
						AND balirealtyhv.confirm_date<='$enquiry_end' 
						AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
						AND source.category='4' 
						AND  balirealtyhv.balirealtyhv_status='1'");
							
							$others_booking_percentage= ($others_booking->num_rows()/$total_source_booking->num_rows())*100;

							if ($others_booking->num_rows()!=0) {
								echo "<td>".$others_booking->num_rows()." ~ (".number_format($others_booking_percentage, 2)."%)</td>";
							} else {
								echo "<td>-</td>";
							}
					?>	
					<?php
					$others_revenue = $this->db->query("SELECT SUM(revenue_nett) AS others_revenue FROM balirealtyhv 
						LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
						LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
						WHERE source.source='$row->source' 
						AND balirealtyhv.confirm_date>='$enquiry_start' 
						AND balirealtyhv.confirm_date<='$enquiry_end' 
						AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
						AND source.category='4' 
						AND balirealtyhv.balirealtyhv_status='1'");
							$result = $others_revenue->result();
							if ($result['0']->others_revenue!=0) {
								echo "<td>$ ".number_format($result['0']->others_revenue)."</td>";
							} else {
    						echo "<td>-</td>";
							}
					?>
					<?php 
					if ($others_enquiry->num_rows()=="0" OR $others_booking->num_rows()=="0") {
						echo "<td>-</td>";
						}
						else {
						$others_conversion = (($others_booking->num_rows()/$others_enquiry->num_rows())*100);
						echo "<td>".number_format($others_conversion, 2)." %</td>";
						}
					?>
					<?php 
					if ($others_booking->num_rows()=="0" OR $result['0']->others_revenue=="0") {
						echo "<td>-</td>";
						}
					else {
						$others_average = $result['0']->others_revenue / $others_booking->num_rows();
						echo "<td>$ ".number_format($others_average)."</td>";
						}
					?>
				<?php
			$no++;
			}
			?>

			
			<tr>
				<td></td>
				<td style="color: red"><b>TOTAL</b></td>
					<?php
						if ($total_source_enquiry->num_rows()!=0) {
							echo "<td style='color: red;'><b>".$total_source_enquiry->num_rows()."</b></td>";
						} else {
							echo "<td>".$total_source_enquiry->num_rows()."</td>";
						}							
					?>
					<?php
						if ($total_source_booking->num_rows()!=0) {
							echo "<td style='color: red;'><b>".$total_source_booking->num_rows()."</b></td>";
						} else {
							echo "<td>".$total_source_booking->num_rows()."</td>";
						}
					?>
					<?php
						$total_source_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_source_revenue FROM balirealtyhv 
							LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
							LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
							WHERE balirealtyhv.confirm_date>='$enquiry_start' AND balirealtyhv.confirm_date<='$enquiry_end' AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') AND balirealtyhv.balirealtyhv_status='1'");
							$result = $total_source_revenue->result();
						if ($result['0']->total_source_revenue!=0) {
							echo "<td style='color: red;'><b>$ ".number_format($result['0']->total_source_revenue)."</b></td>";
						} else {
    					echo "<td>$ ".number_format($result['0']->total_source_revenue)."</td>";
						}
					?>
					<?php 
						if ($total_source_enquiry->num_rows()=="0" OR $total_source_booking->num_rows()=="0") {
						echo "<td>".$total_source_conversion="0.00%"."</td>";
						}
						else {
						$total_source_conversion = (($total_source_booking->num_rows()/$total_source_enquiry->num_rows())*100);
						echo "<td style='color: red;'><b>".$english_format_number = number_format($total_source_conversion, 2)." %</td>";
						}
					?>
					<?php 
						if ($total_source_booking->num_rows()=="0" OR $result['0']->total_source_revenue=="0") {
							echo "<td>$ ".$total_source_average="0"."</td>";
						}
						else {
							$total_source_average = $result['0']->total_source_revenue / $total_source_booking->num_rows();
							echo "<td style='color: red;'><b>$ ".number_format($total_source_average);
						}
					?>
				</tr>
	    </tbody>
	  	</table>
	</div> <!-- Table End-->

<!-- Start Chart-->
<div id="pieEnquiry" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<div class="modal-content">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Enquiry Chart (Percentage %)</h4>
			</div> <!-- End modal-header-->
			<div class="modal-body" align="left">
			    <canvas id="enquiryCharts"></canvas>
			<script>
				//pie
			  	var ctxP = document.getElementById("enquiryCharts").getContext('2d');
			  	var myPieChart = new Chart(ctxP, {
			    	type: 'doughnut',
			    	data: {
			      		labels: ["Agent", "Website",
				      				<?php
										foreach($list_ota as $row){
											echo '"' .$row->source. '",';
										}
									?>
									<?php
										foreach($list_others as $row){
											echo '"' .$row->source. '",';
										}
									?>
								],
			      		datasets: [{
			        		data: [
			        			<?php 
			        				$total_pieenquiry = $this->db->query("SELECT * FROM balirealtyhv 
									LEFT JOIN source ON source.source_id = balirealtyhv.source_id
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
							 		WHERE balirealtyhv.enquiry_date!='0000-00-00' 
							 		AND balirealtyhv.enquiry_date>='$enquiry_start' 
							 		AND balirealtyhv.enquiry_date<='$enquiry_end' 
							 		AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
							 		AND balirealtyhv.balirealtyhv_status='1'");
			        			?>
			        			<?php 
			        				$chart_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
									LEFT JOIN source ON source.source_id = balirealtyhv.source_id
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
							 		WHERE balirealtyhv.enquiry_date!='0000-00-00' AND balirealtyhv.enquiry_date>='$enquiry_start' 
							 		AND balirealtyhv.enquiry_date<='$enquiry_end' 
							 		AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
							 		AND source.category='1' 
							 		AND balirealtyhv.balirealtyhv_status='1'");
							 		$percentage = ($chart_enquiry->num_rows()/$total_pieenquiry->num_rows())*100; 
					                echo number_format($percentage, 2).",";
			        			?>
			        			<?php 
			        				$chart_website = $this->db->query("SELECT * FROM balirealtyhv 
									LEFT JOIN source ON source.source_id = balirealtyhv.source_id
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
							 		WHERE balirealtyhv.enquiry_date!='0000-00-00' AND balirealtyhv.enquiry_date>='$enquiry_start' 
							 		AND balirealtyhv.enquiry_date<='$enquiry_end' 
							 		AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
							 		AND source.category='2' 
							 		AND balirealtyhv.balirealtyhv_status='1'");
					                $percentage = ($chart_website->num_rows()/$total_pieenquiry->num_rows())*100; 
					                echo number_format($percentage, 2).",";
			        			?>
			        			<?php
									foreach($list_ota as $row){
									$chart_ota = $this->db->query("SELECT * FROM balirealtyhv 
									LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
									WHERE source.source='$row->source' 
									AND balirealtyhv.enquiry_date!='0000-00-00' 
									AND balirealtyhv.enquiry_date>='$enquiry_start' 
									AND balirealtyhv.enquiry_date<='$enquiry_end' 
									AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
									AND source.category='3' 
									AND balirealtyhv.balirealtyhv_status='1'");
					                $percentage = ($chart_ota->num_rows()/$total_pieenquiry->num_rows())*100; 
					                echo number_format($percentage, 2).",";
					            	}
								?>
								<?php
									foreach($list_others as $row){
									$chart_others = $this->db->query("SELECT * FROM balirealtyhv 
									LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
									LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
									WHERE source.source='$row->source' 
									AND balirealtyhv.enquiry_date!='0000-00-00' 
									AND balirealtyhv.enquiry_date>='$enquiry_start' 
									AND balirealtyhv.enquiry_date<='$enquiry_end' 
									AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
									AND source.category='4' 
									AND balirealtyhv.balirealtyhv_status='1'");
					                $percentage = ($chart_others->num_rows()/$total_pieenquiry->num_rows())*100; 
					                echo number_format($percentage, 2).",";
					            	}
								?>
			        			],
			        backgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b", "#d9edf7", "#337ab7", "#fcf8e3", "#3c763d", "#f17cb0", "#b276b2", "#decf3f", "#faa43a", "#4d4d4d"],
			        hoverBackgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b", "#d9edf7", "#337ab7", "#fcf8e3", "#3c763d", "#f17cb0", "#b276b2", "#decf3f", "#faa43a", "#4d4d4d"]
			      }]
			    },
			    options: {
                        title: {
                            display: true,
                            text: 'Enquiry Chart (Percentage %)',
                            position: 'right',
                            fontSize: 22,
                        },
                        legend: {
                            display: true,
                            position: 'left',

                        }
                    }
                });

			</script>
			    
			<div class="modal-footer">
			    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
			    <button name="submit" class="btn btn-primary btn-sm" align="right">Submit</button>

				</form>
			</div> <!-- End modal-footer-->
		</div><!-- End modal-body-->

	</div> <!-- End modal-content-->
</div> <!-- End modal-dialog-->
</div> <!-- End div id-->


	