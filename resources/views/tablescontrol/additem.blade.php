@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adicionar itens</div>

                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col-md-2"> DETALHES DA PEDIDO E FORMULÁRIO</div>

                            <div class="form-group row mb-0">

                                <div class="col-md-2 align-content-end">
                                    <a href="{{route('addItensAndGoBackToTableControl')}}"  class="btn btn-group-sm">
                                        Adicionar item
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
