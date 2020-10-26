"use strict"

var KuraDav = function () {  

    var formAction = function () {  
        $('#btnSubmit').on('click', function () {  
            let data = {
                email: $('#email').val(),
            };

            $('#messageError').hide();
            $('#listError').find('li').remove();

            $(this).text('loading...').attr('disabled', true);
    
            $.ajax({
                type: "POST",
                url: base_url + "/forgot",
                data: data,
                dataType: "json",
                success: function (response) {
                    window.location.href = base_url + '/reset/' + response;

                    $('#btnSubmit').text('Cek Akun').attr('disabled', false);
                },
                error: function (xhr, status, error) {  
                    $('#messageError').show();

                    $('#btnSubmit').text('Cek Akun').attr('disabled', false);

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
    KuraDav.run();
});