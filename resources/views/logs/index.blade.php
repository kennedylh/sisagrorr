@extends('layouts.master')
@section('title','Lista de Produtos')
@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Administração</li>
    <li class="breadcrumb-item active aria-current="page"">Logs</li>
  </ol>
</nav>

  <div class="card">
    <div class="card-header">
      <div class="text-left">
        <h4>System Logs</h4>
      </div>
    </div>
             @if($logs->count())

            <table class="table" id="tabela" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Evento</th>
                  <th scope="col">Data/Hora</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logs as $log)
                <tr>
                  <th>{{$log->id}}</th>
                  <td>{{$log->action}}</td>
                  <td>{{$log->created_at}}</td>
                </tr>
                @endforeach
          </table>
          @endif
      </div>

    {!!$logs->links()!!}
@endsection
