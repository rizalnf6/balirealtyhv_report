<br /><br /><br />
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">
			<img class="logo-table-with-margin" src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> 
		</div>
		<div class="col-sm-5">
			<div class="page-header-with-margin">
				<?php echo $page_header; ?>
			</div>
		</div> <!-- col-sm-5 -->
		<div class="col-sm-1">
		</div>
	</div> <!-- End Row -->

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<?php 
				    	$query = $this->db->query("SELECT * FROM balirealtyhv
				    		WHERE checkin!='0000-00-00'
				    		AND (status_enquiry_id='5' OR status_enquiry_id='6' OR status_enquiry_id='9')
				    		AND balirealtyhv_status='1'");

				    	$category_a = "0";
				    	$category_b = "0";
				    	$category_c = "0";
				    	$category_d = "0";
				    	$category_e = "0";
				    	$category_f = "0";
				    	$category_g = "0";
				    	$category_h = "0";

						foreach ($query->result() as $row)
						{		
						    $date1 = date_create($row->checkin);
							$date2 = date_create($row->confirm_date);

							//difference between two dates
							$diff = date_diff($date1,$date2);

							//count days
							if ($diff->format("%a")>=0 AND $diff->format("%a")<=21) {
								$category_a++;
							} elseif ($diff->format("%a")>=22 AND $diff->format("%a")<=45) {
								$category_b++;
							} elseif ($diff->format("%a")>=46 AND $diff->format("%a")<=90) {
								$category_c++;
							} elseif ($diff->format("%a")>=91 AND $diff->format("%a")<=120) {
								$category_d++;
							} elseif ($diff->format("%a")>=121 AND $diff->format("%a")<=150) {
								$category_e++;
							} elseif ($diff->format("%a")>=151 AND $diff->format("%a")<=180) {
								$category_f++;
							} elseif ($diff->format("%a")>180) {
								$category_g++;
							} 
						}

						$category_total = $category_a + $category_b + $category_c + $category_d + $category_e + $category_f + $category_g;
				    ?>

			<div class="table-responsive">          
			  	<table class="table table-bordered table-brhv">
			    <thead>
			      	<tr>
				        <th>Date of payment to date of check in</th>
				        <th>Category</th>
				        <th>Total</th>
				        <th>Percentage</th>
			      	</tr>
			    </thead>
			    <tbody>
			    	<tr>
				    	<td>0 to 21 days</td>
				    	<td>Category A</td>   
					    <td><?php echo $category_a; ?></td>
					    <td><?php echo number_format(($category_a/$category_total)*100, 2); ?> %</td>
				    </tr>
				    <tr>
				    	<td>22 to 45 days</td>
				    	<td>Category B</td>   
					    <td><?php echo $category_b; ?></td>
					    <td><?php echo number_format(($category_b/$category_total)*100, 2); ?> %</td>
				    </tr>
				    <tr>
				    	<td>46 to 90 days</td>
				    	<td>Category C</td>   
					    <td><?php echo $category_c; ?></td>
					    <td><?php echo number_format(($category_c/$category_total)*100, 2); ?> %</td>
				    </tr>
				    <tr>
				    	<td>91 to 120 days</td>
				    	<td>Category D</td>   
					    <td><?php echo $category_d; ?></td>
					    <td><?php echo number_format(($category_d/$category_total)*100, 2); ?> %</td>
				    </tr>
				    <tr>
				    	<td>121 to 150 days</td>
				    	<td>Category E</td>   
					    <td><?php echo $category_e; ?></td>
					    <td><?php echo number_format(($category_e/$category_total)*100, 2); ?> %</td>
				    </tr>
				    <tr>
				    	<td>151 to 180 days</td>
				    	<td>Category F</td>   
					    <td><?php echo $category_f; ?></td>
					    <td><?php echo number_format(($category_f/$category_total)*100, 2); ?> %</td>
				    </tr>
				    <tr>
				    	<td>More than 180 days</td>
				    	<td>Category G</td>   
					    <td><?php echo $category_g; ?></td>
					    <td><?php echo number_format(($category_g/$category_total)*100, 2); ?> %</td>
				    </tr>
			    </tbody>
			  	</table>
			</div> <!-- Table End-->
		</div> <!-- End Col 10 -->
		<div class="col-sm-1">
		</div>
	</div> <!-- End Row -->

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">
				<canvas id="barChart" height="150px;"></canvas>
					<script>
					//pie
				  	var ctxP = document.getElementById("barChart").getContext('2d');
				  	var myPieChart = new Chart(ctxP, {
				    	type: 'bar',
				    	data: {
				      		labels: ["Category A", "Category B", "Category C", "Category D", "Category E", "Category F", "Category G"],
				      		datasets: [{
				        		data: [
				        		<?php echo $category_a.","; ?>
				        		<?php echo $category_b.","; ?>
				        		<?php echo $category_c.","; ?>
				        		<?php echo $category_d.","; ?>
				        		<?php echo $category_e.","; ?>
				        		<?php echo $category_f.","; ?>
				        		<?php echo $category_g.","; ?>
				        			],
				        backgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b", "#d9edf7", "#337ab7", "#fcf8e3", "#3c763d", "#f17cb0", "#b276b2", "#decf3f", "#faa43a", "#4d4d4d"],
				        hoverBackgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b", "#d9edf7", "#337ab7", "#fcf8e3", "#3c763d", "#f17cb0", "#b276b2", "#decf3f", "#faa43a", "#4d4d4d"]
				      }]
				    },
				    options: {
	                        title: {
	                            display: true,
	                            text: 'Total',
	                            position: 'top',
	                            fontSize: 20,
	                        },
	                        legend: {
	                            display: true,
	                            position: 'bottom',

	                        }
	                    }
	                });
					</script>
		</div>

		<div class="col-sm-5">
				<canvas id="doughnutChart" height="150px;"></canvas>
					<script>
					//pie
				  	var ctxP = document.getElementById("doughnutChart").getContext('2d');
				  	var myPieChart = new Chart(ctxP, {
				    	type: 'doughnut',
				    	data: {
				      		labels: ["Category A", "Category B", "Category C", "Category D", "Category E", "Category F", "Category G"],
				      		datasets: [{
				        		data: [
				        		<?php echo number_format(($category_a/$category_total)*100, 2).","; ?>
				        		<?php echo number_format(($category_b/$category_total)*100, 2).","; ?>
				        		<?php echo number_format(($category_c/$category_total)*100, 2).","; ?>
				        		<?php echo number_format(($category_d/$category_total)*100, 2).","; ?>
				        		<?php echo number_format(($category_e/$category_total)*100, 2).","; ?>
				        		<?php echo number_format(($category_f/$category_total)*100, 2).","; ?>
				        		<?php echo number_format(($category_g/$category_total)*100, 2).","; ?>
				        			],
				        backgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b"],
				        hoverBackgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b"]
				      }]
				    },
				    options: {
	                        title: {
	                            display: true,
	                            text: 'Percentage',
	                            position: 'top',
	                            fontSize: 20,
	                        },
	                        legend: {
	                            display: true,
	                            position: 'bottom',

	                        }
	                    }
	                });
					</script>
			</div> <!-- End col 5 -->
		<div class="col-sm-1">
		</div>
	</div> <!-- End Row -->
</div> <!-- End Container -->