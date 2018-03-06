<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">

                  <div class="card">
                        <div class="card-header no-bg b-a-0"><h3>Your Referrals </h3></div>
                        <div class="card-block">
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>You Referred</th>
                                        <th>Level</th>
                                        <th>Phone number</th>
                                        <th>Account</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php echo $sponsor->referred_by; ?>
                                  <?php foreach ($refer as $value): ?>

                                  <tr>
                                    <td>
                                      <?php echo $value->first_name. ' ' . $value->last_name; ?>
                                    </td>
                                    <td>
                                      <?php echo $value->level; ?>
                                              
                                             
                                    </td>
                                    <td>
                                      <?php echo $value->phone_number; ?>
                                              
                                             
                                    </td>
                                    <td>
                                      <?php if($value->activated): ?>
                                        <button id="confirm_pay" disabled="disabled" type="button" class="btn btn-outline-success btn-sm btn-block m-b-xs"><span>Activated</span></button>
                                      <?php else: ?>
                                        <button id="confirm_pay" disabled="disabled" type="button" class="btn btn-outline-info btn-sm btn-block m-b-xs"><span>Not Activated</span></button>
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


                                             </script>
