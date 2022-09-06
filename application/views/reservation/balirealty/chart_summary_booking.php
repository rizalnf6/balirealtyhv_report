<canvas id="monthlybooking" width="500px"></canvas>
<script>
var canvas = document.getElementById("monthlybooking");
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
              $chartBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartBookingResult = ($chartBookingBrhv->num_rows() + $chartBookingBve->num_rows() + $chartBookingBvo->num_rows());

                  echo '"'.$chartBookingResult.'",';       
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
              $chartBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartBookingResult = ($chartBookingBrhv->num_rows() + $chartBookingBve->num_rows() + $chartBookingBvo->num_rows());

                  echo '"'.$chartBookingResult.'",';       
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
              $chartBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartBookingResult = ($chartBookingBrhv->num_rows() + $chartBookingBve->num_rows() + $chartBookingBvo->num_rows());

                  echo '"'.$chartBookingResult.'",';       
                  $i++;
          }?>],
        spanGaps: true,
      }, {
      label: "2020",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#800080", // The main line color
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
              $chartBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartBookingResult = ($chartBookingBrhv->num_rows() + $chartBookingBve->num_rows() + $chartBookingBvo->num_rows());

                  echo '"'.$chartBookingResult.'",';       
                  $i++;
          }?>],
        spanGaps: true,
      }, {
      label: "2021",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#8a6d3b", // The main line color
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
              $chartBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              $chartBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");

              $chartBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartBookingResult = ($chartBookingBrhv->num_rows() + $chartBookingBve->num_rows() + $chartBookingBvo->num_rows());

                  echo '"'.$chartBookingResult.'",';       
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
                     labelString: 'Booking',
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
    <caption class="table-caption"></caption>
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
              $tableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableBookingBrhv->num_rows() + $tableBookingBve->num_rows() + $tableBookingBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableBookingBrhv->num_rows() + $maxTableBookingBve->num_rows() + $maxTableBookingBvo->num_rows());

                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">'.$maxTable.'</td>'; 
                } else {
                  echo '<td>'.$maxTable.'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableBookingBrhv->num_rows() + $totalTableBookingBve->num_rows() + $totalTableBookingBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
        <tr>
          <td>2018</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableBookingBrhv->num_rows() + $tableBookingBve->num_rows() + $tableBookingBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableBookingBrhv->num_rows() + $maxTableBookingBve->num_rows() + $maxTableBookingBvo->num_rows());

                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">'.$maxTable.'</td>'; 
                } else {
                  echo '<td>'.$maxTable.'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableBookingBrhv->num_rows() + $totalTableBookingBve->num_rows() + $totalTableBookingBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
        <tr>
          <td>2019</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableBookingBrhv->num_rows() + $tableBookingBve->num_rows() + $tableBookingBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableBookingBrhv->num_rows() + $maxTableBookingBve->num_rows() + $maxTableBookingBvo->num_rows());

                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">'.$maxTable.'</td>'; 
                } else {
                  echo '<td>'.$maxTable.'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableBookingBrhv->num_rows() + $totalTableBookingBve->num_rows() + $totalTableBookingBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
        <tr>
          <td>2020</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableBookingBrhv->num_rows() + $tableBookingBve->num_rows() + $tableBookingBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableBookingBrhv->num_rows() + $maxTableBookingBve->num_rows() + $maxTableBookingBvo->num_rows());

                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">'.$maxTable.'</td>'; 
                } else {
                  echo '<td>'.$maxTable.'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableBookingBrhv->num_rows() + $totalTableBookingBve->num_rows() + $totalTableBookingBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>
        <tr>
          <td>2021</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResult = ($tableBookingBrhv->num_rows() + $tableBookingBve->num_rows() + $tableBookingBvo->num_rows());
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTable = ($maxTableBookingBrhv->num_rows() + $maxTableBookingBve->num_rows() + $maxTableBookingBvo->num_rows());

                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">'.$maxTable.'</td>'; 
                } else {
                  echo '<td>'.$maxTable.'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableBookingBrhv = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableBookingBve = $this->db->query("SELECT * FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableBookingBvo = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTable = ($totalTableBookingBrhv->num_rows() + $totalTableBookingBve->num_rows() + $totalTableBookingBvo->num_rows());
 
                echo '<td>'.$totalTable.'</td>';     
          ?>
        </tr>

      </tbody>
  </table>
</div>
