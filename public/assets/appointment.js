let selectPosition = document.getElementById("position");
let defaultValue = 'P0';
let msgInfoDoctor = document.querySelector('.info-doctor');

selectPosition.onchange = function () {

    let formData = new FormData();
    defaultValue = this.value;
    formData.append('position', defaultValue);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', BASE_URL + 'AppointmentController/selectSpeciality', true);
    xmlhttp.send(formData);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && this.status == 200) {
            msgInfoDoctor.innerHTML = xmlhttp.responseText;
        }
    }
    $.ajax({
        beforeSend: function () {
            // Handle the beforeSend event
        },
        complete: function () {
            $(function () {
                $('.material-card > .mc-btn-action').click(function () {
                    var card = $(this).parent('.material-card');
                    var icon = $(this).children('i');
                    icon.addClass('fa-spin-fast');

                    if (card.hasClass('mc-active')) {
                        card.removeClass('mc-active');

                        window.setTimeout(function () {
                            icon
                                .removeClass('fa-arrow-left')
                                .removeClass('fa-spin-fast')
                                .addClass('fa-bars');

                        }, 800);
                    } else {
                        card.addClass('mc-active');

                        window.setTimeout(function () {
                            icon
                                .removeClass('fa-bars')
                                .removeClass('fa-spin-fast')
                                .addClass('fa-arrow-left');

                        }, 800);
                    }
                });



                let selectDoctor = document.querySelectorAll('.select-doctor');


                selectDoctor.forEach(element => {
                    element.onchange = function (e) {
                        let id = e.target.id;
                        let labelDR = document.querySelector(`#label-${id}`);
                        let labelSlDr = document.querySelectorAll('.label-sl-dr');

                        let inputId = document.querySelector(`.dr-select-${id}`);
                        let inputAllSelect = document.querySelector(`.select-doctor`);
                        labelSlDr.forEach(e => {
                            e.classList.remove('active');
                            inputAllSelect.checked = false;
                        });
                        inputId.checked = true;
                        labelDR.classList.add('active');
                    }
                });
            });


        }
        // ......
    });
}


// appointment cards

let btn_submit_apm = document.querySelector('.btn-submit-apm');
let msg_apm = document.querySelector('.msg-apm');


function handleApm() {

    let formAppointment = document.getElementById('form-appointment');
    let formDataApm = new FormData();

    for (var i = 0; i < formAppointment.length; i++) {
        formDataApm.append(formAppointment[i].name, formAppointment[i].value);
    }
    formDataApm.append('doctorid', $("input[type='radio'][name='doctorid']:checked").val());
    btn_submit_apm.disabled = true;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', BASE_URL + 'AppointmentController/handleFormAppointment', true);
    xmlhttp.send(formDataApm);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && this.status == 200) {
            btn_submit_apm.disabled = false;
            formAppointment.reset();
            var response = JSON.parse(xmlhttp.responseText);
            if (response.status === 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Vui l??ng nh???p ?????y ????? th??ng tin ???',

                })
            } else if (response.status === 0){
                Swal.fire({
                    icon: 'success',
                    title: 'Th??nh c??ng!',
                    text: 'Vui l??ng ki???m tra mail c???a b???n ????? x??c nh???n.',
                    confirmButtonText: 'OK',

                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else if (response.status === 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Vui l??ng ch???n l???i...',
                    text: 'B??c s?? n??y ???? c?? l???ch h???n tr??ng v???i th???i gian b???n ch???n',

                })
            }
        } else {
            document.querySelector(".loading").classList.add("fadeOut");
            Swal.fire({
                icon: 'question',
                title: 'Oopss?',
                text: 'M???ng c???a b???n ???? g???p s??? c???',
                confirmButtonText: 'T???i l???i trang',

            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        }
    }
    $.ajax({
        beforeSend: function () {
            msg_apm.innerHTML = `
            <div class="loading">
                <div class="balls">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>  
            `;
        },
        complete: function () {
            // document.querySelector(".loading").classList.add("fadeOut");

        }
        // ......
    });

}

btn_submit_apm.onclick = function () {
    handleApm();
}