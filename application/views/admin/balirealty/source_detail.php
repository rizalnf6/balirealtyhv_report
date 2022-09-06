<br />
<div class="container">

    <?php 
        $edit_success = $this->session->flashdata('edit_success');
        $delete_success = $this->session->flashdata('delete_success');
        
            if (isset($edit_success)) {
                echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
                      </a><strong>Well done! </strong>".$this->session->flashdata('edit_success')."</div>";
            } 
            elseif (isset($delete_success)) {
                echo "<div class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;
                      </a><strong>Well done! </strong>".$this->session->flashdata('delete_success')."</div>";
            } 
    ?>

    <div class="page-header">
        <?php echo $page_header; ?> <br />
        <a href="<?php echo $button_edit."/".$default['source_id']; ?>"><button type="button" class="btn btn-filter btn-xs">Edit</button></a> 
    </div>
  

    <div class="table-responsive">          
        <table class="table table-striped table-brhv">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Source Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Source Id</td>
                    <td>: <?php if(isset($default['source_id'])) {echo $default['source_id'];} ?></td>
                </tr>
                <tr>
                    <td>Source</td>
                    <td>: <?php if(isset($default['source'])) {echo $default['source'];} ?></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>: <?php if(isset($default['source_category'])) {echo $default['source_category'];} ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: <?php if(isset($default['status_other'])) {echo $default['status_other'];} ?></td>
                </tr>
            </tbody>
        </table>
    </div> <!--End Table Responsive-->

</div> <!--Container-->