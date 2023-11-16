
@extends('layouts.master')
@section('title','Editar um Produto - '.$produto->titulo)

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page""><a class="classe2" href="{{url('produtos')}}">Estoque</a></li>
    <li class="breadcrumb-item active">Editar</li>
  </ol>
</nav>

    @if(count($errors)>0)
      <div class='alert alert-danger alert-dismissible fade show'>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </ul>
      </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h4 class="mb-3">Editar um Produto - {{$produto->titulo}}</h4>
      </div>
    <div class="card-body">
	<form method="POST" action="{{action('ProdutosController@update', $id)}}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="form-group mb-3">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo"  value="{{$produto->titulo}}" name="titulo" placeholder="Digite o Nome do Produto..." required>
    </div>

    <div class="form-group mb-3">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite uma breve descrição do Produto..." required>{{$produto->descricao}}</textarea>
    </div>

  <div class="row">
      <div class="col">

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="unidade_medida" >Unidade de Medida</label>
        </div>
        <select class="custom-select" id="unidade_medida" name="unidade_medida" required>
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
      <label for="categoria">Categoria</label>
      <select  class="form-control" >
          <option disabled selected>Selecione</option>
        @foreach($categories as $cat)
          <option value="{{$cat->id}}" @if($produto->category->id == $cat->id) selected @endif >{{$cat->name}}</option>
        @endforeach
      </select>
  </div>
	 	<button type="submit" class="btn btn-primary">Atualizar Produto</button>
    <a href="{{url('produtos')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
