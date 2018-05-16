@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reserva de mesas</div>

                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col-md-2"> AQUI VAI FICAR O FORMULARIO PRA RESERVAR</div>

                            <div class="form-group row mb-0">
                                <div class="col-md-2 align-content-end">
                                    <a href="{{route('reserve')}}"  class="btn btn-group-sm">
                                        Reservar
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
