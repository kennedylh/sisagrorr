@extends('layouts.master')
@section('title','Lista de Usuários')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div class="card">
  <div class="card-header">
    Usuários
  </div>
  <div class="card-body">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col" width="10px">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th>{{$user->id}}</th>
          <th>{{$user->name}}</th>
          <td>{{$user->email}}</td>
          <td><a class="fas fa-trash-alt" data-toggle="modal" data-target="#exampleModal"></a></td>
        </tr>
        @endforeach
  </table>
  </div>
</div>
@endsection
