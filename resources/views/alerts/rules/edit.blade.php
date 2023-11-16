
@extends('layouts.master')
@section('title','Editar Alerta')

@section('content')

{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a class="classe2" href="{{url('alerts/rules')}}">Alerta</a></li>
    <li class="breadcrumb-item active">Editar Alerta</li>
  </ol>
</nav>

    @if(count($errors)>0)
      <div class='alert alert-danger alert-dismissible fade show'>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </ul>
      </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h4 class="mb-3">Editar Alerta</h4>
      </div>
    <div class="card-body">
	<form method="POST" action="{{action('RulesController@update', $id)}}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">

    <div class="form-group mb-3">
        <label for="produto">Produto</label>
        <select  name="produto" class="form-control" >
      @foreach($products as $product)
          @if($alerts->product_id == $product->id)
            <option value="{{$product->id}}" selected>{{$product->titulo}}</option>
          @endif
      @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="estoque_min">Estoque Mínimo:</label>
        <input type="text" class="form-control" value="{{$alerts->stock_min}}" id="estoque_min" name="estoque_min" placeholder="Defina o estoque mínimo do Produto..." required>
    </div>

	 	<button type="submit" class="btn btn-primary">Atualizar Alerta</button>
    <a href="{{url('alerts/rules')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
