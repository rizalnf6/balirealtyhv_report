<canvas id="summaryEnquiry" width="500px"></canvas>
<script>
var canvas = document.getElementById("summaryEnquiry");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 13;

var data = {
  labels: [<?php
              $i = 1;
    				  $month = strtotime('2018-01-01');
    				  while($i <= 12) {
    				    $month_name = date('F', $month);
    				    echo '"' . $month_name. '",';
    				    $month = strtotime('+1 month', $month);
    				    $i++;
				  }?>],

  datasets: [{
      label: "2017",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#1066a2", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "yellow",
      pointHoverBorderColor: "brown",
      pointHoverBorderWidth: 2,
      pointRadius: 3,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [<?php
                $i = 1;
          while($i <= 12) {
              $chartEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartEnquiryResult = ($chartEnquiryBrhv->num_rows() + $chartEnquiryBve->num_rows() + $chartEnquiryBvo->num_rows());

                  echo '"'.$chartEnquiryResult.'",';       
                  $i++;
          }?>],
        spanGaps: true,
      }, {
      label: "2018",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#e84c3d", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "yellow",
      pointHoverBorderColor: "brown",
      pointHoverBorderWidth: 2,
      pointRadius: 3,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [<?php
		            $i = 1;
					while($i <= 12) {
					    $chartEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartEnquiryResult = ($chartEnquiryBrhv->num_rows() + $chartEnquiryBve->num_rows() + $chartEnquiryBvo->num_rows());

                  echo '"'.$chartEnquiryResult.'",';       
                  $i++;
					}?>],
        spanGaps: true,
      }, {
      label: "2019",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#3c763d", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "yellow",
      pointHoverBorderColor: "brown",
      pointHoverBorderWidth: 2,
      pointRadius: 3,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [<?php
                $i = 1;
          while($i <= 12) {
              $chartEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartEnquiryResult = ($chartEnquiryBrhv->num_rows() + $chartEnquiryBve->num_rows() + $chartEnquiryBvo->num_rows());

                  echo '"'.$chartEnquiryResult.'",';       
                  $i++;
          }?>],
        spanGaps: true,
      }, 
    ]
  };

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Enquiry',
                     fontSize: 13 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});
</script>

<hr />

<div class="table-responsive">          
  <table class="table table-bordered table-brhv">
    <caption class="table-caption">Enquiry</caption>
      <thead>
        <tr>
          <th>Enquiry</th>
            <?php
              $i = 1;
              $month = strtotime('2018-01-01');
              while($i <= 12) {
                $month_name = date('M', $month);
                echo '<th>' . $month_name. '</th>';
                $month = strtotime('+1 month', $month);
                $i++;
              }
            ?>
          <th>Total</th>
        <tr>
      </thead>
      <tbody>
        <tr>
          <td>2017</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableEnquiryBrhv->num_rows() + $tableEnquiryBve->num_rows() + $tableEnquiryBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            }

              $i = 1;
              while($i <= 12) {
                $maxTableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableEnquiryBrhv->num_rows() + $maxTableEnquiryBve->num_rows() + $maxTableEnquiryBvo->num_rows());

              if ($maxTable == $max) {
                echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">'.$maxTable.'</td>'; 
              } else {
                echo '<td>'.$maxTable.'</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
              $totalTableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableEnquiryBrhv->num_rows() + $totalTableEnquiryBve->num_rows() + $totalTableEnquiryBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
        <tr>
          <td>2018</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableEnquiryBrhv->num_rows() + $tableEnquiryBve->num_rows() + $tableEnquiryBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            }

              $i = 1;
              while($i <= 12) {
                $maxTableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableEnquiryBrhv->num_rows() + $maxTableEnquiryBve->num_rows() + $maxTableEnquiryBvo->num_rows());

              if ($maxTable == $max) {
                echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">'.$maxTable.'</td>'; 
              } else {
                echo '<td>'.$maxTable.'</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
              $totalTableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableEnquiryBrhv->num_rows() + $totalTableEnquiryBve->num_rows() + $totalTableEnquiryBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
        <tr>
          <td>2019</td>
          <?php
            $i = 1;
            $max = 0; 
            while($i <= 12) {
              $tableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableEnquiryBrhv->num_rows() + $tableEnquiryBve->num_rows() + $tableEnquiryBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            }

              $i = 1;
              while($i <= 12) {
                $maxTableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.enquiry_date)=$i 
                AND YEAR(balirealtyhv.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.enquiry_date)=$i 
                AND YEAR(balivillaescapes.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableEnquiryBrhv->num_rows() + $maxTableEnquiryBve->num_rows() + $maxTableEnquiryBvo->num_rows());

              if ($maxTable == $max) {
                echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">'.$maxTable.'</td>'; 
              } else {
                echo '<td>'.$maxTable.'</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
              $totalTableEnquiryBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableEnquiryBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableEnquiryBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableEnquiryBrhv->num_rows() + $totalTableEnquiryBve->num_rows() + $totalTableEnquiryBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
      </tbody>
  </table>
</div>
