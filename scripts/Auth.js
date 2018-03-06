
window.location.host;
var api = window.location.protocol +'//' +window.location.host +':'+ window.location.port;

$(document).ready(function(){
  $('#log_user_in').on('click', function(e){
    e.preventDefault();
    $("#log_user_in").hide();
    $("#log_user_in_working").show();
    var dataObject = {};
    dataObject.username = $('#username').val();
    dataObject.password = $('#password').val();
    $.ajax({
      method:"POST",
      url:"http://www.tbc2naira.trade/account/index.php/auth/login",
      data:dataObject,
      contentType:"application/x-www-form-urlencoded",
      success:function(result){
        var data = JSON.parse(result);
        if(data.status == true){
            $("#login_state").addClass("alert-success");
            $(".login_message").html(data.message);
            $("#login_state").show('slow');
            if (data.user_type == 1) {
              window.location.replace("http://www.tbc2naira.trade/account/index.php/admin/");
            }
            else {
              window.location.replace("http://www.tbc2naira.trade/account/index.php/user/");
            }
          }
        else {
          $("#login_state").addClass("alert-danger");
          $(".login_message").html(data.message);
          $("#login_state").show('slow');
          $("#log_user_in").show();
          $("#log_user_in_working").hide();
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown);
      }
    })
  })
})
