
@extends('layouts.master')
@section('title','nd')

@section('content')

    <div class="card">
      <div class="card-header">
        <h4>Permissões</h4>
      </div>
    <div class="card-body">

    <form method="POST" action="{{url('painel/roles')}}">
      @csrf
    <div class="form-group mb-3">
        <label for="titulo">Usuário</label>
        <input type="text" class="form-control" value="test" id="name" name="name" placeholder="nome..." required>
    </div>

  	<div class="form-group mb-3">
  		  <label for="role">Papel:</label>
        <select class="custom-select" id="unidade_medida" name="unidade_medida" required>
          <option disabled selected>Selecione</option>
          <option value="1">1</option>
          <option value="2">2</option>

        </select>
  	</div>
	 	<button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{url('users/')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
