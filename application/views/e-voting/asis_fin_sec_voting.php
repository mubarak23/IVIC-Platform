<section>
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default ">
              <div class="panel-heading">Select Voting Category</div>
              <div class="panel-body n">
                        <a href="<?php echo base_url(); ?>Evoting/pre_candidate"><button class="btn btn-primary section">President</button></a> 
                  
                   <a href="<?php echo base_url(); ?>Evoting/sec_gen_candidate"><button class="btn btn-primary section">Secetery General </button></a>

                   <a href="<?php echo base_url(); ?>Evoting/asis_sec_gen_candidate"><button class="btn btn-primary section">Asist.Secetery General </button></a>
                   <a href="<?php echo base_url(); ?>Evoting/fin_sec_candidate"><button class="btn btn-primary section">Financial Secetery</button></a>

                   <a href="<?php echo base_url(); ?>Evoting/asis_fin_sec_candidate"><button class="btn btn-primary section">Asist. Financial Secetery </button></a>

                  
                       <a href="<?php echo base_url(); ?>Evoting/sport_dir_candidate"><button class="btn btn-primary section">Sport Director </button></a>

               
                    
                   <a href="<?php echo base_url(); ?>Evoting/treasurer_candidate"><button class="btn btn-primary section">Treasurer </button></a>

                    
                   <a href="<?php echo base_url(); ?>Evoting/academic_dir_candidate"><button class="btn btn-primary section">Academic Director </button></a>
                   <a href="<?php echo base_url(); ?>Evoting/sales_dir_candidate"><button class="btn btn-primary section">Sales Director </button></a>

                   <a href="<?php echo base_url(); ?>Evoting/pro_candidate"><button class="btn btn-primary section">PRO I </button></a> 

                  
                    <a href="<?php echo base_url(); ?>Evoting/confirm_vote"><button class="btn btn-primary section">Confirm Vote </button></a>
              </div>
            </div>
          </div>
      </div>
  </div>

</section>

<div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-2">


           <div class="panel panel-default">
                      <div class="panel-heading">Asistant Financial Secetary</div>
                      <div class="panel-body">

                           <table class="table table-striped">
                  <tr>
                    <th>Candidate ID</th>
                    <th>Position</th>
                    <th>Candidate Name</th>
                    <th>Action</th>
                  </tr>
                  <?php foreach( $asis_fin_sec as $canditate): ?>
                  <tr>
                    <td><h4><?php echo $canditate["student_id"];  ?></h4></td>
                    <td><h4><?php echo $canditate['position']; ?></h4></td>
                    <td><h4><?php echo $canditate['full_name']; ?></h4></td>
                    <td>
                      
                      <div class="">
                        <span class="">
                          <form method="post" action="<?php echo base_url(); ?>Evoting/asis_fin_sec_vote">
                            <input type="hidden" name="candidate_id" value="<?php echo $canditate['id']; ?>" >
                            <input type="hidden" name="candidate_name" value="<?php echo $canditate['full_name']; ?>" >
                            <input type="hidden" name="vote_count" value="<?php echo $canditate['vote_count']; ?>">
                            <input type="submit" name="asis_fin_sec_vote" class="btn btn-lg btn-primary" value="Vote">
                          </form>
                        </span>
                      </div>

                    </td>
                  </tr>
                 <?php endforeach; ?>
                </table>
             

          


                      </div>
                    </div>
            
            
                        
              

        
          

           

        </div>
           
          
   
          
         
      </div>

      </div> 