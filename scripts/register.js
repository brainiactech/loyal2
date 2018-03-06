let errors = [];
function validateEmail(email) {
  var dataObject = {};
  dataObject.email = email;
  dataObject.type = 'email'
  $.ajax({
    method:"POST",
    url:"http://www.tbc2naira.trade/account/index.php/auth/validator",
    data:dataObject,
    contentType:"application/x-www-form-urlencoded",
    success:function(result){
       var data = JSON.parse(result);
       if (parseInt(data.data.count)) {
         errors.push("Email Address Already Exists");
         showErrors();
       }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      response.data.status = false;
    }
  })
}

function validateUsername(username) {
  var dataObject = {};
  dataObject.email = username;
  dataObject.type = 'username'
  $.ajax({
    method:"POST",
    url:"http://www.tbc2naira.trade/account/index.php/auth/validator",
    data:dataObject,
    contentType:"application/x-www-form-urlencoded",
    success:function(result){
       var data = JSON.parse(result);
       if (parseInt(data.data.count)) {
         errors.push("Username Already Exists");
         showErrors();
       }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      response.data.status = false;
    }
  })
}

function validatePhone(phone) {
  var dataObject = {};
  dataObject.email = phone;
  dataObject.type = 'phone'
  $.ajax({
    method:"POST",
    url:"http://www.tbc2naira.trade/account/index.php/auth/validator",
    data:dataObject,
    contentType:"application/x-www-form-urlencoded",
    success:function(result){
       var data = JSON.parse(result);
       if (parseInt(data.data.count)) {
         errors.push("Phone Number Already Exists");
         showErrors();
       }
       else {
         errors.splice(0,errors.length);
       }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      response.data.status = false;
    }
  })
}

function showErrors (){
  if (errors.length) {
    errors.forEach(function(x){
      noty({
          theme: 'app-noty',
          text: x,
          type: 'error',
          timeout: 3000,
          layout: 'topRight',
          closeWith: ['button', 'click'],
          animation: {
              open: 'animated fadeInDown',
              close: 'animated fadeOutUp'
          }
      });
    })
  }
  console.log(errors.length);
}

$(document).ready(function(){
  $('#reg_user_in').on('click', function(e){
    e.preventDefault();
    $("#reg_user_in").hide();
    $("#reg_user_in_working").show();
    var dataObject = {};
    dataObject.username = $('#username').val();
    dataObject.password = $('#password').val();
    dataObject.firstname = $('#firstname').val();
    dataObject.lastname = $('#lastname').val();
    dataObject.phone_number = $('#phone').val();
    dataObject.email = $('#email').val();
    dataObject.address = $('#address').val();
    dataObject.package = $('#package').val();
    dataObject.bank_id = $('#bank_id').val();
    dataObject.account_number = $('#account_number').val();
    dataObject.account_name = $('#account_name').val();
    dataObject.has_refer = $('#has_refer').val();
    if (dataObject.has_refer){
      dataObject.referrer_id = $('#referrer_id').val();
    }
    $.ajax({
      method:"POST",
      url:"http://tbc2naira.trade/account/index.php/auth/register_user",
      data:dataObject,
      contentType:"application/x-www-form-urlencoded",
      success:function(result){
        var data = JSON.parse(result);
        if(data.status == true){
          // console.log(data);
              noty({
                  theme: 'app-noty',
                  text: 'Registration Successful, You will be redirected to Login',
                  type: 'success',
                  timeout: 3000,
                  layout: 'topRight',
                  closeWith: ['button', 'click'],
                  animation: {
                      open: 'animated fadeInDown',
                      close: 'animated fadeOutUp'
                  }
              });
              setTimeout(function(){window.location.replace("http://www.tbc2naira.trade/account/index.php/auth/");},5000)

          }
        else {
          console.log(data);
          noty({
              theme: 'app-noty',
              text: 'Registration Not Successful, Please Try Again',
              type: 'error',
              timeout: 3000,
              layout: 'topRight',
              closeWith: ['button', 'click'],
              animation: {
                  open: 'animated fadeInDown',
                  close: 'animated fadeOutUp'
              }
          });
          $("#reg_user_in").show();
          $("#reg_user_in_working").hide();
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown);
      }
    })
  })
})
