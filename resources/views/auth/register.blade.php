@extends('layouts.app')

@section('body-class', 'signup-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf  
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Registro</h4>
              {{--    <div class="social-line">
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>--}}
              </div>  
              <p class="description text-center">Completa tus datos.</p>
              <div class="card-body">
                <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="material-icons">face</i>
                            </span>
                        </div>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="First Name..." name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>                  
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password..." required>
                </div>
                <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input id="password_confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password..." required>
                      </div>
                        
              </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Registrarse</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('elements.footer')
  </div>
@endsection
