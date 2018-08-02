@extends('layouts.app')

@section('title', 'App Shop | Editar categoria')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
   
  </div>
  <div class="main main-raised">
    <div class="container">
      
      <div class="section text-center">
        <h2 class="title">Editar categoria</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{url("/admin/categories/{$category->id}/edit")}}">
            @csrf
            <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre de la categoria</label>
                        <input type="text" value="{{old('name',$category->name)}}" id="name" name="name" class="form-control">
                    </div>
            </div>
            
            
            <div class="form-group label-floating">
                <label class="control-label">Descripcion de la categoria</label>
                <textarea class="form-control" name="description" placeholder="Descripcion de la categoria" rows="5">
                    {{old('description',$category->description)}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{url('admin/categories')}}" class="btn btn-default">Cancelar</a>
        </form>
      </div>
     
    </div>
  </div>

  @include('elements.footer')
@endsection
