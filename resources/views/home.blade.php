@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Controle de mesas</div>

                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col-md-2"> AQUI VAI FICAR UM MAPA DE MESAS</div>

                            <div class="form-group row mb-0">
                                <div class="col-md-2 align-content-end">
                                    <a href="{{route('finishTable')}}"  class="btn btn-group-sm">
                                        Finalizar Mesa
                                    </a>
                                    <a href="{{route('makeReserve')}}"  class="btn btn-group-sm">
                                        Efetuar Reserva
                                    </a>
                                    <a href="{{route('seeReservedTable')}}"  class="btn btn-group-sm">
                                        Ver Reservas
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
