
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Helpers premium"><meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Unity funds">
  <meta name="theme-color" content="#4C7FF0">
  <title>Forgot password Form</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>styles/app.min.css">
</head>
<body>
<div class="container">
     	<div class="row padding-top-btm">
    
  			<div class="col-md-4">
            	<div class="new-car-con">

<form method="post" action="doforget" role="form" >
<div class="form-group">
<?php if($this->session->flashdata('message')) {?>
 <label><span style="color: #CC6633"><?php echo $this->session->flashdata('message');?><span></label>
<?php }?>

</div>
<h4>Forget pasword</h4>
<div class="form-group">
    <label for="txtLoginid">Email Id</label>
     <input name="emailid" type="email" size="25" id="emailid" placeholder="Enter your email" class="form-control" value="<?php echo set_value('emailid');?>" />
     <span style="color:red"><?php echo form_error('emailid');?></span>
     </div>
      
  
  <button type="submit" class="btn btn-default">Submit</button>&nbsp;&nbsp;·&nbsp;&nbsp;
OR
&nbsp;&nbsp;·&nbsp;&nbsp; <button class="btn btn-info btn-sm"><a href="<?php echo base_url(); ?>index.php/auth/">Proceed to Login</a></button>
</form>
</div></div>
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
