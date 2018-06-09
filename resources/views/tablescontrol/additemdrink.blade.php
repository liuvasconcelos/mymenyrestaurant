@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Adicionar itens na mesa {{$idTable}}</div>
                    <div class="row">
                        <div class="col-md-8 ml-5">
                            <div class="col-md-6 mt-5">
                                <a class="row" style="height:3.5rem;">Bebida:</a>
                                <a class="row" style="height:3.5rem;">Quantidade:</a>
                            </div>

                            <div class="col-md-6 mt-5">
                                <form class="form-horizontal" method="post" action="{{route('addProductToOrder', $idTable)}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    {{Form::select('drink',
                                                    $listOfDrinks->pluck('name','id_product'),null,
                                                    ['class' =>'form-control bs-select-hidden','placeholder'=> '-----------',
                                                    'style' => 'width: 300px; height: 33px;', 'required'])}}
                                                    <input name="quantity" style="width: 300px; height: 33px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-1">
                                            <button type="submit" class="btn grey-mint" style="width:20rem;">
                                                Adicionar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
