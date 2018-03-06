
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1,maximum scale=1">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="mobile-web-app-capable" content="yes">
    <application-name" content="Unity Funds">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="theme-color" content="#4C7FF0">
    <title>Tbc 2 naira</title>
    
    
    
    
</head>


<body>

    
                  
                  <div class="card-header no-bg b-a-0"><h3>Hunting Page</h3></div>
                    
                        <div class="card-block">
                          <div class="col-md-5">
                            
                          <div class="col-md-1"></div>
                          <div class="col-md-4">

                            <table class="table table-bordered datatable" style=100%>
<form method="post" action="<?php echo site_url('index.php/deleteuser/edit_user'); ?>" name="data_register">
                                                                 <thead>                               
         <tr> 
             
           
            <th> Firstname</th>
            <th> Lastname</th>
             <th> Phone</th>
               <th> Email</th>
                <th> Level</th>
                <th> Username</th>
                 <th> Password</th>
             </tr>  
        </tr>
                </thead>
                <tbody>
                   <?php for ($i = 0; $i < count($get_data); $i++) { ?>
                    <tr>
                                             
<td><input type="textbox" id="firstname" name="firstname" value="<?php echo $get_data[$i]->first_name; ?>"</input></td>
                        <td><input type="textbox" id="lastname" name="lastname" value="<?php echo $get_data[$i]->last_name; ?>"</input></td>
                        <td><input type="textbox" id="phone" name="phone" value="<?php echo $get_data[$i]->phone_number; ?>"</input></td>
 <td><input type="textbox" id="email" name="email" value="<?php echo $get_data[$i]->email; ?>"</input></td>

 <td width="10"><input type="textbox" id="level"  name="level" size="3" value="<?php echo $get_data[$i]->level; ?>"</input></td>
<input type="hidden" id="user_id" name="user_id" value="<?php echo $get_data[$i]->user_id; ?>"</input>
<td><input type="textbox" id="username" name="username" value="<?php echo $get_data[$i]->username; ?>"</input></td>
<td><input type="textbox" id="password" name="password" value="<?php echo $get_data[$i]->password; ?>"</input></td>
                  
 
                        <td><button class="btn btn-info btn-sm">Edit User</button></td>
               
            

                    </tr>
                    <?php } ?>
                 
</tbody>   
                            </table>
                          </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    
            </div>
        </div>
    </div>

</html>