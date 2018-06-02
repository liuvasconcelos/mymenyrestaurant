@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Detalhes da mesa {{$idTable}}</div>
                    <div class="row">
                        <form class="col-md-8  ml-5 form-horizontal" method="post" action="{{route('finalizeTable', $idTable)}}">
                            {{csrf_field()}}
                            <div style="height:5rem;"></div>
                            <div class="col-md-4">
                                <a class="row" style="height:3.5rem;">Garçom:</a>
                                <a class="row" style="height:3.5rem;">Quantidade de pessoas:</a>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    {{Form::select('waiter',
                                                     $listOfUsers->pluck('name','id'),null,
                                                     ['class' =>'form-control bs-select-hidden','placeholder'=> '-----------',
                                                     'style' => 'width: 250px; height: 33px;', 'required'])}}
                                </div>
                                <div class="row">
                                    <select style="height:3rem; width:25rem;" name="quantity">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <label>
                                    {{$tableInformation}}
                                </label>
                            </div>

                            <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                    style="width:20rem;">
                                Finalizar mesa
                            </button>
                        </form>

                        <div class="col-md-2">
                            <div style="height:30rem;"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['addItemDrink', $idTable], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit" style="width:20rem;">
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
