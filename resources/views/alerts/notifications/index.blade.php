@extends('layouts.master')
@section('title','Alertas')

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Alertas</li>
    <li class="breadcrumb-item active aria-current="page"">Notificações</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header">
      <h4>Notificações</h4>
  </div>
   @if($hist_alerts->count())
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Descrição</th>
        <th scope="col">Criado em</th>
        <th scope="col">Lido em</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($hist_alerts as $hist_alert)
      <tr>
        <th>{{$hist_alert->id}}</th>
        <td>{{$hist_alert->title}}</td>
        <td>{{$hist_alert->description}}</td>
        <td>{{date('d/m/Y H:i:s', strtotime($hist_alert->created_at))}}</td>
        <td>
          @if($hist_alert->read_in)
            {{date('d/m/Y H:i:s', strtotime($hist_alert->read_in))}}&nbsp&nbsp&nbsp&nbsp<a href="#" data-target="#modal-delete-{{$hist_alert->id}}" data-toggle="modal"><span class="badge badge-pill badge-danger">excluir <i class="fas fa-times"></i></span></a>
            @include('alerts.notifications.modal')
          @else
            <a href="{{url('alerts/notifications/read/'.$hist_alert->id)}}"><span class="badge badge-pill badge-secondary">marcar como lido <i class="fas fa-check"></i></span></a>
          @endif
        </td>
      </tr>
      @endforeach
</table>
  @endif
</div>
{!!$hist_alerts->links()!!}
@endsection
