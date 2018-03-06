<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">

                  <div class="card">
                        <div class="card-header no-bg b-a-0"><h3>Buying TBC with Naira</h3><span><h6>(new)</h6></span></div>
                        <div class="card-block">
                            
                                  <?php foreach ($user_payment as $value): ?>
                                  <table class="table table-bordered ">
                                <thead>
                                    <tr>

                                        <th>To Pay</th><br />
                                        <th>Amount To Pay</th><br />
                                        <th>Phone Number</th><br />
                                                                             
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <?php echo $value->first_name. ' ' . $value->last_name; ?>
                                    </td>
                                    <td>
                                      ₦<?php echo $value->payer_amount; ?>
                                    </td>
                                    <td>
                                      <?php echo $value->phone_number; ?>
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                     <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                     <th>Bank Name</th>  
                                         <th>Account Number</th><br />
                                        <th>Account Name</th><br />

                                       </tr>
                                        
                                </thead>
                                <tbody>
                                <tr>
                                    
                                    <td>
                                      <?php echo $value->bank_name; ?>
                                     
                                    </td>
                                    <td>
                                      <?php echo $value->account_number; ?>
                                    </td>
                                    <td>
                                      <?php echo $value->account_name; ?>
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                     <table class="table table-bordered ">
                                <thead>
                                <tr>
                                     <th>Action</th><br />
                                     </tr>
                                     </thead>
                                <tbody>
                                <tr>
                                    <td>
                                      <?php if ($value->status == 2): ?>
                                        <?php if ($this->session->userdata['user_id'] == $value->reciever_id): ?>
                                      <button id="confirm_pay" onclick="ConfirmPay(<?php echo $value->payment_id; ?>,'received')" type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Confirm Recieved</span></button>
                                      <div class="loader text-center" style="display: none">
                                        <div class="loader-inner ball-pulse">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                      <button disabled type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Awaiting Receiver Confirmation</span></button>

                                    <?php endif; ?>
                                  <?php elseif($value->status == 0): ?>
                                    <?php if ($this->session->userdata['user_id'] == $value->payer_id): ?>
                                      
                                      <form id="ajaxUpload" action="" method="post" enctype="multipart/form-data">
                                          <input class="btn upload_file btn-outline-success btn-sm btn-block m-b-xs" type="file" name="file" id="file">
                                          <input type="hidden" name="" id="payment_id" value="<?php echo $value->payment_id; ?>">
                                          <!-- <button id="uploadBtn" type="submit">Upload</button> -->
                                      </form>
                                      <p id="success_upload" class="text-center text-success" style="display: none">Upload Sucessfull, Please confirm below</p>
                                      <button id="confirm_pay" onclick="ConfirmPay(<?php echo $value->payment_id; ?>,'paid')" type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs" disabled><span>Confirm Paid</span></button>
                                    <?php else: ?>
                                      <button disabled type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Awaiting Paid Status</span></button>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                    </td>
                                  </tr>

                                <?php endforeach; ?>
                                </tbody>
                                <!-- Form -->
                                
                            </table>
                        </div>
                    </div>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
                    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>
                    <script src="<?php echo base_url(); ?>scripts/jquery.form.min.js" charset="utf-8"></script>

                    <script type="text/javascript">
                        $('.datatable').DataTable({
                        //     'ajax': 'data/datatables-arrays.json'
                        });


                         var ConfirmPay = function(id,type){
                          $('#confirm_pay').hide();
                          $('.loader').show('slow');
                          var dataObject = {};
                          dataObject.payment_id = id;
                          dataObject.trans_type = type;
                            $.ajax({
                              method:"POST",
                              url:"http://www.tbc2naira.trade/account/index.php/payment/confirm_pay",
                              data:dataObject,
                              contentType:"application/x-www-form-urlencoded",
                              success:function(result){
                                var data = JSON.parse(result);
                                if(data.status == true){
                                  toastr.success('Payment Successfully Confirmed.', 'Success', {timeOut: 3000})
                                    setTimeout(function(){
                                      window.location.reload();
                                    }, 3000)
                                  }
                                else {
                                  toastr.error('Could not confirm payment, Please try again.', 'Erorr Confirming Payment', {timeOut: 5000})
                                  $('#confirm_pay').show();
                                  $('.loader').hide();
                                }
                              },
                              error: function(XMLHttpRequest, textStatus, errorThrown) {
                                console.log(textStatus);
                                console.log(errorThrown);
                                toastr.error('Please Try again.', 'An error occured', {timeOut: 5000})
                                $('#confirm_pay').show();
                                $('.loader').hide();
                              }
                            })
                        }


                        $(document).ready(function() { 
                          $(".upload_file").on('change', function(){
                           
                              data = new FormData();
                              jQuery.each(jQuery('#file')[0].files, function(i, file) {
                                  data.append('file-'+i, file);
                              });
                              var payment_id = parseInt($("#payment_id").val());

                              // console.log(data);
                              // return;
                              jQuery.ajax({
                                url: '<?php echo base_url(); ?>index.php/upload/upload_file?payment_id='+payment_id,
                                data: data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                type: 'POST',
                                success: function(result){
                                  var data = JSON.parse(result);
                                    console.log(result);
                                    if (data.status) {
                                      $("#ajaxUpload").hide();
                                      $("#success_upload").show('slow');
                                      $("#confirm_pay").removeAttr('disabled');
                                    }
                                    else {
                                  toastr.error(data.message.error, 'Error Occured', {timeOut: 3000})
                                    }
                                }
                            });
                          })
                        }); 
                    </script>
