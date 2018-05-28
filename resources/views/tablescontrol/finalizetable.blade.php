@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width:100rem; height: 50rem;">
                    <div class="card-header">Fechamento da mesa</div>
                    <div class="row">
                        <form class="col-md-8  ml-5">
                            <div style="height:5rem;"></div>
                            <label>
                                Conta
                            </label>
                        </form>

                        <div class="col-md-2">
                            <div style="height:33rem;"></div>
                            <div class="col-md-4">
                                {{Form::open(['route'=>['addCouvert'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5 margin-top-10" type="submit"
                                        style="width:25rem;">
                                    Adicionar couvert
                                </button>
                                {{Form::close()}}

                                {{Form::open(['route'=>['discountCoupon'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm margin-bottom-5" type="submit" style="width:25rem;">
                                    Adicionar cupom de desconto
                                </button>
                                {{Form::close()}}

                                {{Form::open(['route'=>['finishAccount'], 'method'=>'get'])}}
                                <button class="btn grey-mint btn-sm" type="submit" style="width:25rem;">
                                    Finalizar e imprimir
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
