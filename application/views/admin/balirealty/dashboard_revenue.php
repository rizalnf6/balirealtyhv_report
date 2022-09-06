            <div class="col-sm-12"> <br />
            <?php if ($this->session->userdata('level')!="bveonly"): ?>
              <div class="col-sm-2">
              <div class="logo-chart-dashboard"> <img src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> </div>
              <br />
              </div> <!-- End col 2 -->
              <div class="col-sm-10">
              <div class="panel panel-chart-balirealty">
                <div class="panel-heading"><?php echo date('F').", ".date('Y'); ?></div>
                    <div class="panel-body">
                    <canvas id="brhvrevenue" height="75px"></canvas>
                      <script>
                      var canvas = document.getElementById("brhvrevenue");
                      var ctx = canvas.getContext('2d');

                      // Global Options:
                      Chart.defaults.global.defaultFontColor = 'black';
                      Chart.defaults.global.defaultFontSize = 13;

                      var data = {
                        labels: [<?php
                            $startday = date('Y-m-01');
                          $today = date('Y-m-d');
                          $currentDate = strtotime($startday);
                          while($currentDate <= strtotime($today)) {
                          $formatted = date("j M", $currentDate);
                                  echo '"'.$formatted.'",';
                            $currentDate = strtotime("+1 day", $currentDate);
                              }?>],

                        datasets: [{
                            label: "Bali Realty Holiday Villas",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "rgba(255, 234, 0, 0.2)",
                            borderColor: "#2a7fc2", // The main line color
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
                                  $startday = date('Y-m-01');
                            $today = date('Y-m-d');
                            $currentDate = strtotime($startday);

                            while($currentDate <= strtotime($today)) {
                            $formatted = date("Y-m-d", $currentDate);

                                  $brhv_chart_revenue = $this->db->query("SELECT SUM(revenue_nett) 
                                  AS revenue FROM balirealtyhv 
                                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
                                WHERE balirealtyhv.confirm_date = '$formatted' 
                                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                                AND balirealtyhv.balirealtyhv_status='1'");
                                  $brhv_result_chart = $brhv_chart_revenue->result();
                                  echo '"' .number_format($brhv_result_chart['0']->revenue, 2, '.', ''). '",';       
                                  $currentDate = strtotime("+1 day", $currentDate);
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
                                           labelString: <?php echo date('Y'); ?>,
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

                    <br />
                    <div class="table-responsive">          
                      <table class="table table-striped table-brhv">
                          <caption class="table-caption">The revenue is quoted in US Dollar</caption>
                            <thead>
                              <tr>
                                <th>DATES</th>
                                <th>TOTAL</th>
                                  <?php
                                    $startday = date('Y-m-01');
                              $today = date('Y-m-d');
                              $currentDate = strtotime($startday);
                              
                              while($currentDate <= strtotime($today)) {
                              $formatted = date("j M", $currentDate);
                                      echo '<th>'.$formatted.'</th>';
                                      $currentDate = strtotime("+1 day", $currentDate);
                                    } 
                                  ?>
                              <tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>Number</td>      
                                <?php
                                  $month = date('m');
                                  $year = date('Y');
                            $total_brhv_table_revenue = $this->db->query("SELECT SUM(revenue_nett) 
                              AS revenue FROM balirealtyhv 
                                  LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                                  WHERE MONTH(balirealtyhv.confirm_date)=$month
                                  AND YEAR(balirealtyhv.confirm_date)=$year 
                                  AND (status_enquiry.status_enquiry='Proposed' 
                                    OR status_enquiry.status_enquiry='Confirm' 
                                    OR status_enquiry.status_enquiry='Extend Stay') 
                                  AND balirealtyhv.balirealtyhv_status='1'");
                                  $total_brhv_table_revenue = $total_brhv_table_revenue->result();
                                  echo '<td style="background-color:#2a7fc2; color:#fff;">' .number_format($total_brhv_table_revenue['0']->revenue). '</td>';  
                                ?>                   
                                <?php
                                  $startday = date('Y-m-01');
                            $today = date('Y-m-d');
                            $currentDate = strtotime($startday);
                            
                            while($currentDate <= strtotime($today)) {
                            $formatted = date("Y-m-d", $currentDate);

                            $brhv_table_revenue = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balirealtyhv 
                                LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                                WHERE balirealtyhv.confirm_date = '$formatted' 
                                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                                AND balirealtyhv.balirealtyhv_status='1'");
                                  $brhv_result_table = $brhv_table_revenue->result();
                                  echo '<td>' .number_format($brhv_result_table['0']->revenue). '</td>';        
                                $currentDate = strtotime("+1 day", $currentDate);
                                  }       
                                ?>
                            </tr>
                          </tbody>
                      </table>
                    </div> <!-- End Table Responsive -->
                  </div> <!-- End panel-body -->
              </div> <!-- End panel -->
              <br /><br />
            </div> <!-- End col 10 -->
          <?php endif ?>

            <div class="col-sm-2">
              <div class="logo-chart-dashboard"> <img src="<?php echo $logoBve; ?>" alt="Bali Villa Escapes"> </div>
              <br />
            </div> <!-- End col 2 -->
              <div class="col-sm-10">
              <div class="panel panel-chart-balivillaescapes">
                <div class="panel-heading"><?php echo date('F').", ".date('Y'); ?></div>
                    <div class="panel-body">
                    <canvas id="bverevenue" height="75px"></canvas>
                      <script>
                      var canvas = document.getElementById("bverevenue");
                      var ctx = canvas.getContext('2d');

                      // Global Options:
                      Chart.defaults.global.defaultFontColor = 'black';
                      Chart.defaults.global.defaultFontSize = 13;

                      var data = {
                        labels: [<?php
                            $startday = date('Y-m-01');
                          $today = date('Y-m-d');
                          $currentDate = strtotime($startday);
                          while($currentDate <= strtotime($today)) {
                          $formatted = date("j M", $currentDate);
                                  echo '"'.$formatted.'",';
                            $currentDate = strtotime("+1 day", $currentDate);
                              }?>],

                        datasets: [{
                            label: "Bali Villa Escapes",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "rgba(255, 234, 0, 0.2)",
                            borderColor: "#55c0ee", // The main line color
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
                                  $startday = date('Y-m-01');
                            $today = date('Y-m-d');
                            $currentDate = strtotime($startday);

                            while($currentDate <= strtotime($today)) {
                            $formatted = date("Y-m-d", $currentDate);

                                  $bve_chart_revenue = $this->db->query("SELECT SUM(revenue_nett_aud) 
                                  AS revenue FROM balivillaescapes 
                                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id
                                WHERE balivillaescapes.confirm_date = '$formatted' 
                                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                                AND balivillaescapes.balivillaescapes_status='1'");
                                  $bve_result_chart = $bve_chart_revenue->result();
                                  echo '"' .number_format($bve_result_chart['0']->revenue, 2, '.', ''). '",';       
                                  $currentDate = strtotime("+1 day", $currentDate);
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
                                           labelString: <?php echo date('Y'); ?>,
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

                    <br />
                    <div class="table-responsive">          
                      <table class="table table-striped table-bve">
                          <caption class="table-caption">The revenue is quoted in Australian Dollar</caption>
                            <thead>
                              <tr>
                                <th>DATES</th>
                                <th>TOTAL</th>
                                  <?php
                                    $startday = date('Y-m-01');
                              $today = date('Y-m-d');
                              $currentDate = strtotime($startday);
                              
                              while($currentDate <= strtotime($today)) {
                              $formatted = date("j M", $currentDate);
                                      echo '<th>'.$formatted.'</th>';
                                      $currentDate = strtotime("+1 day", $currentDate);
                                    } 
                                  ?>
                              <tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>Number</td>   
                                <?php
                                  $month = date('m');
                                  $year = date('Y');
                            $total_bve_table_revenue = $this->db->query("SELECT SUM(revenue_nett_aud) 
                              AS revenue FROM balivillaescapes 
                                  LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                                  WHERE MONTH(balivillaescapes.confirm_date)=$month
                                  AND YEAR(balivillaescapes.confirm_date)=$year 
                                  AND (status_enquiry.status_enquiry='Proposed' 
                                    OR status_enquiry.status_enquiry='Confirm' 
                                    OR status_enquiry.status_enquiry='Extend Stay') 
                                  AND balivillaescapes.balivillaescapes_status='1'");
                                  $total_bve_table_revenue = $total_bve_table_revenue->result();
                                  echo '<td style="background-color:#55c0ee; color:#fff;">' .number_format($total_bve_table_revenue['0']->revenue). '</td>';  
                                ?>                        
                                <?php
                                  $startday = date('Y-m-01');
                            $today = date('Y-m-d');
                            $currentDate = strtotime($startday);
                            
                            while($currentDate <= strtotime($today)) {
                            $formatted = date("Y-m-d", $currentDate);

                            $bve_table_revenue = $this->db->query("SELECT SUM(revenue_nett_aud) AS revenue FROM balivillaescapes 
                                LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillaescapes.status_enquiry_id 
                                WHERE balivillaescapes.confirm_date = '$formatted' 
                                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                                AND balivillaescapes.balivillaescapes_status='1'");
                                  $bve_result_table = $bve_table_revenue->result();
                                  echo '<td>' .number_format($bve_result_table['0']->revenue). '</td>';        
                                $currentDate = strtotime("+1 day", $currentDate);
                                  }       
                                ?>
                            </tr>
                          </tbody>
                      </table>
                    </div> <!-- End Table Responsive -->
                  </div> <!-- End panel-body -->
              </div> <!-- End panel -->
              <br /><br />
            </div> <!-- End col 10 -->

          <?php if ($this->session->userdata('level')!="bveonly"): ?>
            <div class="col-sm-2">
              <div class="logo-chart-dashboard"> <img src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> </div>
              <br />
            </div> <!-- End col 2 -->
              <div class="col-sm-10">
              <div class="panel panel-chart-asiaholidayretreats">
                <div class="panel-heading"><?php echo date('F').", ".date('Y'); ?></div>
                    <div class="panel-body">
                    <canvas id="ahrrevenue" height="75px"></canvas>
                      <script>
                      var canvas = document.getElementById("ahrrevenue");
                      var ctx = canvas.getContext('2d');

                      // Global Options:
                      Chart.defaults.global.defaultFontColor = 'black';
                      Chart.defaults.global.defaultFontSize = 13;

                      var data = {
                        labels: [<?php
                            $startday = date('Y-m-01');
                          $today = date('Y-m-d');
                          $currentDate = strtotime($startday);
                          while($currentDate <= strtotime($today)) {
                          $formatted = date("j M", $currentDate);
                                  echo '"'.$formatted.'",';
                            $currentDate = strtotime("+1 day", $currentDate);
                              }?>],

                        datasets: [{
                            label: "Asia Holiday Retreats",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "rgba(255, 234, 0, 0.2)",
                            borderColor: "#fd8f2d", // The main line color
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
                                  $startday = date('Y-m-01');
                            $today = date('Y-m-d');
                            $currentDate = strtotime($startday);

                            while($currentDate <= strtotime($today)) {
                            $formatted = date("Y-m-d", $currentDate);

                                  $ahr_chart_revenue = $this->db->query("SELECT SUM(revenue_nett) 
                                  AS revenue FROM balivillasonline 
                                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id
                                WHERE balivillasonline.confirm_date = '$formatted' 
                                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                                AND balivillasonline.balivillasonline_status='1'");
                                  $ahr_result_chart = $ahr_chart_revenue->result();
                                  echo '"' .number_format($ahr_result_chart['0']->revenue, 2, '.', ''). '",';       
                                  $currentDate = strtotime("+1 day", $currentDate);
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
                                           labelString: <?php echo date('Y'); ?>,
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

                    <br />
                    <div class="table-responsive">          
                      <table class="table table-striped table-ahr">
                          <caption class="table-caption">The revenue is quoted in US Dollar</caption>
                            <thead>
                              <tr>
                                <th>DATES</th>
                                <th>TOTAL</th>
                                  <?php
                                    $startday = date('Y-m-01');
                              $today = date('Y-m-d');
                              $currentDate = strtotime($startday);
                              
                              while($currentDate <= strtotime($today)) {
                              $formatted = date("j M", $currentDate);
                                      echo '<th>'.$formatted.'</th>';
                                      $currentDate = strtotime("+1 day", $currentDate);
                                    } 
                                  ?>
                              <tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>Number</td>  
                                <?php
                                  $month = date('m');
                                  $year = date('Y');
                            $total_ahr_table_revenue = $this->db->query("SELECT SUM(revenue_nett) 
                              AS revenue FROM balivillasonline 
                                  LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                                  WHERE MONTH(balivillasonline.confirm_date)=$month
                                  AND YEAR(balivillasonline.confirm_date)=$year 
                                  AND (status_enquiry.status_enquiry='Proposed' 
                                    OR status_enquiry.status_enquiry='Confirm' 
                                    OR status_enquiry.status_enquiry='Extend Stay') 
                                  AND balivillasonline.balivillasonline_status='1'");
                                  $total_ahr_table_revenue = $total_ahr_table_revenue->result();
                                  echo '<td style="background-color:#fd8f2d; color:#fff;">' .number_format($total_ahr_table_revenue['0']->revenue). '</td>';  
                                ?>                         
                                <?php
                                  $startday = date('Y-m-01');
                            $today = date('Y-m-d');
                            $currentDate = strtotime($startday);
                            
                            while($currentDate <= strtotime($today)) {
                            $formatted = date("Y-m-d", $currentDate);

                            $ahr_table_revenue = $this->db->query("SELECT SUM(revenue_nett) AS revenue FROM balivillasonline 
                                LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balivillasonline.status_enquiry_id 
                                WHERE balivillasonline.confirm_date = '$formatted' 
                                AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm' OR status_enquiry.status_enquiry='Extend Stay') 
                                AND balivillasonline.balivillasonline_status='1'");
                                  $ahr_result_table = $ahr_table_revenue->result();
                                  echo '<td>' .number_format($ahr_result_table['0']->revenue). '</td>';        
                                $currentDate = strtotime("+1 day", $currentDate);
                                  }       
                                ?>
                            </tr>
                          </tbody>
                      </table>
                    </div> <!-- End Table Responsive -->
                  </div> <!-- End panel-body -->
              </div> <!-- End panel -->
            </div> <!-- End col 10 -->
          <?php endif ?>

          </div> <!-- End col 12 -->