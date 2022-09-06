          <div class="col-sm-12">
            <br /><br />

              <div class="col-sm-4">
                <div class="top-logo-dashboard"> <img src="<?php echo $logoBrhv; ?>" alt="Bali Realty Holiday Villas"> </div>
                <div class="panel panel-new-enquiry-balirealty">
                    <div class="panel-heading">Bali Realty Holiday Villas</div>
                      <div class="panel-body">
                        <?php $query = $this->db->query("SELECT * FROM balirealtyhv 
                        LEFT JOIN user ON user.user_id=balirealtyhv.reservation_id 
                        WHERE user.name='$session_login'
                        AND status_enquiry_id='1' 
                        AND balirealtyhv_status='1'");
                        echo "Total new enquiry : ".$query->num_rows(); ?>
                    </div> <!-- End panel body -->
                </div> <!-- End panel default -->
                <div class="btn btn-brhv center-block"><a href="<?php echo base_url('reservation/brhv_enquiry/new_enquiry'); ?>">Go to See</a></div>
              </div> <!-- End col 4 -->

              <div class="col-sm-4">
                <div class="top-logo-dashboard"> <img src="<?php echo $logoBve; ?>" alt="Bali Villa Escapes"> </div>
                <div class="panel panel-new-enquiry-balivillaescapes">
                  <div class="panel-heading">Bali Villa Escapes</div>
                    <div class="panel-body">
                      <?php $query = $this->db->query("SELECT * FROM balivillaescapes 
                      LEFT JOIN user ON user.user_id=balivillaescapes.reservation_id 
                      WHERE user.name='$session_login'
                      AND status_enquiry_id='1' 
                      AND balivillaescapes_status='1'");
                      echo "Total new enquiry : ".$query->num_rows(); ?>
                    </div> <!-- End panel body -->
                </div> <!-- End panel default -->
                <div class="btn btn-bve center-block"><a href="<?php echo base_url('reservation/bve_enquiry/new_enquiry'); ?>">Go to See</a></div>
              </div> <!-- End col 4 -->

              <div class="col-sm-4">
                <div class="top-logo-dashboard"> <img src="<?php echo $logoAhr; ?>" alt="Asia Holiday Retreats"> </div>
                <div class="panel panel-new-enquiry-asiaholidayretreats">
                  <div class="panel-heading">Asia Holiday Retreats</div>
                    <div class="panel-body"> 
                      <?php $query = $this->db->query("SELECT * FROM balivillasonline 
                      LEFT JOIN user ON user.user_id=balivillasonline.reservation_id 
                      WHERE user.name='$session_login'
                      AND status_enquiry_id='1' 
                      AND balivillasonline_status='1'");
                      echo "Total new enquiry : ".$query->num_rows(); ?>                  
                    </div> <!-- End panel body -->
                </div> <!-- End panel default -->
                <div class="btn btn-ahr center-block"><a href="<?php echo base_url('reservation/bvo_enquiry/new_enquiry'); ?>">Go to See</a></div>
              </div> <!-- End col 4 -->

          </div> <!-- End col 12 -->