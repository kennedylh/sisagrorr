@extends('layouts.master')
@section('title','Adicionar um Produto')
@section('content')

  {{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page""><a class="classe2" href="{{url('alerts/rules')}}">Alertas</a></li>
    <li class="breadcrumb-item active aria-current="page"">Adicionar Alerta</li>
  </ol>
</nav>

  @if($message = Session::get('success'))
    <div class='alert alert-success alert-dismissible fade show'>
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible fade show">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </ul>
    </div >
  @endif

  <div class="card">
    <div class="card-header">
      <h4>Adicionar Alerta</h4>
    </div>
  <div class="card-body">

	<form method="POST" action="{{url('alerts/rules')}}">
    @csrf
  <div class="form-group mb-3">
      <label for="produto">Produto</label>
      <select  name="produto" class="form-control" >
            <option disabled selected>Selecione</option>
          @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->titulo}}</option>
          @endforeach
      </select>
  </div>

  <div class="form-group mb-3">
      <label for="estoque_min">Estoque Mínimo:</label>
      <input type="text" class="form-control" id="estoque_min" name="estoque_min" placeholder="Defina o estoque mínimo do Produto..." required>
  </div>

	 	<button type="submit" class="btn btn-primary">Cadastrar Alerta</button>
    <a href="{{url('alerts/rules')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
