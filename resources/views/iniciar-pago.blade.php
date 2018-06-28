@extends('layouts.app') @section('content')

<div class="row col-centered">
    <img src="{{ asset('images/placetopay.png.png') }}" class="img-pse">
</div>
<form id="form1" role="form" data-fv-framework="bootstrap" onsubmit="return false;" novalidate="novalidate" class="fv-form fv-form-bootstrap">
    <div class="content container">
        <div id="all" class="jumbotron">
            <h2 class="title text-center">
                PSE - Pagos Seguros en Línea /
                <span id="lblPersonType">Persona Natural</span>
            </h2>
            <div class="col-xs-12 col-md-10 col-centered box-content">
                <div class="list-person">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 nopadding">
                        <div class="col-xs-6 left nopadding">
                            <label>
                                <input type="radio" id="rdUsertype0" name="person_option" checked>
                                <span>
                                    <img src="{{ asset('images/icon-user.png') }}">
                                </span>
                                <p>
                                    Persona natural</p>
                            </label>
                        </div>
                        <div class="col-xs-6 right nopadding">
                            <label>
                                <input type="radio" id="rdUsertype1" name="person_option">
                                <span>
                                    <i class="fa fa-building-o"></i>
                                </span>
                                <p>
                                    Persona juridica</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="clear">
                </div>
                <div class="list-option">
                    <label>
                        <input type="radio" id="rdOptionYes" name="action_person" checked>
                        <span>
                            <i class="fa fa-check-circle-o"></i>Soy un usuario registrado</span>
                    </label>
                    <label>
                        <input type="radio" id="rdOptionNow" name="action_person">
                        <span>
                            <i class="fa fa-user-plus"></i>Quiero registrarme ahora</span>
                    </label>
                    <label>
                        <input type="radio" id="rdOptionNo" name="action_person" style="display: none;">
                        <span id="spnOptionNo" style="display: none;">
                            <i class="fa fa-user-times"></i>Pago con registro preliminar</span>
                    </label>
                </div>
                <div class="clear">
                </div>
                <h5 class="text-center" id="divIncorrectAnswers" style="display: none;">
                    <span id="lblIncorrectAnswersExceded" style="color: Red"></span>
                </h5>
                <div id="registrado" class="form-field-box">
                    <div class="form-group block" id="trRegistradoPN" style="display: block;">
                        <label class="col-xs-12 col-sm-4">
                            E-mail</label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="email" class="form-control" id="PNEMail" name="PNEMail" placeholder="E-mail registrado en PSE" maxlength="120"
                                data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo e-mail es requerido"
                                data-fv-emailaddress-message="El campo e-mail es inválido" data-fv-stringlength-max="120" data-fv-stringlength-message="El campo e-mail debe tener hasta 120 caracteres"
                                data-fv-field="PNEMail" title="" data-original-title="Ingresa el correo electrónico asociado a tu registro">
                            <small class="help-block" data-fv-validator="emailAddress" data-fv-for="PNEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es inválido</small>
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="PNEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="PNEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail debe tener hasta 120 caracteres</small>
                        </div>
                    </div>
                    <div class="form-group block" id="trRegistradoPJ1" style="display: none;">
                        <label class="col-xs-12 col-sm-4">
                            NIT</label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="text" class="form-control" id="PJNIT" name="PJNIT" placeholder="NIT registrado en PSE" data-toggle="tooltip"
                                data-placement="top" maxlength="17" data-fv-notempty="true" data-fv-notempty-message="El campo NIT es requerido"
                                data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-Z0-9]{1,15}-[0-9]{1}$" data-fv-regexp-message="El NIT debe ser alfanumérico de 1 hasta 15 caracteres Ej: 123456789-2"
                                data-fv-field="PJNIT" title="" data-original-title="Ingresa el NIT asociado a tu registro">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="PJNIT" data-fv-result="NOT_VALIDATED" style="display: none;">El campo NIT es requerido</small>
                            <small class="help-block" data-fv-validator="regexp" data-fv-for="PJNIT" data-fv-result="NOT_VALIDATED" style="display: none;">El NIT debe ser alfanumérico de 1 hasta 15 caracteres</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="PJNIT" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small>
                        </div>
                    </div>
                    <div class="form-group block" id="trRegistradoPJ2" style="display: none;">
                        <label class="col-xs-12 col-sm-4">
                            E-mail</label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="email" class="form-control" id="PJEMail" name="PJEMail" placeholder="E-mail registrado en PSE" maxlength="120"
                                data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo e-mail es requerido"
                                data-fv-emailaddress-message="El campo e-mail es inválido" data-fv-field="PJEMail" title="" data-original-title="Ingresa el correo electrónico asociado a tu registro">
                            <small class="help-block" data-fv-validator="emailAddress" data-fv-for="PJEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es inválido</small>
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="PJEMail" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="PJEMail" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small>
                        </div>
                    </div>
                    <div class="form-group block" id="trValidation" style="display: none;">
                        <hr>
                        <label class="col-xs-12 col-sm-4">
                            <span id="lblQuestion"></span>
                        </label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="text" class="form-control" id="QuestionResponse" name="QuestionResponse" placeholder="Respuesta Pregunta de Seguridad"
                                maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="Debes registrar la respuesta de seguridad indicada para continuar con el pago"
                                data-fv-stringlength-max="64" data-fv-stringlength-message="El campo respuesta de la pregunta de seguridad debe tener hasta 64 caracteres"
                                data-fv-field="QuestionResponse" title="" data-original-title="Ingresa la respuesta a la pregunta de seguridad">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="QuestionResponse" data-fv-result="NOT_VALIDATED" style="display: none;">Debes registrar la respuesta de seguridad indicada para continuar con el pago</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="QuestionResponse" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo respuesta de la pregunta de seguridad debe tener hasta 64 caracteres</small>
                        </div>
                    </div>
                </div>
                <div class="form-field-box" id="trRegistrar" style="display: none;">
                    <div id="trRegistrarPN" class="row">
                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="wrapper_select2">
                                <label>Tipo de identificación</label>
                                <select id="ddTipoIdentificacion" class="form-control" data-toggle="tooltip" data-placement="top" data-fv-notempty="true"
                                    data-fv-notempty-message="El campo Tipo de Identificación es requerido" title="" data-original-title="Selecciona el tipo de identificación de la lista">
                                    <option value="11">Registro civil de nacimiento</option>
                                    <option value="12">Tarjeta de identidad</option>
                                    <option value="13" selected="selected">Cedula de ciudadania</option>
                                    <option value="21">Tarjeta de extranjeria</option>
                                    <option value="22">Cedula de extranjeria</option>
                                    <option value="31">NIT</option>
                                    <option value="41">Pasaporte</option>
                                    <option value="42">Documento de identificacion extranjero</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>Número de identificación</label>
                            <input type="text" class="form-control" id="txtNumeroIdentificacion" name="txtNumeroIdentificacion" placeholder="Número de Identificación"
                                maxlength="15" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo número de identificación es requerido"
                                data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-Z0-9]{1,15}$" data-fv-regexp-message="El campo número de identificación debe tener de 1 hasta 15 posiciones"
                                data-fv-field="txtNumeroIdentificacion" title="" data-original-title="Ingresa tu número de identificación">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNumeroIdentificacion" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo número de identificación es requerido</small>
                            <small class="help-block" data-fv-validator="regexp" data-fv-for="txtNumeroIdentificacion" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo número de identificación debe tener de 1 hasta 15 posiciones</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNumeroIdentificacion" data-fv-result="NOT_VALIDATED"
                                style="display: none;">Please enter a value with valid length</small>
                        </div>
                    </div>
                    <div id="trRegistrarPJ" class="row">
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>
                                NIT</label>
                            <input type="text" class="form-control" id="txtNITPJ" name="txtNITPJ" placeholder="Número de Identificación Tributario" data-toggle="tooltip"
                                data-placement="top" maxlength="15" data-fv-notempty="true" data-fv-notempty-message="El campo NIT es requerido"
                                data-fv-regexp="true" data-fv-regexp-regexp="^[a-zA-Z0-9]{1,15}-[0-9]{1}$" data-fv-regexp-message="El NIT debe ser alfanumérico de 1 hasta 15 caracteres Ej: 123456789-2"
                                data-fv-field="txtNITPJ" title="" data-original-title="Ingresa el Número de Identificación Tributario de la empresa">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNITPJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo NIT es requerido</small>
                            <small class="help-block" data-fv-validator="regexp" data-fv-for="txtNITPJ" data-fv-result="NOT_VALIDATED" style="display: none;">El NIT debe ser alfanumérico de 1 hasta 15 caracteres</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNITPJ" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>
                                Nombre de la empresa</label>
                            <input type="text" class="form-control" id="txtNombrePJ" name="txtNombrePJ" placeholder="Nombre de la empresa" maxlength="64"
                                data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo nombre es requerido"
                                data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo nombre debe tener hasta 64 caracteres"
                                data-fv-field="txtNombrePJ" title="" data-original-title="Ingresa el nombre de la empresa">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNombrePJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNombrePJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre debe tener hasta 64 caracteres</small>
                        </div>
                    </div>
                    <div id="trRegistrarNamePN" class="row">
                        <hr>
                        <div class="form-group col-xs-12">
                            <label>
                                Nombre y apellido</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre completo y apellidos" maxlength="64"
                                data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo nombre es requerido"
                                data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo nombre debe tener hasta 64 caracteres"
                                data-fv-field="txtNombre" title="" data-original-title="Ingresa tu nombre completo y apellidos">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNombre" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNombre" data-fv-result="NOT_VALIDATED" style="display: none;">El campo nombre debe tener hasta 64 caracteres</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>
                                Número de celular</label>
                            <input type="tel" class="form-control" id="txtNumeroCelular" name="txtNumeroCelular" placeholder="Número de celular" maxlength="10"
                                data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo número de celular es requerido"
                                data-fv-regexp="true" data-fv-regexp-regexp="^\d{8,10}$" data-fv-regexp-message="El campo número de celular debe tener de 8 hasta 10 dígitos"
                                data-fv-field="txtNumeroCelular" title="" data-original-title="Ingresa tu número celular">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtNumeroCelular" data-fv-result="NOT_VALIDATED" style="display: none;">El campo número de celular es requerido</small>
                            <small class="help-block" data-fv-validator="regexp" data-fv-for="txtNumeroCelular" data-fv-result="NOT_VALIDATED" style="display: none;">El campo número de celular debe tener de 8 hasta 10 dígitos</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtNumeroCelular" data-fv-result="NOT_VALIDATED"
                                style="display: none;">Please enter a value with valid length</small>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>
                                Dirección</label>
                            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección de residencia o trabajo"
                                maxlength="64" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo dirección es requerido"
                                data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo dirección debe tener hasta 64 caracteres"
                                data-fv-field="txtDireccion" title="" data-original-title="Ingresa tu dirección">
                            <input type="text" class="form-control" id="txtDireccionPJ" name="txtDireccionPJ" placeholder="Dirección de la empresa" maxlength="64"
                                data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo dirección es requerido"
                                data-fv-stringlength-min="1" data-fv-stringlength-max="64" data-fv-stringlength-message="El campo dirección debe tener hasta 64 caracteres"
                                data-fv-field="txtDireccionPJ" title="" data-original-title="Ingresa tu dirección">
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtDireccion" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtDireccion" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección debe tener hasta 64 caracteres</small>
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="txtDireccionPJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="txtDireccionPJ" data-fv-result="NOT_VALIDATED" style="display: none;">El campo dirección debe tener hasta 64 caracteres</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>
                                E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="120" data-toggle="tooltip"
                                data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo e-mail es requerido"
                                data-fv-emailaddress-message="El campo e-mail es inválido" data-fv-stringlength-max="120" data-fv-stringlength-message="El campo e-mail debe tener hasta 120 caracteres"
                                data-fv-field="email" title="" data-original-title="Ingresa tu correo electrónico">
                            <small class="help-block" data-fv-validator="emailAddress" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es inválido</small>
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">El campo e-mail debe tener hasta 120 caracteres</small>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            <label>
                                Confirmar e-mail</label>
                            <input type="email" class="form-control" id="emailConfirmacion" name="emailConfirmation" placeholder="Confirmar e-mail"
                                maxlength="120" data-toggle="tooltip" data-placement="top" data-fv-notempty="true" data-fv-notempty-message="El campo confirmación de e-mail es requerido"
                                data-fv-emailaddress-message="El campo confirmación de e-mail es inválido" data-fv-stringlength-max="120"
                                data-fv-stringlength-message="El campo confirmación de e-mail debe tener hasta 120 caracteres"
                                data-fv-identical="true" data-fv-identical-field="email" data-fv-identical-message="El campo confirmación e-mail no coincide con el campo e-mail"
                                data-fv-field="emailConfirmation" title="" data-original-title="Confirma tu correo electrónico">
                            <small class="help-block" data-fv-validator="emailAddress" data-fv-for="emailConfirmation" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo confirmación de e-mail es inválido</small>
                            <small class="help-block" data-fv-validator="identical" data-fv-for="emailConfirmation" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo confirmación e-mail no coincide con el campo e-mail</small>
                            <small class="help-block" data-fv-validator="notEmpty" data-fv-for="emailConfirmation" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo confirmación de e-mail es requerido</small>
                            <small class="help-block" data-fv-validator="stringLength" data-fv-for="emailConfirmation" data-fv-result="NOT_VALIDATED"
                                style="display: none;">El campo confirmación de e-mail debe tener hasta 120 caracteres</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="terms">
                            <div id="chkDisclaimerDiv" data-toggle="tooltip" data-placement="left" class="checkbox checkbox-success" title="" data-original-title="Debes aceptar los términos, condiciones y el aviso de privacidad para completar el registro">
                                <input id="chkDisclaimerNotRegistered" name="chkDisclaimerNotRegistered" type="checkbox" value="" data-toggle="tooltip" data-placement="top"
                                    data-fv-notempty="true" data-fv-notempty-message="Debes aceptar los términos, condiciones y el aviso de privacidad para continuar el pago."
                                    data-fv-field="chkDisclaimerNotRegistered" data-original-title="" title="">
                                <label for="chkDisclaimerNotRegistered">
                                    Acepto voluntariamente los términos, condiciones y el aviso de Política de Privacidad de ACH Colombia S.A.
                                    <a href="#" onclick="loadUserPolicy('Unregistered');">Ver más</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row visible-lg visible-md">
                    <div class="col-lg-12 col-md-12">
                        <div class="text-center btns">
                            <a id="" class="pull-left linkPSE" href="{{ url()->previous() }}" formnovalidate="" >
                                Regresar</a>
                            <input type="button" id="btnSeguir" class="btn btn-outline-primary" onclick="processStep();" value="Ir al Banco">
                        </div>
                    </div>
                </div>
                <div class="row visible-xs visible-sm">
                    <div class="col-xs-12 col-sm-12 text-center btns">
                        <button type="button" id="btnSeguir2" class="btn btn-outline-primary" onclick="processStep();">
                            Ir al Banco</button>
                    </div>
                    <div class="col-xs-12 col-sm-12 text-center btns">
                        <a id="" class="linkPSE" href="{{ url()->previous() }}" formnovalidate="" >
                            Regresar</a>
                    </div>
                </div>
                <div id="divProcessing" class="row col-xs-6 col-sm-6 col-sm-offset-3 nopadding" style="display:none">
                    <hr>
                    <h2 class="title text-center">
                        Estamos procesando tu transacción</h2>
                    <div class="progress progress-striped active" style="margin-bottom: 0">
                        <div class="progress-bar" style="width: 100%">
                        </div>
                    </div>
                </div>
                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="chkDisclaimerNotRegistered" data-fv-result="NOT_VALIDATED"
                    style="display: none;">Debes aceptar los términos, condiciones y el aviso de privacidad para continuar el pago.</small>
            </div>
            <div class="row col-centered col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-top: 2%;">
                <div class="errors">
                </div>
            </div>
        </div>
    </div>
    {{ csrf_field() }}
</form>
<br>
<br>
<br>
<div class="row col-centered">
    <img src="{{ asset('images/logo-pse.png') }}" class="img-pse">
</div>

@endsection