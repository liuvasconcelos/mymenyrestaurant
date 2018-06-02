@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Controle de mesas</div>
                    <div class="row">
                        <form class="col-md-8">
                            <div style="height:10rem;"></div>
                            <bs-table-control>
                            <div class="row ml-5">
                                {{Form::open(['route'=>['tableDetail', 1], 'method'=>'get'])}}
                                <button class="{{$tableStatus1}}" type="submit"
                                        style="width:5rem;">01</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 2], 'method'=>'get'])}}
                                <button class="{{$tableStatus2}}" type="submit"
                                        style="width:5rem;">02</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 3], 'method'=>'get'])}}
                                <button class="{{$tableStatus3}}" type="submit"
                                        style="width:5rem;">03</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 4], 'method'=>'get'])}}
                                <button class="{{$tableStatus4}}" type="submit"
                                        style="width:5rem;">04</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 5], 'method'=>'get'])}}
                                <button class="{{$tableStatus5}}" type="submit"
                                        style="width:5rem;">05</button>
                                {{Form::close()}}
                            </div>
                            <div class="row mt-5 ml-5">
                                {{Form::open(['route'=>['tableDetail', 6], 'method'=>'get'])}}
                                <button class="{{$tableStatus6}}" type="submit"
                                        style="width:5rem;">06</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 7], 'method'=>'get'])}}
                                <button class="{{$tableStatus7}}" type="submit"
                                        style="width:5rem;">07</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 8], 'method'=>'get'])}}
                                <button class="{{$tableStatus8}}" type="submit"
                                        style="width:5rem;">08</button>
                                {{Form::close()}}
                            </div>
                            <div class="row mt-5 ml-5">
                                {{Form::open(['route'=>['tableDetail', 9], 'method'=>'get'])}}
                                <button class="{{$tableStatus9}}" type="submit"
                                        style="width:5rem;">09</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 10], 'method'=>'get'])}}
                                <button class="{{$tableStatus10}}" type="submit"
                                        style="width:5rem;">10</button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['tableDetail', 11], 'method'=>'get'])}}
                                <button class="{{$tableStatus11}}" type="submit"
                                        style="width:5rem;">11</button>
                                {{Form::close()}}
                            </div>

                            </bs-table-control>
                        </form>

                        <div class="col-md-4">
                            <div style="height:35rem;"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['makeReserve'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:20rem;">
                                    Efetuar Reserva
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

