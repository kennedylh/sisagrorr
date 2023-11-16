@extends('layouts.app')
@section('title',$produto->titulo)

@section('content')
    <h1>Produto - {{$produto->titulo}}</h1>

        <ul>
          <li><strong>SKU:</strong> {{$produto->sku}}</li>
          {{-- <li><strong>Preço:</strong> R$ {{number_format($produto->preco), 2,',','.'}}</li> --}}
          <li><strong>Quantidade:</strong> {{$produto->quantidade}}</li>
          <li><strong>Unidade de Medida:</strong> {{$produto->unidade_medida}}</li>
          <li><strong>Data Validade:</strong> {{date("d/m/Y", strtotime($produto->data_validade))}}</li>
          <li><strong>Autor:</strong> {{$produto->user->name}}</li>
          <li><strong>Adicionado em:</strong> {{date("d/m/Y H:i", strtotime($produto->created_at))}}</li>
        </ul>
        <p>{{$produto->descricao}}</p>

    <a href="javascript:history.go(-1)">Voltar</a>
@endsection
