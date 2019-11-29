@extends('layouts.base')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2 class="mt-5 text-center">Cadastro de Produtos</h2>
<div class="row">
    <div class="col-md-6 offset-md-3 col-sm-12 ">
        <form class="mt-5" action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" name="name" class="form-control" type="text" required>
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <input id="price" name="price" class="form-control" type="text" required>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
