@extends('layouts.master')
@section('title','Lista de Usuários')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Administração</li>
    <li class="breadcrumb-item active">Usuários</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">
    <h4>Usuários</h4>
      <div class="text-right">
          <a href="{{url('users/create')}}" class="btn btn-success fas fa-user-plus"></a>
      </div>
  </div>

    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
          <th scope="col" width="12%">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $u)
        <tr>
          <th>{{$u->id}}</th>
          <th>{{$u->name}}</th>
          <td>{{$u->email}}</td>
          <td>1</td>
          <td>
            @if(Auth::check())
              <a href="{{URL::to('users/'.$u->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar usuário"><i class="fas fa-user-edit"></i></button></a>
              <a href="{{URL::to('painel/roles/'.$u->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Permissão do usuário"><i class="fas fa-user-cog"></button></i></a>
              <a href="" data-target="#modal-delete-{{$u->id}}" data-toggle="modal"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Remover usuário"><i class="fas fa-user-minus"></button></i></a>
              @include('users.modal')
            @endif
          </td>
        </tr>
        @endforeach
  </table>
  </div>
</div>
@endsection
