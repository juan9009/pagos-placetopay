@extends('layouts.app') @section('content')

<section class="content-header">
    <h1 class="center">
        Realizar pago
    </h1>
</section>
<br>
<div id="all" class="jumbotron">
    <h2 class="title text-center">
        Bancos</h2>
    <div class="col-xs-12 col-md-4 col-centered box-content">
        <div class="row">
            <div class="form-group col-xs-12 col-centered">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-centered">
                        {!! Form::open(['route' => 'pago.store']) !!}

                        <!-- Nombre Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::select('bancos', $listaBancos, null, ['class' => 'form-control'] ); !!}
                        </div>


                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="col-xs-6 col-sm-6  text-left">
                                    {!! Form::submit('Iniciar Pago', ['class' => 'btn btn-success']) !!}
                                </div>
                                <div class="col-xs-6 col-sm-6  text-right">
                                    <a href="#" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="row col-centered">
    <img src="{{ asset('images/logo-pse.png') }}">
</div>
@endsection