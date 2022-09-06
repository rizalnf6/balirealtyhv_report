<?php $villa_formated = str_replace('%20', ' ', $villa); ?>

<style>
table, td, th {
  border: 1px solid #333;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table.header img {
  width: 250px;
}

table.header,
td.header {
  border: 0px solid #333 !important;
}
</style>

<table class="header">
  <tr>
    <td class="header" width="50%"><h2>No. of Booking Villa <?php echo $villa_formated; ?></h2></td>
    <td class="header" align="right"><img class="brhv-logo" src="<?php echo base_url(); ?>assets/images/logo-brhv.png"></td>
  </tr>
</table>

<table>
	<tr>
		<th align="center" bgcolor="#2a7fc2"><font color="#fff">Booking</font></th>
            <?php
              $i = 1;
              $month = strtotime('2018-01-01');
              while($i <= 12) {
                $month_name = date('M', $month);
                echo '<th bgcolor="#2a7fc2"><font color="#fff">' . $month_name. '</font></th>';
                $month = strtotime('+1 month', $month);
                $i++;
              }
            ?>
        <th align="center" bgcolor="#2a7fc2"><font color="#fff">Total</font></th>
	</tr>

<?php 
	$year_start		= "2017";
	$year_end 		= date('Y');

	for ($year=$year_start; $year <= $year_end ; $year++) { 
?>
	
	<tr>
		<td align="center" height="30"><?php echo $year; ?></td>
		<?php
            $i = 1;
            $max = 0;
            while($i <= 12) {
              	$table_villa_booking = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN villa ON villa.villa_id=balirealtyhv.villa_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='$year' 
                AND villa.villa='$villa_formated' 
                AND (status_enquiry.status_enquiry='Proposed' 
                OR status_enquiry.status_enquiry='Proposed Rescheduled Covid19'
                OR status_enquiry.status_enquiry='Confirm' 
                OR status_enquiry.status_enquiry='Rescheduled Covid19') 
                AND balirealtyhv.balirealtyhv_status='1'");

              	if ($table_villa_booking->num_rows() > $max) {
                	$max = $table_villa_booking->num_rows();
              	}
            $i++;
            }

            $i = 1;
            while($i <= 12) {
              	$max_table_villa_booking = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN villa ON villa.villa_id=balirealtyhv.villa_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE MONTH(balirealtyhv.confirm_date)=$i 
                AND YEAR(balirealtyhv.confirm_date)='$year' 
                AND villa.villa='$villa_formated' 
                AND (status_enquiry.status_enquiry='Proposed' 
                OR status_enquiry.status_enquiry='Proposed Rescheduled Covid19'
                OR status_enquiry.status_enquiry='Confirm' 
                OR status_enquiry.status_enquiry='Rescheduled Covid19') 
                AND balirealtyhv.balirealtyhv_status='1'");


                if ($max_table_villa_booking->num_rows() == $max) {
                echo '<td align="center" style="background-color: #e84c3d; color: #fff; font-weight: 700;">' . $max_table_villa_booking->num_rows(). '</td>'; 
                } else {
                  echo '<td align="center">' . $max_table_villa_booking->num_rows(). '</td>'; 
                }
            $i++;
            }       
          ?>

          <?php
            $total_daily_booking = $this->db->query("SELECT * FROM balirealtyhv 
                LEFT JOIN villa ON villa.villa_id=balirealtyhv.villa_id 
                LEFT JOIN status_enquiry ON status_enquiry.status_enquiry_id=balirealtyhv.status_enquiry_id 
                WHERE YEAR(balirealtyhv.confirm_date)='$year' 
                AND villa.villa='$villa_formated' 
                AND (status_enquiry.status_enquiry='Proposed' 
                OR status_enquiry.status_enquiry='Proposed Rescheduled Covid19'
                OR status_enquiry.status_enquiry='Confirm' 
                OR status_enquiry.status_enquiry='Rescheduled Covid19') 
                AND balirealtyhv.balirealtyhv_status='1'");
              echo '<td align="center"><b>' .$total_daily_booking->num_rows(). '</b></td>';          
          ?>
	</tr>
<?php } ?>
</table>

<br /><br />

<?php
  echo "Reported date is " . date("F j, Y");
?>