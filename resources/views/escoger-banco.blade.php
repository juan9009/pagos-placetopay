@extends('layouts.app') @section('content')

<section class="content-header">
    <div class="row" style="max-width:98%; margin-left:2%;">
        <div class="col-xs-10 col-sm-10">
            <img src="{{ asset('images/placetopay.png.png') }}">
        </div>
    </div>
    <h1 class="center">
        Realizar pago
    </h1>
</section>
<br>
<div id="all" class="jumbotron">
    <!--<h2 class="title text-center">
        Bancos</h2>-->
    <div class="col-xs-12 col-md-12 col-centered box-content">
        <div class="row">
            <div class="form-group col-xs-12 col-centered">
                <div class="row col-centered">

                    <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2 col-lg-4">

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr class="HeaderTable">
                                            <td colspan="2" class="ng-binding">
                                                <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Información de Pago - Comprador</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-right BodyTable col-xs-6 col-sm-6 col-md-6 col-lg-6 ng-binding">
                                                Nombre
                                            </td>
                                            <td class="col-md-6 col-lg-6 ng-binding">
                                                Juan Guillermo Leal Parra
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right BodyTable col-xs-6 col-sm-6 col-md-6 col-lg-6 ng-binding">
                                                Identificación
                                            </td>
                                            <td class="col-md-6 col-lg-6 ng-binding">
                                                CC - 1067891941
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right BodyTable col-xs-6 col-sm-6 col-md-6 col-lg-6 ng-binding">
                                                Usuario
                                            </td>
                                            <td class="col-md-6 col-lg-6 ng-binding">
                                                juanglealp@gmail.com
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right BodyTable col-xs-6 col-sm-6 col-md-6 col-lg-6 ng-binding">
                                                Correo
                                            </td>
                                            <td class="col-md-6 col-lg-6 ng-binding">
                                                juanglealp@gmail.com
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right BodyTable col-xs-6 col-sm-6 col-md-6 col-lg-6 ng-binding">
                                                Dirección IP
                                            </td>
                                            <td class="col-md-6 col-lg-6 ng-binding">
                                                190.255.123.25
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right BodyTable col-xs-6 col-sm-6 col-md-6 col-lg-6 ng-binding">
                                                Referencia
                                            </td>
                                            <td class="col-md-6 col-lg-6 ng-binding">
                                                316899
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <div class="row">

                            <table class="table table-bordered table-condensed table-striped">
                                <thead>
                                    <tr class="HeaderTable">
                                        <td class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ng-binding">
                                            Concepto
                                        </td>
                                        <td class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ng-binding">
                                            Valor Neto
                                        </td>
                                        <td class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ng-binding">
                                            IVA
                                        </td>
                                    </tr>
                                </thead>
                                <!-- ngRepeat: DetalleConceptoPago in InicioProcesoPago.DetallePago.DetallesConceptoPago -->
                                <tbody ng-repeat="DetalleConceptoPago in InicioProcesoPago.DetallePago.DetallesConceptoPago" class="ng-scope">
                                    <tr>
                                        <td class="BodyTable ng-binding">
                                            Pago documento 4546623209
                                        </td>
                                        <td class="text-right BodyTable ng-binding">
                                            $100,000.00
                                        </td>
                                        <td class="text-right BodyTable ng-binding">
                                            $0.00
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- end ngRepeat: DetalleConceptoPago in InicioProcesoPago.DetallePago.DetallesConceptoPago -->
                                <tfoot>
                                    <tr class="bg-success">
                                        <td class="text-nowrap BodyTable bold ng-binding">
                                            4546623209
                                        </td>
                                        <td class="text-right text-nowrap BodyTable italic ng-binding">
                                            $100,000.00
                                        </td>
                                        <td class="text-right text-nowrap BodyTable italic ng-binding">
                                            $0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right bold ng-binding" colspan="2">
                                            Total a Pagar
                                        </td>
                                        <td class="text-right bold ng-binding">
                                            $100,000.00
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-4" style="text-align: left">
                        {!! Form::open(['route' => 'pago.creartransaccion']) !!}

                        <div class="row">
                            <div class="form-group col-sm-5">
                                {!! Form::label('cuenta', 'Tipo de cuenta:') !!} {!! Form::select('cuenta', ['0'=>'Persona', '1'=>'Empresa'], null, ['class'
                                => 'form-control'] ); !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <!-- Nombre Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('banco', 'Seleccione entidad financiera:') !!} {!! Form::select('banco', $listaBancos, 1022, ['class' =>
                                'form-control'] ); !!}
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="col-xs-12 col-sm-6  text-left">
                                    {!! Form::submit('Iniciar Pago', ['class' => 'btn btn-success', 'onClick'=>'mostrarLoader()']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-6  text-right">
                                    <a href="#" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row col-centered loading hide">
                    <img width="50" src="{{ asset('images/loading.gif') }}">
                </div>
            </div>
        </div>
        <div class="row">
            @include('errors')
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="row col-centered">
    <img src="{{ asset('images/logo-pse.png') }}" class="img-pse">
</div>
@endsection