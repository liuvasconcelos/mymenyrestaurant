@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fechamento de conta</div>

                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col-md-2"> DETALHES DA CONTA</div>

                            <div class="form-group row mb-0">

                                <div class="col-md-2 align-content-end">
                                    <a href="{{route('addCouvert')}}"  class="btn btn-group-sm">
                                        Adicionar couvert
                                    </a>
                                    <a href="{{route('discountCoupon')}}"  class="btn btn-group-sm">
                                        Cupom de desconto
                                    </a>
                                    <a href="{{route('finishAccount')}}"  class="btn btn-group-sm">
                                        Finalizar conta
                                    </a>
                                    <a href="{{route('dontFinishTableAndGoBack')}}"  class="btn btn-group-sm">
                                        Voltar
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
