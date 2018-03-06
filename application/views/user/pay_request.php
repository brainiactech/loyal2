<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">
<h6>YOUR PROJECT WILL BE AUTO-LISTED AFTER CONFIRMATION OF PAYMENT</h6>
<div class="card" >
  <div class="card-header no-bg b-a-0"><h3>Create Project</h3></div>
  <div class="card-block">
    <p>Enter Project details</p>
<?php if(!$has_bank): ?>
      <ul class="list-group m-b-1">
          <li class="list-group-item notification-bar-success">
              <div href="#" class="notification-bar-icon">
                  <div><i></i>
                  </div>
              </div>
              <div class="notification-bar-details"><a href="#" class="notification-bar-title"><b style="margin-right: 10px;">Please Fill in Your Bank Details</b></a>
              </div>
          </li>
      </ul>
    <?php endif; ?>

    <?php if($has_pending_pay): ?>
      <ul class="list-group m-b-1">
          <li class="list-group-item notification-bar-success">
              <div href="#" class="notification-bar-icon">
                  <div><i></i>
                  </div>
              </div>
              <div class="notification-bar-details"><a href="#" class="notification-bar-title"><b style="margin-right: 10px;">You have a Pending Project Transaction. You cannot Request to Create another project</b></a>
              </div>
          </li>
      </ul>
    <?php endif; ?>

    
    <?php if(!$has_pending_pay && $has_bank ): ?>
    <form class="" id="user_bank">

    <div class="form-group">
      <label class="form-control-label" for="inputSuccess1">Project Title</label>
      <input type="text" name="project_title" class="form-control form-control-success" id="project_title"  disabled>
     <label class="form-control-label" for="inputSuccess1">Project Purpose</label>
       <select class="form-control form-control-success" name="project_description" id="project_description" disabled>
                <option value=" ">House Rent</option>
                <option value="">Education</option>
	<option value="">Vacation</option>
	<option value="">Business</option>
              </select>
     <label class="form-control-label" for="inputSuccess1">Amount</label>
      <input type="text" name="amount_to_pay" class="form-control form-control-success" id="amount_to_pay" disabled >
    </div>
    <div class="checkbox has-success">
      <label>
        <input type="checkbox" id="checkboxSuccess" value="option1" required> I Agree to Terms and Conditions</label>
      </div>
      <button id="submit_request" type="button"  class="btn btn-outline-primary btn-lg btn-block m-b-xs"><span>Submit Project</span></button>
      <button id="loader" type="button" disabled style="display: none;" class="btn btn-outline-default btn-lg btn-block m-b-xs"><span>
        <div class="loader text-center">
          <div class="loader-inner ball-pulse">
              <div></div>
              <div></div>
              <div></div>
          </div>
      </div>
    </span>
  </button>
 
    </form>
    <?php endif; ?>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>
    <script type="text/javascript">

    $(document).ready(function(){
      $('#submit_request').on('click', function(e){
        e.preventDefault();
      $('#submit_request').hide();
      $('#loader').show('slow');
        var dataObject = {};
        dataObject.amount_to_pay = $('#amount_to_pay').val();
        dataObject.project_title = $('#project_title').val();
        dataObject.project_description = $('#project_description').val();
        $.ajax({
          method:"POST",
          url:"http://unityfunds.org/account/index.php/user/make_pay_addition",
          data:dataObject,
          contentType:"application/x-www-form-urlencoded",
          success:function(result){
            var data = JSON.parse(result);
            if(data.status == true){
              toastr.success('Project Submitted Successfully.', 'Success', {timeOut: 3000})
                setTimeout(function(){
                  window.location.reload();
                }, 3000)
              }
            else {
              toastr.success('Project Created Successfully, Success.', {timeOut: 3000})
              setTimeout(function(){
                  window.location.reload();
                }, 3000)
            }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            toastr.error('Please Try again.', 'An error occured', {timeOut: 5000})
            $('#submit_request').show();
            $('#loader').hide('slow');
          }
        })
      })
    })
    </script>
