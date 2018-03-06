<div class="row" style="margin-top: 10px;">
  <div class="card">
    <div class="card-header no-bg b-a-0"><h3>New Registered</h3><span></span></div>
    <div class="card-block">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#one" role="tab">Active members</a>
        </li>
       
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#three" role="tab">defaulters</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="one" role="tabpanel">
          <p><table class="table table-bordered datatable" style=100%>
                                <thead>                               
         <tr> 
            <th> ID</th> 
            <th>First name</th>  
            <th>Last Name</th>
            <th> Phone Number</th>

             </tr>  
        </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($user_details); $i++) { ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><input type="textbox" value="<?php echo $user_details[$i]->first_name; ?>"</td></input>
                        <td><input type="textbox" value="<?php echo $user_details[$i]->last_name; ?>"</td></input>
                        <td><input type="textbox" value="<?php echo $user_details[$i]->phone_number; ?>"</td></input>

                    </tr>
                    <?php } ?>
       
</tbody>   
                            </table></p>
        </div>
       
        <div class="tab-pane" id="three" role="tabpanel">
          <p><table class="table table-bordered datatable" style=100%>
                                <thead>                               
         <tr> 
            <th> ID</th> 
            <th>First name</th>  
            <th>Last Name</th>
            <th> Phone Number</th>

             </tr>  
        </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($user_details); $i++) { ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><input type="textbox" value="<?php echo $user_details[$i]->first_name; ?>"</td></input>
                        <td><input type="textbox" value="<?php echo $user_details[$i]->last_name; ?>"</td></input>
                        <td><input type="textbox" value="<?php echo $user_details[$i]->phone_number; ?>"</td></input>

                    </tr>
                    <?php } ?>
       
</tbody>   
                            </table></p>
        </div>
      </div>
    </div>
  </div>
</div>
