@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Reserva de mesas</div>
                    <div class="row">
                        <form class="col-md-8  ml-5 form-horizontal" method="post" action="{{route('reserve')}}">
                            {{csrf_field()}}
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
                                        <select class="bs-select-hidden form-control" style="height:3rem; width:25rem;"
                                                name="quantity">
                                            <option>01</option>
                                            <option>02</option>
                                            <option>03</option>
                                            <option>04</option>
                                            <option>05</option>
                                            <option>06</option>
                                        </select>
                                    </div>
                                    <div class="row mt-1">

                                        {{Form::select('table',
                                                $listOfAvailableTable->pluck('id_table','id_table'),null,
                                                ['class' =>'form-control bs-select-hidden','placeholder'=> '-----------',
                                                'style' => 'width: 250px; height: 33px;', 'required'])}}

                                    </div>
                                    <div class="row mt-1">
                                        <input style="height:3rem; width:25rem;" name="hour" placeholder="00:00">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div style="height:20rem;"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                            style="width:20rem;">
                                        Reservar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
