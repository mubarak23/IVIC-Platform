	<div class="col-md-8">
					<div class="main-col">
						<div class="block">
							<h1 class="pull-left">Welcome Home Admin</h1>
							<h4 class="pull-right">Full Access Here</h4>
							<div class="clearfix"></div>
							<hr>
                            <section>
                            <div class="row">
                            <div class="col-md-4"> <i class="fa fa-user fa-5x fa-border active"></i>
                                <h4>Total Number of Candidate</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-text-o fa-5x fa-border"></i>
                                <h4>Total Number Of Total Vote</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-word-o fa-5x fa-border"></i>
                                <h4>Total Number of Student</h4>
                                </div>
                            </div>
                            </section>

                            <section>
                              <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Social Director</div>

                                <!-- Table -->
                                <table class="table table-striped">
                                  <tr>
                                    <th>ID</th>
                                    <th>candidate Id</th>
                                    <th>Full Name</th>
                                    <th>Position</th>
                                    <th>Total Vote</th>
                                    
                                  </tr>
                                  <tr>
                                  <?php if($social_position_1): ?>
                                    <td><?php echo $social_position_1->id; ?></td>
                                   <td><?php echo $social_position_1->student_id?></td>
                                   <td><?php echo $social_position_1->full_name; ?></td>
                                    <td> Social Director</td>
                                    <td><?php echo $vote_count_social_1; ?></td>
                                </tr>
                                 <?php endif; ?>

                                 <tr>
                                  <?php if($social_position_2): ?>
                                    <td><?php echo $social_position_2->id; ?></td>
                                   <td><?php echo $social_position_2->student_id?></td>
                                   <td><?php echo $social_position_2->full_name; ?></td>
                                    <td> Social Director</td>
                                    <td><?php echo $vote_count_social_2; ?></td>
                                </tr>
                                 <?php endif; ?>
                                
                                
                                </table>
                               
                              </div>
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->