@extends('layouts.master')
@section('title','Adicionar um Produto')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Administração</li>
    <li class="breadcrumb-item active"><a class="classe2" href="{{url('users')}}">Usuários</a></li>
    <li class="breadcrumb-item active">Adicionar Usuário</li>
  </ol>
</nav>

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
      <h4>Adicionar um novo Usuário</h4>
    </div>
  <div class="card-body">
	<form method="POST" action="{{url('users')}}">
    @csrf
    <input type="hidden" name="status" value="{{1}}">
    <input type="hidden" name="type_form" value="create">

    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" placeholder="Nome...">
    </div>

    <div class="form-group">
      <label for="nome">Email</label>
      <input type="text" name="email" class="form-control" placeholder="Email...">
    </div>

    <div class="form-row">
     <div class="col-md-6">
        <div class="form-group">
          <label for="nome">Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Senha...">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nome">Repetir senha</label>
          <input type="password" name="repetir_senha" class="form-control" placeholder="Repetir a senha...">
        </div>
      </div>
  </div>
	 	<button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{url('users')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
