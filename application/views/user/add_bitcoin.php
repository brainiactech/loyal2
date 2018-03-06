<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">
  <div class="card" >
  <div class="card-header no-bg b-a-0"><h3>Your TBC Details</h3></div>
  <div class="card-block">
    <p>Please note that this is the TBC address that your payer will use for payment</p>
      <button id="create_bitcoin" type="button" class="btn btn-outline-primary btn-lg btn-block m-b-xs" data-toggle="modal" data-target="#addBitcoinModal"><span>Add TBC Details</span></button>
  </div>
</div>

<div class="modal fade" id="addBitcoinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card" >
          <div class="card-header no-bg b-a-0"><h3>Your TBC Details</h3></div>
          <div class="card-block">
            <p>Please note that this is the TBC address that your payer will use for payment</p>
            <form class="" style="display:none;" id="user_bitcoin">
              
            <div class="form-group">
              <label class="form-control-label" for="inputSuccess1">TBC Address</label>
              <input type="text" name="bitcoin_address" class="form-control form-control-success" id="bitcoin_address">
            </div>
            <div class="checkbox has-success">
              <label>
                <input type="checkbox" id="checkboxSuccess" value="option1"> I Agree to Terms and Conditions</label>
              </div>
              <button id="insert_bitcoin" type="button"  class="btn btn-outline-primary btn-lg btn-block m-b-xs"><span>Add TBC Address</span></button>
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
        if ("<?php echo $has_bitcoin; ?>") {
          $('form#user_bitcoin').show('slow');
        }
        else {
          $('#create_bitcoin').show('slow');
        }
      })()

      $(document).ready(function(){
        $('#insert_bitcoin').on('click', function(e){
          e.preventDefault();
        $('#insert_bitcoin').hide();
        $('#loader').show('slow');
        $('#modal_close').prop('disabled', true);
          var dataObject = {};
          
          dataObject.bitcoin_address = $('#bitcoin_address').val();
          $.ajax({
            method:"POST",
            url:"http://www.tbc2naira.trade/account/index.php/user/addbitcoindetails",
            data:dataObject,
            contentType:"application/x-www-form-urlencoded",
            success:function(result){
              var data = JSON.parse(result);
              if(data.status == true){
                toastr.success('Bitcoin Updated Successfully.', 'Success', {timeOut: 3000})
                  setTimeout(function(){
                    window.location.reload();
                  }, 3000)
                }
              else {
                toastr.error('Could not Add Bitcoin Details, Please try again.', 'Erorr Adding Bitcoin Address', {timeOut: 5000})
                $('#insert_bitcoin').show();
                $('#loader').hide('slow');
                $('#modal_close').prop('disabled', false);
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(textStatus);
              console.log(errorThrown);
              toastr.error('Please Try again.', 'An error occured', {timeOut: 5000})
              $('#insert_bitcoin').show();
              $('#loader').hide('slow');
              $('#modal_close').prop('disabled', false);
            }
          })
        })
      })

    </script>
