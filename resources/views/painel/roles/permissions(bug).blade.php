@extends('painel.templates.template')
@section('title','Lista de Regras')
@section('content')
<div class="card">
  <div class="card-header">
    Permissions <b>{{$role->name}}</b>
  </div>
  <div class="card-body">
    <table class="table  table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($permissions as $permission)
        <tr>
          <th>{{$permissions->name}}</th>
          <td>{{$role->label}}</td>
          {{-- <td><a href="{{url('/painel/role/{{$role->id}}/permissions')}}">visualizar</a></td> --}}
        </tr>
        @endforeach
  </table>
  </div>
</div>
@endsection
