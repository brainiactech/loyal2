<div class="card-header no-bg b-a-0"><h3>Key Generation Page</h3>
                  <p> <h5>Click on generate key to add a new key to the database, Unused key will be displayed in the textbox below.</h5>
</div>
<p><button class="btn btn-primary btn-md"><a href="<?php echo base_url(); ?>index.php/user/make_pay_addition">
             Generate Key</a></button>

         


                            <table class="table table-bordered datatable" >

                                                                 <thead>                               
         <tr> 
             
           
            <th> ID</th>
            <th> Key</th>
             </tr>  
        </tr>
                </thead>
                <tbody>
                   <?php for ($i = 0; $i < count($newkey); $i++) { ?>
                    <tr>
                       
                    <td><?php echo ($i+1); ?></td>
<td><input type="textbox" value="<?php echo $newkey[$i]->key; ?>"</td></input>
                    </tr>
                    <?php } ?>
                 
</tbody>   
                            </table>
                         