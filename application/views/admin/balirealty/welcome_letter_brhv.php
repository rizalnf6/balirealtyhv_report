<p style="font-size: 15px;">
<?php 
$newDate = Date("l, d F Y", strtotime($pdf['checkin']));
echo $newDate; 
?>

<br /><br /><br />

Dear <?php echo $pdf['guest_name']; ?>,
<br /><br />

We are delighted to have you as our guests and we would like to wish you a warm welcome at <?php echo $pdf['villa']; ?>. I trust you will find your stay with us pleasant and comfortable.
<br /><br />

Bali has so much to offer and I am sure that you will find plenty of interesting places and activities to enjoy. For more information on restaurants, tours, Bali history and tradition or just any questions whatsoever, please check with your <b>Butler / Housekeeping</b> to assist you.
<br /><br />

Please let me introduce you to our team, who are there to provide the best service possible during your stay:
<br /><br />

<?php 
if($pdf['supervisor'] != ""){ echo '<b>Villa Supervisor</b> <br />'.$pdf['supervisor'].' is '.$pdf['manager'].'\'s assistant managing the affairs of '.$pdf['villa'].', who can be contacted should I be unavailable on '.$pdf['supervisor_phone'].'.<br /><br />';}
else {echo "";}
?>

<?php 
if($pdf['butler'] != ""){ echo '<b>Butler</b> <br />'.$pdf['butler'].' will welcome you at the villa upon arrival and is available during the day to assist with breakfast or a light lunch, assists housekeeping, readily available to you with anything to do with the villa and its operations, assists you with any reservations for restaurants, spas, tours etc, will go to purchase groceries or any other shopping and will act as your personal guide or interpreter <br /><br />';}
else {echo "";}
?>

<?php 
if($pdf['housekeeper'] != ""){ echo '<b>Houskeeper</b> <br />'.$pdf['housekeeper'].' is responsible for the cleanliness and tidiness of the villa.  Your privacy is paramount and room cleaning will be carried out to suit your schedule.<br /><br />';}
else {echo "";}
?>

Please make yourself at home and do not hesitate in asking your Butler or Housekeeping for anything, however, if they are unable to provide the information that you want, please talk to myself or your Villa Supervisor.
<br /><br />

We constantly endeavor to improve our services, so we would greatly appreciate any suggestions or improvements you would care to make and, if you have the time, to complete our guest review form
<br /><br />

Finally, I hope you return home with some wonderful memories and look forward to welcoming you back to Bali in the near future.
<br /><br /><br />

Yours Sincerely
<br /><br />

<b style="color: #428bca; font-size: 17px;"> <?php echo $pdf['manager']; ?> </b> / Villa Manager
<table border="0" width="100%" style="font-size: 15px">
	<tr>
		<td width="33%"> Mobile : <?php echo $pdf['manager_phone']; ?> </td>
		<td colspan ="2" width="66%"> Office : Sunset Rd 1X, Kerobokan, Bali, Indonesia </td>
	</tr>
	<tr>
		<td width="33%"> Email : <a href="" style="color: orange"><?php echo $pdf['manager_email']; ?></a> </td>
		<td colspan ="2" width="66%"> Phone : +62.361.370.1000; Email : <a href="" style="color: orange">info@balirealtyhv.com</a> </td>
	</tr>
	<tr>
		<td width="33%">  </td>
		<td colspan ="2" width="66%"> Visit : <a href="" style="color: orange">www.balirealty.com</a> & <a href="" style="color: orange">www.balirealtyhv.com</a>  </td>
	</tr>
	<tr>
		<td colspan ="3" width="100%"> <br /> <img src="assets/images/signature.jpg" width="620px"> </td>
	</tr>
</table>
