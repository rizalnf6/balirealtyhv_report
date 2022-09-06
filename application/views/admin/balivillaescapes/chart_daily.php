<?php error_reporting(0); ?>

<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-2">
			
			<div class="page-header">
				<?php echo $page_header; ?>
			</div> <hr />
			
			<?php $this->load->view($filter_button); ?>
		</div> <!-- col-sm-2 -->
		<div class="col-sm-8">
			<ul class="nav nav-tabs nav-pills">
			    <li class="active"><a data-toggle="tab" href="#enquiry">Enquiry</a></li>
			    <li><a data-toggle="tab" href="#booking">Booking</a></li>
			    <li><a data-toggle="tab" href="#revenue">Revenue</a></li>
			    <?php if ($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="topmanagement" OR $this->session->userdata('level')=="resmanager"): ?>
			    <li><a data-toggle="tab" href="#conversion">Conversion</a></li>
			    <?php endif ?>
			</ul>
			<div class="tab-content">
				<div id="enquiry" class="tab-pane fade in active">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($chart_daily_enquiry); ?>
					</div> 
				</div> <!-- End div id -->
			    <div id="booking" class="tab-pane fade">
			    	<div class="col-sm-12">
			    		<br />
			    		<?php $this->load->view($chart_daily_booking); ?>
					</div> 
			    </div> 
			    <div id="revenue" class="tab-pane fade">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($chart_daily_revenue); ?>
					</div>
			    </div>
			    <?php if ($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="topmanagement" OR $this->session->userdata('level')=="resmanager"): ?>
			    <div id="conversion" class="tab-pane fade">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($chart_daily_conversion); ?>
					</div>
			    </div>
			    <?php endif ?>
			</div>
		</div> <!--Col 8-->
		<div class="col-sm-2">
			<img class="logo-chart-page" src="<?php echo $logoBve; ?>" alt="Bali Villa Escapes"> 
		</div> <!-- col-sm-2 -->
	</div> <!--Row-->
</div> <!--Container-->