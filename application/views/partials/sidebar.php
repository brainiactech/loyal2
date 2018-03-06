<div class="off-canvas-overlay" data-toggle="sidebar"></div>
<div class="sidebar-panel bg-white text-success">
    <div class="brand"> <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up"><i class="material-icons">menu</i> </a>
        <a class="brand-logo">
          <img class="expanding-hidden" style="width: 200px; height: 200px;" src="<?php echo base_url(); ?>images/TBC2NAIRALOGO3.png" alt="">
        </a>
    </div>
    <div class="nav-profile dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <div class="user-image"><img src="<?php echo base_url(); ?>images/profile-avatar.jpg" class="avatar img-circle" alt="user" title="user">
            </div>
            <div class="user-info expanding-hidden">
              <?php
              // print_r($user_details);
              echo $user->first_name. ' ' . $user->last_name;
              // echo "Williams Isaac";
              ?>
              <small class="bold">TBC2naira</small>
            </div>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="javascript:;">Account Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:;">Help</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a>
        </div>
    </div>
    <nav>
        <p class="nav-title">NAVIGATION</p>
        <ul class="nav">
          
          <?php if ($this->session->userdata['user_type'] == 0): ?>
<li><a href="<?php echo base_url(); ?>index.php/user"><i class="material-icons text-primary">home</i> <span>Home</span></a>
          </li>
            <li><a href="<?php echo base_url(); ?>index.php/user/bank"><i class="material-icons text-primary">account_balance_wallet</i> <span>Bank Details</span></a>
            </li>
                <li><a href="<?php echo base_url(); ?>index.php/user/bitcoinadd"><i class="material-icons text-primary">account_balance_wallet</i> <span>TBC Details</span></a>
            </li>
            <li><a href="<?php echo base_url(); ?>index.php/reg"><i class="material-icons text-primary">directions_run</i>Register User</span></a>
            </li>
<li><a href="<?php echo base_url(); ?>index.php/user/gen"><i class="material-icons text-primary">directions_run</i> <span>Activate Account</span></a>
            </li>
            <li><a href="<?php echo base_url(); ?>index.php/user/my_referral"><i class="material-icons text-primary">directions_walk</i> <span>My Network</span></a>
            </li>
<li><a href="<?php echo base_url(); ?>index.php/contactform"><i class="material-icons text-primary">chat</i> <span>Support</span></a>
            </li>
<li><a href="<?php echo base_url(); ?>index.php/buy"><i class="material-icons text-primary">chat</i> <span>Buy TBC</span></a>
            </li>
<li><a href="<?php echo base_url(); ?>index.php/admin/pair"><i class="material-icons text-primary">chat</i> <span>Sell TBC</span></a>
            </li>
          <?php elseif($this->session->userdata['user_type'] == 1): ?>
<li><a href="<?php echo base_url(); ?>index.php/admin"><i class="material-icons text-primary">home</i> <span>Home</span></a>
          </li>
   
         


<li><a href="<?php echo base_url(); ?>index.php/deleteuser"><i class="material-icons text-primary">home</i> <span>User Details</span></a>
<li><a href="<?php echo base_url(); ?>index.php/block"><i class="material-icons text-primary">home</i> <span>Block/Unblock</span></a>
<li><a href="<?php echo base_url(); ?>index.php/blocked_list"><i class="material-icons text-primary">home</i> <span>Blocked List</span></a>
<li><a href="<?php echo base_url(); ?>index.php/user/generate"><i class="material-icons text-primary">home</i> <span>Generate Key</span></a>
          <?php endif; ?>
        </ul>
    </nav>
</div>
