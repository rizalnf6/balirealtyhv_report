<br /><br /><br />
<div class="container-fluid">

	<?php 
		$add_sukses = $this->session->flashdata('add_sukses');
		$edit_success = $this->session->flashdata('edit_success');
		$delete_success = $this->session->flashdata('delete_success');
		
			if (isset($add_sukses)) {
				echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
					  </a><strong>Well done! </strong>".$this->session->flashdata('add_sukses')."</div>";
			} 
			elseif (isset($edit_success)) {
				echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
					  </a><strong>Well done! </strong>".$this->session->flashdata('edit_success')."</div>";
			} 
			elseif (isset($delete_success)) {
				echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
				      </a><strong>Well done! </strong>".$this->session->flashdata('delete_success')."</div>";
			} 
	?>
	
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-5"> 
			<img class="logo-table-with-margin" src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> 
		</div>
		<div class="col-sm-5">
			<div class="page-header-with-margin">
				<?php echo $page_header; ?> <br />
				<?php if ($this->session->userdata('level')=="admin"): ?>
		    	<a href="<?php echo $button_add; ?>"><button type="button" class="btn btn-add btn-xs"> Add </button></a>
		    	<?php endif ?>
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
			    <li class="active"><a data-toggle="tab" href="#allvillas">All Villas</a></li>
			    <li><a data-toggle="tab" href="#special">Villas with Special Remarks</a></li>
			    <li><a data-toggle="tab" href="#promotion">Villas with Special Promotions</a></li>
			</ul>
			<div class="tab-content">
				<div id="allvillas" class="tab-pane fade in active">
					<br />
					<?php $this->load->view($villa_all); ?>
				</div> <!-- End enquiryStatus -->
				<div id="special" class="tab-pane fade">
					<br />
					<?php $this->load->view($villa_special); ?>
				</div>
				<div id="promotion" class="tab-pane fade">
					<br />
					<?php $this->load->view($villa_promotion); ?>
				</div>
			</div> <!-- End Tab -->  
		</div> <!-- End col 10 -->
		<div class="col-sm-1">
		</div>
	</div> <!-- End Row-->

</div>


