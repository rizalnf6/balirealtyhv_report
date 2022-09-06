<!-- Set filter date default-->
<?php
    if (empty($villa)) {
      $villa = "";
    }
    if (empty($year)) {
      $year = date('Y');
    }
?>

<script type="text/javascript">
  $(document).ready( function () {
      $('#chartVillaSourcesEnquiry').DataTable({
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
          "iDisplayLength": 100,
          "paging":   false,
          "ordering": true,
          "info":     false,
          "searching": false
      });
  });
</script>

<div class="table-responsive"> 
  <table class="table table-bordered table-brhv" id="chartVillaSourcesEnquiry">
    <caption class="table-caption">Enquiry</caption>
      <thead>
        <tr>
          <th>Sources</th>
          <?php 
            $month = 1;
            while ($month <= 12) {
              echo "<th>".date("M", mktime(0, 0, 0, $month, 10))."</th>";
              $month++;
            }
          ?>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>

        <!-- Tabel Agent -->
        <tr>
          <td>Agent</td>
          <?php
            $i = 1;
            while($i <= 12) {
              $agent_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='1' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($agent_enquiry->num_rows() != "0") {
                echo '<td>' . $agent_enquiry->num_rows(). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_agent_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='1' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_agent_enquiry->num_rows() != "0") {
                echo '<td style="color: red;"><b>' . $total_agent_enquiry->num_rows(). '</b></td>'; 
              } else {
                echo '<td></td>'; 
              }
          ?>
        </tr>

        <!-- Tabel Villa Websites -->
        <tr>
          <td>Villa Website</td>
          <?php
            $i = 1;
            while($i <= 12) {
              $website_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='2' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($website_enquiry->num_rows() != "0") {
                echo '<td>' . $website_enquiry->num_rows(). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_website_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='2' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_website_enquiry->num_rows() != "0") {
                echo '<td style="color: red;"><b>' . $total_website_enquiry->num_rows(). '</b></td>'; 
              } else {
                echo '<td></td>'; 
              }
          ?>
        </tr>

        <!-- Tabel OTA -->
        <?php
          foreach($list_ota as $row) {
        ?>
        <tr>
          <td><?php echo $row->source;?></td>
          <?php
            $i = 1;
            while($i <= 12) {
              $ota_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='3' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($ota_enquiry->num_rows() != "0") {
                echo '<td>' . $ota_enquiry->num_rows(). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
              $i++;
            }        
          ?>
          <?php
              $total_ota_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='3' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_ota_enquiry->num_rows() != "0") {
                echo '<td style="color: red;"><b>' . $total_ota_enquiry->num_rows(). '</b></td>'; 
              } else {
                echo '<td></td>'; 
              }
            }        
          ?>
        </tr>

        <!-- Tabel Others -->
        </tr>
        <?php
          foreach($list_others as $row) {
        ?>
        <tr>
          <td><?php echo $row->source;?></td>
          <?php
            $i = 1;
            while($i <= 12) {
              $others_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='4' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($others_enquiry->num_rows() != "0") {
                echo '<td>' . $others_enquiry->num_rows(). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
              $i++;
            }        
          ?>
          <?php
              $total_others_enquiry = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='4' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_others_enquiry->num_rows() != "0") {
                echo '<td style="color: red;"><b>' . $total_others_enquiry->num_rows(). '</b></td>'; 
              } else {
                echo '<td></td>'; 
              }
            }        
          ?>
        </tr>
      </tbody>

      <tfoot>
        <tr>
          <th style="color: red"><b>TOTAL</b></th>       
          <?php
            $i = 1;
            while($i <= 12) {
              $total_enquiry_monthly = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_enquiry_monthly->num_rows() != "0") {
                echo '<th style="color: red;"><b>' . $total_enquiry_monthly->num_rows(). '</b></th>'; 
              } else {
                echo '<th></th>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_enquiry_yearly = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE YEAR(balirealtyhv.enquiry_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_enquiry_yearly->num_rows() != "0") {
                echo '<th style="color: red;"><b>' . $total_enquiry_yearly->num_rows(). '</b></th>'; 
              } else {
                echo '<th>-</th>'; 
              }
          ?>
        </tr>

    </tbody>
  </table>
</div> <!-- Table End-->


  