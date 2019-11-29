@extends('layouts.base')

@section('content')
<h2 class="mt-5 text-center">Edição do Produção</h2>
<div class="row">
    <div class="col-md-6 offset-md-3 col-sm-12 ">
        @if (isset($p))
            <form class="mt-5" action="{{ route('product.update', $p->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input id="name" name="name" class="form-control" type="text" value="{{$p->name}}"  required>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input id="price" name="price" class="form-control" type="text" value="{{$p->price}}" required>
                </div>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Atualizar</button>
            </form>
        @else
         <h2>não encontrado</h2>
        @endif
    </div>
</div>
@endsection
