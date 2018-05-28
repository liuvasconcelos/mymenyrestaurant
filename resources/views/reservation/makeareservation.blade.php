@extends('layouts.app')

@section('content')
    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">Reserva de mesas</div>--}}

    {{--<div class="card-body">--}}
    {{--<div class="form-group row">--}}

    {{--<div class="col-md-2"> AQUI VAI FICAR O FORMULARIO PRA RESERVAR</div>--}}

    {{--<div class="form-group row mb-0">--}}
    {{--<div class="col-md-2 align-content-end">--}}
    {{--<a href="{{route('reserve')}}"  class="btn btn-group-sm">--}}
    {{--Reservar--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Reserva de mesas</div>
                    <div class="row">
                        <form class="col-md-8  ml-5">
                            <div style="height:5rem;"></div>
                            <div class="col-md-4">
                                <a class="row" style="height:3.5rem;">Nome do cliente:</a>
                                <a class="row" style="height:3.5rem;">Telefone:</a>
                                <a class="row" style="height:3.5rem;">Quantidade de pessoas:</a>
                                <a class="row" style="height:3.5rem;">Mesa:</a>
                                <a class="row" style="height:3.5rem;">Horário:</a>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="row">
                                        <input style="height:3rem; width:25rem;" name="clientName">
                                    </div>
                                    <div class="row mt-1">
                                        <input style="height:3rem; width:25rem;" name="celPhone" placeholder="(00)99999-9999">
                                    </div>
                                    <div class="row mt-1">
                                        <select class="bs-select-hidden form-control" style="height:3rem; width:25rem;">
                                            <option>01</option>
                                            <option>02</option>
                                            <option>03</option>
                                            <option>04</option>
                                            <option>05</option>
                                            <option>06</option>
                                        </select>
                                    </div>
                                    <div class="row mt-1">
                                        <select class="bs-select-hidden form-control" style="height:3rem; width:25rem;">
                                            <option>01</option>
                                            <option>02</option>
                                            <option>03</option>
                                            <option>04</option>
                                            <option>05</option>
                                            <option>06</option>
                                            <option>07</option>
                                            <option>08</option>
                                            <option>09</option>
                                            <option>10</option>
                                            <option>11</option>
                                        </select>
                                    </div>
                                    <div class="row mt-1">
                                        <input style="height:3rem; width:25rem;" name="hour" placeholder="00:00">
                                    </div>
                                </div>


                            </div>
                        </form>

                        <div class="col-md-2">
                            <div style="height:40rem;"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['reserve'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:20rem;">
                                    Reservar
                                </button>
                                {{Form::close()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
