<div class="topbar">
   <!-- LOGO -->
   <div class="topbar-left"><a href="/iHeartCoding/Mod" class="logo"><span><img src="/iHeartCoding/public/admin/assets/images/logo-light.png" alt="" height="18"> </span><i><img src="assets/images/logo-sm.png" alt="" height="22"></i></a></div>
   <nav class="navbar-custom">
      <ul class="navbar-right list-inline float-right mb-0">
         <!-- full screen -->
         <li class="dropdown notification-list list-inline-item d-none d-md-inline-block"><a class="nav-link waves-effect" href="#" id="btn-fullscreen"><i class="mdi mdi-fullscreen noti-icon"></i></a></li>
         <!-- notification -->
         <li class="dropdown notification-list list-inline-item">
            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="mdi mdi-bell-outline noti-icon"></i> <span class="badge badge-pill badge-danger noti-icon-badge">3</span></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg" style="">
               <!-- item-->
               <h6 class="dropdown-item-text">Notifications (258)</h6>
               <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 443.594px;">
                  <div class="slimscroll notification-item-list" style="overflow: hidden; width: auto; height: 443.594px;">
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                        <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                        <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                        <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                     </a>
                  </div>
                  <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                  <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
               </div>
               <!-- All--><a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a>
            </div>
         </li>
         <li class="dropdown notification-list list-inline-item">
            <div class="dropdown notification-list nav-pro-img">
               <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="/iHeartCoding/public/upload/users/<?php echo $_SESSION['u_avatar']?>" alt="user" class="rounded-circle"></a>
               <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                  <!-- item-->
                  <a class="dropdown-item" href="/iHeartCoding/Admin/Profile"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a> 
                  <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My Wallet</a> 
                  <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings m-r-5"></i> Settings</a>                        
                  <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="/iHeartCoding/Logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
               </div>
            </div>
         </li>
      </ul>
      <ul class="list-inline menu-left mb-0">
         <li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li>
      </ul>
   </nav>
</div>