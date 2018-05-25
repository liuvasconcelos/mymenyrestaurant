@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width: 70rem; height: 20rem;">
                    <div class="card-header">Controle de mesas</div>

                    <div class="row">
                        <form class="col-md-8">
                            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Group 1">
                                <div class="btn-group ml-2 mt-2" role="group" aria-label="First group">
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">01</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">02</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">03</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">04</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">05</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">06</a>
                                </div>
                            </div>

                            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Group 2">
                                <div class="btn-group ml-2" role="group" aria-label="First group">
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">07</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">08</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">09</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">10</a>
                                </div>
                            </div>

                            <div class="btn-group ml-2" role="toolbar" aria-label="Group 3">
                                <div class="btn-group" role="group" aria-label="First group">
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">11</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">12</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">13</a>
                                    <a href="{{route('tableDetail')}}" class="btn btn-secondary">14</a>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-4">
                            <a href="{{route('finishTable')}}" class="btn btn-light mb-1 mt-5" style="width: 15rem;">
                                Finalizar Mesa
                            </a>
                            <a href="{{route('makeReserve')}}" class="btn btn-light mb-1" style="width: 15rem;">
                                Efetuar Reserva
                            </a>
                            <a href="{{route('seeReservedTable')}}" class="btn btn-light" style="width: 15rem;">
                                Ver Reservas
                            </a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
