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
                              <div class="panel-heading">Bulk Student Upload</div>
                              <div class="panel-body">
                                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>ExcelUpload/save">
                                    

                                      <div class="form-group">
                                        <label for="excel_bulk">Upload Student From Excel Sheet</label>
                                        <input type="file" name="add_excel" id="add_excel" class="form-control" placeholder="Add From Excel"/>
                                      </div>

                                    <input type="submit" name="bulk_upload" class="btn btn-primary" value="Add Candidate"/>
                                </form>
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