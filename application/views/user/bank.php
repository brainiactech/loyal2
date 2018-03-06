  <div class="card" >
  <div class="card-header no-bg b-a-0"><h3>Your Bank Details</h3></div>
  <div class="card-block">
    <p>Please note that this is the account number that your payer will use for payment</p>
    <form class="" action="index.html" method="post" style="display:none;" id="user_bank">
      <div class="form-group">
      <label class="form-control-label" for="inputSuccess1">Select Bank</label>
      <input type="text" name="account_number" readonly value="<?php echo $user_bank->bank_name; ?>" class="form-control form-control-success" id="inputSuccess1">
    </div>
    <div class="form-group">
      <label class="form-control-label" for="inputSuccess1">Account Number</label>
      <input type="text" name="account_number" readonly value="<?php echo $user_bank->account_number; ?>" class="form-control form-control-success" id="inputSuccess1">
    </div>
    <div class="form-group">
      <label class="form-control-label" for="inputWarning1">Account Name</label>
      <input type="text" name="account_name" readonly value="<?php echo $user_bank->account_name; ?>" class="form-control form-control-warning" id="inputWarning1">
    </div>
    <div class="checkbox has-success">
      <label>
        <input type="checkbox" checked readonly id="checkboxSuccess" value="option1"> I Agree to Terms and Conditions</label>
      </div>
      <button type="button" class="btn btn-outline-warning btn-lg btn-block m-b-xs"><span>Update Bank</span></button>
    </form>
      </div>
    </div>

<!-- Modal -->
<script type="text/javascript">
  (function(){
    if ("<?php echo $has_bank; ?>") {
      $('form#user_bank').show('slow');
    }
    else {
      $('#create_bank').show('slow');
    }
  })()
  </script>
