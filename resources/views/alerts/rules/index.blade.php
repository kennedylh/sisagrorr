@extends('layouts.master')
@section('title','Alertas')

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Alertas</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">
    <h4>Alertas</h4>
    <div class="text-right">
      <a href="{{url('alerts/rules/create')}}" class="btn btn-success fas fa-plus-circle text-right" ></a>
    </div>
  </div>
  @if($alerts->count())
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Produto</th>
        <th scope="col">Estoque Mínimo definido</th>
        <th scope="col">Alerta de Vencimento</th>
        <th scope="col" width="10%">Ações</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($alerts as $alert)
      <tr>
        <td>{{$alert->id}}</td>
        <td>{{$alert->produtos->titulo}}</td>
        <td>{{$alert->stock_min.' '.$alert->produtos->unidade_medida}}</td>
        <td>Sim</td>
        <td>
          @if(Auth::check())

                <a href="{{URL::to('alerts/rules/'.$alert->id.'/edit')}}"><button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar alerta"><i class="far fa-edit"></i></button></a>
                <a href="" data-target="#modal-delete-{{$alert->id}}"  data-toggle="modal"><button class="btn btn-sm btn-danger button" data-toggle="tooltip" data-placement="top" title="Remover alerta"><i class="fas fa-trash-alt"></i></button></a>
                @include('alerts.rules.modal')
          @endif
        </td>
      </tr>
    @endforeach
</table>
  @endif
</div>
    {!!$alerts->links()!!}
@endsection
