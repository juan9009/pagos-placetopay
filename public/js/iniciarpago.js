var prefs;
var userdata;
var userquestionanswer;
var policytype;

function startForm() {

    setCloseNotifications();

    /*if (qs("enc") == null) {
        $("#all").hide();
        alert('La página web solicitada no se encuentra disponible, ingresa nuevamente desde el inicio.');
        return;
    }*/

    /*$(window).load(function () {
        startFingerprint();
    });*/

    $("#divIncorrectAnswers").hide();
    // $("#trRegistradoPN").hide();
    $("#trRegistradoPJ1").hide();
    $("#trRegistradoPJ2").hide();
    $("#trRegistrar").hide();
    $("#trValidation").hide();

    $("#rdUsertype0").click(function () {
        onChangePerson();
    });
    $("#rdUsertype1").click(function () { onChangePerson(); });
    $("#rdOptionYes").click(function () {
        $('#btnSeguir').val('Ir al Banco');
        onChangeOption();
    });
    $("#rdOptionNo").click(function () { onChangeOption(); });
    $("#rdOptionNow").click(function () {
        $('#btnSeguir').val('Seguir con el pago');
        onChangeOption();
    });


    /*$.ajax({
        url: "api/GetPreferences",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ 'page': 'transaction', 'enc': qs("enc"), 'auth': readCookie('PSEAuth') }),
        dataType: "json",
        success: onGetPreferencesSuccess,
        error: onGetPreferencesError,
        async: false
    });*/
}

function setCloseNotifications() {
    window.pagehide = window.onunload = window.onbeforeunload = notifyServerFromClose;
    $(document).keydown(function (e) {
        if (e.key == "F5") {
            clearNotifications();
        }
    });
}

function clearNotifications() {
    window.pagehide = window.onunload = window.onbeforeunload = null;
}

function notifyServerFromClose(e) {
    abandonPayment(3);
}

function onGetPreferencesSuccess(data) {
    if (data != null) {
        prefs = JSON.parse(data);
        if (prefs.AuthName.length > 0) {
            redirectToBankWithSession(prefs.AuthName, prefs.SessionRedirectTime);
        }
        else {
            showPreferences();
            buildPSEAppData();
        }
    }
    else
        alert("Ocurrió un error obteniendo los datos para mostrar la página, inténtalo nuevamente.");
}

function redirectToBankWithSession(name, redirectTime) {
    document.body.innerHTML += '<div id="divProcessingSession" class="row col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3 nopadding"><hr /><h2 class="title text-center">' + name + '<br>Estamos procesando tu transacción<br/>&nbsp;</h2><div class="progress progress-striped active" style="margin-bottom: 0"><div class="progress-bar" style="width: 100%"></div></div></div>';
    document.querySelector(".top").style.display = 'none';
    document.querySelector(".content").style.display = 'none';
    setTimeout(function () { redirectToBank(false); }, redirectTime);
}

function onGetPreferencesError(error) {
    alert('Ocurrió un error obteniendo los datos para mostrar la página, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
}

function showPreferences() {
    setupPersonalization(prefs, [["PNEMail", "TOOLTIP_PNEMAIL"], ["PJNIT", "TOOLTIP_PJNIT"], ["PJEMail", "TOOLTIP_PJEMAIL"], ["PJEMail", "TOOLTIP_PJEMAIL"], ["QuestionResponse", "TOOLTIP_QUESTION"], ["ddTipoIdentificacion", "TOOLTIP_CAMPO_TIPOIDENTIFICACION"], ["txtNumeroIdentificacion", "TOOLTIP_CAMPO_NUMEROIDENTIFICACION"], ["txtNITPJ", "TOOLTIP_CAMPO_NUMEROIDENTIFICACION_PJ"], ["txtNombre", "TOOLTIP_CAMPO_NOMBRE_PN"], ["txtNombrePJ", "TOOLTIP_CAMPO_NOMBRE_PJ"], ["email", "TOOLTIP_CAMPO_EMAIL"], ["txtNumeroCelular", "TOOLTIP_CAMPO_TELEFONO_CELULAR"], ["txtDireccion", "TOOLTIP_CAMPO_DIRECCION"], ["txtDireccionPJ", "TOOLTIP_CAMPO_DIRECCION"], ["chkDisclaimerDiv", "TOOLTIP_CAMPO_DISCLAIMERTERMINOS"], ["chkDisclaimerInModal", "TOOLTIP_CAMPO_DISCLAIMERTERMINOS"]]);
    $('[data-toggle="tooltip"]').tooltip();

    if (prefs.UserType == "0") {
        $("#rdUsertype0").prop("checked", true);
        document.title = "PSE - Pago con Registro Persona Natural";
        $("#lblPersonType").html("Persona Natural");
        $("#trRegistradoPN").show("slow");
    }
    else {
        $("#rdUsertype1").prop("checked", true);
        document.title = "PSE - Pago con Registro Persona Jurídica";
        $("#lblPersonType").html("Persona Jurídica");
        $("#trRegistradoPJ1").show("slow");
        $("#trRegistradoPJ2").show("slow");
    }

    if (!prefs.EnableNoRegister) {
        $("#rdOptionNo").hide();
        $('#spnOptionNo').hide();
    }

    $("#rdOptionYes").prop("checked", true);
}

function buildPSEAppData() {
    if (prefs.EnablePSEApp) {
        $("#b2a-data").attr("data-amount", prefs.Amount);
        $("#b2a-data").attr("data-subject", prefs.Description);
        $("#b2a-data").attr("data-authorizer-id", prefs.BankCode);
        $("#b2a-data").attr("data-user-type", prefs.UserType);
        $("#b2a-data").attr("data-merchant-name", prefs.CompanyName);
        $("#b2a-data").attr("data-return-url", prefs.CompanyURL);

        var d = new Date();
        var scp = document.createElement('script');
        scp.setAttribute('src', 'https://pse.browser2app.com/api/automata/b2a.js?id=' + prefs.UserType + prefs.BankCode + '&ts=' + d.getTime().toString());
        document.head.appendChild(scp);
    }
}

function onChangePerson() {
    if ($("#rdUsertype0").is(":checked"))
        $("#lblPersonType").html("Persona Natural");
    else
        $("#lblPersonType").html("Persona Jurídica");
    onChangeOption();
}

function getPersonType() {
    if ($("#rdUsertype0").is(":checked"))
        return "0";
    else
        return "1";
}

function getOption() {
    if ($("#rdOptionYes").is(":checked"))
        return "Yes";
    else if ($("#rdOptionNo").is(":checked"))
        return "No";
    else
        return "Now";
}

function getEMail() {
    if ($("#rdUsertype0").is(":checked"))
        return $("#PNEMail").val();
    else
        return $("#PJEMail").val();
}

function geToken() {
    return $('input[name="_token"]').val();
}

function onChangeOption() {
    if ($("#rdOptionYes").is(":checked")) {

        $('#form1').attr("class", "form-horizontal");
        if ($("#rdUsertype0").is(":checked")) {
            document.title = "PSE - Pago con Registro Persona Natural";
            $("#trRegistradoPN").show("slow");
            $("#trRegistradoPJ1").hide();
            $("#trRegistradoPJ2").hide();
        }
        else {
            document.title = "PSE - Pago con Registro Persona Jurídica";
            $("#trRegistradoPJ1").show("slow");
            $("#trRegistradoPJ2").show("slow");
            $("#trRegistradoPN").hide();
        }
        $("#trRegistrar").hide();
        $("#trValidation").hide();
    }
    else {
        // ($("#rdOptionNo").is(":checked"))
        $('#form1').removeAttr("class");

        $("#trRegistradoPN").hide();
        $("#trRegistradoPJ1").hide();
        $("#trRegistradoPJ2").hide();
        $("#trRegistrar").show("slow");
        $("#trValidation").hide();

        if ($("#rdUsertype0").is(":checked")) {
            document.title = "PSE - Pago sin Registro Persona Natural";
            $('#ddTipoIdentificacion').empty();
            $('#ddTipoIdentificacion').append($('<option>', { value: 11, text: 'Registro civil de nacimiento' }));
            $('#ddTipoIdentificacion').append($('<option>', { value: 12, text: 'Tarjeta de identidad' }));
            $('#ddTipoIdentificacion').append($('<option>', { value: 13, text: 'Cedula de ciudadania' }));
            $('#ddTipoIdentificacion').append($('<option>', { value: 21, text: 'Tarjeta de extranjeria' }));
            $('#ddTipoIdentificacion').append($('<option>', { value: 22, text: 'Cedula de extranjeria' }));
            $('#ddTipoIdentificacion').append($('<option>', { value: 41, text: 'Pasaporte' }));
            $('#ddTipoIdentificacion').append($('<option>', { value: 42, text: 'Documento de identificacion extranjero' }));
            $('#ddTipoIdentificacion').prop("disabled", false);
            $('#ddTipoIdentificacion').val("13");
            $("#trRegistrarPN").show();
            $("#trRegistrarNamePN").show();
            $("#trRegistrarPJ").hide();
            $("#txtDireccion").show();
            $("#txtDireccionPJ").hide();
        }
        else {
            document.title = "PSE - Pago sin Registro Persona Jurídica";
            $("#trRegistrarPN").hide();
            $("#trRegistrarNamePN").hide();
            $("#trRegistrarPJ").show();
            $("#txtDireccion").hide();
            $("#txtDireccionPJ").show();
        }
    }
    /*else {

        clearNotifications();
        // window.location.href = "CreateRegister.htm?enc=" + qs("enc") + "&Mode=Volver&TipoPersona=" + getPersonType();
    }*/
}

function loadRegisterAndChooseQuestion() {
    if ($("#rdUsertype0").is(":checked")) {
        nit = null;
    } else {
        nit = $("#PJNIT").val();
    }
    $.ajax({
        url: "verifyUser",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ '_token': geToken(), 'personType': getPersonType(), 'email': getEMail(), 'NIT': nit, 'InPayment': 'true' }),
        dataType: "json",
        success: loadRegisterAndChooseQuestionSuccess,
        error: loadRegisterAndChooseQuestionError,
        async: false
    });
}

function loadRegisterAndChooseQuestionSuccess(data) {
    if (data != null) {
        userdata = JSON.parse(data);
    }
    else
        alert("Ocurrió un error cargando el usuario para pago, inténtalo nuevamente.");
}

function loadRegisterAndChooseQuestionError(error) {
    if (error.status == 422) {
        if (error.responseJSON.errors) {
            var errors = '<div class="alert alert-danger">';
            $.each(error.responseJSON.errors, function (key, value) {
                errors += "<li>";
                if (value.length > 1) {
                    errors = "<ul>";
                    $.each(value, function (k, e) {
                        errors += "<li>" + e + "</li>";
                    });
                    errors += "</ul>";
                } else {
                    errors += value[0] + "</li>";
                }
            });
            $('.errors').html(errors + '</div>');
        }
    } else {
        alert('Ocurrió un error cargando el usuario para pago, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
    }
}

function validateQuestion() {
    $.ajax({
        url: "api/ValidateQuestion",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ 'rdPersona': getPersonType(), 'answer': $("#QuestionResponse").val() }),
        dataType: "json",
        success: validateQuestionSuccess,
        error: validateQuestionError,
        async: false
    });
}

function validateQuestionSuccess(data) {
    if (data != null) {
        userquestionanswer = JSON.parse(data);
    }
    else
        alert("Ocurrió un error validando la pregunta de seguridad del usuario, inténtalo nuevamente.");
}

function validateQuestionError(error) {
    alert('Ocurrió un error validando la pregunta de seguridad del usuario, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
}

function loadUserPolicy(type) {
    return true;
    policytype = type;
    $.ajax({
        url: "api/LoadUserPolicy",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ 'type': type }),
        dataType: "json",
        success: loadUserPolicySuccess,
        error: loadUserPolicyError
    });
}

function loadUserPolicySuccess(data) {
    if (data != null) {
        $("#currentUserPolicy").html(data);
        if (policytype == "Registered")
            $("#chkDisclaimerInModal").show();
        else
            $("#chkDisclaimerInModal").hide();
        $('#disclaimerModal').modal('show');
    }
    else
        alert("Ocurrió un error cargando la política de usuarios, inténtalo nuevamente.");
}

function followAfterPolicy() {
    if ($("#chkDisclaimer").is(":checked"))
        processStep();
}

function loadUserPolicyError(error) {
    alert('Ocurrió un error cargando la política de usuarios, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
}

function acceptUserPolicy() {
    $.ajax({
        url: "api/AcceptUserPolicy",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: "",
        dataType: "json",
        success: acceptUserPolicySuccess,
        error: acceptUserPolicyError,
        async: false
    });
}

function acceptUserPolicySuccess(data) {
    if (data != true)
        alert("Ocurrió un error aceptando la nueva política de usuarios, inténtalo nuevamente.");
}

function acceptUserPolicyError(error) {
    alert('Ocurrió un error aceptando la nueva política de usuarios, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
}

function redirectToBank(checkFinger) {
    /*if (checkFinger) {
        var seconds = getFingerprintElapsedSeconds();
        if ((finger == null || finger.length == 0) && seconds < 10) {
            alert('Por favor aguarde más ' + Math.ceil(10 - seconds).toString() + ' segundo para seguir con la transacción');
            return;
        }
    }*/
    $("#divProcessing").show();
    $("#btnSeguir").prop("disabled", true);
    $.ajax({
        url: "RedirectToBank",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ /*'auth': readCookie('PSEAuth'), 'enc': qs("enc"),*/ 'rdPersona': getPersonType(), 'rdOption': getOption(), 'EMail': getEMail(), 'NIT': $("#PJNIT").val(), '_token': geToken(), 'Answer': $("#QuestionResponse").val(), 'txtNombre': getName(), 'ddTipoIdentificacion': getIdType(), 'txtNumeroIdentificacion': getId(), 'txtDireccion': getAddress(), 'txtNumeroCelular': $("#txtNumeroCelular").val(), 'email': $("#email").val() }),
        dataType: "json",
        success: redirectToBankSuccess,
        error: redirectToBankError
    });
}

function getName() {
    if (getPersonType() == "0")
        return $("#txtNombre").val();
    else
        return $("#txtNombrePJ").val();
}

function getIdType() {
    if (getPersonType() == "0")
        return $("#ddTipoIdentificacion").val();
    else
        return "31";
}

function getId() {
    if (getPersonType() == "0")
        return $("#txtNumeroIdentificacion").val();
    else
        return $("#txtNITPJ").val();
}

function getAddress() {
    if (getPersonType() == "0")
        return $("#txtDireccion").val();
    else
        return $("#txtDireccionPJ").val();
}

function redirectToBankSuccess(data) {
    try {
        if (data != null) {
            var resp = JSON.parse(data);
            checkAuth(resp);
            if (resp.Success) {
                clearNotifications();
                window.location.href = resp.URL;
            }
            else {
                if (resp.Reload) {
                    clearNotifications();
                    window.location.href = window.location.href;
                }
                else {
                    alert(resp.ErrorMessage);
                    if ($("#divProcessingSession").length) {
                        $("#divProcessingSession").hide();
                        abandonPayment(1);
                    }
                }
            }
        }
        else
            alert("Ocurrió un error siguiendo con la transacción, inténtalo nuevamente.");
    }
    finally {
        $("#divProcessing").hide();
        $("#btnSeguir").prop("disabled", false);
        window.location.href = 'confirmarpagobanco ';
    }
}

function checkAuth(resp) {
    if (resp.hasOwnProperty("Auth")) {
        createCookie("PSEAuth", resp.Auth, resp.AuthValidity);
    }
}

function redirectToBankError(error) {
    try {
        if (error.status == 422) {
            if (error.responseJSON.errors) {
                var errors = '<div class="alert alert-danger">';
                $.each(error.responseJSON.errors, function (key, value) {
                    errors += "<li>";
                    if (value.length > 1) {
                        errors = "<ul>";
                        $.each(value, function (k, e) {
                            errors += "<li>" + e + "</li>";
                        });
                        errors += "</ul>";
                    } else {
                        errors += value[0] + "</li>";
                    }
                });
                $('.errors').html(errors + '</div>');
            }
        } else {
            alert('Ocurrió un error siguiendo con la transacción, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
        }
    }
    finally {
        $("#divProcessing").hide();
        $("#btnSeguir").prop("disabled", false);
    }
}

function processStep() {
    $('#form1').data('formValidation').validate();
    if ($('#form1').data('formValidation').isValid()) {
        if ($("#rdOptionYes").is(":checked")) {

            if (!$("#trValidation").is(':visible')) {
                loadRegisterAndChooseQuestion();
                if (userdata == true) {
                    if (userdata.Question != null) {
                        $("#lblQuestion").html(userdata.Question);
                        $("#trValidation").show("slow");
                    }
                    window.location.href = 'confirmarpagobanco ';
                }
                else {
                    // alert('error verificando el usuario');
                }
                return;
            }

            if ($("#trValidation").is(':visible') || (getPersonType() == "0") || (getPersonType() == "1")) {
                loadRegisterAndChooseQuestion();
                if (userdata.Success) {
                    if ((getPersonType() == "0" || (getPersonType() == "1"))) {
                        validateQuestion();
                    }
                    else {
                        userquestionanswer = new Object();
                        userquestionanswer.Success = true;
                        userquestionanswer.EnableWithoutRegister = false;
                    }

                    if (userquestionanswer.EnableWithoutRegister && prefs.EnableNoRegister) {
                        $("#rdOptionNo").prop('checked', true);
                        $("#rdOptionYes").prop("disabled", true);
                        onChangeOption();
                        $("#lblIncorrectAnswersExceded").html(userquestionanswer.ErrorMessage);
                        $("#divIncorrectAnswers").show("slow");
                    }

                    if (userquestionanswer.Success) {
                        if (!userdata.UserPolicyMustBeAcepted || $("#chkDisclaimer").is(":checked")) {
                            if (userdata.UserPolicyMustBeAcepted)
                                acceptUserPolicy();
                            redirectToBank(true);
                        }
                        else {
                            loadUserPolicy("Registered");
                        }
                    }
                    else {
                        $("#lblQuestion").html(userquestionanswer.Question);
                        alert(userquestionanswer.ErrorMessage);
                    }
                }
                else {
                    if (userdata.ErrorMessage.length > 0)
                        alert(userdata.ErrorMessage);
                    else {
                        clearNotifications();
                        window.location.href = userdata.URL;
                    }
                }
            }
            window.location.href = 'confirmarpagobanco ';
        }
        else {
            redirectToBank(true);
        }
    }
}

function abandonPayment(type) {
    $("#divProcessing").show();
    $("#btnCancel").prop("disabled", true);
    /*$.ajax({
        url: "api/AbandonPayment",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ 'enc': qs("enc"), 'type': type }),
        dataType: "json",
        success: onAbandonPaymentSuccess,
        error: onAbandonPaymentError
    });*/
}

function onAbandonPaymentSuccess(data) {
    try {
        if (data != null) {
            var abd = JSON.parse(data);
            if (abd.Success) {
                clearNotifications();
                window.location.href = abd.URL;
            }
            else
                alert(abd.ErrorMessage);
        }
        else
            alert("Ocurrió un error abandonando el pago, inténtalo nuevamente.");
    }
    finally {
        $("#divProcessing").hide();
        $("#btnCancel").prop("disabled", false);
    }
}

function onAbandonPaymentError(error) {
    try {
        alert('Ocurrió un error abandonando el pago, inténtalo nuevamente. Status: ' + error.status + " - " + error.statusText);
    }
    finally {
        $("#divProcessing").hide();
        $("#btnCancel").prop("disabled", false);
    }
}

$(document).ready(function () {
    $('#form1').formValidation();
    startForm();
});