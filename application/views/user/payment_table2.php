<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">

                  <div class="card">
                        <div class="card-header no-bg b-a-0"><h3>Receiving TBC</h3><span><h6>(new)</h6></span></div>
                        <div class="card-block">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Your Payer</th>
                                        <th>Amount To Pay</th>
                                        <th>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  <?php foreach ($user_payment as $value): ?>

                                  <tr>
                                    <td>
                                      <?php echo $value->first_name. ' ' . $value->last_name; ?>
                                    </td>
                                    <td>
                                      $<?php echo $value->payer_amount; ?>
                                    </td>
                                    <td>
                                      <?php echo $value->phone_number; ?>
                                    </td>
                                    </tbody>
                                    </table>
                                    
                                    <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       <th>Teller</th>
                                        <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <td>
                                    <?php if ($value->status == 2): ?>
                                        <?php if ($this->session->userdata['user_id'] == $value->reciever_id): ?>
                                    <button class="btn btn-outline-success btn-sm btn-block m-b-xs">
                                      <a href="<?php echo base_url(); ?>uploads/<?php echo $value->reciept_url; ?>" target="_blank">View Teller/ Reciept</a>
                                    </button>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                      <?php if ($value->status == 2): ?>
                                        <?php if ($this->session->userdata['user_id'] == $value->reciever_id): ?>
                                      <button id="confirm_pay" onclick="ConfirmPay(<?php echo $value->payment_id; ?>,'received',<?php echo $value->payer_id; ?>,<?php echo $value->payer_amount; ?>)" type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Confirm Received</span></button>
                                      <div class="loader text-center" style="display: none">
                                        <div class="loader-inner ball-pulse">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                  <?php elseif($value->status == 0): ?>
                                    <?php if ($this->session->userdata['user_id'] == $value->payer_id): ?>
                                      <button id="confirm_pay" onclick="ConfirmPay(<?php echo $value->payment_id; ?>,'paid')" type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Confirm Paid</span></button>
                                    <?php endif; ?>
                                    <?php else: ?>
                                      <button disabled type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Awaiting Confirmation</span></button>
                                  <?php endif; ?>
                                    </td>
                                  </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
                    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>

                    <script type="text/javascript">
                        $('.datatable').DataTable({
                        //     'ajax': 'data/datatables-arrays.json'
                        });


                         var ConfirmPay = function(id,type,user_id, amount){
                          $('#confirm_pay').hide();
                          $('.loader').show('slow');
                          var dataObject = {};
                          dataObject.payment_id = id;
                          dataObject.trans_type = type;
                          dataObject.user_id = user_id;
                          dataObject.amount = amount;
                            $.ajax({
                              method:"POST",
                              url:"http://www.tbc2naira.trade/account/index.php/payment/confirm_paytbc",
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
                    </script>
