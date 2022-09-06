<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-2">
			<?php $this->load->view($filter_button); ?>
		</div> <!-- col-sm-2 -->
		<div class="col-sm-8">
			<ul class="nav nav-tabs nav-pills">
			    <li class="active"><a data-toggle="tab" href="#revenue">Revenue</a></li>
			    <li><a data-toggle="tab" href="#booking">Booking</a></li>
			</ul>
			<div class="tab-content">
				<div id="revenue" class="tab-pane fade in active">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($team_target_revenue); ?>
					</div> 
				</div> <!-- End div id -->
			    <div id="booking" class="tab-pane fade">
			    	<div class="col-sm-12">
			    		<br />
			    		<?php $this->load->view($team_target_booking); ?>
					</div> 
			    </div> 
			</div>
		</div>
		<div class="col-sm-2">
			<br />
			<img class="logo-chart-page" src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> 
			<img class="logo-chart-page" src="<?php echo $logoBve; ?>" alt="Bali Villa Escapes">
			<img class="logo-chart-page" src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats">
		</div> <!-- col-sm-2 -->
	</div> <!-- End Row -->

</div> <!-- End Container -->