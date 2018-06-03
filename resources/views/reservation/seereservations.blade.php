@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Dados da reserva - mesa {{$idTable}}</div>
                    <div class="row">
                        <form class="col-md-8  ml-5">
                            <div style="height:5rem;"></div>
                            <label>
                                {!! $tableInformation !!}</label>
                            </br>
                        </form>

                        <div class="col-md-2">
                            <div style="height:33rem;"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['cancelReservation', $idTable], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:25rem;">
                                    Concelar reserva
                                </button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['goBackToHomeAfterSeeReservation'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:25rem;">
                                    Voltar
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
