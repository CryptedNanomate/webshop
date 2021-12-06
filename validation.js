
 $('.phone').mask('000-000-0000');
$('.form').validate({
rules:{
    email:{
        required:true
    },
    password:{
        required:true,
        minlength: 5,
        equalTo:'#confirm_password'
    },
    confirm_pwd:{
        required:true,
        minlength: 5,
        equalTo : 'name="password"'
    },
    adress:{
        required:true,
        minlength: 3
    },
    phone:{
        minlength: 6
    }
  
},messages:{
    email:'E-mail must be in e-mail format and it is required!',
    password:'Passord must be at least 5 charachters long',
    confirm_pwd:'Confirmed password must be same as entered password',
    phone: {
        minlength:jQuery.validator.format('Phone number must be at least {0} charachters long')
    }

},
errorClass:'is-invalid text-danger',


});
$("#reg-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    let $error = $("#confirm_error");
    if($password.val() === $confirm.val()){
    return true;
    }else{
    $error.text("Passwords do not Match");
    event.preventDefault();
    }
    });
   