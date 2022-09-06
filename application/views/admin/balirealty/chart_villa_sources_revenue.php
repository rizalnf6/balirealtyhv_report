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
      $('#chartVillaSourcesRevenue').DataTable({
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
          "iDisplayLength": 100,
          "paging":   false,
          "ordering": true,
          "info":     false,
          "searching": false
      });
  });
</script>

<br />

<div class="table-responsive"> 
  <table class="table table-bordered table-brhv" id="chartVillaSourcesRevenue">
    <caption class="table-caption">The revenue is quoted in US Dollar</caption>
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
              $agent_revenue = $this->db->query("SELECT SUM(revenue_nett) AS agent_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE MONTH(balirealtyhv.confirm_date)=$i 
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='1' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $agent_result = $agent_revenue->result();

              if ($agent_result['0']->agent_revenue > "0") {
                echo '<td>' . number_format($agent_result['0']->agent_revenue). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_agent_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_agent_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='1' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $total_agent_result = $total_agent_revenue->result();

              if ($total_agent_result['0']->total_agent_revenue > "0") {
                echo '<td style="color: red;"><b>' . number_format($total_agent_result['0']->total_agent_revenue). '</b></td>'; 
              } else {
                echo '<td>-</td>'; 
              }
          ?>
        </tr>

        <!-- Tabel Agent -->
        <tr>
          <td>Villa Website</td>
          <?php
            $i = 1;
            while($i <= 12) {
              $website_revenue = $this->db->query("SELECT SUM(revenue_nett) AS website_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE MONTH(balirealtyhv.confirm_date)=$i 
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='2' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $website_result = $website_revenue->result();

              if ($website_result['0']->website_revenue > "0") {
                echo '<td>' . number_format($website_result['0']->website_revenue). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_website_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_website_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='2' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $total_website_result = $total_website_revenue->result();

              if ($total_website_result['0']->total_website_revenue > "0") {
                echo '<td style="color: red;"><b>' . number_format($total_website_result['0']->total_website_revenue). '</b></td>'; 
              } else {
                echo '<td>-</td>'; 
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
              $ota_revenue = $this->db->query("SELECT SUM(revenue_nett) AS ota_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND MONTH(balirealtyhv.confirm_date)=$i 
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='3' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $ota_result = $ota_revenue->result();

              if ($ota_result['0']->ota_revenue > "0") {
                echo '<td>' . number_format($ota_result['0']->ota_revenue). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_ota_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_ota_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='3' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $total_ota_result = $total_ota_revenue->result();

              if ($total_ota_result['0']->total_ota_revenue > "0") {
                echo '<td style="color: red;"><b>' . number_format($total_ota_result['0']->total_ota_revenue). '</b></td>'; 
              } else {
                echo '<td>-</td>'; 
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
              $others_revenue = $this->db->query("SELECT SUM(revenue_nett) AS others_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND MONTH(balirealtyhv.confirm_date)=$i 
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='4' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $others_result = $others_revenue->result();

              if ($others_result['0']->others_revenue > "0") {
                echo '<td>' . number_format($others_result['0']->others_revenue). '</td>'; 
              } else {
                echo '<td>-</td>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_others_revenue = $this->db->query("SELECT SUM(revenue_nett) AS total_others_revenue FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE source.source='$row->source'
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND source.category='4' 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $total_others_result = $total_others_revenue->result();

              if ($total_others_result['0']->total_others_revenue > "0") {
                echo '<td style="color: red;"><b>' . number_format($total_others_result['0']->total_others_revenue). '</b></td>'; 
                } else {
                echo '<td>-</td>'; 
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
              $total_revenue_monthly = $this->db->query("SELECT SUM(revenue_nett) AS total_revenue_monthly FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE MONTH(balirealtyhv.confirm_date)=$i 
              AND YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $total_revenue_monthly_result = $total_revenue_monthly->result();

              if ($total_revenue_monthly_result['0']->total_revenue_monthly > "0") {
                echo '<th style="color: red;"><b>' . number_format($total_revenue_monthly_result['0']->total_revenue_monthly). '</b></th>'; 
              } else {
                echo '<th>-</th>'; 
              }
            $i++;
            }       
          ?>
          <?php
              $total_revenue_yearly = $this->db->query("SELECT SUM(revenue_nett) AS total_revenue_yearly FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN source ON source.source_id = balirealtyhv.source_id
              LEFT JOIN villa ON villa.villa_id = balirealtyhv.villa_id
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              WHERE YEAR(balirealtyhv.confirm_date)=$year 
              AND (status_enquiry.status_enquiry!='Proposed' OR status_enquiry.status_enquiry!='Extend Stay') 
              AND villa.villa='$villa' 
              AND balirealtyhv.balirealtyhv_status='1'");
              $total_revenue_yearly_result = $total_revenue_yearly->result();

              if ($total_revenue_yearly_result['0']->total_revenue_yearly > "0") {
                echo '<th style="color: red;"><b>' . number_format($total_revenue_yearly_result['0']->total_revenue_yearly). '<b></th>'; 
              } else {
                echo '<th>-</th>'; 
              }
          ?>
        </tr>

    </tbody>
  </table>
</div> <!-- Table End-->


  