@extends('layouts.app') @section('content') @inject('user', 'App\User')
<section class="content-header">
    <h2 class="center">
        Simulador de pago - {{ Cache::get('bancos')[session('banco')] }}
    </h2>
</section>
<br>
<div id="all" class="jumbotron">
    {!! Form::open(['route' => 'pago.creartransaccion']) !!}
    <h2 class="title text-center">
        <b>Cliente</b> - {{ $user->infoSession()->name }}</h2>
    <div class="col-xs-12 col-md-8 col-centered box-content">
        <div class="row">
            <div class="form-group col-xs-12 col-centered">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-centered">
                        <div class="form-group col-sm-4">
                            {!! Form::label('cuenta', '¿De cuál cuenta desea pagar?') !!} {!! Form::select('cuenta', ['1'=>"Cuenta Ahorro - XXXXXXXX253
                            ($1'234.124.00)", '2'=>"Cuenta Crédito - XXXXXXXX867 ($648.456.00)"], null, ['class' => 'form-control']
                            ); !!}
                            <br>
                            <b>Valor: </b> $100.000.00
                            <br>
                            <br>
                            <br>
                            <div class="row form-group col-sm-12 col-centered">
                                <div class="col-xs-12 col-sm-6  text-left">
                                    {!! Form::submit('Efectuar pago', ['class' => 'btn btn-success', 'onClick'=>'mostrarLoader()']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-6  text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                @include('errors')
                            </div>
                        </div>


                        <div class="form-group col-sm-5 col-sm-offset-3" style="text-align: left;">
                            <!--<h4>Recibe</h4>
                                <b>EGMINGENIERIA SIN FRONTERAS</b>
                                <br>-->
                            <div class="general">


                                <!-- Datos resumen de la transaccion -->
                                <div class="colDerecha">
                                    <div class="internoDer">
                                        <span class="tituloAutenticacion">Detalles de la transacción</span>
                                        <br>
                                        <br>
                                        <span class="titulos">Destino de pago</span>
                                        <span class="subtitulos">EGMINGENIERIA SIN FRONTERAS</span>
                                        <br>
                                        <span class="titulos">Motivo</span>
                                        <span class="subtitulos">4546623209</span>
                                        <br>
                                        <span class="titulos">Fecha</span>
                                        <span class="subtitulos">{{date('d/m/Y')}}</span>
                                        <br>
                                        <span class="titulos">Valor transacción</span>
                                        <span class="subtitulos">$100.000,00</span>


                                        <br>

                                        <div class="contReferencia">
                                            <div class="colReferencia">
                                                <span class="titulos">Referencia 1</span>
                                                <span class="subtitulos">{{$_SERVER['REMOTE_ADDR']}}</span>
                                            </div>
                                            <br>
                                            <div class="colReferencia">
                                                <span class="titulos">Referencia 2</span>
                                                <span class="subtitulos">CC</span>
                                            </div>
                                            <br>
                                            <div class="colReferencia">
                                                <span class="titulos">Referencia 3</span>
                                                <span class="subtitulos">1067891941</span>
                                            </div>
                                        </div>
                                        <span id="viewns_Z7_4GIL1E6PAUNI90AEINHTSR1G86_:formConfirmacion:costoComision">

                                            <br>

                                            <br>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="row col-centered loading hide">
                    <img width="50" src="{{ asset('images/loading.gif') }}">
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection