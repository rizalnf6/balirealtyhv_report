<!-- Set filter date default-->
<?php
    if (empty($month)) {
      $month = date('m');
    }
    if (empty($year)) {
      $year = date('Y');
    }
?>

<canvas id="dailyRevenue" width="400px"></canvas>
<script>
var canvas = document.getElementById("dailyRevenue");
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
      pointBackgroundColor: "yellow",
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
              while($i <= 31) {
              $chartRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $chartRevenue->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
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
      pointBackgroundColor: "yellow",
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
              while($i <= 31) {
              $chartRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $chartRevenue->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
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
      pointBackgroundColor: "yellow",
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
              while($i <= 31) {
              $chartRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $chartRevenue->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
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
      pointBackgroundColor: "yellow",
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
              while($i <= 31) {
              $chartRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $chartRevenue->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
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
      pointBackgroundColor: "yellow",
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
              while($i <= 31) {
              $chartRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $chartRevenue->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
      spanGaps: true,
    }, {
      label: "2022",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#a94442", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "yellow",
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
              while($i <= 31) {
              $chartRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $chartRevenue->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
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
                     labelString: 'Revenue',
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
  <table class="table table-bordered table-bve">
    <caption>The rates are quoted in AUD</caption>
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
              $tableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $tableRevenue->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 31) {
                $maxTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $maxResult = $maxTableRevenue->result();

                if ($maxResult == $max) {
                  echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">'.number_format($maxResult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxResult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $totalTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $totalRevenue = $totalTableRevenue->result();
                echo '<td>' .number_format($totalRevenue['0']->revenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2018</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $tableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $tableRevenue->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 31) {
                $maxTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $maxResult = $maxTableRevenue->result();

                if ($maxResult == $max) {
                  echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">'.number_format($maxResult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxResult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $totalTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $totalRevenue = $totalTableRevenue->result();
                echo '<td>' .number_format($totalRevenue['0']->revenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2019</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $tableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $tableRevenue->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 31) {
                $maxTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $maxResult = $maxTableRevenue->result();

                if ($maxResult == $max) {
                  echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">'.number_format($maxResult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxResult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $totalTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $totalRevenue = $totalTableRevenue->result();
                echo '<td>' .number_format($totalRevenue['0']->revenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2020</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $tableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $tableRevenue->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 31) {
                $maxTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $maxResult = $maxTableRevenue->result();

                if ($maxResult == $max) {
                  echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">'.number_format($maxResult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxResult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $totalTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $totalRevenue = $totalTableRevenue->result();
                echo '<td>' .number_format($totalRevenue['0']->revenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2021</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $tableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $tableRevenue->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 31) {
                $maxTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $maxResult = $maxTableRevenue->result();

                if ($maxResult == $max) {
                  echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">'.number_format($maxResult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxResult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $totalTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $totalRevenue = $totalTableRevenue->result();
                echo '<td>' .number_format($totalRevenue['0']->revenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2022</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $tableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $result = $tableRevenue->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 31) {
                $maxTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE DAY(balivillaescapes.confirm_date)=$i 
                AND MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $maxResult = $maxTableRevenue->result();

                if ($maxResult == $max) {
                  echo '<td style="background-color: rgba(169, 68, 66, 0.5); color: #fff;">'.number_format($maxResult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxResult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $totalTableRevenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$month 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
                $totalRevenue = $totalTableRevenue->result();
                echo '<td>' .number_format($totalRevenue['0']->revenue). '</td>';          
            ?>
        </tr>
      </tbody>
  </table>
</div>