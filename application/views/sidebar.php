 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile position-relative" style="background: url(<?php echo base_url();?>/assets/mpro/assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url();?>/assets/mpro/material_files/profile.png" alt="user" class="w-100" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text pt-1"> 
                        <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                        <div class="dropdown-menu animated flipInY"> 
                            <a href="#" class="dropdown-item"><i class="ti-user"></i>
                                My Profile</a> 
                            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My
                                Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <div class="dropdown-divider"></div> 
                            <a href="authentication-login1.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
				
				
		<?php		
		// echo '<pre>';
		// print_r($this->session->userdata);
		
		
$menu=$this->session->userdata['menu'];	

		// echo $menu[3]['text'];
		// die;	
// echo '<pre>';	
// print_r($menu);die;
$jm=count($menu);
//echo $jm;
		?>
				
				
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                       
                       
					<li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="<?php echo base_url();?>Dash"><i class="mdi mdi-gauge"></i> Dashboard</a>
					</li>	
						
		
					<?php
					for($i=0;$i<$jm;$i++){
						?>
						
					<?php if($menu[$i]['childCount']>0){?>	
					 <li class="sidebar-item">	
					<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="<?=$menu[$i]['icon'];?>"></i><span class="hide-menu"><?=$menu[$i]['text'];?></span></a>	
					<ul aria-expanded="false" class="collapse first-level">
					<?php for($j=0;$j< $menu[$i]['childCount'];$j++){?>
                                <li class="sidebar-item"><a href="<?php echo base_url();?><?=$menu[$i]['childList'][$j]['path'];?>/<?=$menu[$i]['role_access_id'];?>" class="sidebar-link"><i class="mdi mdi-priority-low"></i><span class="hide-menu"> <?=$menu[$i]['childList'][$j]['text'];?></span></a></li>
					<?php } ?>						
						</ul>
                    </li>	
					<?php }else{?>	
					<li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="<?php echo base_url();?><?=$menu[$i]['text'];?>/main/<?=$menu[$i]['role_access_id'];?>"><i class="<?=$menu[$i]['icon'];?>"></i> <?=$menu[$i]['text'];?></a>
                    </li>
					<?php	
					} }
					 ?>
					
                     <!--li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>CoreMenu"><i class="mdi mdi-clipboard-text"></i> Core Menu</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>CoreRole"><i class="mdi mdi-clipboard-text"></i> Core Role</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>User/listUser/<?=$this->session->userdata['id'];?>"><i class="mdi mdi-clipboard-text"></i> User</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>Instansi"><i class="mdi mdi-clipboard-text"></i> Instansi</a>
                    </li> 
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>Gallery"><i class="mdi mdi-clipboard-text"></i> Gallery</a>
                    </li> 
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url();?>Banner"><i class="mdi mdi-clipboard-text"></i> Banner</a>
                    </li>   			
									
                       
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="authentication-login1.html" aria-expanded="false"><i
                                    class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
       