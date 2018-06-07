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
                                <form class="form-group" method="POST" action="<?php echo base_url(); ?>Student/search_student">
                                  
                                      <div class="form-group">
                                        <label>Student By Registration Number</label><input type="text" name="reg_num" id="reg_num" class="form-control" placeholder="Enter The Registration Number"/>
                                    </div>
                                  <div>
                                    <div class="col-md-2">
                                  <button type="submit"  name="search_term" class="btn btn-default">Find Student</button>
                                </div>

                                     

                                    
                                  </div>
                                </form>
                              </div>
                                
                               
                              </div>
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->