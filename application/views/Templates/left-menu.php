<?php
  //$settings = getSettings();
  $userData = $this->session->userdata['user'];
?>
<aside class="main-sidebar">
    <section class="sidebar" >
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url($userData->profile_image)?>" onerror="this.src='<?=base_url("assets/images/user_avatar.jpg")?>'" class="user-image left-sid" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $userData->username; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li><a  href="<?= base_url('Dashboard') ?>"><i class="fa fa-bars" aria-hidden="true">
                </i><span>Dashboard</span></a>
            </li>
           
            <li class="treeview">
                
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>Vehicle Management</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?= base_url('Vehicle/addVehicle') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Add Vehicle
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('Vehicle/viewVehicle') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                View Vehicle
                            </a>
                        </li>   
                    </ul>
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>Location Management</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?= base_url('Location/addLocation') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Add Location
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('Location/mapLocation') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Map Location
                            </a>
                        </li>   
                    </ul>
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>User Management</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?= base_url('User/list_users') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Add Users
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('User/reset_password') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Reset Password
                            </a>
                        </li>   
                    </ul>
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>Company Management</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?= base_url('Company/addNewCompany') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Add Company
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('Company/listCompany') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                View Company
                            </a>
                        </li>   
                    </ul>
                    
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>Vehicle Type Management</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?= base_url('VehicleType/addVehicleType') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                Add Vehicle Type
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('VehicleType/viewVehicleType') ?>">
                                <i class="fa fa-circle-o text-aqua"></i>
                                View Vehicle Type
                            </a>
                        </li>   
                    </ul>
                    

                <li><a href="<?= base_url('Customer/listCustomerUsers') ?>">
                    <i class="fa fa-bars" aria-hidden="true">
                    </i><span>Customers</span></a>
                  
                </li>
               
            <?php if($this->session->userdata['user_type'] == 1){ ?>
                <li><a href="<?= base_url('Booking/listBookingDetails') ?>">
                    <i class="fa fa-bars" aria-hidden="true">
                    </i><span>Booking</span></a>
                <?php } ?>
                </li>
            
            <?php if($this->session->userdata['user_type'] == 1){ ?>
              <li class="treeview">
                <a href="#">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                        <span>Promocode</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= base_url('Promocode/addpromocode') ?>">
                            <i class="fa fa-circle-o text-aqua"></i>
                            Add New Promocode
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Promocode/listpromocode') ?>">
                            <i class="fa fa-circle-o text-aqua"></i>
                            View All Promocode
                        </a>
                    </li>
            
                </ul>
                <!-- <?php } ?> -->
            </li>
         
        


         
            
            <li><a href="<?= base_url('Customer/payType') ?>">
                    <i class="fa fa-bars" aria-hidden="true">
                    </i><span>Pay Types</span></a>
                   
                </li>
            <?php if($this->session->userdata['user_type'] == 1){ ?>
                <li><a href="<?= base_url('Settings') ?>">
                    <i class="fa fa-wrench" aria-hidden="true">
                    </i><span>Settings</span></a>
                </li>
		<?php } ?>

                </ul>
             
            
    </section>
</aside>

