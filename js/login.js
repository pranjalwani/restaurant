(function () {
    $('.input2').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
    
    var lemail = $('.validate-input input[name="lemail"]');
    var lpass = $('.validate-input input[name="lpassword"]');

    var name = $('.validate-input input[name="name"]');
    var email = $('.validate-input input[name="email"]');
    var addr = $('.validate-input input[name="addr"]');
    var pass = $('.validate-input input[name="password"]');
    var passc = $('.validate-input input[name="passwordc"]');
    
    $('.validate-formA').on('submit',function(){
        var check = true;
        if($(name).val().trim() == ''){
            showValidate(name);
            check=false;
        }
        if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check=false;
        }
        if($(addr).val().trim() == ''){
            showValidate(addr);
            check=false;
        }
        if($(pass).val().trim() == ''){
            showValidate(pass);
            check=false;
        }
        if($(passc).val().trim() == ''){
            showValidate(passc);
            check=false;
        }
        return check;
    });

    $('.validate-formB').on('submit',function(){
        var check = true;
        if($(lemail).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(lemail);
            check=false;
        }
        if($(lpass).val().trim() == ''){
            showValidate(lpass);
            check=false;
        }
        return check;
    });

    $('.validate-formB .input2').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });
    
    $('.validate-formA .input2').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });
    
    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }
    
    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
    }

})();