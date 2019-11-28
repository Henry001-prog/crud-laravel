@extends('layouts.base')

@section('content')
<h2 class="mt-5 text-center">Edição do Cliente</h2>
<div class="row">
    <div class="col-md-6 offset-md-3 col-sm-12 ">
        @if (isset($c))
            <form class="mt-5" action="{{ route('client.update', $c->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input id="name" name="name" class="form-control" type="text" value="{{$c->name}}"  required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input id="cpf" name="cpf" class="form-control" type="text" value="{{$c->cpf}}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input id="phone" name="phone" class="form-control" type="text" value="{{$c->phone}}" required>
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input id="cep" name="cep" class="form-control" type="text" value="{{$c->cep}}" required>
                </div>
                <div class="form-group">
                    <label for="street">Rua</label>
                    <input id="street" name="street" class="form-control" type="text" value="{{$c->street}}" required>
                </div>
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input id="city" name="city" class="form-control" type="text" value="{{$c->city}}" required>
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input id="state" name="state" class="form-control" type="text" value="{{$c->state}}" required>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Atualizar</button>
            </form>
        @else
         <h2>nao achou</h2>
        @endif
    </div>
</div>
@endsection
