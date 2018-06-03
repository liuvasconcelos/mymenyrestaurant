@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 10rem;">
                    <div class="card-header">Adicionar couvert na mesa {{$tableId}}</div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                                {{Form::open(['route'=>['couvertAdd', $tableId], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10 ml-5" type="submit"
                                        style="width:25rem;">
                                    Adicionar couvert
                                </button>
                                {{Form::close()}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
