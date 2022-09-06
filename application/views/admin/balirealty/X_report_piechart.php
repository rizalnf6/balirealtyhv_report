<!-- Set filter date default-->
<?php
    if (empty($enquiry_start)) {
      $enquiry_start = date('Y-m-01');
    }
    if (empty($enquiry_end)) {
      $enquiry_end = date('Y-m-d');
    }
?>

<?php
  $total_source_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
  LEFT JOIN source ON source.source_id = balirealtyhv.source_id
  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
  WHERE balirealtyhv.enquiry_date!='0000-00-00' 
  AND balirealtyhv.enquiry_date>='$enquiry_start' 
  AND balirealtyhv.enquiry_date<='$enquiry_end' 
  AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
  AND balirealtyhv.balirealtyhv_status='1'");
?>
<?php
  $total_source_booking = $this->db->query("SELECT * FROM balirealtyhv 
  LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id = balirealtyhv.status_enquiry_id 
  WHERE balirealtyhv.confirm_date>='$enquiry_start' 
  AND balirealtyhv.confirm_date<='$enquiry_end' 
  AND (status_enquiry.status_enquiry='Proposed' OR status_enquiry.status_enquiry='Confirm') 
  AND balirealtyhv.balirealtyhv_status='1'");
?>

    <canvas id="enquiryChart"></canvas>
      <script>
        //pie
          var ctxP = document.getElementById("enquiryChart").getContext('2d');
          var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: ["Agent", "Website",
                      <?php
                    foreach($list_ota as $row){
                      echo '"' .$row->source. '",';
                    }
                  ?>
                  <?php
                    foreach($list_others as $row){
                      echo '"' .$row->source. '",';
                    }
                  ?>
                ],
                datasets: [{
                  data: [<?php 
                      $chart_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
                  LEFT JOIN source ON source.source_id = balirealtyhv.source_id
                  LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
                  WHERE balirealtyhv.enquiry_date!='0000-00-00' AND balirealtyhv.enquiry_date>='$enquiry_start' 
                  AND balirealtyhv.enquiry_date<='$enquiry_end' 
                  AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                  AND source.category='1' 
                  AND balirealtyhv.balirealtyhv_status='1'");
                          echo $chart_enquiry->num_rows().",";
                    ?>
                    <?php 
                      $chart_website = $this->db->query("SELECT * FROM balirealtyhv 
                      LEFT JOIN source ON source.source_id = balirealtyhv.source_id
                      LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
                      WHERE balirealtyhv.enquiry_date!='0000-00-00' AND balirealtyhv.enquiry_date>='$enquiry_start' 
                      AND balirealtyhv.enquiry_date<='$enquiry_end' 
                      AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                      AND source.category='2' 
                      AND balirealtyhv.balirealtyhv_status='1'");
                              echo $chart_website->num_rows().",";
                    ?>
                    <?php
                      foreach($list_ota as $row){
                      $chart_ota = $this->db->query("SELECT * FROM balirealtyhv 
                      LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
                      LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
                      WHERE source.source='$row->source' 
                      AND balirealtyhv.enquiry_date!='0000-00-00' 
                      AND balirealtyhv.enquiry_date>='$enquiry_start' 
                      AND balirealtyhv.enquiry_date<='$enquiry_end' 
                      AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                      AND source.category='3' 
                      AND balirealtyhv.balirealtyhv_status='1'");
                              echo $chart_ota->num_rows().",";
                            }
                    ?>
                    <?php
                      foreach($list_others as $row){
                      $chart_others = $this->db->query("SELECT * FROM balirealtyhv 
                      LEFT JOIN source ON source.source_id = balirealtyhv.source_id 
                      LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id
                      WHERE source.source='$row->source' 
                      AND balirealtyhv.enquiry_date!='0000-00-00' 
                      AND balirealtyhv.enquiry_date>='$enquiry_start' 
                      AND balirealtyhv.enquiry_date<='$enquiry_end' 
                      AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
                      AND source.category='4' 
                      AND balirealtyhv.balirealtyhv_status='1'");
                              echo $chart_others->num_rows().",";
                            }
                    ?>],
              backgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b", "#d9edf7", "#337ab7", "#fcf8e3", "#3c763d", "#f17cb0", "#b276b2", "#decf3f", "#faa43a", "#4d4d4d"],
              hoverBackgroundColor: ["#f7464a", "#46bfbd", "#fdb45c", "#949fb1", "#a432a0", "#f24d13", "#8a6d3b", "#d9edf7", "#337ab7", "#fcf8e3", "#3c763d", "#f17cb0", "#b276b2", "#decf3f", "#faa43a", "#4d4d4d"]
            }]
          },
          options: {
                        title: {
                            display: true,
                            text: 'Enquiry Chart',
                            position: 'bottom',
                            fontSize: 22,
                        },
                        legend: {
                            display: true,
                            position: 'top',

                        }
                    }
                });

      </script>