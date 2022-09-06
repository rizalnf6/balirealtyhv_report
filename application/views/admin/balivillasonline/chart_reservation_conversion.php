<!-- Set filter date default-->
<?php
    if (empty($reservation)) {
      $reservation = "";
    }
?>

<canvas id="monthlyconversion" width="500px"></canvas>
<script>
var canvas = document.getElementById("monthlyconversion");
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
					    $chart_monthly_enquiry_conversion2017 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $chart_monthly_booking_conversion2017 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($chart_monthly_enquiry_conversion2017->num_rows()=="0" OR $chart_monthly_booking_conversion2017->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2017 = (($chart_monthly_booking_conversion2017->num_rows()/$chart_monthly_enquiry_conversion2017->num_rows())*100);
                echo '"' . number_format($chart_conversion2017). '",';       
              }     
                  $i++;
					}?>],
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
          while($i <= 12) {
              $chart_monthly_enquiry_conversion2018 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $chart_monthly_booking_conversion2018 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($chart_monthly_enquiry_conversion2018->num_rows()=="0" OR $chart_monthly_booking_conversion2018->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2018 = (($chart_monthly_booking_conversion2018->num_rows()/$chart_monthly_enquiry_conversion2018->num_rows())*100);
                echo '"' . number_format($chart_conversion2018). '",';       
              }     
                  $i++;
          }?>],
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
          while($i <= 12) {
              $chart_monthly_enquiry_conversion2019 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $chart_monthly_booking_conversion2019 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($chart_monthly_enquiry_conversion2019->num_rows()=="0" OR $chart_monthly_booking_conversion2019->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2019 = (($chart_monthly_booking_conversion2019->num_rows()/$chart_monthly_enquiry_conversion2019->num_rows())*100);
                echo '"' . number_format($chart_conversion2019). '",';       
              }     
                  $i++;
          }?>],
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
          while($i <= 12) {
              $chart_monthly_enquiry_conversion2020 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2020' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $chart_monthly_booking_conversion2020 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($chart_monthly_enquiry_conversion2020->num_rows()=="0" OR $chart_monthly_booking_conversion2020->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2020 = (($chart_monthly_booking_conversion2020->num_rows()/$chart_monthly_enquiry_conversion2020->num_rows())*100);
                echo '"' . number_format($chart_conversion2020). '",';       
              }     
                  $i++;
          }?>],
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
                     labelString: 'Conversion',
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
  <table class="table table-bordered table-ahr">
    <caption>Conversion</caption>
      <thead>
        <tr>
          <th>Conversion</th>
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
        <tr>
      </thead>
      <tbody>
        <tr>
          <td>2017</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_monthly_enquiry_conversion2017 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $table_monthly_booking_conversion2017 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($table_monthly_enquiry_conversion2017->num_rows()=="0" OR $table_monthly_booking_conversion2017->num_rows()=="0") {
                $table_monthly_conversion2017 = "0";
              } else {
                $table_monthly_conversion2017 = (($table_monthly_booking_conversion2017->num_rows()/$table_monthly_enquiry_conversion2017->num_rows())*100);     
              }           

              if ($table_monthly_conversion2017 > $max) {
                $max = $table_monthly_conversion2017;
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {
              $max_table_monthly_enquiry_conversion2017 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $max_table_monthly_booking_conversion2017 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($max_table_monthly_enquiry_conversion2017->num_rows()=="0" OR $max_table_monthly_booking_conversion2017->num_rows()=="0") {
                $max_table_monthly_conversion2017 = "0";
              } else {
                $max_table_monthly_conversion2017 = (($max_table_monthly_booking_conversion2017->num_rows()/$max_table_monthly_enquiry_conversion2017->num_rows())*100);     
              }    

              if ($max_table_monthly_conversion2017 == $max) {
                echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #000;">' .number_format($max_table_monthly_conversion2017). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_monthly_conversion2017). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>

        <tr>
          <td>2018</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_monthly_enquiry_conversion2018 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $table_monthly_booking_conversion2018 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($table_monthly_enquiry_conversion2018->num_rows()=="0" OR $table_monthly_booking_conversion2018->num_rows()=="0") {
                $table_monthly_conversion2018 = "0";
              } else {
                $table_monthly_conversion2018 = (($table_monthly_booking_conversion2018->num_rows()/$table_monthly_enquiry_conversion2018->num_rows())*100);     
              }           

              if ($table_monthly_conversion2018 > $max) {
                $max = $table_monthly_conversion2018;
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {
              $max_table_monthly_enquiry_conversion2018 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $max_table_monthly_booking_conversion2018 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($max_table_monthly_enquiry_conversion2018->num_rows()=="0" OR $max_table_monthly_booking_conversion2018->num_rows()=="0") {
                $max_table_monthly_conversion2018 = "0";
              } else {
                $max_table_monthly_conversion2018 = (($max_table_monthly_booking_conversion2018->num_rows()/$max_table_monthly_enquiry_conversion2018->num_rows())*100);     
              }    

              if ($max_table_monthly_conversion2018 == $max) {
                echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">' .number_format($max_table_monthly_conversion2018). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_monthly_conversion2018). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>

        <tr>
          <td>2019</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_monthly_enquiry_conversion2019 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $table_monthly_booking_conversion2019 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($table_monthly_enquiry_conversion2019->num_rows()=="0" OR $table_monthly_booking_conversion2019->num_rows()=="0") {
                $table_monthly_conversion2019 = "0";
              } else {
                $table_monthly_conversion2019 = (($table_monthly_booking_conversion2019->num_rows()/$table_monthly_enquiry_conversion2019->num_rows())*100);     
              }           

              if ($table_monthly_conversion2019 > $max) {
                $max = $table_monthly_conversion2019;
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {
              $max_table_monthly_enquiry_conversion2019 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $max_table_monthly_booking_conversion2019 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($max_table_monthly_enquiry_conversion2019->num_rows()=="0" OR $max_table_monthly_booking_conversion2019->num_rows()=="0") {
                $max_table_monthly_conversion2019 = "0";
              } else {
                $max_table_monthly_conversion2019 = (($max_table_monthly_booking_conversion2019->num_rows()/$max_table_monthly_enquiry_conversion2019->num_rows())*100);     
              }    

              if ($max_table_monthly_conversion2019 == $max) {
                echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">' .number_format($max_table_monthly_conversion2019). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_monthly_conversion2019). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>

        <tr>
          <td>2020</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              $table_monthly_enquiry_conversion2020 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2020' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $table_monthly_booking_conversion2020 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($table_monthly_enquiry_conversion2020->num_rows()=="0" OR $table_monthly_booking_conversion2020->num_rows()=="0") {
                $table_monthly_conversion2020 = "0";
              } else {
                $table_monthly_conversion2020 = (($table_monthly_booking_conversion2020->num_rows()/$table_monthly_enquiry_conversion2020->num_rows())*100);     
              }           

              if ($table_monthly_conversion2020 > $max) {
                $max = $table_monthly_conversion2020;
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {
              $max_table_monthly_enquiry_conversion2020 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.enquiry_date)=$i 
                AND YEAR(balivillasonline.enquiry_date)='2020' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");
              $max_table_monthly_booking_conversion2020 = $this->db->query("SELECT * FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE user.name='$reservation' 
                AND MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balivillasonline.balivillasonline_status='1'");

              if ($max_table_monthly_enquiry_conversion2020->num_rows()=="0" OR $max_table_monthly_booking_conversion2020->num_rows()=="0") {
                $max_table_monthly_conversion2020 = "0";
              } else {
                $max_table_monthly_conversion2020 = (($max_table_monthly_booking_conversion2020->num_rows()/$max_table_monthly_enquiry_conversion2020->num_rows())*100);     
              }    

              if ($max_table_monthly_conversion2020 == $max) {
                echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">' .number_format($max_table_monthly_conversion2020). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_monthly_conversion2020). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>
        
      </tbody>
  </table>
</div>
