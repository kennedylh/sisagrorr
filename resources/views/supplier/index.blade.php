@extends('layouts.master')
@section('title','Lista de Usuários')


@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Cadastros</li>
    <li class="breadcrumb-item active">Fornecedores</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">
    <h4>Fornecedores</h4>
    <div class="text-right">
      <a href="{{url('supplier/create')}}" class="btn btn-success fas fa-plus-circle" ></a>
    </div>
  </div>

  @if($suppliers->count())

  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">Cnpj</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($suppliers as $sup)
      <tr>
        <th>{{$sup->id}}</th>
        <td>{{$sup->name}}</td>
        <td>{{$sup->email}}</td>
        <td>{{$sup->phone}}</td>
        <td>{{$sup->cnpj}}</td>
        <td width="12%">

          @if(Auth::check())

            <a href="{{URL::to('supplier/'.$sup->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Fornecedor"><i class="far fa-edit"></i></button></a>
            <a href="" data-target="#modal-delete-{{$sup->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Remover Fornecedor"><i class="fas fa-trash-alt"></i></button></a>

            @include('supplier.modal')

          @endif

        </td>
      </tr>
      @endforeach
</table>

@endif
  </div>
  {!!$suppliers->links()!!}
@endsection
