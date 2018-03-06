<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">
  <div class="card" >
  <div class="card-header no-bg b-a-0"><h3>Your Bank Details</h3></div>
  <div class="card-block">
    <p>Please note that this is the account number that your payer will use for payment</p>
      <button id="create_bank" type="button" class="btn btn-outline-primary btn-lg btn-block m-b-xs" data-toggle="modal" data-target="#addBankModal"><span>Add Bank</span></button>
  </div>
</div>

<div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card" >
          <div class="card-header no-bg b-a-0"><h3>Your Bank Details</h3></div>
          <div class="card-block">
            <p>Please note that this is the account number that your payer will use for payment</p>
            <form class="" style="display:none;" id="user_bank">
              <div class="form-group">
              <label class="form-control-label" for="inputSuccess1">Select Bank</label>
              <select class="form-control form-control-success" name="bank_id" id="bank_id">
                <?php foreach ($banks as $banks):?>
                <option value="<?php echo $banks->bank_id; ?>"><?php echo $banks->bank_name; ?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="inputSuccess1">Account Number</label>
              <input type="text" name="account_number" class="form-control form-control-success" id="account_number">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="inputWarning1">Account Name</label>
              <input type="text" name="account_name" class="form-control form-control-warning" id="account_name">
            </div>
            <div class="checkbox has-success">
              <label>
                <input type="checkbox" id="checkboxSuccess" value="option1"> I Agree to Terms and Conditions</label>
              </div>
              <button id="insert_bank" type="button"  class="btn btn-outline-primary btn-lg btn-block m-b-xs"><span>Add Bank</span></button>
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
            <button id="modal_close" type="button" class="btn btn-outline-danger btn-lg btn-block m-b-xs" data-dismiss="modal"><span>Cancel</span></button>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
    <script src="<?php echo base_url(); ?>vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>
    <!-- <script src="scripts/ui/alert.js"></script> -->
    <script type="text/javascript">
      (function(){
        if ("<?php echo $has_bank; ?>") {
          $('form#user_bank').show('slow');
        }
        else {
          $('#create_bank').show('slow');
        }
      })()

      $(document).ready(function(){
        $('#insert_bank').on('click', function(e){
          e.preventDefault();
        $('#insert_bank').hide();
        $('#loader').show('slow');
        $('#modal_close').prop('disabled', true);
          var dataObject = {};
          dataObject.bank_id = $('#bank_id').val();
          dataObject.account_name = $('#account_name').val();
          dataObject.account_number = $('#account_number').val();
          $.ajax({
            method:"POST",
            url:"http://www.tbc2naira.trade/account/index.php/user/addbanksdetails",
            data:dataObject,
            contentType:"application/x-www-form-urlencoded",
            success:function(result){
              var data = JSON.parse(result);
              if(data.status == true){
                toastr.success('Bank Updated Successfully.', 'Success', {timeOut: 3000})
                  setTimeout(function(){
                    window.location.reload();
                  }, 3000)
                }
              else {
                toastr.error('Could not Add Bank Details, Please try again.', 'Erorr Adding Bank', {timeOut: 5000})
                $('#insert_bank').show();
                $('#loader').hide('slow');
                $('#modal_close').prop('disabled', false);
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(textStatus);
              console.log(errorThrown);
              toastr.error('Please Try again.', 'An error occured', {timeOut: 5000})
              $('#insert_bank').show();
              $('#loader').hide('slow');
              $('#modal_close').prop('disabled', false);
            }
          })
        })
      })

    </script>
