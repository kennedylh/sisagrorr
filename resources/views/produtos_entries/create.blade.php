@extends('layouts.master')
@section('title','Entrada de novo Produto')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Movimentações</li>
    <li class="breadcrumb-item active" aria-current="page"><a class="classe2" href="{{url('produtos_entries')}}">Entrada</a></li>
    <li class="breadcrumb-item active" aria-current="page">Adicionar Entrada</li>
  </ol>
</nav>

  @if($message = Session::get('success'))
    <div class='alert alert-success alert-dismissible fade show'>
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible fade show">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </ul>
    </div >
  @endif

  <div class="card">
    <div class="card-header">
        <h4 class="mb-3">Entrar com um novo Produto</h4>
    </div>
  <div class="card-body">

	<form method="POST" action="{{url('produtos_entries')}}">
    @csrf
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="produto" name="produto">Produto</label>
    </div>
    <select class="custom-select" id="produto" name="produto">
      <option disabled selected>Selecione</option>
      @foreach($products as $product)
          <option value="{{$product->id}}">{{$product->titulo}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-row">
  	<div class="form-group mb-3 col-5">
  		<label for="quantidade">Quantidade</label>
  	   <input type="number" class="form-control" id="quantidade" name="quantidade" min="0" placeholder="0"/>
    </div>
    <div class="form-group mb-3 col-4">
    <label for="preco">Preço</label>
	 	<div class="input-group mb-3">
		    <div class="input-group-prepend">
		    	<span class="input-group-text" id="basic-addon1">R$</span>
			</div>
		    <input type="number" step="1" class="form-control" id="preco" name="preco" placeholder="0,00" required>
	 	</div>
    </div>
    <div class="form-group mb-3 col-3">
  		<label for="nome">Data de validade</label>
  	   <input type="date" class="form-control" id="data_validade" name="data_validade" placeholder="0"/>
    </div>
  </div>

<div class="form-group mb-3">
    <label for="fornecedor">Fornecedor</label>
    <select class="form-control" name="fornecedor" id="fornecedor">
      <option disabled selected>Selecione...</option>
      @foreach($suppliers as $sup)
          <option value="{{$sup->id}}">{{$sup->name}}</option>
      @endforeach
    </select>
</div>
	 	<button type="submit" class="btn btn-primary">Adicionar Produto</button>
    <a href="{{url('produtos_entries')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
