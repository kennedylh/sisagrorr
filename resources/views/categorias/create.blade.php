@extends('layouts.master')
@section('title','Adicionar um Produto')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Cadastros</li>
    <li class="breadcrumb-item active"><a class="classe2" href="{{url('categories')}}">Categorias</a></li>
    <li class="breadcrumb-item active">Adicionar Categoria</li>
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
  <br>
  <div class="card">
    <div class="card-header">
      <h4>Adicionar uma nova Categoria</h4>
    </div>
  <div class="card-body">

	<form method="POST" action="{{url('categories')}}">
    @csrf
  <div class="form-group mb-3">
      <label for="titulo">Nome</label>
      <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Digite o Nome da Categoria..." required>
  </div>

	 <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
   <a href="{{url('categories')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
