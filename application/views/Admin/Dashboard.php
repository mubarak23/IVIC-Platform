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
                                <div class="panel-heading">Presential Candidate</div>

                                <!-- Table -->
                                <table class="table table-striped">
                                  <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Programme</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                  </tr>
                                  <tr>
                                  <?php foreach($students as $student): ?>
                                    <td><?php echo $student['id']; ?></td>
                                    <td><?php echo $student['full_name']; ?></td>
                                    
                                    <td><?php echo $student['programme']; ?></td>
                                    <td><?php echo $student['level']; ?></td>
                                    <td><a href="<?php echo base_url(); ?>Admin/stud_details/<?php echo $student['id']; ?>" class="btn btn-primary ">Full Details</a></td>
                                </tr>
                                  
                                <?php endforeach; ?>
                                </table>
                              </div>
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->