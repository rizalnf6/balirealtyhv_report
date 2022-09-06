<br /><br /><br />
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-2">
			<?php $this->load->view($filter_button); ?>
		</div> <!-- col-sm-2 -->
		<div class="col-sm-8">
			<ul class="nav nav-tabs nav-pills">
			    <li class="active"><a data-toggle="tab" href="#reservation">Reservation</a></li>
			    <li><a data-toggle="tab" href="#source">Source</a></li>
			    <li><a data-toggle="tab" href="#villawebsite">Villa Website</a></li>
			    <li><a data-toggle="tab" href="#agent">Agent</a></li>
			</ul>
			<div class="tab-content">
				<div id="reservation" class="tab-pane fade in active">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($report_reservation); ?>
					</div> 
				</div> <!-- End div id -->
			    <div id="source" class="tab-pane fade">
			    	<div class="col-sm-12">
			    		<br />
			    		<?php $this->load->view($report_source); ?>
					</div> 
			    </div> 
			    <div id="villawebsite" class="tab-pane fade">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($report_website); ?>
					</div>
			    </div>
			    <div id="agent" class="tab-pane fade">
					<div class="col-sm-12">
						<br />
						<?php $this->load->view($report_agent); ?>
					</div>
			    </div>
			</div>
		</div>
		<div class="col-sm-2">
			<br />
			<img class="logo-chart-page" src="<?php echo $logoBrhv; ?>" alt="Asia Holiday Retreats"> 
		</div> <!-- col-sm-2 -->
	</div> <!-- End Row -->

</div> <!-- End Container -->