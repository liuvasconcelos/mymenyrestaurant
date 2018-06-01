@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Detalhes da mesa {{$idTable}}</div>
                    <div class="row">
                        <form class="col-md-8  ml-5">
                            <div style="height:5rem;"></div>
                            <div class="col-md-4">
                                <a class="row" style="height:3.5rem;">Garçom:</a>
                                <a class="row" style="height:3.5rem;">Quantidade de pessoas:</a>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <select class="bs-select-hidden form-control" style="height:3rem; width:25rem;">
                                        <option>Garçom 01</option>
                                        <option>Garçom 02</option>
                                        <option>Garçom 03</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <input style="height:3rem; width:25rem;" name="quantity">
                                </div>

                                <label>
                                    {{$tableInformation}}
                                </label>
                            </div>
                        </form>

                        <div class="col-md-2">
                            <div style="height:30rem;"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['finalizeTable', $idTable, $tableInformation], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:20rem;">
                                    Finalizar mesa
                                </button>
                                {{Form::close()}}

                                {{Form::open(['route'=>['addItemDrink', $idTable], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm" type="submit" style="width:20rem;">
                                    Adicionar Bebidas
                                </button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['addItemDish', $idTable], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm" type="submit" style="width:20rem;">
                                    Adicionar Pratos
                                </button>
                                {{Form::close()}}
                                {{Form::open(['route'=>['addItemMenu', $idTable], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm" type="submit" style="width:20rem;">
                                    Adicionar Menus
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
