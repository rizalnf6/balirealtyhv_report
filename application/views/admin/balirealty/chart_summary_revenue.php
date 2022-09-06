<canvas id="summaryRevenue" width="500px"></canvas>
<script>
var canvas = document.getElementById("summaryRevenue");
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
              $chartRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chartRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $chartRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartResultBrhv  = $chartRevenueBrhv->result();
              $chartResultBve   = $chartRevenueBve->result();
              $chartResultBvo   = $chartRevenueBvo->result();

              $chartResult = ($chartResultBrhv['0']->revenue + $chartResultBve['0']->revenue + $chartResultBvo['0']->revenue);

                  echo '"'.$chartResult.'",';       
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
              $chartRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chartRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $chartRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartResultBrhv  = $chartRevenueBrhv->result();
              $chartResultBve   = $chartRevenueBve->result();
              $chartResultBvo   = $chartRevenueBvo->result();

              $chartResult = ($chartResultBrhv['0']->revenue + $chartResultBve['0']->revenue + $chartResultBvo['0']->revenue);

                  echo '"'.$chartResult.'",';       
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
              $chartRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chartRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $chartRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartResultBrhv  = $chartRevenueBrhv->result();
              $chartResultBve   = $chartRevenueBve->result();
              $chartResultBvo   = $chartRevenueBvo->result();

              $chartResult = ($chartResultBrhv['0']->revenue + $chartResultBve['0']->revenue + $chartResultBvo['0']->revenue);

                  echo '"'.$chartResult.'",';       
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
              $chartRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chartRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $chartRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartResultBrhv  = $chartRevenueBrhv->result();
              $chartResultBve   = $chartRevenueBve->result();
              $chartResultBvo   = $chartRevenueBvo->result();

              $chartResult = ($chartResultBrhv['0']->revenue + $chartResultBve['0']->revenue + $chartResultBvo['0']->revenue);

                  echo '"'.$chartResult.'",';       
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
              $chartRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chartRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $chartRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartResultBrhv  = $chartRevenueBrhv->result();
              $chartResultBve   = $chartRevenueBve->result();
              $chartResultBvo   = $chartRevenueBvo->result();

              $chartResult = ($chartResultBrhv['0']->revenue + $chartResultBve['0']->revenue + $chartResultBvo['0']->revenue);

                  echo '"'.$chartResult.'",';       
                  $i++;
          }?>],
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
              $chartRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $chartRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $chartRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $chartResultBrhv  = $chartRevenueBrhv->result();
              $chartResultBve   = $chartRevenueBve->result();
              $chartResultBvo   = $chartRevenueBvo->result();

              $chartResult = ($chartResultBrhv['0']->revenue + $chartResultBve['0']->revenue + $chartResultBvo['0']->revenue);

                  echo '"'.$chartResult.'",';       
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
    <caption class="table-caption">The revenue is quoted in US Dollar</caption>
      <thead>
        <tr>
          <th>Revenue</th>
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
              $tableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResultBrhv  = $tableRevenueBrhv->result();
              $tableResultBve   = $tableRevenueBve->result();
              $tableResultBvo   = $tableRevenueBvo->result();

              $tableResult = ($tableResultBrhv['0']->revenue + $tableResultBve['0']->revenue + $tableResultBvo['0']->revenue);
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTableResultBrhv  = $maxTableRevenueBrhv->result();
              $maxTableResultBve   = $maxTableRevenueBve->result();
              $maxTableResultBvo   = $maxTableRevenueBvo->result();

              $maxTable = ($maxTableResultBrhv['0']->revenue + $maxTableResultBve['0']->revenue + $maxTableResultBvo['0']->revenue);
                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(16, 102, 162, 0.5); color: #fff;">'.number_format($maxTable).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxTable).'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.confirm_date)='2017' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTableResultBrhv  = $totalTableRevenueBrhv->result();
              $totalTableResultBve   = $totalTableRevenueBve->result();
              $totalTableResultBvo   = $totalTableRevenueBvo->result();

              $totalTable = ($totalTableResultBrhv['0']->revenue + $totalTableResultBve['0']->revenue + $totalTableResultBvo['0']->revenue);
 
                echo '<td>'.number_format($totalTable).'</td>';     
          ?>
          
        </tr>
        <tr>
          <td>2018</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResultBrhv  = $tableRevenueBrhv->result();
              $tableResultBve   = $tableRevenueBve->result();
              $tableResultBvo   = $tableRevenueBvo->result();

              $tableResult = ($tableResultBrhv['0']->revenue + $tableResultBve['0']->revenue + $tableResultBvo['0']->revenue);
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTableResultBrhv  = $maxTableRevenueBrhv->result();
              $maxTableResultBve   = $maxTableRevenueBve->result();
              $maxTableResultBvo   = $maxTableRevenueBvo->result();

              $maxTable = ($maxTableResultBrhv['0']->revenue + $maxTableResultBve['0']->revenue + $maxTableResultBvo['0']->revenue);
                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(232, 76, 61, 0.5); color: #000;">'.number_format($maxTable).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxTable).'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.confirm_date)='2018' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTableResultBrhv  = $totalTableRevenueBrhv->result();
              $totalTableResultBve   = $totalTableRevenueBve->result();
              $totalTableResultBvo   = $totalTableRevenueBvo->result();

              $totalTable = ($totalTableResultBrhv['0']->revenue + $totalTableResultBve['0']->revenue + $totalTableResultBvo['0']->revenue);
 
                echo '<td>'.number_format($totalTable).'</td>';     
          ?>
          
        </tr>
        <tr>
          <td>2019</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResultBrhv  = $tableRevenueBrhv->result();
              $tableResultBve   = $tableRevenueBve->result();
              $tableResultBvo   = $tableRevenueBvo->result();

              $tableResult = ($tableResultBrhv['0']->revenue + $tableResultBve['0']->revenue + $tableResultBvo['0']->revenue);
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTableResultBrhv  = $maxTableRevenueBrhv->result();
              $maxTableResultBve   = $maxTableRevenueBve->result();
              $maxTableResultBvo   = $maxTableRevenueBvo->result();

              $maxTable = ($maxTableResultBrhv['0']->revenue + $maxTableResultBve['0']->revenue + $maxTableResultBvo['0']->revenue);
                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(60, 118, 61, 0.5); color: #fff;">'.number_format($maxTable).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxTable).'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.confirm_date)='2019' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTableResultBrhv  = $totalTableRevenueBrhv->result();
              $totalTableResultBve   = $totalTableRevenueBve->result();
              $totalTableResultBvo   = $totalTableRevenueBvo->result();

              $totalTable = ($totalTableResultBrhv['0']->revenue + $totalTableResultBve['0']->revenue + $totalTableResultBvo['0']->revenue);
 
                echo '<td>'.number_format($totalTable).'</td>';     
          ?>
          
        </tr>
        <tr>
          <td>2020</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResultBrhv  = $tableRevenueBrhv->result();
              $tableResultBve   = $tableRevenueBve->result();
              $tableResultBvo   = $tableRevenueBvo->result();

              $tableResult = ($tableResultBrhv['0']->revenue + $tableResultBve['0']->revenue + $tableResultBvo['0']->revenue);
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTableResultBrhv  = $maxTableRevenueBrhv->result();
              $maxTableResultBve   = $maxTableRevenueBve->result();
              $maxTableResultBvo   = $maxTableRevenueBvo->result();

              $maxTable = ($maxTableResultBrhv['0']->revenue + $maxTableResultBve['0']->revenue + $maxTableResultBvo['0']->revenue);
                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(128, 0, 128, 0.5); color: #fff;">'.number_format($maxTable).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxTable).'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.confirm_date)='2020' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTableResultBrhv  = $totalTableRevenueBrhv->result();
              $totalTableResultBve   = $totalTableRevenueBve->result();
              $totalTableResultBvo   = $totalTableRevenueBvo->result();

              $totalTable = ($totalTableResultBrhv['0']->revenue + $totalTableResultBve['0']->revenue + $totalTableResultBvo['0']->revenue);
 
                echo '<td>'.number_format($totalTable).'</td>';     
          ?>
          
        </tr>
        <tr>
          <td>2021</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResultBrhv  = $tableRevenueBrhv->result();
              $tableResultBve   = $tableRevenueBve->result();
              $tableResultBvo   = $tableRevenueBvo->result();

              $tableResult = ($tableResultBrhv['0']->revenue + $tableResultBve['0']->revenue + $tableResultBvo['0']->revenue);
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTableResultBrhv  = $maxTableRevenueBrhv->result();
              $maxTableResultBve   = $maxTableRevenueBve->result();
              $maxTableResultBvo   = $maxTableRevenueBvo->result();

              $maxTable = ($maxTableResultBrhv['0']->revenue + $maxTableResultBve['0']->revenue + $maxTableResultBvo['0']->revenue);
                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(138, 109, 59, 0.5); color: #fff;">'.number_format($maxTable).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxTable).'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.confirm_date)='2021' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTableResultBrhv  = $totalTableRevenueBrhv->result();
              $totalTableResultBve   = $totalTableRevenueBve->result();
              $totalTableResultBvo   = $totalTableRevenueBvo->result();

              $totalTable = ($totalTableResultBrhv['0']->revenue + $totalTableResultBve['0']->revenue + $totalTableResultBvo['0']->revenue);
 
                echo '<td>'.number_format($totalTable).'</td>';     
          ?>
          
        </tr>
        <tr>
          <td>2022</td>
          <?php
            $i = 1;
            $max = 0; //Max number begin
            while($i <= 12) {
              $tableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $tableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $tableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $tableResultBrhv  = $tableRevenueBrhv->result();
              $tableResultBve   = $tableRevenueBve->result();
              $tableResultBvo   = $tableRevenueBvo->result();

              $tableResult = ($tableResultBrhv['0']->revenue + $tableResultBve['0']->revenue + $tableResultBvo['0']->revenue);
              if ($tableResult > $max) {
                $max = $tableResult;
              }
              $i++;
            } 

              $i = 1;
              while($i <= 12) {
                $maxTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $maxTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE MONTH(balivillaescapes.confirm_date)=$i 
                AND YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $maxTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE MONTH(balivillasonline.confirm_date)=$i 
                AND YEAR(balivillasonline.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $maxTableResultBrhv  = $maxTableRevenueBrhv->result();
              $maxTableResultBve   = $maxTableRevenueBve->result();
              $maxTableResultBvo   = $maxTableRevenueBvo->result();

              $maxTable = ($maxTableResultBrhv['0']->revenue + $maxTableResultBve['0']->revenue + $maxTableResultBvo['0']->revenue);
                if ($maxTable == $max) {
                  echo '<td style="background-color: rgba(169, 68, 66, 0.5); color: #fff;">'.number_format($maxTable).'</td>'; 
                } else {
                  echo '<td>'.number_format($maxTable).'</td>'; 
                }
              $i++;
              }       
          ?>

          <?php
              $totalTableRevenueBrhv = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balirealtyhv.balirealtyhv_status='1'");
              $totalTableRevenueBve = $this->db->query("SELECT SUM(revenue_nett_usd) AS revenue FROM balivillaescapes 
                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                WHERE YEAR(balivillaescapes.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillaescapes.balivillaescapes_status='1'");
              $totalTableRevenueBvo = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                WHERE YEAR(balivillasonline.confirm_date)='2022' 
                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                AND balivillasonline.balivillasonline_status='1'");

              $totalTableResultBrhv  = $totalTableRevenueBrhv->result();
              $totalTableResultBve   = $totalTableRevenueBve->result();
              $totalTableResultBvo   = $totalTableRevenueBvo->result();

              $totalTable = ($totalTableResultBrhv['0']->revenue + $totalTableResultBve['0']->revenue + $totalTableResultBvo['0']->revenue);
 
                echo '<td>'.number_format($totalTable).'</td>';     
          ?>
          
        </tr>
      </tbody>
  </table>
</div>
