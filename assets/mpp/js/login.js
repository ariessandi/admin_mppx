"use strict"

var KuraDav = function () {  

    var formAction = function () {  
        $('#btnSubmit').on('click', function () {  
            let data = {
                email: $('#email').val(),
                password: $('#password').val()
            };

            $('#messageError').hide();
            $('#listError').find('li').remove();

            $(this).text('loading...').attr('disabled', true);
    
            $.ajax({
                type: "POST",
                url: base_url + "/login",
                data: data,
                dataType: "json",
                success: function (response) {
                    window.location.href = base_url;

                    $('#btnSubmit').text('Login').attr('disabled', false);
                },
                error: function (xhr, status, error) {  
                    $('#messageError').show();

                    $('#btnSubmit').text('Login').attr('disabled', false);

                    if (xhr.status == 422) {
                        let message = JSON.parse(xhr.responseJSON);

                        $.each(message, function (key, val) { 
                            $('#listError').append(`<li>${val[0]}</li>`);
                        });
                    } else {
                        $('#listError').append(`<li>Salah email dan password</li>`);
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