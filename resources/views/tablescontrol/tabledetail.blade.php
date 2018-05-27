@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Detalhes da mesa {{$idTable}}</div>
                    <div class="row">
                        <form class="col-md-8">
                            <div style="height:10rem;"></div>
                            <div class="ml-5">{{$tableInformation}}</div>
                        </form>

                        <div class="col-md-4">
                            <div style="height:35rem;"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['finalizeTable'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:20rem;">
                                    Finalizar mesa
                                </button>
                                {{Form::close()}}

                                {{Form::open(['route'=>['addItem'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm" type="submit" style="width:20rem;">
                                    Adicionar item
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
