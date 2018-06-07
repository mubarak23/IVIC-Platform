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
                                <div class="panel-heading">Sport Director</div>

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
                                  <?php if($sport_dir_1): ?>
                                    <td><h3><?php echo $sport_dir_1->id; ?></h3></td>
                                   <td><h3><?php echo $sport_dir_1->student_id?></h3></td>
                                   <td><h3><?php echo $sport_dir_1->full_name; ?></h3></td>
                                    <td><h3>Sport Director</h3></td>
                                    <td><h3><?php echo $vote_count_sport_1; ?></h3></td>

                                  <?php endif; ?>
                                </tr>

                                  <tr>
                                  <?php if($sport_dir_2): ?>
                                    <td><h3><?php echo $sport_dir_2->id; ?></h3></td>
                                   <td><h3><?php echo $sport_dir_2->student_id?></h3></td>
                                   <td><h3><?php echo $sport_dir_2->full_name; ?></h3></td>
                                    <td><h3>Sport Director</h3></td>
                                    <td><h3><?php echo $vote_count_sport_2; ?></h3></td>

                                  <?php endif; ?>
                                </tr>
                                 
                                 
                                
                                </table>
                               
                              </div>
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->