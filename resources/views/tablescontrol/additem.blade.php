
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Adicionar itens</div>
                    <div class="row">
                        <div class="col-md-8 ml-5">
                            <div class="col-md-2">
                                <a class="row" style="height:3.5rem;">Item:</a>
                                <a class="row" style="height:3.5rem;">Quantidade:</a>
                            </div>
                            <div class="col-md-6">
                                {{--<form class="form-horizontal" method="post" action="{{route('addItens')}}" >--}}
                                {{--{{csrf_field()}}--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                {{--<label for="drink" class="col-md-2 control-label">--}}
                                {{--Bebidas:--}}
                                {{--</label>--}}

                                {{--<div class="col-md-3">--}}
                                {{--{{Form::select('drink',--}}
                                {{--$listOfDrinks->pluck('name','id_product'),null,--}}
                                {{--['class' =>'form-control bs-select-hidden','placeholder'=> '-----------',--}}
                                {{--'style' => 'width: 100%; height: 33px;', 'required'])}}--}}
                                {{--</div>--}}

                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-1">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                {{--Cadastrar--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</form>--}}

                                {{Form::open(['route'=>['addItens'], 'method'=>'post',$productsAdded ])}}
                                {{--<form class="form-horizontal" method="post" action="{{route('addItens')}}">--}}
                                <div class="row">
                                    <select class="bs-select-hidden form-control" style="height:3rem; width:25rem;"
                                            name="itemSelected">
                                        <optgroup label="Bebidas">
                                            @foreach($listOfDrinks as $drink )
                                                <option>{{$drink->name}}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Pratos">
                                            @foreach($listOfDishes as $dish )
                                                <option>{{$dish->name}}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Menu">
                                            @foreach($listOfMenus as $menu )
                                                <option>Menu {{$menu->id_menu}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="row">
                                    <input style="height:3rem; width:25rem;" name="quantity">
                                </div>
                                <div class="row">
                                    <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                            style="width:25rem;">
                                        Adicionar item
                                    </button>
                                </div>
                                @if(count($errors) > 0)
                                {{--<div class="row mt-5">--}}
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                    </ul>
                                    {{--{{\Illuminate\Support\Facades\Session::get('message')}}--}}
                                    {{--<label>--}}
                                        {{--LISTA DE PRODUTOS ADICIONADOS: {{$productsAdded}}--}}
                                    {{--</label>--}}

                                </div>
                                @endif
                                {{Form::close()}}
                            </div>

                            <div class="col-md-4">
                                <div style="height:40rem;"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    {{Form::open(['route'=>['addItensAndGoBackToTableControl'], 'method'=>'get'])}}
                                    <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                            style="width:20rem;">
                                        Adicionar pedido
                                    </button>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
