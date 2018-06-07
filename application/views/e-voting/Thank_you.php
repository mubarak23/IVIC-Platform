<div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-9">
                        
              <div class="panel panel-default ">
              <div class="panel-heading">Thank You</div>
              <div class="panel-body ">
                <h3>Congratulation, You just completed your vote.</h3>
                

                <p>The Result of the the election will be announce immidiately the election is over</p>
                <p>Thank You.</p>
                </div>
                                <div class="panel-heading">Vote Casted Per Position <a href="<?php echo base_url(); ?>Autharization/Logout" class="pull-right"><button class="btn btn-primary">Logout</button></a></div>

                <h3>Here are the candidate you voted for on each postion</h3>
                <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Vote Casted Per Position <a href="<?php echo base_url(); ?>Evoting/vp_candidate" class="pull-right"><button class="btn btn-primary">Continue Voting</button></a>
                                
                <table class="table table-striped">
                  <tr>
                    <th>Candidate ID</th>
                    <th>Position</th>
                    <th>Candidate Name</th>
                  </tr>
                  <?php foreach( $student_vote as $vote): ?>
                  <tr class="success">
                    <td><h4><?php echo $vote["candidate_id"];  ?></h4></td>
                    <td><h4><?php echo $vote["position"]; ?></h4></td>
                    <td><h4><?php echo $vote["candidate_name"] ?></h4></td>
                  </tr>
                 <?php endforeach; ?>
                </table>
              </div>
            </div>
                

              </div>
            </div>

            
         
        </div>
           
          
   
          
         
      </div>

      </div> 