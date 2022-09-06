<!-- Set filter date default-->
<?php
    if (empty($month)) {
      $month = date('m');
    }
    if (empty($year)) {
      $year = date('Y');
    }
?>

<canvas id="dailyenquiry" width="400px"></canvas>
<script>
var canvas = document.getElementById("dailyenquiry");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 13;

var data = {
  labels: [<?php
	      $i = 1;
				while($i <= 31)
				{
				    echo '"'.$i.' '.date("M", mktime(0, 0, 0, $month, 10)).'",';
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
      pointBackgroundColor: "rgba(0, 128, 128, 1)",
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
          while($i <= 31)
          {
              $chart_daily_enquiry2017 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                  echo '"' . $chart_daily_enquiry2017->num_rows(). '",';       
                  $i++;
          }       
                  ?>],
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
      pointBackgroundColor: "rgba(0, 128, 128, 1)",
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
          while($i <= 31)
          {
              $chart_daily_enquiry2018 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                  echo '"' . $chart_daily_enquiry2018->num_rows(). '",';       
                  $i++;
          }       
                  ?>],
      spanGaps: true,
    }, {
      label: "2019",
      fill: false,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#3c763d", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "rgba(0, 128, 128, 1)",
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
          while($i <= 31)
          {
              $chart_daily_enquiry2019 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                  echo '"' . $chart_daily_enquiry2019->num_rows(). '",';       
                  $i++;
          }       
                  ?>],
      spanGaps: true,
    }, {
      label: "2020",
      fill: false,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#800080", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "rgba(0, 128, 128, 1)",
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
          while($i <= 31)
          {
              $chart_daily_enquiry2020 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2020' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                  echo '"' . $chart_daily_enquiry2020->num_rows(). '",';       
                  $i++;
          }       
                  ?>],
      spanGaps: true,
    }, {
      label: "2021",
      fill: false,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#8a6d3b", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "rgba(0, 128, 128, 1)",
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
          while($i <= 31)
          {
              $chart_daily_enquiry2021 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2021' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                  echo '"' . $chart_daily_enquiry2021->num_rows(). '",';       
                  $i++;
          }       
                  ?>],
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
    <caption class="table-caption"></caption>
      <thead>
        <tr>
          <th>Enquiry</th>
          <?php
            $i = 1;
            while($i <= 31) {
                echo '<th>'.$i.'</th>';
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
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2017' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry2017->num_rows() > $max) {
                $max = $table_daily_enquiry2017->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2017' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry2017->num_rows() == $max) {
                echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">' . $max_table_daily_enquiry2017->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_daily_enquiry2017->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
            $total_daily_enquiry2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2017' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              echo '<td>' . $total_daily_enquiry2017->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2018</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2018' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry2018->num_rows() > $max) {
                $max = $table_daily_enquiry2018->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2018' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry2018->num_rows() == $max) {
                echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">' . $max_table_daily_enquiry2018->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_daily_enquiry2018->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
            $total_daily_enquiry2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2018' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              echo '<td>' . $total_daily_enquiry2018->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2019</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2019' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry2019->num_rows() > $max) {
                $max = $table_daily_enquiry2019->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2019' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry2019->num_rows() == $max) {
                echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">' . $max_table_daily_enquiry2019->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_daily_enquiry2019->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
            $total_daily_enquiry2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2019' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              echo '<td>' . $total_daily_enquiry2019->num_rows(). '</td>';          
          ?>
        </tr>

        <tr>
          <td>2020</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2020' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry2020->num_rows() > $max) {
                $max = $table_daily_enquiry2020->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2020' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry2020->num_rows() == $max) {
                echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">' . $max_table_daily_enquiry2020->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_daily_enquiry2020->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
            $total_daily_enquiry2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2020' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              echo '<td>' . $total_daily_enquiry2020->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2021</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2021' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry2021->num_rows() > $max) {
                $max = $table_daily_enquiry2021->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2021' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry2021->num_rows() == $max) {
                echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">' . $max_table_daily_enquiry2021->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_daily_enquiry2021->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
            $total_daily_enquiry2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE user.name='$session_login'
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2021' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              echo '<td>' . $total_daily_enquiry2021->num_rows(). '</td>';          
          ?>
        </tr>
      </tbody>
  </table>
</div>