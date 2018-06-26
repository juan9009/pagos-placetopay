@extends('layouts.app') 
@section('content')

<section class="content-header">
    <h1 class="center">
        Realizar pago
    </h1>
</section>
<br>
<div id="all" class="jumbotron">
        <div class="list-person">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 nopadding">
                <div class="col-xs-6 left nopadding">
                    <label>
                        <input type="radio" id="rdUsertype0" name="person_option">
                        <span>
                            <img src="assets/icon-user.png"></span>
                        <p>
                            Persona natural</p>
                    </label>
                </div>
                <div class="col-xs-6 right nopadding">
                    <label>
                        <input type="radio" id="rdUsertype1" name="person_option">
                        <span><i class="fa fa-building-o"></i></span>
                        <p>
                            Persona juridica</p>
                    </label>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <h2 class="title text-center">
            Al diligenciar el formulario dale clic al botón "Registrar" y listo, podrás empezar
            a realizar tus pagos con PSE y disfrutar sus beneficios.</h2>
        <div class="col-xs-12 col-md-10 col-centered box-content">
            <div id="rowId" class="row" style="display: none;">
                <div class="form-group col-xs-12 col-sm-6">
                    <label class="col-sm-5">
                        Tipo de identificación</label>
                    <div class="wrapper_select2">
                        <select id="ddTipoIdentificacion" class="form-control" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo Tipo de Identificación es requerido" title="" data-original-title="Selecciona el tipo de identificación de la lista"><option value="11">Registro civil de nacimiento</option><option value="12">Tarjeta de identidad</option><option value="13">Cedula de ciudadania</option><option value="21">Tarjeta de extranjeria</option><option value="22">Cedula de extranjeria</option><option value="41">Pasaporte</option><option value="42">Documento de identificacion extranjero</option></select>
                    </div>
                </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        Número de identificación</label>
                    <input type="text" class="form-control" id="txtNumeroIdentificacion" name="txtNumeroIdentificacion" placeholder="Número de Identificación" maxlength="15" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo número de identificación es requerido" data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-Z0-9]{1,15}$" data-fv-regexp-message="El campo número de identificación debe tener de 1 hasta 15 posiciones" data-fv-field="txtNumeroIdentificacion" title="" data-original-title="Ingresa tu número de identificación">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNumeroIdentificacion" data-fv-result="NOT_VALIDATED" style="display: none;">El campo número de identificación es requerido</small><small class="help-block" data-fv-validator="regexp" data-fv-for="txtNumeroIdentificacion" data-fv-result="NOT_VALIDATED" style="display: none;">El campo número de identificación debe tener de 1 hasta 15 posiciones</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNumeroIdentificacion" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small></div>
            </div>
            <div id="rowName" class="row" style="display: none;">
             <hr>
                <div class="form-group col-xs-12">
                    <label>
                        Nombre y apellido</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre completo y apellidos" maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo nombre no puede tener más de 64 caracteres" data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo nombre no puede tener más de 64 caracteres" data-fv-field="txtNombre" title="" data-original-title="Ingresa tu nombre completo y apellidos">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNombre" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre no puede tener más de 64 caracteres</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNombre" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre no puede tener más de 64 caracteres</small></div>
            </div>
            <div id="rowPJ" class="row" style="display: block;">
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        NIT</label>
                    <input type="text" class="form-control" id="PJNIT" name="PJNIT" placeholder="Número de Identificación Tributario" data-toggle="tooltip" data-placement="top" maxlength="15" data-fv-notempty="true" data-fv-notempty-message="El campo NIT es requerido" data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-Z0-9]{1,15}$" data-fv-regexp-message="El NIT debe ser alfanumérico de 1 hasta 15 caracteres" data-fv-field="PJNIT" title="" data-original-title="Ingresa el Número de Identificación Tributario de la empresa">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="PJNIT" data-fv-result="NOT_VALIDATED" style="display: none;">El campo NIT es requerido</small><small class="help-block" data-fv-validator="regexp" data-fv-for="PJNIT" data-fv-result="NOT_VALIDATED" style="display: none;">El NIT debe ser alfanumérico de 1 hasta 15 caracteres</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="PJNIT" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small></div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        Nombre de la empresa</label>
                    <input type="text" class="form-control" id="txtNombrePJ" name="txtNombrePJ" placeholder="Nombre de la empresa" maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo nombre de la empresa no puede tener más de 64 caracteres" data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo nombre de la empresa no puede tener más de 64 caracteres" data-fv-field="txtNombrePJ" title="" data-original-title="Ingresa el nombre de la empresa">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNombrePJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre de la empresa no puede tener más de 64 caracteres</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNombrePJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre de la empresa no puede tener más de 64 caracteres</small></div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        Número de celular</label>
                    <input type="tel" class="form-control" id="txtNumeroCelular" name="txtNumeroCelular" placeholder="Número de celular" maxlength="10" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo número de celular es requerido" data-fv-regexp="true" data-fv-regexp-regexp="^\d{8,10}$" data-fv-regexp-message="El campo número de celular debe ser numérico de 8 hasta 10 dígitos" data-fv-field="txtNumeroCelular" title="" data-original-title="Ingresa tu número celular">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNumeroCelular" data-fv-result="NOT_VALIDATED" style="display: none;">El campo número de celular es requerido</small><small class="help-block" data-fv-validator="regexp" data-fv-for="txtNumeroCelular" data-fv-result="NOT_VALIDATED" style="display: none;">El campo número de celular debe ser numérico de 8 hasta 10 dígitos</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNumeroCelular" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small></div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        Dirección</label>
                    <input type="text" class="form-control" id="txtDireccionPN" name="txtDireccionPN" placeholder="Dirección de residencia o trabajo" maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo dirección es requerido" data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo dirección debe tener hasta 64 caracteres" data-fv-field="txtDireccionPN" title="" data-original-title="Ingresa tu dirección" style="display: none;">
                    <input type="text" class="form-control" id="txtDireccionPJ" name="txtDireccionPJ" placeholder="Dirección de la empresa" maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo dirección es requerido" data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo dirección debe tener hasta 64 caracteres" data-fv-field="txtDireccionPJ" title="" style="display: block;" data-original-title="Ingresa tu dirección">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtDireccionPN" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección es requerido</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtDireccionPN" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección debe tener hasta 64 caracteres</small><small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtDireccionPJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección es requerido</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtDireccionPJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección debe tener hasta 64 caracteres</small></div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        E-mail</label>
                    <input type="email" class="form-control" id="txtEMail" name="txtEMail" placeholder="E-mail" maxlength="120" data-toggle="tooltip" title="" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo e-mail es requerido" data-fv-emailaddress-message="El campo e-mail es inválido" data-fv-stringlength-max="120" data-fv-stringlength-message="El campo e-mail debe tener hasta 120 caracteres" data-fv-field="txtEMail" data-original-title="Relaciona tu correo electrónico.">
                <small class="help-block" data-fv-validator="emailAddress" data-fv-for="txtEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es inválido</small><small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es requerido</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail debe tener hasta 120 caracteres</small></div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label>
                        Confirmar e-mail</label>
                    <input type="email" class="form-control" id="txtEMailConfirmacion" name="txtEMailConfirmation" placeholder="Confirmar e-mail" maxlength="120" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo confirmación de e-mail es requerido" data-fv-emailaddress-message="El campo confirmación de e-mail es inválido" data-fv-stringlength-max="120" data-fv-stringlength-message="El campo confirmación de e-mail debe tener hasta 120 caracteres" data-fv-identical="true" data-fv-identical-field="txtEMail" data-fv-identical-message="El campo confirmación e-mail no coincide con el campo e-mail" data-fv-field="txtEMailConfirmation" title="" data-original-title="Confirma tu correo electrónico">
                <small class="help-block" data-fv-validator="emailAddress" data-fv-for="txtEMailConfirmation" data-fv-result="NOT_VALIDATED" style="display: none;">El campo confirmación de e-mail es inválido</small><small class="help-block" data-fv-validator="identical" data-fv-for="txtEMailConfirmation" data-fv-result="NOT_VALIDATED" style="display: none;">El campo confirmación e-mail no coincide con el campo e-mail</small><small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtEMailConfirmation" data-fv-result="NOT_VALIDATED" style="display: none;">El campo confirmación de e-mail es requerido</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtEMailConfirmation" data-fv-result="NOT_VALIDATED" style="display: none;">El campo confirmación de e-mail debe tener hasta 120 caracteres</small></div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-xs-12">
                    <div class="row">
                        <label class="col-xs-12">
                            Pregunta de seguridad</label>
                        <div class="col-xs-12 col-sm-6">
                            <div class="wrapper_select">
                                <select id="ddPregunta1" class="form-control" data-toggle="tooltip" data-placement="top" title="" data-fv-notempty="true" data-fv-notempty-message="El campo pregunta desafío 1 es requerido" data-original-title="Selecciona una de las preguntas de seguridad disponibles. Las preguntas de seguridad son utilizadas para actualizar o eliminar tu registro"><option value="16">¿Colegio en el cual obtuvo su título de bachiller?</option><option value="17">¿Cuál es el nombre de su abuelo o su abuela?</option><option value="18">¿Nombre de la empresa donde tuvo su primer empleo?</option><option value="19">¿Colegio o universidad de la cual se graduó su pareja?</option><option value="20">¿En qué hospital o clínica nació?</option><option value="21">¿Cuál es la marca de su primer carro?</option><option value="22">¿En qué año se graduó de bachiller?</option><option value="23">¿Municipio o Ciudad donde nació su abuela?</option><option value="24">¿En cuál iglesia se casaron sus padres?</option><option value="25">¿Cuál fue su apodo en el colegio o barrio?</option><option value="26">¿Cuál es el nombre de su primer jefe?</option><option value="27">¿Cuál es el nombre de su mejor amigo(a) de infancia?</option><option value="28">¿Cuál es el regalo que le dieron en la infancia que más recuerda?</option><option value="29">¿Nombre del profesor(a) que más recuerda de su colegio?</option><option value="30">¿Cuál es el nombre del esposo(a) de su hermano(a)?</option><option value="31">LUIS FELIPE GIL </option><option value="33">SAN MARCOS </option><option value="36">GINA</option><option value="39">ESPERANZA</option><option value="40">DORA LETRADO</option><option value="41">LA MURCIELAGA</option><option value="42">BOYACA</option><option value="44">2006</option><option value="45">NOTENGO</option><option value="47">NOTENGOPAREJA</option><option value="48">ALLUS</option><option value="53">SANTA ANA</option><option value="54">MUZO</option><option value="56">Pregunta 1</option><option value="57">Pregunta 2</option><option value="58">Pregunta 3</option><option value="59">Pregunta 4</option><option value="60">Pregunta 5</option></select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input type="text" class="form-control" id="txtRespuestaPregunta1" name="txtRespuestaPregunta1" placeholder="Respuesta" maxlength="64" data-toggle="tooltip" data-placement="top" title="" data-fv-notempty="true" data-fv-notempty-message="El campo de respuesta a la pregunta de seguridad principal es necesario" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo de respuesta a la pregunta de seguridad principal debe tener hasta 64 caracteres" data-fv-field="txtRespuestaPregunta1" data-original-title="Ingresa la respuesta a la pregunta de seguridad">
                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtRespuestaPregunta1" data-fv-result="NOT_VALIDATED" style="display: none;">El campo de respuesta a la pregunta de seguridad principal es necesario</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtRespuestaPregunta1" data-fv-result="NOT_VALIDATED" style="display: none;">El campo de respuesta a la pregunta de seguridad principal debe tener hasta 64 caracteres</small></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-6" id="trLogin" style="display: none;">
                    <label>
                        Login:</label>
                    <input type="text" class="form-control" id="txtLogin" name="txtLogin" placeholder="Login" maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo login es requerido" data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo login debe tener hasta 64 caracteres" data-fv-field="txtLogin" title="" data-original-title="Informe el login para uso en el registro con PSE">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtLogin" data-fv-result="NOT_VALIDATED" style="display: none;">El campo login es requerido</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtLogin" data-fv-result="NOT_VALIDATED" style="display: none;">El campo login debe tener hasta 64 caracteres</small></div>
                <div class="form-group col-xs-12 col-sm-6" id="trPassword" style="display: none;">
                    <label>
                        Clave:</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtLogin" placeholder="Clave" maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo clave es requerido" data-fv-stringlength-min="6" data-fv-stringlength-max="32" data-fv-stringlength-message="El campo clave debe tener entre 6 y 32 caracteres" data-fv-field="txtLogin" title="" data-original-title="Informe la clave para uso en el registro con PSE">
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtLogin" data-fv-result="NOT_VALIDATED" style="display: none;">El campo login es requerido</small><small class="help-block" data-fv-validator="stringLength" data-fv-for="txtLogin" data-fv-result="NOT_VALIDATED" style="display: none;">El campo login debe tener hasta 64 caracteres</small></div>
            </div>
            <div class="row">
                <div class="terms">
                    <div id="chkDisclaimer2Div" data-toggle="tooltip" data-placement="left" class="checkbox checkbox-success" title="" data-original-title="Esta opción te permite recibir información adicional sobre los  servicios de ACH Colombia">
                        <input id="chkDisclaimer2" name="chkDisclaimer2" type="checkbox" value="" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                        <label for="chkDisclaimer2">
                            Quiero mantenerme al día con las novedades de PSE.</label>
                    </div>
                    <div id="chkDisclaimerDiv" data-toggle="tooltip" data-placement="left" class="checkbox checkbox-success" title="" data-original-title="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro">
                        <input id="chkDisclaimer" name="chkDisclaimer" type="checkbox" value="" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro." data-fv-field="chkDisclaimer" data-original-title="" title="">
                        <label for="chkDisclaimer">
                            Acepto voluntariamente los términos, condiciones y el aviso de Política de Privacidad
                            de ACH Colombia S.A.<a href="#" onclick="loadUserPolicy();" data-toggle="modal" data-target="#disclaimerModal">Ver
                                más</a></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="btns">
                    <div class="row visible-lg visible-md">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center btns clearfix">
                                <div class="col-xs-12 col-sm-6 text-left">
                                    <input type="button" id="btnRegresar" formnovalidate="" class="btn btn-primary pull-left" role="button" value="Regresar" onclick="regresar()">
                                </div>
                                <div class="col-xs-12 col-sm-6 text-right">
                                    <input type="submit" id="btnRegistrar" class="btn btn-primary pull-right" role="button" value="Registrar" disabled="disabled" onclick="registrar();" style="display: none;">
                                    <input type="submit" id="btnVolverAlPago" class="btn btn-primary pull-right" role="button" value="Seguir con el Pago" disabled="disabled" onclick="volverAlPago();">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row visible-xs visible-sm">
                        <div class="col-xs-12 col-sm-12">
                            <input type="submit" id="btnRegistrar2" disabled="disabled" class="btn btn-primary button-next" value="Registra" onclick="registrar();" style="display: none;">
                            <input type="submit" id="btnVolverAlPago2" class="btn btn-primary button-next" value="Seguir con el Pago" disabled="disabled" onclick="volverAlPago();">
                        </div>
                        <div class="col-xs-12 col-sm-12">
                            <input type="button" id="btnRegresar2" class="btn btn-primary button-previous" formnovalidate="" value="Regresar" onclick="regresar()">
                        </div>
                    </div>
                </div>
            </div>
            <div id="divProcessing" class="col-xs-6 col-sm-6 col-sm-offset-3 nopadding" style="display:none">
                <hr>
                <h2 class="title text-center">
                    Estamos procesando tu transacción</h2>
                <div class="progress progress-striped active" style="margin-bottom: 0">
                    <div class="progress-bar" style="width: 100%">
                    </div>
                </div>
            </div>
        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="chkDisclaimer" data-fv-result="NOT_VALIDATED" style="display: none;">Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro.</small></div>
    </div>
</div>
@endsection