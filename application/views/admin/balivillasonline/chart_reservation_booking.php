<!-- Set filter date default-->
<?php
    if (empty($reservation)) {
      $reservation = "";
    }
?>

<canvas id="reservationBooking" width="500px"></canvas>
<script>
var canvas = document.getElementById("reservationBooking");
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
              $chartBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
                                echo '"' . $chartBooking->num_rows(). '",';       
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
      borderCapStyle: 'butt',
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
              $chartBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND  MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
                                echo '"' . $chartBooking->num_rows(). '",';       
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
      borderCapStyle: 'butt',
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
              $chartBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND  MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
                                echo '"' . $chartBooking->num_rows(). '",';       
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
      borderCapStyle: 'butt',
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
              $chartBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND  MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
                                echo '"' . $chartBooking->num_rows(). '",';       
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
                     labelString: 'Booking',
                     fontSize: 13,
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
  <table class="table table-bordered table-ahr">
    <caption></caption>
      <thead>
        <tr>
          <th>Booking</th>
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
              $tableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($tableBooking->num_rows() > $max) {
                $max = $tableBooking->num_rows();
              }     
              $i++;
            }

            $i = 1;
            while($i <= 12) {
              $maxTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($maxTableBooking->num_rows() == $max) {
                echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">' . $maxTableBooking->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $maxTableBooking->num_rows(). '</td>'; 
              }   
              $i++;
            }       
          ?>

          <?php
              $totalTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation'  
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              echo '<td>' . $totalTableBooking->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2018</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $tableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($tableBooking->num_rows() > $max) {
                $max = $tableBooking->num_rows();
              }     
              $i++;
            }

            $i = 1;
            while($i <= 12) {
              $maxTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($maxTableBooking->num_rows() == $max) {
                echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">' . $maxTableBooking->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $maxTableBooking->num_rows(). '</td>'; 
              }   
              $i++;
            }       
          ?>

          <?php
              $totalTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation'  
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              echo '<td>' . $totalTableBooking->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2019</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $tableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($tableBooking->num_rows() > $max) {
                $max = $tableBooking->num_rows();
              }     
              $i++;
            }

            $i = 1;
            while($i <= 12) {
              $maxTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($maxTableBooking->num_rows() == $max) {
                echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">' . $maxTableBooking->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $maxTableBooking->num_rows(). '</td>'; 
              }   
              $i++;
            }       
          ?>

          <?php
              $totalTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation'  
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              echo '<td>' . $totalTableBooking->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2020</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $tableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($tableBooking->num_rows() > $max) {
                $max = $tableBooking->num_rows();
              }     
              $i++;
            }

            $i = 1;
            while($i <= 12) {
              $maxTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              
              if ($maxTableBooking->num_rows() == $max) {
                echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">' . $maxTableBooking->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $maxTableBooking->num_rows(). '</td>'; 
              }   
              $i++;
            }       
          ?>

          <?php
              $totalTableBooking = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation'  
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");
              echo '<td>' . $totalTableBooking->num_rows(). '</td>';          
          ?>
        </tr>
      </tbody>
  </table>
</div>