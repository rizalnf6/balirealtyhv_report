<!-- Set filter date default-->
<?php
    if (empty($year)) {
      $year = date('Y');
    }
?>

<script type="text/javascript">
  $(document).ready( function () {
      $('#chartCancelation').DataTable({
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
  <table class="table table-bordered table-brhv" id="chartCancelation">
    <caption class="table-caption">Cancelation Reason of <?php echo $year; ?></caption>
      <thead>
        <tr>
          <th>Cancelation Name</th>
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

        <?php
          foreach($list_cancelation as $row) {
        ?>

        <tr>
          <td><?php echo $row->cancelation;?></td>
          <?php
            $i = 1;
            while($i <= 12) {
              $cancelation = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              LEFT JOIN cancelation ON cancelation.cancelation_id=balirealtyhv.cancelation_id 
              WHERE cancelation.cancelation='$row->cancelation' 
              AND MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND status_enquiry.status_enquiry='Cancel' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($cancelation->num_rows() != "0") {
                echo '<td>' . $cancelation->num_rows(). '</td>'; 
              } else {
                echo '<td></td>'; 
              }
            $i++;
            }     
          ?>
          <?php
            $total_cancelation = $this->db->query("SELECT * FROM balirealtyhv 
            LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
            LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
            LEFT JOIN cancelation ON cancelation.cancelation_id=balirealtyhv.cancelation_id 
            WHERE cancelation.cancelation='$row->cancelation' 
            AND YEAR(balirealtyhv.enquiry_date)=$year 
            AND status_enquiry.status_enquiry='Cancel' 
            AND balirealtyhv.balirealtyhv_status='1'");

            if ($total_cancelation->num_rows() != "0") {
              echo '<td style="color: red;"><b>' . $total_cancelation->num_rows(). '<b></td>'; 
            } else {
              echo '<td></td>'; 
            }
            $i++;
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
              $total_cancelation_monthly = $this->db->query("SELECT * FROM balirealtyhv 
              LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
              LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
              LEFT JOIN cancelation ON cancelation.cancelation_id=balirealtyhv.cancelation_id 
              WHERE MONTH(balirealtyhv.enquiry_date)=$i 
              AND YEAR(balirealtyhv.enquiry_date)=$year 
              AND status_enquiry.status_enquiry='Cancel' 
              AND balirealtyhv.balirealtyhv_status='1'");

              if ($total_cancelation_monthly->num_rows() != "0") {
                echo '<th style="color: red;"><b>' .$total_cancelation_monthly->num_rows(). '<b></th>'; 
              } else {
                echo '<th></th>'; 
              }
            $i++;
            }       
          ?>
          <?php
            $total_cancelation_yearly = $this->db->query("SELECT * FROM balirealtyhv 
            LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
            LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
            LEFT JOIN cancelation ON cancelation.cancelation_id=balirealtyhv.cancelation_id 
            WHERE YEAR(balirealtyhv.enquiry_date)=$year 
            AND status_enquiry.status_enquiry='Cancel' 
            AND balirealtyhv.balirealtyhv_status='1'");

            if ($total_cancelation_yearly->num_rows() != "0") {
              echo '<th style="color: red;"><b>' .$total_cancelation_yearly->num_rows(). '</b></th>'; 
            } else {
              echo '<th></th>'; 
            }
          ?>
        </tr>    
      </tfoot>
  </table>
</div> <!-- Table End-->


  