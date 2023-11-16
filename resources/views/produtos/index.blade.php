@extends('layouts.master')
@section('title','Lista de Produtos')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Estoque</li>
  </ol>
</nav>

    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{url('produtos/busca')}}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="busca" value="{{$buscar}}" name="busca" placeholder="Procurar produto">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary">Buscar</button>
                </div>
            </div>
        </form>
      </div>
    </div>

  <div class="card">
    <div class="card-header">
      <div class="text-left">
        <h4>Produtos em Estoque</h4>
        <div class="text-right float">
          <a href="{{url('produtos/create')}}" class="btn btn-success fas fa-plus-circle text-right" ></a>
        </div>
      </div>
    </div>
             @if($produtos->count())

            <table class="table table-bordered table-hover" id="tabela" >
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produtos as $produto)
                <tr>
                  <th>{{$produto->id}}</th>
                  <td>{{$produto->titulo}}</td>
                  <td>{{$produto->descricao}}</td>
                  <td>{{$produto->quantidade_total.' '.$produto->unidade_medida}} {{-- <span class="badge badge-danger"><i class="fas fa-exclamation-circle"></i>alerta</span> --}}</td>
                  <td>{{$produto->category->name}}</td>
                  <td width="10%">

                  @if(Auth::check())

                    {{-- @can('Edit_product', $produto) --}}
                        <a href="{{URL::to('produtos/'.$produto->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar produto"><i class="far fa-edit"></i></button></a>
                    {{-- @endcan -}}
                    {{-- @can('Delete_product', $produto) --}}
                        <a href="" data-target="#modal-delete-{{$produto->id}}"  data-toggle="modal"><button class="btn btn-sm btn-danger button" data-toggle="tooltip" data-placement="top" title="Remover produto"><i class="fas fa-trash-alt"></i></button></a>
                      {{--  <a href="" id="btn-delete" data-id="{{$produto->id}}"  data-toggle="modal"><button class="btn btn-sm btn-danger button" data-toggle="tooltip" data-placement="top" title="Remover produto"><i class="fas fa-trash-alt"></i></button></a> --}}
                          @include('produtos.modal')
                    {{-- @endcan   --}}

                  @endif

                  </td>
                </tr>
                @endforeach
          </table>
          @endif
      </div>
    {!!$produtos->links()!!}
@endsection
