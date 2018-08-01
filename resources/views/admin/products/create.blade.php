@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
   
  </div>
  <div class="main main-raised">
    <div class="container">
      
      <div class="section text-center">
        <h2 class="title">Registrar nuevo producto</h2>
        <form method="POST" action="{{url('/admin/products')}}">
            @csrf
            <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Nombre del producto</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
            </div>
            <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Descripcion Corta</label>
                        <input type="text" id="description" name="description" class="form-control">
                    </div>
            </div>
            <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Precio del producto</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>
            </div>
            <textarea class="form-control" name="long_description" placeholder="Descripcion del producto" rows="5"></textarea>
            <button type="submit" class="btn btn-primary">Registrar producto</button>
        </form>
      </div>
     
    </div>
  </div>

  @include('elements.footer')
@endsection
