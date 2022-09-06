<script type="text/javascript">
		$(document).ready( function () {
		    $('#villaspecial').DataTable({
		    	"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		        "iDisplayLength": 10,
		        "paging":   true,
		        "ordering": true,
		        "info":     true,
		        "searching": true,
		    });
		});
	</script>

	<style type="text/css">
		.dataTables_filter {float: right!important;}
	</style>

			<div class="table-responsive">          
			  	<table class="table table-striped table-brhv" id="villaspecial">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Villa</th>
			        <th>Management</th>
			        <th>Special Remarks</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php
					$no = 1; //untuk menampilkan no
					foreach($list_villa_special as $row){
				?>
					<tr>
						<td class="no-border-left"><?php echo $no;?></td>
						<td><a class="villa-link" href="<?php echo $row->website; ?>" target="_blank"><?php echo $row->villa;?></a></td>
						<?php 
							if ($row->management == "T B A") { echo "<td style=color:#d9534f><b><i>T B A</i></b></td>"; } 
							else { echo "<td><a class='villa-link' href='".$row->management_website."' target='_blank'>".$row->management."</a></td>"; }
						?>
						<?php 
							if ($row->villa_remarks == NULL) { echo "<td style=color:#d9534f><b><i>x</i></b></td>"; } 
							else { echo "<td>".nl2br($row->villa_remarks)."</td>"; }
						?>
						<?php 
							if ($row->status_other == "Non Active") { echo "<td style=color:#d9534f><b><i>".$row->status_other."</i></b></td>"; } 
							else {	echo "<td>".$row->status_other."</td>"; }
						?>
						<td class="no-border-right">
							<div class="action-button">
								<a href="<?php echo $button_detail."/".$row->villa_id;; ?>">
									<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
								</a> 
								<?php if ($this->session->userdata('level')=="admin" OR $this->session->userdata('level')=="resmanager"): ?>
								<a href="<?php echo $button_edit."/".$row->villa_id;; ?>">
									<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
								</a> 
								<?php endif ?>
							</div>
						</td>
					</tr>
				<?php $no++; } ?>
			    </tbody>
			</table>
			</div> <!-- Table End -->