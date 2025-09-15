$(function () {

    let $btns = $('#portfolio .button-group button');
    if ($('.grid').length) {
        new CBPGridGallery(document.getElementById('grid-gallery'));
    }
    /* ----------------------------------------------------------- */
    /*  HIDE HEADER WHEN PORTFOLIO SLIDESHOW OPENED
    /* ----------------------------------------------------------- */

    $(".grid figure").on('click', function () {
        $("#navbar-collapse-toggle").addClass('hide-header');
    });
    /* ----------------------------------------------------------- */
    /*  SHOW HEADER WHEN PORTFOLIO SLIDESHOW CLOSED
    /* ----------------------------------------------------------- */

    $(".nav-close").on('click', function () {
        $("#navbar-collapse-toggle").removeClass('hide-header');
    });
    $(".nav-prev").on('click', function () {
        if ($('.slideshow ul li:first-child').hasClass('current')) {
            $("#navbar-collapse-toggle").removeClass('hide-header');
        }
    });
    $(".nav-next").on('click', function () {
        if ($('.slideshow ul li:last-child').hasClass('current')) {
            $("#navbar-collapse-toggle").removeClass('hide-header');
        }
    });

    /* ----------------------------------------------------------- */
    /*  PORTFOLIO DIRECTION AWARE HOVER EFFECT
    /* ----------------------------------------------------------- */

    var item = $(".grid li figure");
    var elementsLength = item.length;
    for (var i = 0; i < elementsLength; i++) {
        $(item[i]).hoverdir();
    }

    // $btns.click(function(e) {

    //     $('#portfolio .button-group button').removeClass('active');
    //     e.target.classList.add('active');

    //     let selector = $(e.target).attr('data-filter');
    //     $('#portfolio .grid').isotope({
    //         filter: selector
    //     });

    //     return false;
    // })

    // $('#portfolio .button-group #btn1').trigger('click');

    // $('#portfolio .grid .test-popup-link').magnificPopup({
    //     type: 'image',
    //     gallery: { enabled: true }
    // });


    $('#formContact').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        ignore: "", // ignore hidden elements when validating
        rules: {
            name: { required: true },
            email: { required: true, email: true },
            phone: { required: true },
            message: { required: true },
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        highlight: function (element) {
            $(element).closest('#formContact').addClass('has-error');
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('').removeClass('has-error'); // set error class to the control group
        },
        success: function (label) {
            label
                .closest('#formContact').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function () {
            submitForm();
        }
    });
});
$(document).keyup(function (e) {

    /* ----------------------------------------------------------- */
    /*  KEYBOARD NAVIGATION IN PORTFOLIO SLIDESHOW
    /* ----------------------------------------------------------- */
    if (e.keyCode === 27) {
        stop_videos();
        $('.close-content').click();
        $("#navbar-collapse-toggle").removeClass('hide-header');
    }
    if ((e.keyCode === 37) || (e.keyCode === 39)) {
        stop_videos();
    }
});

function submitForm() {
    let params = {
        name: $('#txtName').val(),
        email: $('#txtEmail').val(),
        phone: $('#txtPhone').val(),
        message: $('#txtDescription').val(),
    };
    waitMeShow('#body');
    fetch('./controllers/sendMailController.php', {
        method: "POST",
        body: JSON.stringify({ 'sendMail': params }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            $('#formContact').trigger('reset');
            swal({
                title: "¡Bien hecho!",
                text: "¡Mensaje enviado correctamente!",
                type: "success",
                closeOnConfirm: true,
                allowOutSideClick: false

            });
            waitMeHide('#body');
        }).catch(error => {

            swal({
                title: "¡Upsss!",
                text: "¡Algo salio mal!",
                type: "error",
                closeOnConfirm: true,
                allowOutSideClick: false

            });
            waitMeHide('#body');

        });

}

function waitMeShow(idForm) {
    $(idForm).waitMe({
        effect: 'stretch',
        text: '...Cargando...',
        bg: 'rgba(255,255,255,0.7)',
        color: '#4B02DF',
        sizeW: '',
        sizeH: '',
        source: ''
    });
};

function waitMeHide(idForm) {
    $(idForm).waitMe('hide');
}