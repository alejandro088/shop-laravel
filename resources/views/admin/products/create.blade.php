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

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form method="POST" action="{{url('/admin/products')}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Nombre del producto</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Precio del producto</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Descripcion Corta</label>
                        <input type="text" id="description" name="description" class="form-control">
                    </div>
                </div>
                

                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Categoria del producto</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="0">General</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <textarea class="form-control" name="long_description" placeholder="Descripcion del producto" rows="5"></textarea>
            <button type="submit" class="btn btn-primary">Registrar producto</button>
            <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>
        </form>
      </div>
     
    </div>
  </div>

  @include('elements.footer')
@endsection
