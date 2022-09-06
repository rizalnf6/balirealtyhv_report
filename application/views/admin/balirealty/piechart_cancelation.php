<!-- Set filter date default-->
<?php
    if (empty($year)) {
      $year = date('Y');
    }
?>
	<canvas id="myChart"></canvas>
			<script>
				//pie
			  	var ctxP = document.getElementById("myChart").getContext('2d');
			  	var myPieChart = new Chart(ctxP, {
			    	type: 'doughnut',
			    	data: {
			      		labels: [
				      				<?php
										foreach($list_cancelation as $row){
											echo '"' .$row->cancelation. '",';
										}
									?>
								],
			      		datasets: [{
			        		data: [
			        			<?php
			        				foreach($list_cancelation as $row) {
										$chart_cancelation = $this->db->query("SELECT * FROM balirealtyhv 
									    LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
									    LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
									    LEFT JOIN cancelation ON cancelation.cancelation_id=balirealtyhv.cancelation_id 
									    WHERE cancelation.cancelation='$row->cancelation' 
									    AND YEAR(balirealtyhv.enquiry_date)=$year 
									    AND status_enquiry.status_enquiry='Cancel' 
									    AND balirealtyhv.balirealtyhv_status='1'");
					                  	echo '"' . $chart_cancelation->num_rows(). '",';       
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
                            text: 'Cancelation Reason of <?php echo $year; ?>',
                            position: 'right',
                            fontSize: 26,
                        },
                        legend: {
                            display: true,
                            position: 'left',

                        }
                    }
                });

			</script>