<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Donation Villa"><meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Donation Villa">
  <meta name="theme-color" content="#4C7FF0">
  <title>Bitcoin Registration Form</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>styles/app.min.css">
</head>
<body>
  <div class="app no-padding no-footer layout-static bg-info ">
    <div class="session-panel">
      <div class="session">
        <div class="session-content">
          <div class="card card-block form-layout bg-primary ">
            <form method="post" action="<?php echo site_url('index.php/bitcoin'); ?>" name="data_register">
              <div class="text-xs-center m-b-3"><img src="<?php echo base_url(); ?>images/UNITY-FUNDS-green.png" height="80" alt="" class="m-b-1">
                <h5>Loyalty Pay Bitcoin Registration Form</h5>
                <p class="text-muted">Fill the form below to join</p>
                <div class="alert" id="error-messages" style="display:none">

                </div>
              </div>
              <fieldset class="form-group">
                <label for="username">Enter your Username</label>
                <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="username" required value="<?php echo set_value('username'); ?>"  >
                <span class="text-danger"><?php echo form_error('username'); ?></span>
              </fieldset>
              <fieldset class="form-group">
                <label for="password">Choose password</label>
                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="********" value="<?php echo set_value('password'); ?>">
             <span class="text-danger"><?php echo form_error('password'); ?></span>
              </fieldset>
            <fieldset class="form-group">
                <label for="password">Confirm password</label>
                <input type="password" name="passconf" class="form-control form-control-lg" id="password"confirm placeholder="********" value="<?php echo set_value('passconf'); ?>" >
              <span class="text-danger"><?php echo form_error('passconf'); ?></span>
              </fieldset>
              <fieldset class="form-group">
                <label for="username">Enter your First Name</label>
                <input type="text" name="firstname" class="form-control form-control-lg" id="firstname" placeholder="first name" value="<?php echo set_value('firstname'); ?>" >
              <span class="text-danger"><?php echo form_error('firstname'); ?></span>
              </fieldset>
              <fieldset class="form-group">
                <label for="username">Enter your Last Name</label>
                <input type="text" name="lastname" class="form-control form-control-lg" id="lastname" placeholder="last name" value="<?php echo set_value('lastname'); ?>" >
             <span class="text-danger"> <?php echo form_error('lastname'); ?></span>
              </fieldset>
               <fieldset class="form-group">
                <label for="username">Select Gender</label>
                <select required class="form-control form-control-lg "  name="gender" id="gender" >
                 <option value="">Select Gender</option>
                <option value=""> Male</option>
               <option value=""> Female</option>
              </select>
              </fieldset>
              <fieldset class="form-group">
                <label for="username">Enter Phone Number</label>
                <input type="text" name="phone_number"  class="form-control form-control-lg" id="phone_number" placeholder="" value="<?php echo set_value('phone_number'); ?>">
               <span class="text-danger"><?php echo form_error('phone_number'); ?></span>
              </fieldset>
               <fieldset class="form-group">
                <label for="username">Enter Bitcoin Address</label>
                <input type="text" name="bitcoin" class="form-control form-control-lg" id="bitcoin"  placeholder="Enter Bitcoin address" value="<?php echo set_value('bitcoin'); ?>">
              <span class="text-danger"><?php echo form_error('bitcoin'); ?></span>       
              </fieldset>
              <fieldset class="form-group">
                <label for="username">Enter Email Address</label>
                <input type="text" name="email"  class="form-control form-control-lg" id="email" placeholder="" value="<?php echo set_value('email'); ?>">
               <span class="text-danger"><?php echo form_error('email'); ?></span>
              </fieldset>
              <fieldset class="form-group">
                 <label for="username">Enter Sponsor's Email</label>
                <input type="text" name="sponsor"  class="form-control form-control-lg" id="sponsor" placeholder="Enter the Email of your sponsor" value="<?php echo set_value('sponsor'); ?>" required>
               <span class="text-danger"><?php echo form_error('sponsor'); ?></span>
              </fieldset>
              <fieldset class="form-group">
                 <label for="username">How did you hear about us</label>
                <input type="text" name="about"  class="form-control form-control-lg" id="about" placeholder="E.g from friend,nairaland,whatsapp,facebook e.t.c" value="<?php echo set_value('about'); ?>" required>
               <span class="text-danger"><?php echo form_error('about'); ?></span>
              </fieldset>
              <fieldset class="form-group">
                <label for="username">Enter Location</label>
                <input type="text" name="address" class="form-control form-control-lg" id="address" placeholder="Lagos" >
              </fieldset>
              
              <?php if ($is_referred): ?>
                <input type="hidden" name="referrer_id" id="referrer_id" value="<?php echo $referrer_id; ?>">
                <input type="hidden" name="has_refer" id="has_refer" value="1">
              <?php endif; ?>
              <input type="hidden" name="has_refer" id="has_refer" value="0">
              <form ... onsubmit="return checkForm(this);">
             <div class="checkbox has-success">
      <label>
        <input type="checkbox" id="checkboxSuccess" required value="option1"> I Agree to Terms and Conditions</label>
      </div>       
              <button type="submit" button class="btn btn-danger btn-block btn-md">Register</button>
              <button class="btn btn-default btn-block btn-sm" disabled  style="background-color: white; height: 50px; display:none" id="reg_user_in_working" type="submit"><img src="<?php echo base_url(); ?>image/utils/loader.gif" style="height: 50px;" alt="Loading"/></button>
               <div class="divider">
                 <span>OR</span>
               </div>
           </form>
           </div>
         </div>
         <footer class="text-xs-center p-y-1">
           <p><button class="btn btn-primary btn-sm"><a href="extra-forgot.html">
             Forgot Password? </a></button>
             &nbsp;&nbsp;·&nbsp;&nbsp; <button class="btn btn-info btn-sm"><a href="<?php echo base_url(); ?>index.php/auth/">Login</a></button>
              &nbsp;&nbsp;·&nbsp;&nbsp; <p><button class="btn btn-danger btn-sm"><a href="http://www.unityfunds.org">
             Return Home </a></button>
           </p>
         </footer>
       </div>
     </div>
   </div>
   
</script>
<script src="<?php echo base_url(); ?>scripts/app.min.js"></script>
<script src="<?php echo base_url(); ?>scripts/Auth.js"></script>
<script src="<?php echo base_url(); ?>scripts/register.js"></script>
<!-- <script src="<?php echo base_url(); ?>scripts/RegisterValidators.js"></script> -->
<script src="<?php echo base_url(); ?>vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>scripts/helpers/noty-defaults.js"></script> -->
<script src="<?php echo base_url(); ?>vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  
</body>
</html>
