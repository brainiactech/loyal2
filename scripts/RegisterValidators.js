'use strict';

var validators = {
  validateEmail : function (email,options){
    var response = {};
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var test =  re.test(email);
    if(options.check_valid_only) {
      response = test;
    }
    else if (!options.check_valid_only){
      if (test) {
        var dataObject = {};
        dataObject.email = email;
        dataObject.type = 'email'
        $.ajax({
          method:"POST",
          url:options.api,
          data:dataObject,
          contentType:"application/x-www-form-urlencoded",
          success:function(result){
             response.data = JSON.parse(result);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response.data.status = false;
          }
        })
      }
    }
    return response;
  }
}
