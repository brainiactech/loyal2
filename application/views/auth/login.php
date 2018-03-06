  <!doctype html>
  <html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Unity Funds"><meta name="apple-mobile-web-app-capable" content="yes">
<meta name="keywords" content="Unity Funds Login Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Unity Funds">
    <meta name="theme-color" content="#4C7FF0">
    <title>Tbc2trade Login</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>styles/app.min.css">
  </head>
  <body>
    <div class="app no-padding no-footer layout-static">
      <div class="session-panel">
        <div class="session">
          <div class="session-content">
            <div class="card card-block form-layout">
              <form role="form" id="validate" method="POST" action="<?php echo base_url(); ?>index.php/auth/login">
                <div class="text-xs-center m-b-3"><img src="<?php echo base_url(); ?>images/TBC2NAIRALOGO3.png" height="80" alt="" class="m-b-1">
                  <h5>Tbc2trade Login</h5>
                  <p class="text-muted">Sign In With Your Tbc2trade ID</p>
                  <div class="alert" id="login_state" style="display:none">
                    <h5 class="login_message">
                      Login Successful, You will be redirected in a minute
                    </h5>
                  </div>
                </div><fieldset class="form-group">
                  <label for="username">Enter your Username</label>
                  <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="username" required>
                </fieldset>
                <fieldset class="form-group">
                  <label for="password">Enter your password</label>
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="********" required>
                </fieldset>
                <button class="btn btn-primary btn-block btn-lg" type="submit">Login</button>
                <!-- <button class="btn btn-primary btn-block btn-lg" id="log_user_in" type="submit">Login</button> -->
                <button class="btn btn-default btn-block btn-sm" disabled  style="background-color: white; height: 50px; display:none" id="log_user_in_working" type="submit"><img src="<?php echo base_url(); ?>image/utils/loader.gif" style="height: 50px;" alt="Loading"/></button>
                 <div class="divider">
                   <span>OR</span>
                 </div>
             </form>
             </div>
           </div>
           <footer class="text-xs-center p-y-1">
             <p><button class="btn btn-danger btn-sm"><a href="<?php echo base_url(); ?>index.php/forgot/doforget">
               Forgot Password? </a></button>
               &nbsp;&nbsp;·&nbsp;&nbsp; <button class="btn btn-info btn-sm"><a href="<?php echo base_url(); ?>index.php/form">Create an Account</a></button>
             </p>
           </footer>
         </div>
       </div>
     </div>
     <script type="text/javascript">
     window.paceOptions = {
        document: true,
        eventLag: true,
        restartOnPushState: true,
        restartOnRequestAfter: true,
        ajax: {
          trackMethods: [ 'POST','GET']
        }
      };
  </script>
  <script src="<?php echo base_url(); ?>scripts/app.min.js"></script>
  <script src="<?php echo base_url(); ?>scripts/Auth.js"></script>
  <script src="<?php echo base_url(); ?>vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
    $('#validate').validate();
    </script>
  </body>
  </html>
