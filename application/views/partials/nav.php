<nav class="header navbar">
    <div class="header-inner">
        <div class="navbar-item navbar-spacer-right brand hidden-lg-up"> <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen"><i class="material-icons">menu</i> </a>
            <a class="brand-logo hidden-xs-down"><img src="/images/logo_white.png" alt="logo"> </a>
        </div><a class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#"><span>Dashboard </span>
<p> <center> EXCHANGE RATE:  ₦400 = $1 of TBC</center>
<span>SPONSOR:   <?php
             
              echo $spons->first_name. ' ' . $spons->last_name;
              
              ?>       </span><br>
<span>PHONE NUMBER:   <?php
             
              echo $spons->phone_number;
              
              ?>       </span></a>
</p>
        <div class="navbar-search navbar-item">
            <form class="search-form"><i class="material-icons">search</i>
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
        <div class="navbar-item nav navbar-nav">
            <div class="nav-item nav-link dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><span>English</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="javascript:;">English</a>
                </div>
            </div>
        </div>
    </div>
</nav>