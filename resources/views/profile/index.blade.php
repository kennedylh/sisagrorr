@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Perfil</div>
                <div class="card-body">
                      <a href="{{url('users/'.auth()->user()->id.'/edit')}}"><i class="fas fa-user-edit"></i>Editar Conta</a>
                </div>
            </div>
            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#atividades" data-toggle="tab">Dados</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#opcoes" data-toggle="tab">Atividades</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div id="atividades" class="tab-pane active show">
                      <p class="card-text">
                        <div class="text-left">
                          <h4>Nome: {{auth()->user()->name}}</h4>
                          <h4>Email: {{auth()->user()->email}}</h4>
                          <h4>Data de Inscrição: {{date('d/m/Y', strtotime(auth()->user()->created_at))}}</h4>
                        </div>
                      </p>
                  </div>

                  <div id="opcoes" class="tab-pane">
                    teste2
                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
