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
            <h2>Listagem dos clientes</h2>
            <a href="{{ url('/client/create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Cadastrar Cliente</a>
        </div>
    </div>
</div>
    @if (isset($clients) && !$clients->isEmpty())
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->cpf}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->street}}, {{$client->city}} - {{$client->state}}</td>
                    <td>
                        <div>
                            <form class="d-flex justify-content-between align-items-center" action="{{ route('client.destroy', $client->id) }}" method="POST">
                            <a href="{{ route('client.edit', $client) }}" data-toggle="tooltip" data-placement="top" title="Editar">
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
            <h3>Não há clientes cadastrados.</h3>
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
