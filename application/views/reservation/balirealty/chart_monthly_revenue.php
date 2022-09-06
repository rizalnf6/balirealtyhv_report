<canvas id="monthlyrevenue" width="500px"></canvas>
<script>
var canvas = document.getElementById("monthlyrevenue");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 13;

var data = {
  labels: [<?php
              $i = 1;
        $month = strtotime('2018-01-01');
        while($i <= 12)
        {
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
          while($i <= 12)
          {
              $chart_monthly_revenue2017 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $chart_monthly_revenue2017->result();
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
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
     data: [<?php
                $i = 1;
          while($i <= 12)
          {
              $chart_monthly_revenue2018 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $chart_monthly_revenue2018->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
      spanGaps: false,
    }, {
      label: "2019",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#3c763d", // The main line color
      borderCapStyle: 'square',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
     data: [<?php
                $i = 1;
          while($i <= 12)
          {
              $chart_monthly_revenue2019 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $chart_monthly_revenue2019->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
      spanGaps: false,
    }, {
      label: "2020",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#800080", // The main line color
      borderCapStyle: 'square',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
     data: [<?php
                $i = 1;
          while($i <= 12)
          {
              $chart_monthly_revenue2020 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $chart_monthly_revenue2020->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
      spanGaps: false,
    }, {
      label: "2021",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#8a6d3b", // The main line color
      borderCapStyle: 'square',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "green",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
     data: [<?php
                $i = 1;
          while($i <= 12)
          {
              $chart_monthly_revenue2021 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $chart_monthly_revenue2021->result();
                echo '"' .number_format($result['0']->revenue, 2, '.', ''). '",';   
                $i++;
          }       
                  ?>],
      spanGaps: false,
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
            $max = 0;
            while($i <= 12) {
              $table_daily_revenue2017 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $table_daily_revenue2017->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 12) {
                $max_table_daily_revenue2017 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $maxresult = $max_table_daily_revenue2017->result();

                if ($maxresult == $max) {
                  echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">'.number_format($maxresult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxresult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $total_daily_revenue2017 = $this->db->query("SELECT SUM(revenue_nett) AS totalrevenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $totalrevenue = $total_daily_revenue2017->result();
                echo '<td>' .number_format($totalrevenue['0']->totalrevenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2018</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_daily_revenue2018 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $table_daily_revenue2018->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 12) {
                $max_table_daily_revenue2018 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $maxresult = $max_table_daily_revenue2018->result();

                if ($maxresult == $max) {
                  echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">'.number_format($maxresult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxresult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $total_daily_revenue2018 = $this->db->query("SELECT SUM(revenue_nett) AS totalrevenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $totalrevenue = $total_daily_revenue2018->result();
                echo '<td>' .number_format($totalrevenue['0']->totalrevenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2019</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_daily_revenue2019 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $table_daily_revenue2019->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 12) {
                $max_table_daily_revenue2019 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $maxresult = $max_table_daily_revenue2019->result();

                if ($maxresult == $max) {
                  echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">'.number_format($maxresult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxresult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $total_daily_revenue2019 = $this->db->query("SELECT SUM(revenue_nett) AS totalrevenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $totalrevenue = $total_daily_revenue2019->result();
                echo '<td>' .number_format($totalrevenue['0']->totalrevenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2020</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_daily_revenue2020 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $table_daily_revenue2020->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 12) {
                $max_table_daily_revenue2020 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $maxresult = $max_table_daily_revenue2020->result();

                if ($maxresult == $max) {
                  echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">'.number_format($maxresult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxresult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $total_daily_revenue2020 = $this->db->query("SELECT SUM(revenue_nett) AS totalrevenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $totalrevenue = $total_daily_revenue2020->result();
                echo '<td>' .number_format($totalrevenue['0']->totalrevenue). '</td>';          
            ?>
        </tr>
        <tr>
          <td>2021</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_daily_revenue2021 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $result = $table_daily_revenue2021->result();

                if ($result > $max) {
                  $max = $result;
                }    
            $i++;
            }       

            $i = 1;
              while($i <= 12) {
                $max_table_daily_revenue2021 = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $maxresult = $max_table_daily_revenue2021->result();

                if ($maxresult == $max) {
                  echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">'.number_format($maxresult['0']->revenue).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxresult['0']->revenue).'</td>'; 
                }
              $i++;
              }       
            ?>

            <?php
              $total_daily_revenue2021 = $this->db->query("SELECT SUM(revenue_nett) AS totalrevenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE user.name='$session_login'
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
                $totalrevenue = $total_daily_revenue2021->result();
                echo '<td>' .number_format($totalrevenue['0']->totalrevenue). '</td>';          
            ?>
        </tr>
      </tbody>
  </table>
</div>