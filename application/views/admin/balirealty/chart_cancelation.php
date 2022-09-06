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
			    <li class="active"><a data-toggle="tab" href="#cancelationreason">Cancelation Reason</a></li>
			    <li><a data-toggle="tab" href="#piechart">Pie Chart</a></li>
			</ul>
			<div class="tab-content">
				<div id="cancelationreason" class="tab-pane fade in active">
				    <div class="col-sm-12">
				    	<br />
				    	<?php $this->load->view($table_brhv_cancelation); ?>
					</div> 
				</div> <!-- End div id -->
			    <div id="piechart" class="tab-pane fade">
			    	<div class="col-sm-12">
			    		<br />
			    		<?php $this->load->view($piechart_brhv_cancelation); ?>
					</div> 
			    </div> 
			    <div id="revenue" class="tab-pane fade">
				    <div class="col-sm-12">
				    	
					</div>
			    </div>
			</div>
		</div> <!-- End col 8 -->
		<div class="col-sm-2">
			<br />
			<img class="logo-chart-page" src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> 
		</div> <!-- col-sm-2 -->
	</div> 
</div> <!-- End Container -->