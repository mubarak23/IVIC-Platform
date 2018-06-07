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
                                <div class="panel-heading">Search For student</div>
                                <div class="panel-body">
                                <table class="table stripped">
                                  <tr>
                                  <th>ID</th>
                                  <th>Full Name</th>
                                  <th>Programme</th>
                                  <th>Level</th>
                                  <th>Action</th>
                                </tr>

                                <tr>
                                  
                                  <?php if($students): ?>
                                    <td><?php echo $students->id; ?></td>
                                    <td><?php echo $students->full_name; ?></td>
                                    
                                    <td><?php echo $students->programme; ?></td>
                                    <td><?php echo $students->level; ?></td>
                                    <td><a href="<?php echo base_url(); ?>Admin/stud_details/<?php echo $students->id; ?>" class="btn btn-primary ">Full Details</a></td>
                                  
                                <?php endif; ?>

                                </tr>
                                </table>
                              </div>
                                
                               
                              </div>
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->