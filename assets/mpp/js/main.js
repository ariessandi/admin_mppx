"use strict";
$(window).load(function() {
    var KuraDav = function() {

        var _handleFirstLoad = function() {
            $.ajax({
                type: "POST",
                url: base_url + "/web-logo",
                success: function(response) {
                    $(".webLogo").attr("src", response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
            });

            $.ajax({
                type: "POST",
                url: base_url + "/instansi-list",
                dataType: "json",
                success: function(response) {
                    if (Object.keys(response).length > 0) {
                        let listResp = response;

                        $.each(listResp, function(key, val) {
                            $('#agency').append($('<option>', {
                                value: val.id,
                                text: val.name
                            }));
                        });

                        let instansiAntrianOnline = $('#agency2').length;
                        if (instansiAntrianOnline > 0) {
                            $.each(listResp, function(key, val) {
                                $('#agency2').append($('<option>', {
                                    value: val.id,
                                    text: val.name
                                }));
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: "POST",
                url: base_url + "/report/count-data",
                dataType: "json",
                success: function(response) {
                    if (Object.keys(response).length > 0) {
                        $("#countInstansi").attr('data-stop', response.instansi);
                        $("#countLayanan").attr('data-stop', response.service);
                        $("#countLoket").attr('data-stop', response.counter);
                        $("#countAntrian").attr('data-stop', response.queueToday);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            let ol = $('#queue_ol').val();
            if (ol) {
                $.ajax({
                    type: "GET",
                    url: base_url + "/rgs/queue-show",
                    dataType: "json",
                    success: function(response) {
                        let r = JSON.parse(response);

                        $('#queue_ol_instansi').text(r.instansi);
                        $('#queue_ol_service').text(r.service);
                        $('#queue_ol_counter').text(r.counter);
                        $('#queue_ol_time').text(r.time);
                        $('#queue_ol_sisaantrian').text(r.sisaAntrian);
                        $('#queue_ol_status').text(r.status);
                        $('#queue_ol_fullname').text(r.fullname);
                        $('#queue_ol_no_ktp').text(r.no_ktp);
                        $('#queue_ol_handphone').text(r.handphone);
                        $('#queue_ol_number').text(r.number);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        }

        var _handleAntrian = function() {
            $('#btnCekAntrian').on('click', function() {
                let instansi = $('#agency').val();

                if (instansi) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "/cek-antrian-instansi",
                        data: {
                            instansi: instansi
                        },
                        dataType: "json",
                        success: function(response) {
                            let r = JSON.parse(response);

                            if (r.pelayanan == true) {
                                let belumDilayani = 0
                                let tableList = [];
                                if (Object.keys(r).length > 0) {
                                    belumDilayani = r.belumDilayani;

                                    if (Object.keys(r.lastQueue).length > 0) {
                                        $.each(r.lastQueue, function(key, val) {
                                            tableList.push(`<tr>
                                            <td>${val.name}</td>
                                            <td>${val.hit}</td>
                                        </tr>`);
                                        });
                                    } else {
                                        tableList.push(`<tr>
                                        <td colspan="2">Tidak ada Loket Yang Sedang Aktif</td>
                                    </tr>`);
                                    }
                                } else {
                                    belumDilayani = 0;

                                    tableList.push(`<tr>
                                    <td colspan="2">Tidak ada Loket Yang Sedang Aktif</td>
                                </tr>`);
                                }

                                let instansiName = $("#agency").select2("data")[0].text;

                                var html = document.createElement("span");
                                html.innerHTML = `Instansi: <b>${instansiName}</b> <br /> 
                                Antrian yang belum dilayani: <b>${belumDilayani}</b> <br /> 
                                <br />
                                <table width="100%">
                                    <tr style="border-bottom:0.5px dotted #cccccc">
                                        <td width="50%"><b>Loket</b></td>
                                        <td width="50%"><b>No. Antrian</b></td>
                                    </tr>
                                    ${tableList.join(' ')}
                                </table>`;

                                swal({
                                    title: "Cek Antrian",
                                    content: html,
                                });
                            } else {
                                swal(r.msg);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                } else {
                    swal('Silahkan pilih instansi terlebih dahulu');
                }
            });
        }

        var _handleFormContactInstansi = function() {
            $('#btnDisabledSendMessage').on('click', function() {
                swal('Maaf, Untuk Meyampaikan Kritik, Saran atau Pengaduan Anda Harus Login Terlebih Dahulu.');
            });

            $('#btnSendMessage').on('click', function() {
                $('#contactInstansiType').val('');
                $('#contactInstansiMessage').val('');

                $('#formContactInstansi').modal('show');
            });

            $('#btnContactInstansiSend').on('click', function() {
                let data = {
                    instansi: $('#id').val(),
                    type: $('#contactInstansiType').val(),
                    message: $('#contactInstansiMessage').val(),
                };

                if (data.type !== '' && data.message !== '') {
                    $(this).text('Loading...').attr('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: base_url + "/rgs/instansi/message",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            $('#btnContactInstansiSend').text('Kirim').attr('disabled', false);

                            $('#formContactInstansi').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            console.log(error);

                            $('#btnContactInstansiSend').text('Kirim').attr('disabled', false);
                        }
                    });
                } else {
                    swal('Harap pilih tipe dan kotak pesan tidak boleh kosong');
                }
            });
        }

        var _handleIkm = function() {
            $('#btnIkmStart').on('click', function() {
                swal('Waiting modal...');
            });
        }

        var _handleAntrianOnline = function() {
            $('#linkSyaratKetentuan').on('click', function() {
                $('#syaratKetentuanModal').modal('show');
            });

            $('#agency2').on('change', function() {
                let val = $(this).val();

                $('#service').html('<option value="">Pilih layanan</option>');
                $('#time').val('').trigger('change');

                if (val) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "/rgs/service/" + val,
                        dataType: "json",
                        success: function(response) {
                            if (response) {
                                let services = JSON.parse(response);

                                $.each(services, function(key, val) {
                                    $('#service').append($('<option>', {
                                        value: val.id,
                                        text: val.name
                                    }));
                                });
                            } else {
                                swal('Data tidak ditemukan');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                } else {
                    swal('Harap pilih instansi terlebih dahulu.');
                }
            });

            $('#btnAntrianOnlineSend').on('click', function() {
                $('#messageError').hide();
                $('#listError').find('li').remove();

                $(this).text('Loading...').attr('disabled', true);

                let data = {
                    instansi: $('#agency2').val(),
                    service: $('#service').val(),
                    time: $('#service').val(),
                    syarat: $('#syarat').is(':checked') ? 1 : 0,
                }

                $.ajax({
                    type: "POST",
                    url: base_url + "/rgs/queue-register",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        $('#messageError').show();

                        $('#btnAntrianOnlineSend').text('Kirim').attr('disabled', false);

                        if (xhr.status == 422) {
                            let message = JSON.parse(xhr.responseJSON);

                            $.each(message, function(key, val) {
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
            run: function() {
                _handleFirstLoad();
                _handleAntrian();
                _handleFormContactInstansi();
                _handleIkm();
                _handleAntrianOnline();
            }
        }
    }();

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        KuraDav.run();
    });

});