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
                                <div class="panel-heading">Result Sheet Collection </div>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Id</th>
                                        <th>Position</th>
                                        <th>No Of Candidate</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>President</td>
                                        <td><?php echo $president; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_per_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> 
                                    <tr>
                                        <td>2</td>
                                        <td> Vice President</td>
                                        <td><?php echo $vice_president; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_vice_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> 
                                    <tr>
                                        <td>3</td>
                                        <td>Secretary General</td>
                                        <td><?php echo $sec_gen; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_sen_gen_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> <tr>
                                        <td>4</td>
                                        <td>Asis. Secretary General</td>
                                        <td><?php echo $asis_sec_gen;?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_asis_sen_gen_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> <tr>
                                        <td>5</td>
                                        <td>Financial Secretary</td>
                                        <td><?php echo $fin_sec; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_fin_sen_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> <tr>
                                        <td>6</td>
                                        <td>Asis. Financial Secretary</td>
                                        <td><?php echo $asis_fin_sec; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_asis_fin_sen_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> <tr>
                                        <td>7</td>
                                        <td>Treasurer</td>
                                        <td><?php echo $treasurer; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_trea_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr>
                                     <tr>
                                        <td>8</td>
                                        <td>Welfare</td>
                                        <td><?php echo $welfare; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_welf_position"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr>
                                     <tr>
                                        <td>9</td>
                                        <td>Social Director </td>
                                        <td><?php echo $social_dir; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_social_dir"><button class="btn btn-primary">Collect Result</button></a></td>
                                        
                                    </tr> 

                                    <tr>
                                        <td>10</td>
                                        <td>Sale Director</td>
                                        <td><?php echo $sales; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_sale_position"><button class="btn btn-primary">Collect Result</button></a></td>

                                    </tr>  <tr>
                                        <td>11</td>
                                        <td>Sport Director</td>
                                        <td><?php echo $sport_dir; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_sport_dir"><button class="btn btn-primary">Collect Result</button></a></td>

                                    </tr>  <tr>
                                        <td>12</td>
                                        <td>Academic Sec</td>
                                        <td><?php echo $academic; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_academic_dir"><button class="btn btn-primary">Collect Result</button></a></td>

                                    </tr>  
                                    <tr>
                                        <td>13</td>
                                        <td>P.R.O I</td>
                                        <td><?php echo $pro; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/result_pro_1"><button class="btn btn-primary">Collect Result</button></a></td>

                                    </tr>

                                    <tr>
                                        <td>14</td>
                                        <td>P.R.O II</td>
                                        <td><?php echo $pro_II; ?></td>
                                        <td><a href="<?php echo base_url(); ?>Result_Comp/pro_II"><button class="btn btn-primary">Collect Result</button></a></td>

                                    </tr>
                                    
                                </table>
                                
                              </div>
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->