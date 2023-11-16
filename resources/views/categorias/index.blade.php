@extends('layouts.master')
@section('title','Lista de Produtos')

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Cadastros</li>
    <li class="breadcrumb-item active">Categorias</li>
  </ol>
</nav>

     <br>
     <div class="card">
       <div class="card-header">
         <h4>Categorias</h4>
         <div class="text-right float">
           <a href="{{url('categories/create')}}" class="btn btn-success fas fa-plus-circle" ></a>
         </div>
       </div>

            @if($categories->count())

            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col" width="5%">Id</th>
                  <th scope="col">Nome</th>
                  <th scope="col" width="15%">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $cat)
                <tr>
                  <th>{{$cat->id}}</th>
                  <td>{{$cat->name}}</td>

                  <td>
                    @if(Auth::check())

                      <a href="{{URL::to('categories/'.$cat->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar categoria"><i class="far fa-edit"></i></button></a>
                      <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Remover categoria"><i class="fas fa-trash-alt"></i></button></a>

                      @include('categorias.modal')

                    @endif

                  </td>
                </tr>
                @endforeach
          </table>

          @endif
          </div>
    {{-- {!!$produtos->links()!!} --}}
@endsection
