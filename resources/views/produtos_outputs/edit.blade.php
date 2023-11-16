
@extends('layouts.master')
@section('title','Editar um Produto - ')

@section('content')
{{-- breadcrumb --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active aria-current="page"">Movimentações</li>
    <li class="breadcrumb-item active"><a class="classe2" href="{{url('produtos_outputs')}}">Saída</a></li>
    <li class="breadcrumb-item active">Editar Saída</li>
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
          <h4 class="mb-3">Editar saída de produto</h4>
      </div>
    <div class="card-body">
	<form method="POST" action="{{action('ProdutosOutputsController@update', $id)}}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="produto" name="produto">Produto</label>
      </div>
      <select class="custom-select" id="produto" name="produto" disabled>
        @foreach($products as $product)
            @if($product->id == $products_output->product_id)
              <option value="{{$product->id}}" selected>{{$product->titulo}}</option>
            @endif
        @endforeach
      </select>
    </div>

    <div class="form-group mb-3">
  		  <label for="nota">Nota:</label>
  		  <textarea class="form-control" id="nota" name="nota" rows="1" placeholder="Digite uma breve descrição da aplicação final do Produto..." required> {{$products_output->note}}</textarea>
  	</div>
    <div class="form-group mb-3">
      <label for="quantidade">Quantidade</label>
       <input type="number" class="form-control" value="{{$products_output->amount}}" id="quantidade" name="quantidade" min="0" placeholder="0"/>
    </div>
	 	<button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{url('produtos_outputs')}}" class="btn btn-secondary">Cancelar</a>
	</form>
</div>
</div>
@endsection
