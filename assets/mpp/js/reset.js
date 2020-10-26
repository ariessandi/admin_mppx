"use strict"

var KuraDav = function () {  

    var formAction = function () {  
        $('#btnSubmit').on('click', function () {  
            let data = {
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val(),
            };

            $('#messageError, #messageSuccess').hide();
            $('#listError').find('li').remove();

            $(this).text('loading...').attr('disabled', true);
    
            $.ajax({
                type: "POST",
                url: base_url + "/reset/" + $('#token').val(),
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#messageSuccess').show();

                    setTimeout(() => {
                        window.location.href = base_url + '/login';                        
                    }, 1000);

                    $('#btnSubmit').text('Reset Password').attr('disabled', false);
                },
                error: function (xhr, status, error) {  
                    $('#messageError').show();

                    $('#btnSubmit').text('Reset Password').attr('disabled', false);

                    if (xhr.status == 422) {
                        let message = JSON.parse(xhr.responseJSON);

                        $.each(message, function (key, val) { 
                            $('#listError').append(`<li>${val[0]}</li>`);
                        });
                    } else {
                        console.log(error);
                    }
                }
            });
        });
    }

    return {
        run: function () {  
            formAction();
        }
    }

}();

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    KuraDav.run();
});