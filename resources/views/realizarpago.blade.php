@extends('layouts.app') @section('content')

<section class="content-header">
    <div class="row" style="max-width:98%; margin-left:2%;">
        <div class="col-xs-10 col-sm-10">
            <img src="{{ asset('images/placetopay.png.png') }}">
        </div>
    </div>
    <h4 class="center">
        Bienvenido Banco de Pruebas - {{ Cache::get('bancos')[session('banco')] }}
    </h4>
</section>
<br>
<div class="jumbotron col-md-6 col-centered" id="info-pago">
    <h2 class="title text-center">
        Debug ConfirmTransactionPayment</h2>
    <div class="col-centered box-content">
        <div class="row">
            {!! Form::open(['route' => 'pago.creartransaccion']) !!}
            <div class="form-group col-centered">
                <div class="row">
                    <div class="col-xs-10 col-sm-10 col-centered">
                        <table class="table" id="info-pago">
                            <tr>
                                <td>trazabilityCode:</td>
                                <td>
                                    {!! Form::text('trazabilityCode', 1181661, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>finantialInstitutionCode:</td>
                                <td>
                                    {!! Form::text('finantialInstitutionCode', 1022, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>entityCode:</td>
                                <td>
                                    {!! Form::text('entityCode', 9002992280, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>transactionValue:</td>
                                <td>
                                    {!! Form::text('transactionValue', 10000, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>vatValue:</td>
                                <td>
                                    {!! Form::text('vatValue', 0, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>ticketId:</td>
                                <td>
                                    {!! Form::text('ticketId', 1442262124, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>soliciteDate:</td>
                                <td>
                                    {!! Form::text('soliciteDate', date('d/m/Y'), ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>bankProcessDate:</td>
                                <td>
                                    {!! Form::text('bankProcessDate', date('d/m/Y'), ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>transactionState:</td>
                                <td>
                                    {!! Form::select('banco', ['OK'=>'OK','NOT_AUTHORIZED'=>'NOT_AUTHORIZED','PENDING'=>'PENDING','FAILED'=>'FAILED'], null,
                                    ['class' => 'form-control'] ); !!}
                                </td>
                            </tr>
                            <tr>
                                <td>authorizationID:</td>
                                <td>
                                    {!! Form::text('authorizationID', 12, ['class' => 'form-control']) !!}
                                </td>
                            </tr>
                        </table>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="col-xs-6 col-sm-6  text-left">
                                    {!! Form::submit('Call', ['class' => 'btn btn-success', 'onClick'=>'mostrarLoader()']) !!}
                                </div>
                                <div class="col-xs-6 col-sm-6  text-right">
                                    <a href="#" class="btn btn-default">Return to PPE</a>
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
        <div class="row">
            <div class="clearfix"></div>
            @include('flash::message')
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