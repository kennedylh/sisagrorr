@extends('layouts.app')
<link rel="shortcut icon" href="{{URL::to('./img/favicon2.png')}}" />
@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card" >

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="./img/logo.jpg"  class="img" alt="Sistema Logo"  style="opacity: .8">
                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de Email') }}</label> --}}

                            <div class="col-md-12">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend3"><i class="fas fa-user-alt"></i></span>
                                </div>
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} " name="email" value="{{ old('email') }}" placeholder="Login" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">

                          {{--  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label> --}}

                            <div class="col-md-12">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend3"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Digite sua senha" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                        </div>
                        {{--
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
