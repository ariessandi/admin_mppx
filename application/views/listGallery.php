
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Gallery</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <a  class="btn btn-primary" href="<?php echo base_url();?>Gallery/formGallery/">ADD</a><br><br>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">


                        <div class="panel-heading">
                             Gallery
                        </div>



            



                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>File Name</th>
                                            <th>Publish</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                                        
                                        foreach($profile as $k=>$v){
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?=$v['title'];?></td>
                                            <td class="center"><?=$v['filename'];?></td>
                                            <td class="center"><?=$v['publish'];?></td>
                                            <td class="center"><a href="<?php echo base_url();?>Gallery/editGallery/<?=$v['id'];?>">Edit</a></td>
                                            <td class="center"><a href="<?php echo base_url();?>Gallery/deleteGallery/<?=$v['id'];?>">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/js/custom.js"></script>
    
   
</body>
</html>
