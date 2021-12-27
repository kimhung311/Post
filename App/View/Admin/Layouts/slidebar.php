 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
         <a class="sidebar-brand brand-logo" href="index.html"><img src="<?php echo URL_admin_index ?>logo.svg"
                 alt="logo" /></a>
         <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img
                 src="<?php echo URL_admin_index ?>ogo-mini.svg" alt="logo" /></a>
     </div>
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="#" class="nav-link">
                 <div class="nav-profile-image">
                     <img src="<?php echo URL_USER . $_SESSION['avatar'] ?>" alt="profile" />
                     <span class="login-status online"></span>
                     <!--change to offline or busy as needed-->
                 </div>
                 <div class="nav-profile-text d-flex flex-column pr-3">
                     <span class="font-weight-medium mb-2"></span>
                     <span class="font-weight-normal">
                         <?php echo $_SESSION['name']?>
                     </span>
                 </div>
                 <span class="badge badge-danger text-white ml-3 rounded">3</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <i class="mdi mdi-home menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?php echo BASE_URL ?>category/list_category">
                 <i class="mdi mdi-table-large menu-icon"></i>
                 <span class="menu-title">CATEGORIES</span>
                 <i class="menu-arrow"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?php echo BASE_URL ?>post/index">
                 <i class="mdi mdi-table-large menu-icon"></i>
                 <span class="menu-title">POSTS</span>
                 <i class="menu-arrow"></i>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="<?php echo BASE_URL ?>admin/list_admin">
                 <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                 <span class="menu-title">USER-ADMIN</span>
                 <i class="menu-arrow"></i>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="<?php echo BASE_URL ?>admin/list_customer">
                 <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                 <span class="menu-title">USER-CUSTOMER</span>
                 <i class="menu-arrow"></i>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="<?php echo BASE_URL ?>Comment/index">
                 <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                 <span class="menu-title">Comment</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">

                 </ul>
             </div>

         </li>

         <li class="nav-item sidebar-actions">
             <div class="nav-link">
                 <div class="mt-4">

                     <ul class="mt-4 pl-0">
                         <li><a href="<?php echo BASE_URL ?>login/logout">Sign Out</a></li>

                     </ul>
                 </div>
             </div>
         </li>
     </ul>
 </nav>