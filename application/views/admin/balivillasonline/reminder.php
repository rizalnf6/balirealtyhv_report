<br /><br /><br />
<div class="container-fluid">
	
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5">
			<img class="logo-table-with-margin" src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> 
		</div>
		<div class="col-sm-5">
			<div class="page-header-with-margin">
				<?php echo $page_header; ?>
			</div>
		</div>
		<div class="col-sm-1">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<ul class="nav nav-tabs nav-pills">
			    <li class="active"><a data-toggle="tab" href="#enquiryStatus">Enquiry Status</a></li>
			    <?php if ($this->session->userdata('level')!="topmanagement"): ?>
			    <li><a data-toggle="tab" href="#guestArrival">Guest Arrival</a></li>
			    <li><a data-toggle="tab" href="#revenue">Revenue</a></li>
			    <li><a data-toggle="tab" href="#cancelation">No Cancelation reason</a></li>
			    <?php endif ?>
			</ul>
			<div class="tab-content">
				<div id="enquiryStatus" class="tab-pane fade in active">
					<br />
			    	<?php $this->load->view($reminder_enquiry_status); ?>
				</div> <!-- End enquiryStatus -->
				<?php if ($this->session->userdata('level')!="topmanagement"): ?>
				<div id="guestArrival" class="tab-pane fade">
					<br />
					<?php $this->load->view($reminder_guest_arrival); ?>
				</div>
				<div id="revenue" class="tab-pane fade">
					<br />
					<?php $this->load->view($reminder_revenue); ?>
				</div>
				<div id="cancelation" class="tab-pane fade">
					<br />
					<?php $this->load->view($reminder_cancelation); ?>
				</div>
				<?php endif ?>
			</div> <!-- End Tab -->  
		</div> <!-- End col 10 -->
		<div class="col-sm-1">
		</div>
	</div> <!-- End Row-->

</div>