$(document).ready(function(){
    
   $('#admin-login-form').validate({
    rules: {         
        username: {
            required: true,
            minlength: 3,
            maxlength: 40,
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 40,
        }            
    },
    messages: {
        username: {
            required: "Please enter username",
            minlength: "Please enter at least 3 characters",
        },
        password: {
            required: "Please enter password",
            minlength: "Please enter at least 6 characters",
        }        
    },
    errorElement: 'label',        
    errorClass: 'error',         
    errorPlacement: function(error, element) {
        error.insertAfter(element.parent());
    }
   });

   $('#admin-reset-form').validate({
    rules: {  
        new_password: {
            required: true,
            minlength: 6,
            maxlength: 40,
        }            
    },
    messages: {     
        new_password: {
            required: "Please new enter password",
            minlength: "Please enter at least 6 characters",
        }        
    },
    errorElement: 'label',        
    errorClass: 'error',         
    errorPlacement: function(error, element) {
        error.insertAfter(element.parent());
    }
   });

 
    
    //user-change-password-form-validation
    $('#change_user_password').validate({
        rules : {
            current_password : {
                 required : true
            },
            new_password : {
                required : true,
                minlength: 6,
                maxlength: 40
            },
            confirm_password : {
                required : true,
                equalTo : "#new-password"
            } 
        },
        messages: {
            current_password : {
                required : "Please enter current password"
           },
            new_password : {
                required : "Please enter new password",
                minlength: "Please enter at least 6 digit",
           },
           confirm_password : {
               required : "Please enter confirm password",
               equalTo : "Confirm password does not match with new password"
           },
           
        },
         errorElement: 'label',        
        errorClass: 'error',         
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent());
        }
       
        
    })

  

})

