@extends('layouts.master')
@section('title','Lista de Produtos')

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Movimentações</li>
    <li class="breadcrumb-item active">Saída</li>
  </ol>
</nav>

<!-- campos de busca -->
<form method="POST" action="{{url('produtos_outputs/busca')}}">
@csrf
<div class="form-row">
    <div class="col-md-3 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">De:</span>
        </div>
        <input type="date" class="form-control" name="dataInicial" required>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Até:</span>
        </div>
        <input type="date" class="form-control" name="dataFinal" required>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="">Produto:</span>
        </div>
        <select class="custom-select" name="produto">
          <option selected disabled>Selecione...</option>
            @foreach($products as $product)
              <option value="{{$product->id}}">{{$product->titulo}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <button class="btn btn-primary col-sm-1 mb-3">Pesquisar</button>
</div>
</form>
<!-- /.campo de busca -->

    <div class="card">
      <div class="card-header">
        <h4>Saída - Produto</h4>
        <div class="text-right">
          <a href="{{url('produtos_outputs/create')}}" class="btn btn-success fas fa-plus-circle" ></a>
        </div>
      </div>
    @if($products_output->count())
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" width="50px">Id</th>
          <th scope="col" width="200px">Nome</th>
          <th scope="col" width="200px">Quantidade</th>
          <th scope="col" width="200px">Descrição</th>
          <th scope="col" width="200px">Data de Saída</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($products_output as $p)
        <tr>
          <th>{{$p->id}}</th>
          <td>{{$p->product->titulo}}</td>
          <td>{{$p->amount.' '.$p->product->unidade_medida}}</td>
          <td>{{$p->note}}</td>
          <td>{{date('d/m/Y', strtotime($p->date_output))}}</td>
          <td width="10%">
            @if(Auth::check())
              <a href="{{URL::to('produtos_outputs/'.$p->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar saída"><i class="far fa-edit"></i></button></a>
              <a href="" data-target="#modal-delete-{{$p->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Remover saída"><i class="fas fa-trash-alt"></i></button></a>
              @include('produtos_outputs.modal')
            @endif
          </td>
        </tr>
        @endforeach
  </table>
  @endif
</div>

    {!!$products_output->links()!!}
@endsection
