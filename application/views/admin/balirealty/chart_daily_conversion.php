<!-- Set filter date default-->
<?php
    if (empty($month)) {
      $month = date('m');
    }
    if (empty($year)) {
      $year = date('Y');
    }
?>

<canvas id="dailyconversion" width="400px"></canvas>
<script>
var canvas = document.getElementById("dailyconversion");
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
              $chart_daily_enquiry_conversion2017 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2017' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chart_daily_booking_conversion2017 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.confirm_date)=$i 
                AND MONTH(balirealtyhv.confirm_date)=$month 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              if ($chart_daily_enquiry_conversion2017->num_rows()=="0" OR $chart_daily_booking_conversion2017->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2017 = (($chart_daily_booking_conversion2017->num_rows()/$chart_daily_enquiry_conversion2017->num_rows())*100);
                echo '"' . number_format($chart_conversion2017). '",';       
              }
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
              $chart_daily_enquiry_conversion2018 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2018' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chart_daily_booking_conversion2018 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.confirm_date)=$i 
                AND MONTH(balirealtyhv.confirm_date)=$month 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");
              
              if ($chart_daily_enquiry_conversion2018->num_rows()=="0" OR $chart_daily_booking_conversion2018->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2018 = (($chart_daily_booking_conversion2018->num_rows()/$chart_daily_enquiry_conversion2018->num_rows())*100);
                echo '"' . number_format($chart_conversion2018). '",';       
              }
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
      pointBackgroundColor: "#e84c3d",
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
              $chart_daily_enquiry_conversion2019 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2019' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chart_daily_booking_conversion2019 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.confirm_date)=$i 
                AND MONTH(balirealtyhv.confirm_date)=$month 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              if ($chart_daily_enquiry_conversion2019->num_rows()=="0" OR $chart_daily_booking_conversion2019->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2019 = (($chart_daily_booking_conversion2019->num_rows()/$chart_daily_enquiry_conversion2019->num_rows())*100);
                echo '"' . number_format($chart_conversion2019). '",';       
              }
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
      pointBackgroundColor: "#e84c3d",
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
              $chart_daily_enquiry_conversion2020 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2020' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chart_daily_booking_conversion2020 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.confirm_date)=$i 
                AND MONTH(balirealtyhv.confirm_date)=$month 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              if ($chart_daily_enquiry_conversion2020->num_rows()=="0" OR $chart_daily_booking_conversion2020->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2020 = (($chart_daily_booking_conversion2020->num_rows()/$chart_daily_enquiry_conversion2020->num_rows())*100);
                echo '"' . number_format($chart_conversion2020). '",';       
              }
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
      pointBackgroundColor: "#e84c3d",
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
              $chart_daily_enquiry_conversion2021 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2021' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chart_daily_booking_conversion2021 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.confirm_date)=$i 
                AND MONTH(balirealtyhv.confirm_date)=$month 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              if ($chart_daily_enquiry_conversion2021->num_rows()=="0" OR $chart_daily_booking_conversion2021->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2021 = (($chart_daily_booking_conversion2021->num_rows()/$chart_daily_enquiry_conversion2021->num_rows())*100);
                echo '"' . number_format($chart_conversion2021). '",';       
              }
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
      pointBackgroundColor: "#e84c3d",
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
              $chart_daily_enquiry_conversion2022 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.enquiry_date)=$i 
                AND MONTH(balirealtyhv.enquiry_date)=$month 
                AND YEAR(balirealtyhv.enquiry_date)='2022' 
                AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chart_daily_booking_conversion2022 = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE DAY(balirealtyhv.confirm_date)=$i 
                AND MONTH(balirealtyhv.confirm_date)=$month 
                AND YEAR(balirealtyhv.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                AND balirealtyhv.balirealtyhv_status='1'");

              if ($chart_daily_enquiry_conversion2022->num_rows()=="0" OR $chart_daily_booking_conversion2022->num_rows()=="0") {
                echo '"0",';
              } else {
                $chart_conversion2022 = (($chart_daily_booking_conversion2022->num_rows()/$chart_daily_enquiry_conversion2022->num_rows())*100);
                echo '"' . number_format($chart_conversion2022). '",';       
              }
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
  <table class="table table-bordered table-brhv">
    <caption class="table-caption"><?php echo "Conversion of ".date("F", mktime(0, 0, 0, $month, 10)); ?></caption>
      <thead>
        <tr>
          <th>Conversion</th>
          <?php
            $i = 1;
            while($i <= 31) {
                echo '<th>'.$i.'</th>';
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
            while($i <= 31) {
              $table_daily_enquiry_conversion2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2017' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $table_daily_booking_conversion2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2017' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry_conversion2017->num_rows()=="0" OR $table_daily_booking_conversion2017->num_rows()=="0") {
                $table_daily_conversion2017 = "0";
              } else {
                $table_daily_conversion2017 = (($table_daily_booking_conversion2017->num_rows()/$table_daily_enquiry_conversion2017->num_rows())*100);     
              }           

              if ($table_daily_conversion2017 > $max) {
                $max = $table_daily_conversion2017;
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry_conversion2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2017' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $max_table_daily_booking_conversion2017 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2017' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry_conversion2017->num_rows()=="0" OR $max_table_daily_booking_conversion2017->num_rows()=="0") {
                $max_table_daily_conversion2017 = "0";
              } else {
                $max_table_daily_conversion2017 = (($max_table_daily_booking_conversion2017->num_rows()/$max_table_daily_enquiry_conversion2017->num_rows())*100);     
              }    

              if ($max_table_daily_conversion2017 == $max) {
                echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #000;">' .number_format($max_table_daily_conversion2017). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_daily_conversion2017). '%</td>'; 
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
            while($i <= 31) {
              $table_daily_enquiry_conversion2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2018' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $table_daily_booking_conversion2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2018' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry_conversion2018->num_rows()=="0" OR $table_daily_booking_conversion2018->num_rows()=="0") {
                $table_daily_conversion2018 = "0";
              } else {
                $table_daily_conversion2018 = (($table_daily_booking_conversion2018->num_rows()/$table_daily_enquiry_conversion2018->num_rows())*100);     
              }           

              if ($table_daily_conversion2018 > $max) {
                $max = $table_daily_conversion2018;
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry_conversion2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2018' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $max_table_daily_booking_conversion2018 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2018' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry_conversion2018->num_rows()=="0" OR $max_table_daily_booking_conversion2018->num_rows()=="0") {
                $max_table_daily_conversion2018 = "0";
              } else {
                $max_table_daily_conversion2018 = (($max_table_daily_booking_conversion2018->num_rows()/$max_table_daily_enquiry_conversion2018->num_rows())*100);     
              }    

              if ($max_table_daily_conversion2018 == $max) {
                echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">' .number_format($max_table_daily_conversion2018). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_daily_conversion2018). '%</td>'; 
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
            while($i <= 31) {
              $table_daily_enquiry_conversion2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2019' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $table_daily_booking_conversion2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2019' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry_conversion2019->num_rows()=="0" OR $table_daily_booking_conversion2019->num_rows()=="0") {
                $table_daily_conversion2019 = "0";
              } else {
                $table_daily_conversion2019 = (($table_daily_booking_conversion2019->num_rows()/$table_daily_enquiry_conversion2019->num_rows())*100);     
              }           

              if ($table_daily_conversion2019 > $max) {
                $max = $table_daily_conversion2019;
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry_conversion2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2019' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $max_table_daily_booking_conversion2019 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2019' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry_conversion2019->num_rows()=="0" OR $max_table_daily_booking_conversion2019->num_rows()=="0") {
                $max_table_daily_conversion2019 = "0";
              } else {
                $max_table_daily_conversion2019 = (($max_table_daily_booking_conversion2019->num_rows()/$max_table_daily_enquiry_conversion2019->num_rows())*100);     
              }    

              if ($max_table_daily_conversion2019 == $max) {
                echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">' .number_format($max_table_daily_conversion2019). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_daily_conversion2019). '%</td>'; 
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
            while($i <= 31) {
              $table_daily_enquiry_conversion2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2020' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $table_daily_booking_conversion2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2020' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry_conversion2020->num_rows()=="0" OR $table_daily_booking_conversion2020->num_rows()=="0") {
                $table_daily_conversion2020 = "0";
              } else {
                $table_daily_conversion2020 = (($table_daily_booking_conversion2020->num_rows()/$table_daily_enquiry_conversion2020->num_rows())*100);     
              }           

              if ($table_daily_conversion2020 > $max) {
                $max = $table_daily_conversion2020;
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry_conversion2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2020' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $max_table_daily_booking_conversion2020 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2020' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry_conversion2020->num_rows()=="0" OR $max_table_daily_booking_conversion2020->num_rows()=="0") {
                $max_table_daily_conversion2020 = "0";
              } else {
                $max_table_daily_conversion2020 = (($max_table_daily_booking_conversion2020->num_rows()/$max_table_daily_enquiry_conversion2020->num_rows())*100);     
              }    

              if ($max_table_daily_conversion2020 == $max) {
                echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">' .number_format($max_table_daily_conversion2020). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_daily_conversion2020). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>
        <tr>
          <td>2021</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry_conversion2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2021' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $table_daily_booking_conversion2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2021' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry_conversion2021->num_rows()=="0" OR $table_daily_booking_conversion2021->num_rows()=="0") {
                $table_daily_conversion2021 = "0";
              } else {
                $table_daily_conversion2021 = (($table_daily_booking_conversion2021->num_rows()/$table_daily_enquiry_conversion2021->num_rows())*100);     
              }           

              if ($table_daily_conversion2021 > $max) {
                $max = $table_daily_conversion2021;
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry_conversion2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2021' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $max_table_daily_booking_conversion2021 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2021' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry_conversion2021->num_rows()=="0" OR $max_table_daily_booking_conversion2021->num_rows()=="0") {
                $max_table_daily_conversion2021 = "0";
              } else {
                $max_table_daily_conversion2021 = (($max_table_daily_booking_conversion2021->num_rows()/$max_table_daily_enquiry_conversion2021->num_rows())*100);     
              }    

              if ($max_table_daily_conversion2021 == $max) {
                echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">' .number_format($max_table_daily_conversion2021). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_daily_conversion2021). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>
        <tr>
          <td>2022</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 31) {
              $table_daily_enquiry_conversion2022 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2022' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $table_daily_booking_conversion2022 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2022' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_daily_enquiry_conversion2022->num_rows()=="0" OR $table_daily_booking_conversion2022->num_rows()=="0") {
                $table_daily_conversion2022 = "0";
              } else {
                $table_daily_conversion2022 = (($table_daily_booking_conversion2022->num_rows()/$table_daily_enquiry_conversion2022->num_rows())*100);     
              }           

              if ($table_daily_conversion2022 > $max) {
                $max = $table_daily_conversion2022;
              }
            $i++;
            }

            $i = 1;
            while($i <= 31) {
              $max_table_daily_enquiry_conversion2022 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.enquiry_date)=$i 
              AND MONTH(balirealtyhv.enquiry_date)=$month 
              AND YEAR(balirealtyhv.enquiry_date)='2022' 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND balirealtyhv.balirealtyhv_status='1'");
              $max_table_daily_booking_conversion2022 = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE DAY(balirealtyhv.confirm_date)=$i 
              AND MONTH(balirealtyhv.confirm_date)=$month 
              AND YEAR(balirealtyhv.confirm_date)='2022' 
              AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_daily_enquiry_conversion2022->num_rows()=="0" OR $max_table_daily_booking_conversion2022->num_rows()=="0") {
                $max_table_daily_conversion2022 = "0";
              } else {
                $max_table_daily_conversion2022 = (($max_table_daily_booking_conversion2022->num_rows()/$max_table_daily_enquiry_conversion2022->num_rows())*100);     
              }    

              if ($max_table_daily_conversion2022 == $max) {
                echo '<td style="background-color: rgba(169, 68, 66, 0.5); color: #fff;">' .number_format($max_table_daily_conversion2022). '%</td>'; 
              } else {
                echo '<td>' .number_format($max_table_daily_conversion2022). '%</td>'; 
              }
            $i++;
            }       
          ?>
        </tr>
      </tbody>
  </table>
</div>