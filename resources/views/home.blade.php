@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body container">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset(\Auth::user()->tfa_secret))
                        <div class="row">
                            <div class="col-xs-12 col-md-6 justify-content-center">
                                <img src="<?php echo $qrCode ?>" alt="Verify code"/>
                                <p>{{ $secret }}</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <?php
                                    if (session()->has('result')) {
                                        $result = session('result');
                                ?>
                                    <div class="alert alert-<?php echo $result[0] ? 'success' : 'danger'; ?>">
                                        <?php echo $result[1]; ?>
                                    </div>
                                <?php } ?>
                                <form action="{{ URL::to('/verify') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="code" class="control-label">Código dinámico:</label>
                                        <input type="text" pattern="[0-9]{6}" class="form-control" name="code" maxlength="6"/>
                                    </div>
                                    <input type="Submit" class="btn btn-primary" value="Verificar"/>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-xs-12">
                                <p>Aún no tienes asignado un generador de claves dinámicas, presiona el botón para comenzar.</p>
                                <a href="{{ URL::to('/generate') }}" class="btn btn-primary">Generar clave secreta</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
