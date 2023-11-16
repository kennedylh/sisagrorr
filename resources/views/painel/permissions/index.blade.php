@extends('painel.templates.template')
@section('title','Lista de Permissões')
@section('content')
<div class="card">
  <div class="card-header">
    Permissões
  </div>
  <div class="card-body">
    <table class="table  table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($permissions as $permission)
        <tr>
          <th>{{$permission->name}}</th>
          <td>{{$permission->label}}</td>
        </tr>
        @endforeach
  </table>
  </div>
</div>
@endsection
