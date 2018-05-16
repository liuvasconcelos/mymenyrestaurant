@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Controle de reservas</div>

                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col-md-2"> AQUI VAI UM MAPA DE MESAS</div>

                            <div class="form-group row mb-0">

                                <div class="col-md-2 align-content-end">
                                    <a>DADOS DA RESERVA</a>
                                    <a href="{{route('goBackToHomeAfterSeeReservation')}}"  class="btn btn-group-sm">
                                        Voltar
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
