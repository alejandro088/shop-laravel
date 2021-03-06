@extends('layouts.app')

@section('title', 'App Shop | Editar producto')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
   
  </div>
  <div class="main main-raised">
    <div class="container">
      
      <div class="section text-center">
        <h2 class="title">Editar producto</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        
        <form method="POST" action="{{url("/admin/products/{$product->id}/edit")}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre del producto</label>
                        <input type="text" value="{{$product->name}}" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Precio del producto</label>
                        <input type="number" step="0.01" value="{{$product->price}}" id="price" name="price" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion Corta</label>
                        <input type="text" value="{{$product->description}}" id="description" name="description" class="form-control">
                    </div>
                </div>            
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="bmd-label-floating">Categoria del producto</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="0">General</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == old('category_id',$product->category_id)) selected @endif>
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <textarea class="form-control" name="long_description" placeholder="Descripcion del producto" rows="5">
                {{$product->long_description}}
            </textarea>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{url('admin/products')}}" class="btn btn-default">Cancelar</a>
        </form>
      </div>
     
    </div>
  </div>

  @include('elements.footer')
@endsection
