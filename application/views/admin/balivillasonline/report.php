<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-2">
			<?php $this->load->view($filter_button); ?>
		</div> <!-- col-sm-2 -->
		<div class="col-sm-8">
			<ul class="nav nav-tabs nav-pills">
			    <li class="active"><a data-toggle="tab" href="#reservation">Reservation</a></li>
			</ul>
			<div class="tab-content">
				<div id="reservation" class="tab-pane fade in active">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($report_reservation); ?>
					</div> 
				</div> <!-- End div id -->
			</div>
		</div> <!-- Col 8 -->
		<div class="col-sm-2">
			<br />
			<img class="logo-chart-page" src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> 
		</div> <!-- col-sm-2 -->
	</div> <!-- Row -->
</div> <!-- Container -->