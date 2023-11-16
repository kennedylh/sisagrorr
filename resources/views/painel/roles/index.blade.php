@extends('painel.templates.template')
@section('title','Lista de Regras')
@section('content')
<div class="card">
  <div class="card-header">
    Regras
  </div>
  <div class="card-body">
    <table class="table  table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          {{-- <th scope="col">Ações</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
        <tr>
          <th>{{$role->name}}</th>
          <td>{{$role->label}}</td>
          {{-- <td><a href="{{url('/painel/role/$role->id/permissions')}}">visualizar</a></td> --}}
        </tr>
        @endforeach
  </table>
  </div>
</div>
@endsection
