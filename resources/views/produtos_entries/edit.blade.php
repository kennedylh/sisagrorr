
@extends('layouts.master')
@section('title','Editar um Produto - '.$produto_entries->titulo)

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Movimentações</li>
    <li class="breadcrumb-item active"><a class="classe2" href="{{url('produtos_entries')}}">Entrada</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Entrada</li>
  </ol>
</nav>

    <div class="card">
      <div class="card-header">
          <h4 class="mb-3">Editar Produto</h4>
      </div>
    <div class="card-body">

	<form method="POST" action="{{action('ProdutosEntriesController@update', $id)}}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="produto" name="produto">Produto</label>
      </div>
      <select class="custom-select" id="produto" name="produto" disabled>
        @foreach($products as $p)
            @if($p->id == $produto_entries->produto_id)
              <option value="{{$p->id}}" selected>{{$p->titulo}}</option>
            @endif
        @endforeach
      </select>
    </div>

    <div class="form-row">
    	<div class="form-group mb-3 col-5">
    		<label for="quantidade">Quantidade</label>
    	   <input type="number" class="form-control" value="{{$produto_entries->montante}}" id="quantidade" name="quantidade" min="0" placeholder="0"/>
      </div>
      <div class="form-group mb-3 col-4">
    <label for="preco">Preço</label>
	 	<div class="input-group mb-3">
		    <div class="input-group-prepend">
		    	<span class="input-group-text" id="basic-addon1">R$</span>
			</div>
		    <input type="number" step="1" class="form-control" value="{{$produto_entries->preco}}" id="preco" name="preco" placeholder="0,00" required>
	 	</div>
    </div>
      <div class="form-group mb-3 col-3">
    		<label for="nome">Data de validade</label>
    	   <input type="date" class="form-control" value="{{$produto_entries->data_validade}}" id="data_validade" name="data_validade" placeholder="0"/>
      </div>
    </div>

  <div class="form-group mb-3">
      <label for="fornecedor">Fornecedor</label>
      <select  class="form-control" name="fornecedor">
        @foreach($suppliers as $supplier)
            @if($supplier->id == $produto_entries->supplier_id)
              <option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
            @else
              <option value="{{$supplier->id}}">{{$supplier->name}}</option>
            @endif
        @endforeach
      </select>
  </div>
	 	<button type="submit" class="btn btn-primary">Atualizar Produto</button>
    <a href="{{url('produtos_entries')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
