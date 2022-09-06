<br /><br /><br />
<div class="container-fluid">
	
	<?php 
		$proses_sukses = $this->session->flashdata('proses_sukses');
		
			if (isset($proses_sukses)) {
				echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
					  </a><strong>Well done! </strong>".$this->session->flashdata('proses_sukses')."</div>";
			} 
	?>
	
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
		</div> <!-- End Col 5 -->
		<div class="col-sm-1">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<div class="table-responsive">          
			  	<table class="table table-bordered table-ahr">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Reservation</th>
			        <th>Guest Name</th>
			        <th>Villa Name</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>

			    <!-- ISI DATA AKAN MUNCUL DISINI -->
				<script type="text/javascript" language="JavaScript">
					function konfirmasi() {
						tanya = confirm("Are you sure want to proccess ?");
						if (tanya == true) return true;
						else return false;
					}
				</script>

			      <?php
						$no = 1; //untuk menampilkan no
						foreach($list_enquiry as $row){
							?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->name;?></td>
								<td><?php echo $row->guest_name;?></td>
								<td><?php echo $row->villa;?></td>
								<td><?php echo $row->status_enquiry;?></td>
								<td>
									<a onclick='return konfirmasi()' href="<?php echo $button_proccess."/".$row->report_id;; ?>">
										Proccess
									</a>
								</td>
							<?php
							$no++;
						}
						?>
			      	
			    </tbody>
			  	</table>
			</div> <!-- Table End-->
			<div class="halaman"><p>Page : <?php echo $halaman;?></p></div>
		</div> <!--Col 10-->
		<div class="col-sm-1">
		</div>
	</div> <!--Row-->

</div> <!--Container-->