  <div class="card" >
  <div class="card-header no-bg b-a-0"><h3>Your TBC Details</h3></div>
  <div class="card-block">
    <p>Please note that this is the TBC address that your payer will use for payment</p>
    <form class="" action="index.html" method="post" style="display:none;" id="user_bitcoin">
      
    <div class="form-group">
      <label class="form-control-label" for="inputSuccess1">TBC Address</label>
      <input type="text" name="bitcoin_address" readonly value="<?php echo $user_bitcoin->bitcoin_address; ?>" class="form-control form-control-success" id="inputSuccess1">
    </div>
    
    <div class="checkbox has-success">
      <label>
        <input type="checkbox" checked readonly id="checkboxSuccess" value="option1"> I Agree to Terms and Conditions</label>
      </div>
      <button type="button" class="btn btn-outline-warning btn-lg btn-block m-b-xs"><span>Update TBC Address</span></button>
    </form>
      </div>
    </div>

<!-- Modal -->
<script type="text/javascript">
  (function(){
    if ("<?php echo $has_bitcoin; ?>") {
      $('form#user_bitcoin').show('slow');
    }
    else {
      $('#create_bitcoin').show('slow');
    }
  })()
  </script>
