@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
            <h2>SHOW</h2>

            <a href="{{ url('/product/create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Cadastrar Produto</a>
        </div>
    </div>
</div>

@endsection
@section('extra-script')
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
