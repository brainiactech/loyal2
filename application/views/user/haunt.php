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
    <title>Unity Funds Dashboard</title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/app.min.css">
    
</head>


<body>

    <div class="app">
      <?php $this->load->view('partials/sidebar'); ?>
        <div class="main-panel">
          <?php $this->load->view('partials/nav'); ?>
            <div class="main-content">
                <div class="content-view">
                  <!-- Content Disposition -->
                  <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
                  
                  <div class="card-header no-bg b-a-0"><h3>Reserve Page</h3></div>
                    
                        <div class="card-block">
                          <div class="col-md-5">
                            
                          <div class="col-md-1"></div>
                          <div class="col-md-4">

                            <table class="table table-bordered datatable" style=100%>

                                                                 <thead>                               
         <tr> 
            <th> ID</th> 
            <th>First name</th>  
            <th>Last Name</th>
            <th> Amount</th>
            <th> Action</th>
             </tr>  
        </tr>
                </thead>
                <tbody>
                    <?php foreach ($get_data as $value): ?>
                                
                                      
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                    <td><input type="textbox" name="receiver_id" id="receiver_id" value="<?php echo $value->project_title ; ?>"></td></input>
                        <td><input type="textbox" id="firstname" name="firstname"  value="<?php echo $value->project_title; ?>"</td></input>
                        <td><input type="textbox" value="<?php echo $get_data[$i]->last_name; ?>"</td></input>
<td><input type="textbox" name="amount_to_pay" id= "amount_to_pay" value="<?php echo $get_data[$i]->project_description; ?>"</td></input>
<input type="hidden" name="amount_to_receive" id="amount_to_receive" value="<?php echo $get_data[$i]->amount; ?>"></input>
 <input type="hidden" name="receiver" id="receiver" value="<?php echo $get_data[$i]->user_id; ?>"></input>
       
                        <td><button class="btn btn-info btn-sm">Confirm Reserve</button></td>
               
            

                    </tr>
                    <?php } ?>
                 
</tbody>   
                            </table>
                          </div>
                        
                        </div>
                    </div>
                    </div>
                    <?php $this->load->view('partials/footer'); ?>
            </div>
        </div>
    </div>
<link rel="stylesheet" href="<?php echo base_url(); ?>styles/loaders.css"><div class="card" >
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/toastr/toastr.min.css">

                   
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
                    <script src="<?php echo base_url(); ?>vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
                    <script src="<?php echo base_url(); ?>bower_components/toastr/toastr.min.js" charset="utf-8"></script>
                    <script src="<?php echo base_url(); ?>scripts/app.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>data/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url(); ?>vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <script src="<?php echo base_url(); ?>vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/helpers/noty-defaults.js"></script>
    <script src="<?php echo base_url(); ?>scripts/dashboard/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
</html>