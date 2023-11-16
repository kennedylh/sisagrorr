@extends('layouts.master')
@section('title','Lista de Produtos')

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Movimentações</li>
    <li class="breadcrumb-item active" aria-current="page">Entrada</li>
  </ol>
</nav>

<form method="POST" action="{{url('produtos_entries/busca')}}">
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

    <div class="card">
      <div class="card-header">
        <h4>Entradas - Produto</h4>
        <div class="text-right">
          <a href="{{url('produtos_entries/create')}}" class="btn btn-success fas fa-plus-circle" ></a>
        </div>
      </div>
    @if($products_entrie->count())
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Quantidade</th>
          <th scope="col" width="15%">Preço</th>
          <th scope="col">Data de Entrada</th>
          <th scope="col">Data de Validade</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products_entrie as $p)
        <tr>
          <th>{{$p->id}}</th>
          <td>{{$p->produtos->titulo}}</td>
          <td>{{$p->montante.' '.$p->produtos->unidade_medida}}</td>
          <td>R$ {{$p->preco}}</td>
          <td>{{date('d/m/Y', strtotime($p->created_at))}}</td>
          <td>{{date('d/m/Y', strtotime($p->data_validade))}}</td>
          <td width="10%">
            @if(Auth::check())
              <a href="{{URL::to('produtos_entries/'.$p->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar entrada"><i class="far fa-edit"></i></button></a>
              <a href="" data-target="#modal-delete-{{$p->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Remover entrada"><i class="fas fa-trash-alt"></i></button></a>
              @include('produtos_entries.modal')
            @endif
          </td>
        </tr>
        @endforeach
  </table>
  @endif
</div>
    {!!$products_entrie->links()!!}
    <div class="text-right">
      <button type="button" class="btn btn-sm btn-secondary" data-toggle="popover" data-placement="left" data-trigger="focus" title="Entrada de Produto" data-content="Para dar entrada em um produto é necessário existir seu prévio cadastro em Estoque..."><b>Instruções</b></button>
    </div><br>
@endsection
