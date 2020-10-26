$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var form = $(".validation-wizard").show();

    var objAnswers = [];

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit",
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            return (
                currentIndex > newIndex ||
                (!(3 === newIndex && Number($("#age-2").val()) < 18) &&
                    (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")),
                    (form.validate().settings.ignore = ":disabled,:hidden"),
                    form.valid()))
            );
        },
        onFinishing: function (event, currentIndex) {
            return (form.validate().settings.ignore = ":disabled"), form.valid();
        },
        onFinished: function (event, currentIndex) {
            objAnswers = [];
            $('._ikmAnswers').each(function (key, val) {  
                if ($(this).is(':checked')) {
                    objAnswers.push(val.defaultValue);
                }
            });

            if (Object.keys(objAnswers).length == 9) {
                $.ajax({
                    type: "POST",
                    url: base_url + "/rgs/ikm/submit",
                    data: {
                        instansi: $('#instansi').val(),
                        answers: objAnswers
                    },
                    dataType: "json",
                    success: function (response) {
                        swal("Informasi", "Terimakasih sudah melakukan survey", "success");

                        window.location.href = base_url;
                    },
                    error: function (xhr, status, error) {  
                        console.log(error);
                    }
                });
            } else {
                swal('Harap lengkapi jawaban dari pertanyaan survey anda, terimakasih.');
            }
        },
    });

    $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        rules: {
            email: {
                email: !0,
            },
        },
    });
});