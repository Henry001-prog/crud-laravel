@extends('layouts.base')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
        <span>{{ $message }}</span>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger mt-2">
        <span>{{ $message }}</span>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
            <h2>Listagem dos produtos</h2>
            <a href="{{ url('/product/create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Cadastrar Produto</a>
        </div>
    </div>
</div>
    @if (isset($products) && !$products->isEmpty())
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <div>
                            <form class="d-flex justify-content-between align-items-center" action="{{ route('product.destroy', $product->id) }}" method="POST">
                            <a href="{{ route('product.edit', $product) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fas fa-pencil-alt text-primary"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button class="btn" data-toggle="tooltip" data-placement="top" title="Deletar">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
    <div class="row">
        <div class="col-md-6 offset-md-3 col-sm-12 mt-5 text-center">
            <h3>Não há produtos cadastrados.</h3>
        </div>
    </div>
    @endif
        {{-- <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr> --}}
@endsection
@section('extra-script')
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
