@extends('painel.templates.template')
@section('title','Lista de Produtos')
@section('content')
<div class="card  ">
  <div class="card-header">
    Administração
  </div>
  <div class="card-body">
    <ul>
        <li><a href="users/" >Users: </a>{{$totalUsers}}</li>
         {{-- <li><a href="painel/users" >Total Users: </a>{{$totalUsers}}</li> --}}
        <li><a href="painel/roles" >Total Roles: </a>{{$totalRoles}}</li>
        <li><a href="painel/permissions" >Total Permission: </a>{{$totalPermissions}}</li>
        <li><a href="produtos" >Total Produtos: </a>{{$totalProdutos}}</li>
    </ul>
  </div>
  </div>
</div>

@endsection
