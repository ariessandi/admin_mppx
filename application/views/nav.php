
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo base_url();?>/assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                
                    
                    <li>
                        <a class="active-menu"  href="<?php echo base_url();?>Dash"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="<?php echo base_url();?>CoreMenu"><i class="fa fa-bar-chart-o fa-3x"></i> Core Menu</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url();?>RoleMenu"><i class="fa fa-bar-chart-o fa-3x"></i> Core Role</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url();?>User/listUser/<?=$this->session->userdata['id'];?>"><i class="fa fa-bar-chart-o fa-3x"></i> User</a>
                    </li>
                    <li>
                        <a   href="<?php echo base_url();?>Instansi"><i class="fa fa-bar-chart-o fa-3x"></i> Instansi</a>
                    </li> 
                    <li>
                        <a   href="<?php echo base_url();?>Gallery"><i class="fa fa-bar-chart-o fa-3x"></i> Gallery</a>
                    </li> 
                    <li>
                        <a   href="<?php echo base_url();?>Banner"><i class="fa fa-bar-chart-o fa-3x"></i> Banner</a>
                    </li>   
                      <li  >
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>               
                    
                                       
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>   
                </ul>
               
            </div>
            
        </nav>  
