<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/sweetalert/dist/sweetalert.css">
                  <div class="card">
                        <div class="card-header no-bg b-a-0"><h3>User Details</h3></div>
                        <div class="card-block">
                          <div class="col-md-5">
                            
                          <div class="col-md-1"></div>
                          <div class="col-md-4">
<form role="form" id="validate" method="POST" action="<?php echo base_url(); ?>index.php/deleteuser/edit_user">
                            <table class="table table-bordered datatable" style=100%>
                                <thead>                               
         <tr> 
            <th> ID</th> 
            <th>First name</th>  
            <th>Last Name</th>
            <th> Phone Number</th>
            <th>Email</th>
 <th>Level</th>

 <th> username</th>
 <th> password</th>
            <th> Action</th>
             </tr>  
        </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($user_details); $i++) { ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><input type="textbox" id="firstname" name="firstname" readonly value="<?php echo $user_details[$i]->first_name; ?>"</input></td>
                        <td><input type="textbox" id="lastname" name="lastname" readonly value="<?php echo $user_details[$i]->last_name; ?>"</td>
                        <td><input type="textbox" id="phone" name="phone" readonly value="<?php echo $user_details[$i]->phone_number; ?>"</input></td>
 <td><input type="textbox" id="email" name="email" readonly value="<?php echo $user_details[$i]->email; ?>"</input></td>

 <td width="10"><input type="textbox" id="level"  name="level" size="3" readonly value="<?php echo $user_details[$i]->level; ?>"</input></td>
<input type="hidden" id="user_id" name="user_id" readonly value="<?php echo $user_details[$i]->user_id; ?>"</input>
<td><input type="textbox" id="username" name="username" readonly value="<?php echo $user_details[$i]->username; ?>"</input></td>
<td><input type="textbox" id="password" name="password" readonly value="<?php echo $user_details[$i]->password; ?>"</input></td>
                        <td><a href="<?php echo base_url() . "index.php/deleteuser/delete_user/" . $user_details[$i]->user_id; ?>">Delete</a> OR <a href="<?php echo base_url() . "index.php/deleteuser/display_user/" . $user_details[$i]->user_id; ?>">Edit</a></td>
                    </tr>
                    <?php } ?>
       
</tbody>   
                            </table>
                          </div>
</form>
                        </div>
                    </div>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
                    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>
                    <script src="<?php echo base_url(); ?>vendor/sweetalert/dist/sweetalert.min.js"></script>
                    <!-- <script src="/scripts/ui/alert.js"></script> -->

                    <script type="text/javascript">
                        $('.datatable').DataTable({
                        //     'ajax': 'data/datatables-arrays.json'
                        });

                        let helpers = [];
                        let requesters = [];
                        let HelperItems = [];
                        let RequesterItems = [];
                        let helper = {};
                        let requester = {};
                        var StateProvider = function (value, index, type,amount,db_id) {
                          function arrayObjectIndexOf(myArray, searchTerm, property) {
                            for(var i = 0, len = myArray.length; i < len; i++) {
                              if (myArray[i][property] === searchTerm) return i;
                            }
                            return -1;
                          }
                          if (type === 'r') {
                            var newR = {user_id: value, index: index, amount: amount, requester_db_id: db_id};
                            if (true) {
                              RequesterItems.push(newR);
                              var totalHelperSum = 0;
                              for (var i = HelperItems.length - 1; i >= 0; i--) {
                                totalHelperSum += HelperItems[i].amount;
                              }

                              var totalRequesterSum = 0;
                              for (var i = RequesterItems.length - 1; i >= 0; i--) {
                                totalRequesterSum += RequesterItems[i].amount;
                              }

                              if (totalRequesterSum == totalHelperSum) {
                                
                                triggerCompletePair();
                              }
                            }
                          }
                          else if (type === 'h') {
                            var newH = {user_id: value, index: index, amount: amount, helper_db_id: db_id};
                            if (true) {
                              HelperItems.push(newH);
                              var totalHelperSum = 0;
                              for (var i = HelperItems.length - 1; i >= 0; i--) {
                                totalHelperSum += HelperItems[i].amount;
                              }
                            }
                        }
                        // console.log('Total Helper Sum', totalHelperSum);
                        }

                        var triggerCompletePair = function(helperIndex, requesterIndex){
                          swal({
                            title:'Are you sure to Pair?',
                            text:'This will merge Helper to Requester!',
                            type:'warning',
                            showCancelButton:true,
                            confirmButtonColor:'#DD6B55',
                            confirmButtonText:'Yes, Merge!',
                            closeOnConfirm:false
                          },
                            function(){
                              var success = [];
                              var error = [];
                              for (var i = HelperItems.length - 1; i >= 0; i--) {
                              var helper = HelperItems[i];
                              var requester = RequesterItems[0];                            
                              var dataObject = {};
                              dataObject.helper_id = helper.user_id;
                              dataObject.helper_amount = helper.amount;
                              dataObject.reciever_id = requester.user_id;
                              dataObject.reciever_amount = requester.amount;
                              dataObject.helper_db_id = helper.helper_db_id;
                              dataObject.requester_db_id = requester.requester_db_id;
                              // console.log(dataObject);
                              // return;
                                $.ajax({
                                  method:"POST",
                                  url:"<?php echo base_url(); ?>index.php/payment/pair_users",
                                  data:dataObject,
                                  contentType:"application/x-www-form-urlencoded",
                                  success:function(result){
                                    var data = JSON.parse(result);
                                    if(data.status == true){
                                      $("#helperClass"+helper.index).hide('slow');
                                      $("#requesterClass"+requester.index).hide('slow');                 
                                      success.push('done');
                                      }
                                    else {
                                      error.push('error');
                                    }
                                  },
                                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                    error.push('error');
                                  }
                                })
                            }

                            console.log('Success', success.length);
                            console.log('Error', error.length);
                            if (success) {
                              HelperItems.splice(0,HelperItems.length);
                              RequesterItems.splice(0,RequesterItems.length);
                              swal('Merge Successful!','','success');
                              setTimeout(function(){
                                      window.location.reload();
                                    }, 3000)
                            }
                            else if (error) {
                              HelperItems.splice(0,HelperItems.length);
                              RequesterItems.splice(0,RequesterItems.length);
                              swal('Error Merging!','','error');
                              setTimeout(function(){
                                      window.location.reload();
                                    }, 3000)
                            }
                          });
                        }

                         var ConfirmPay = function(id,type){
                          $('#confirm_pay').hide();
                          $('.loader').show('slow');
                          var dataObject = {};
                          dataObject.payment_id = id;
                          dataObject.trans_type = type;
                            $.ajax({
                              method:"POST",
                              url:"<?php echo base_url(); ?>index.php/payment/confirm_pay",
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
