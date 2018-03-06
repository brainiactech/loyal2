<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form </title>
    <!--load bootstrap css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/app.min.css">
    <link href="<?php echo base_url("path/to/bootstrap/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <?php $attributes = array("class" => "form-horizontal", "name" => "contactform");
            echo form_open("index.php/contactform", $attributes);?>
            <fieldset>
            <legend>Contact Form</legend>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label">Name</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="user_email" class="control-label">Email ID</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="user_email" placeholder="Your Email ID" type="text" value="<?php echo set_value('user_email'); ?>" />
                    <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="subject" class="control-label">Subject</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="subject" placeholder="Your Subject" type="text" value="<?php echo set_value('subject'); ?>" />
                    <span class="text-danger"><?php echo form_error('subject'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="message" class="control-label">Message</label>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="Your Message"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input name="submit" type="submit" class="btn btn-primary" value="Send" />   OR
<button class="btn btn-info btn-sm"><a href="<?php echo base_url(); ?>index.php/user">BACK</a></button>
                </div>
            </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
<script type =text/javascript" src="<?php echo  base_url(); ?>scripts/bootstrap.js"></script>
</body>
</html>