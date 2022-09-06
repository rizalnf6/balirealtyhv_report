<!-- Set filter date default-->
<?php
    if (empty($source)) {
      $source = "";
    }
?>

<canvas id="agentBooking" width="500px"></canvas>
<script>
var canvas = document.getElementById("agentBooking");
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

                  $chart_agent_booking2017 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2017' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

                echo '"' . $chart_agent_booking2017->num_rows(). '",';       
                $i++;
              }       
              ?>],
      spanGaps: false,
      },{
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
              while($i <= 12) {

                  $chart_agent_booking2018 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2018' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

                echo '"' . $chart_agent_booking2018->num_rows(). '",';       
                $i++;
              }       
              ?>],
      spanGaps: false,
      },{
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
              while($i <= 12) {

                  $chart_agent_booking2019 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2019' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

                echo '"' . $chart_agent_booking2019->num_rows(). '",';       
                $i++;
              }       
              ?>],
      spanGaps: false,
      },{
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
              while($i <= 12) {

                  $chart_agent_booking2020 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2020' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

                echo '"' . $chart_agent_booking2020->num_rows(). '",';       
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
              while($i <= 12) {

                  $chart_agent_booking2021 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2021' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

                echo '"' . $chart_agent_booking2021->num_rows(). '",';       
                $i++;
              }       
              ?>],
      spanGaps: false,
      }, {
      label: "2022",
      fill: true,
      lineTension: 0.3,
      backgroundColor: "rgba(255, 234, 0, 0.1)",
      borderColor: "#a94442", // The main line color
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
              while($i <= 12) {

                  $chart_agent_booking2022 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2022' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

                echo '"' . $chart_agent_booking2022->num_rows(). '",';       
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
    <caption class="table-caption"><?php echo $source; ?></caption>
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

                  $table_agent_booking2017 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2017' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm')  
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_agent_booking2017->num_rows() > $max) {
                $max = $table_agent_booking2017->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {

                  $max_table_agent_booking2017 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2017' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_agent_booking2017->num_rows() == $max) {
                echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">' . $max_table_agent_booking2017->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_agent_booking2017->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
                
                  $total_agent_booking2017 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE YEAR(balirealtyhv.confirm_date)='2017' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm')  
                  AND balirealtyhv.balirealtyhv_status='1'");

              echo '<td>' . $total_agent_booking2017->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2018</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {

                  $table_agent_booking2018 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2018' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm')  
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_agent_booking2018->num_rows() > $max) {
                $max = $table_agent_booking2018->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {

                  $max_table_agent_booking2018 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2018' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm')  
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_agent_booking2018->num_rows() == $max) {
                echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">' . $max_table_agent_booking2018->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_agent_booking2018->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php
                
                  $total_agent_booking2018 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE YEAR(balirealtyhv.confirm_date)='2018' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              echo '<td>' . $total_agent_booking2018->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2019</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {

                  $table_agent_booking2019 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2019' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_agent_booking2019->num_rows() > $max) {
                $max = $table_agent_booking2019->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {

                  $max_table_agent_booking2019 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2019' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_agent_booking2019->num_rows() == $max) {
                echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">' . $max_table_agent_booking2019->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_agent_booking2019->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php

                  $total_agent_booking2019 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE YEAR(balirealtyhv.confirm_date)='2019' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              echo '<td>' . $total_agent_booking2019->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2020</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {

                  $table_agent_booking2020 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2020' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_agent_booking2020->num_rows() > $max) {
                $max = $table_agent_booking2020->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {

                  $max_table_agent_booking2020 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2020' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_agent_booking2020->num_rows() == $max) {
                echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">' . $max_table_agent_booking2020->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_agent_booking2020->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php

                  $total_agent_booking2020 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE YEAR(balirealtyhv.confirm_date)='2020' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              echo '<td>' . $total_agent_booking2020->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2021</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {

                  $table_agent_booking2021 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2021' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_agent_booking2021->num_rows() > $max) {
                $max = $table_agent_booking2021->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {

                  $max_table_agent_booking2021 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2021' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_agent_booking2021->num_rows() == $max) {
                echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">' . $max_table_agent_booking2021->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_agent_booking2021->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php

                  $total_agent_booking2021 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE YEAR(balirealtyhv.confirm_date)='2021' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              echo '<td>' . $total_agent_booking2021->num_rows(). '</td>';          
          ?>
        </tr>
        <tr>
          <td>2022</td>
          
          <?php
            $i = 1;
            $max = 0;
            while($i <= 12) {

                  $table_agent_booking2022 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2022' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($table_agent_booking2022->num_rows() > $max) {
                $max = $table_agent_booking2022->num_rows();
              }
            $i++;
            }

            $i = 1;
            while($i <= 12) {

                  $max_table_agent_booking2022 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE MONTH(balirealtyhv.confirm_date)=$i 
                  AND YEAR(balirealtyhv.confirm_date)='2022' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              if ($max_table_agent_booking2022->num_rows() == $max) {
                echo '<td style="background-color: rgba(169, 68, 66, 0.5); color: #fff;">' . $max_table_agent_booking2022->num_rows(). '</td>'; 
              } else {
                echo '<td>' . $max_table_agent_booking2022->num_rows(). '</td>'; 
              }
            $i++;
            }       
          ?>

          <?php

                  $total_agent_booking2022 = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id=balirealtyhv.source_id 
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                  WHERE YEAR(balirealtyhv.confirm_date)='2022' 
                  AND source.source='$source' 
                  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
                  AND balirealtyhv.balirealtyhv_status='1'");

              echo '<td>' . $total_agent_booking2022->num_rows(). '</td>';          
          ?>
        </tr>
      </tbody>
  </table>
</div>