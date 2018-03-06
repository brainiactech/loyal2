<style type="text/css">
                      h3{
  color: #54bd19;
  font-weight: 100;
  font-size: 40px;
  margin: 40px 0px 20px;
}

#clockdiv{
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 30px;
}

#clockdiv > div{
    padding: 10px;
    border-radius: 3px;
    background: #00BF96;
    display: inline-block;
}

#clockdiv div > span{
    padding: 15px;
    border-radius: 3px;
    background: #00816A;
    display: inline-block;
}

.smalltext{
    padding-top: 5px;
    font-size: 16px;
}
body {
    margin: 0;
    padding: 0;
}
.container {
    position: relative;
    width: 100%;
}
.left {
    position: absolute;
    left: 0px;
    width: 60%;
    
}
/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }


         </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<li class="list-group-item notification-bar-fail bg-red text-white">
                              <div href="#">
                                  <div><i></i>
                                  </div>
                              </div>
                              <div class="notification-bar-details">
                              <h4><font color="black">Welcome</h4></font>
<p><h6><u><font color="white"><strong>TBC is the world’s first abundant cryto-currency with the mission of ending poverty globally for its investors/users. TBC value appreciates by 1% to 5% daily, its value never fluctuates or depreciates unlike other crypto-currencies, and its value is member based, visit www.thebillioncoin.info for more info. <p></strong></u></font>
<p>
</a></p>
<p>
<p>
</h6>        

                          </div>
                          </li>

                    <div class="row">
                      <h6>&nbsp&nbspRecent notifications</h6>
                      <ul class="list-group m-b-1">
                          <li class="list-group-item notification-bar-success">
                              <div href="#" ">
                                  <div><i></i>
                                  </div>
                              </div>
                              <div class="notification-bar-details"><span class="text-red">Referral Link:  &nbsp&nbsp&nbsp </b>http://www.tbc2naira.trade/account/index.php/ref?user=<?php echo $user->username; ?> </span>
<p><span class="text-purple">Refer friends and family, spread the word  </span></p>

<?php foreach ($user_payment as $value): ?>
                              <?php if ($this->session->userdata['user_id'] == $value->payer_id): ?>
                              <?php if ($has_new_payment): ?>
                      <?php if ($has_been_paired):  ?>
                              <p><h6><strong><font color="red"> You have been merged to pay your upline...Please ensure you pay within 5 hours or your account will be deleted...Scroll down this page to view payment details</font></strong></h6></p>
                         
  <h6><div id="divCounter"></div></h6>

<script>
var hoursleft = 0;
var minutesleft = 300; //give minutes you wish
var secondsleft = 0; // give seconds you wish
var finishedtext = "Countdown finished!";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setHours(end1.getHours()+hoursleft);
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);

}
var counter = function () {
var now = new Date();
var diff = end1 - now;

diff = new Date(diff);

var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    var hours = parseInt((diff/(1000*60*60))%24);

if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) { 
    sec = "0" + sec;
}     
if(now >= end1) {     
    clearTimeout(interval);
   // localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById('divCounter').innerHTML = finishedtext;
     if(("TIME UP!"))
     window.location.href= "<?php echo base_url(); ?>index.php/block/block_users";
} else{
    var value = hours + " : " + mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById('divCounter').innerHTML = value;
}
}
var interval = setInterval(counter, 1000);
</script> 

                           
                               
                       <?php endif; ?>
                      <?php endif; ?>
                      <?php endif; ?>  
                 <?php endforeach; ?>
                
                
                 
                                  <?php if (!$been_activated):  ?>
                              <p><h6><strong><font color="red"> Activate your Account within 24 hours or your account will be deleted</font></strong></h6></p>
                         
  <h6><div id="divCounter"></div></h6>

<script>
var hoursleft = 0;
var minutesleft = 1440; //give minutes you wish
var secondsleft = 0; // give seconds you wish
var finishedtext = "Countdown finished!";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setHours(end1.getHours()+hoursleft);
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);

}
var counter = function () {
var now = new Date();
var diff = end1 - now;

diff = new Date(diff);

var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    var hours = parseInt((diff/(1000*60*60))%24);

if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) { 
    sec = "0" + sec;
}     
if(now >= end1) {     
    clearTimeout(interval);
   // localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById('divCounter').innerHTML = finishedtext;
     if(("TIME UP!"))
     window.location.href= "<?php echo base_url(); ?>index.php/block/block_users";
} else{
    var value = hours + " : " + mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById('divCounter').innerHTML = value;
}
}
var interval = setInterval(counter, 1000);
</script> 

                           
                               
                       <?php endif; ?>
                        
                        
                              </div>
                          </li>
                      </ul>

                      <ul class="list-group">
                          <li class="list-group-item notification-bar-fail bg-red text-white">
                              <div href="#">
                                  <div><i></i>
                                  </div>
                              </div>
                              <div class="notification-bar-details">
                              <h5></h5><p>
JOIN US ON TELEGRAM:  <a href="https://t.me/tbc2naira">
<img border="0"  src="<?php echo base_url(); ?>images/download.jpg" width="50" height="50"> </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    JOIN US ON FACEBOOK:  <a href="  https://web.facebook.com/Tbc2naira-305817529854783/"><img border="0"  src="<?php echo base_url(); ?>images/facebook.png" width="50" height="50"> </a>
                                                             
                          </div>
                          </li>
                      </ul>
                  </div>
              
                  <div class="row" style="margin-top: 10px;">

                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card card-block bg-green text-white text-xs-center">
                                <h5 class="m-b-0 v-align-middle text-overflow"> ₦
                                <span><?php echo ($total_paid->total_paid) ? $total_paid->total_paid : 0.00; ?></span></h5>
                                <div class="small text-overflow text-white">Total Paid</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card card-block bg-green text-white text-xs-center">
                              <h5 class="m-b-0 v-align-middle text-overflow"> ₦
                              <span><?php echo ($total_recieved->total_recieved) ? $total_recieved->total_recieved : 0.00; ?></span></h5>
                              <div class="small text-overflow text-white">Total Received</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card card-block bg-green text-white text-xs-center">
                                <h5 class="m-b-0 v-align-middle text-overflow">$
                                <span><?php echo ($total_paid_tbc->total_paid_tbc) ? $total_paid_tbc->total_paid_tbc : 0.00; ?></span></h5>
                                <div class="small text-overflow text-white">Total Paid(Tbc)</div>
                            </div>
                        </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card card-block bg-green text-white text-xs-center">
                                <h5 class="m-b-0 v-align-middle text-overflow">$
                                <span><?php echo ($total_recieved_tbc->total_recieved_tbc) ? $total_recieved_tbc->total_recieved_tbc : 0.00; ?></span></h5>
                                <div class="small text-overflow text-white">Total Received(Tbc)</div>
                           </div>
                        </div>
                             <div>


  

                                         
                      <script type="text/javascript" src="<?php echo base_url(); ?>scripts/countdown.js"></script>
                      <script type="text/javascript" src="<php echo base_url(); ?>scripts/bootstrap.js"></script>
