@extends('layouts.master')
@section('title','Adicionar um Produto')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a class="classe2" href="{{url('produtos')}}">Estoque</a></li>
    <li class="breadcrumb-item active" aria-current="page">Adicionar Produto</li>
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
      <h4>Adicionar um novo Produto</h4>
    </div>
  <div class="card-body">

	<form method="POST" action="{{url('produtos')}}">
    @csrf
  <div class="form-group mb-3">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o Nome do Produto..." required>
  </div>

	<div class="form-group mb-3">
		  <label for="descricao">Descrição</label>
		  <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do Produto..." required></textarea>
	</div>

<div class="row">
    <div class="col">

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Unidade de Medida</label>
      </div>
      <select class="custom-select" id="unidade_medida" name="unidade_medida">
        <option disabled selected>Selecione</option>
        <option value="quilogramas">Quilogramas(kg)</option>
        <option value="litros">Litros(l)</option>
        <option value="miligramas">Miligramas(mg)</option>
        <option value="gramas">Gramas(g)</option>
      </select>
    </div>

  </div>
</div>

<div class="form-group mb-3">
    <label for="fornecedor">Categoria</label>
    <select  name="categoria" class="form-control" >
          <option disabled selected>Selecione</option>
        @foreach($categories as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
</div>

	 	<button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    <a href="{{url('produtos')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
