<?php
// print_r($profile);
if(!isset($profile)){$profile=array();}
$juma=count($profile);

if($juma==0){
    $vname="";
    $vdescription="";


}else{
    $vname=$profile['name'];
    $vdescription=$profile['description'];

}


?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Core Role</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Core Role
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Basic Form Examples</h3>
                                    <form role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" value="<?=$vname;?>"  name="name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" value="<?=$vdescription;?>"  name="description" class="form-control" />
                                        </div>
                                        


                                          <input type="submit" class="btn btn-primary" name="btnsubmit" value="SAVE">

                                    </form>
                       


                                 
    </div>
                                
 
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <h3>More Customization</h3>
                         <p>
                        For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank">click here</a> . We hope you will enjoy our template. This template is easy to use, light weight and made with love by binarycart.com 
                        </p>
                    </div>
                </div>
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/custom.js"></script>
    
   
</body>
</html>
