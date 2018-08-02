@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
   
  </div>
  <div class="main main-raised">
    <div class="container">
      
      <div class="section text-center">
        <h2 class="title">Registrar nueva categoria</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{url('/admin/categories')}}">
            @csrf
            <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Nombre de la categoria</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
            </div>
            
            <div class="form-group label-floating">
            <label class="bmd-label-floating">Descripcion de la categoria</label>
            <textarea class="form-control" name="description" placeholder="Descripcion de la categoria" rows="5">
              {{old('description')}}
            </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar categoria</button>
            <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
        </form>
      </div>
     
    </div>
  </div>

  @include('elements.footer')
@endsection
