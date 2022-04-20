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
                        labelSlDr.forEach(e => {
                            e.classList.remove('active');
                        });
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
    btn_submit_apm.disabled = true;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', BASE_URL + 'AppointmentController/handleFormAppointment', true);
    xmlhttp.send(formDataApm);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && this.status == 200) {
            btn_submit_apm.disabled = false;
            formAppointment.reset();
            msg_apm.innerHTML = xmlhttp.responseText;
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
            document.querySelector(".loading").classList.add("fadeOut");
            
        }
        // ......
    });

}

btn_submit_apm.onclick = function () {
    handleApm();
}