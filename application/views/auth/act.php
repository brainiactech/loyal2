

<div class="card-header no-bg b-a-0"><h3>Activation Page</h3>
                  <p> <h5>Enter the activation key you have purchased from admin into the text box provided below.</h5>
</div>
 <form role="form" id="validate" method="POST" action="<?php echo base_url(); ?>index.php/user/act">

         
          <label for="username">Activation key</label>
         <input type="text" id="key" name="key"   value=" "></input>
              
    <p><button class="btn btn-primary btn-md">
             Activate Account</button>
</form>


