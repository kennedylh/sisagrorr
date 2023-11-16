@extends('layouts.master')
@section('title','Adicionar um Fornecedor')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Cadastros</li>
    <li class="breadcrumb-item active"><a class="classe2" href="{{url('supplier')}}">Fornecedores</a></li>
    <li class="breadcrumb-item active">Adicionar Fornecedor</li>
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
      <h4>Adicionar um novo Fornecedor</h4>
    </div>
  <div class="card-body">

	<form method="POST" action="{{url('supplier')}}">
    @csrf
  <div class="form-group mb-3">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome do Fornecedor..." required>
  </div>
  <div class="form-group mb-3">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email do Fornecedor..." required>
  </div>
  <div class="form-row">
    <div class="col-md-6">
    <div class="form-group mb-3">
        <label for="telefone">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço do Fornecedor..." required>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group mb-3">
        <label for="telefone">Telefone</label>
        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone do Fornecedor..." required>
    </div>
  </div>
  </div>
  <div class="form-group mb-3">
      <label for="text">Cnpj</label>
      <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o cnpj do Fornecedor...">
  </div>

	 	<button type="submit" class="btn btn-primary">Cadastrar Fornecedor</button>
    <a href="{{url('supplier')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
