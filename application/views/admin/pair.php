<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/sweetalert/dist/sweetalert.css">
                  <div class="card">
                        <div class="card-header no-bg b-a-0"><h3>Sell Tbc</h3></div>
                            <h5><strong>Click on only one of your downlines and click submit to transfer to him/her the tbc you were paid for ....Kindly send the amount of TBC stated below to the TBC receiver. calculation is based on today's value </h5></strong>
                            <p><strong><h6><font color="red">Note:</font> Sending Tbc to this recipient means the person has paid you directly to your bank account and you've confirm it.</h6></strong></p>
                        <div class="card-block">
                          <div class="col-md-5">
<form role="form" id="validate" method="POST" action=" <?php echo base_url(); ?>index.php/payment/pair_user">
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>Downline</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php

                                  $i = 0;
                                  foreach ($requester as $values):
                                      // var_dump($values[0], $values[1]);
                                      $i++;
                                  ?>
                                  <tr id="helperClass<?php echo $i; ?>">
                                    <td>
                                      <label class="custom-control custom-checkbox">
                                        <input type="radio" value="<?php echo $values->user_id; ?>" id= "requester" name= "requester" class="custom-control-input"> <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description"><?php echo $values->first_name.' '.$values->last_name; ?></span>
                                      </label>
                                    </td>
                                    <td>
 <input type = "hidden" id= "requester_db_id" name="requester_db_id" value= " <?php echo $values->comfirm_paid_users; ?>"</input>
                                    <input type = "textbox" readonly value= " $<?php echo $values->amount; ?> TBC"</input>
<input type = "hidden" id= "amount" name = "amount"  value= " <?php echo $values->amount; ?>"</input>
                                    </td>

                                  </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                          </div>
<button type="submit" button class="btn btn-danger btn-block btn-md">Submit</button>
                          </form>
                                  
                        
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
                    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>
                    <script src="<?php echo base_url(); ?>vendor/sweetalert/dist/sweetalert.min.js"></script>
                    <!-- <script src="/scripts/ui/alert.js"></script> -->

                   