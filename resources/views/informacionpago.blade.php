@extends('layouts.app') @section('content')

<section class="content-header">
    <div class="row" style="max-width:98%; margin-left:2%;">
        <div class="col-xs-10 col-sm-10">
            <img src="{{ asset('images/placetopay.png.png') }}">
        </div>
    </div>
    <h4 class="center">
    </h4>
</section>
<br>
<div class="jumbotron col-md-6 col-centered" id="info-pago">
    <h2 class="title text-center">
        Comprobante de pago</h2>
    <div class="col-centered box-content">
        <div class="row">
            <div class="form-group col-centered">
                <div class="row">
                    <div class="col-xs-10 col-sm-10 col-centered">

                        <table class="table" id="info-pago">
                            <tr>
                                <td>Transaction ID:</td>
                                <td>{{ $transaccion->transactionID }}</td>
                            </tr>
                            <tr>
                                <td>Reference:</td>
                                <td>{{ $transaccion->reference }}</td>
                            </tr>
                            <tr>
                                <td>Request Date:</td>
                                <td>{{ $transaccion->requestDate }}</td>
                            </tr>
                            <tr>
                                <td>Bank Process Date:</td>
                                <td>{{ $transaccion->bankProcessDate }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $transaccion->returnCode }}</td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="clearfix"></div>
                            @include('flash::message')
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="col-xs-12 col-sm-6">
                                    <a href="bancos" class="btn btn-default">Regresar</a>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <a href="javascript:window.print()" class="btn btn-info">Imprimir</a>
                                </div>
                                <!--<div class="col-xs-12 col-sm-4">
                                    <a href="debug" class="btn btn-default">Debug</a>
                                </div>-->
                            </div>
                        </div>

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