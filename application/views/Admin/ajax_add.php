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
                                <h4>Total Number of Users</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-text-o fa-5x fa-border"></i>
                                <h4>Total Number Of Active Discussion</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-word-o fa-5x fa-border"></i>
                                <h4>Total Number of Active Reply</h4>
                                </div>
                            </div>
                            </section>

                            <section>

                             <div class="panel panel-default">
                              <div class="panel-heading">Add Candidate</div>
                              <div class="panel-body">
                                    <div class="alert alert-success" id="feedback"></div>
                                    <div class="form-group">
                                        <label>First Name</label><input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your First Name"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                        placeholder="Enter Your Last Name" >
                                    </div>

                                    <div class="form-group">
                                        <label>Registration Number</label><input type="text" name="reg_num" id="reg_num" class="form-control" placeholder="Enter The Registration Number"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" id="faculty" name="faculty" value="Engineering">
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="">Select Department</option>
                                            <option value="Electrical Engineering">Electrical Engineering</option>
                                            <option value="Computer Engineering">Computer Engineering</option>
                                            <option value="Civil Engineering">Civil Engineering</option>
                                            <option value="Agricultural Engineering">Agricultural Engineering</option>
                                            <option value="Mechanical Engineering">Mechanical Engieering</option>
                                            <option value="Machatronic Engineering">Mechatronic Engineering</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Select Level</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        </select>
                                    </div>

                                    
                                    <button type="button" id="submit" class="btn btn-primary">Add Student</button>
                              </div>
                            </div>
                                
                                 
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->

      <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/load.js"></script>
     <script type="text/javascript">
      

          
          var base_url = '<?php echo base_url() ;?>';
          //document.write(base_url);

     </script>