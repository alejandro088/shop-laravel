@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    
  </div>
  <div class="main main-raised">
    <div class="container">

      <div class="section text-center">
        <h2 class="title">Listado de productos</h2>
        <div class="team">
          <div class="row">

            <a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">Nuevo producto</a>
            <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoría</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{str_limit($product->description,15)}}</td>
                            <td>{{$product->category ? $product->category->name : "General" }}</td>
                            <td class="text-right">&euro; {{$product->price}}</td>
                            <td class="td-actions text-right">
                                
                                <form action="{{url("/admin/products/{$product->id}/delete")}}" method="POST">
                                @csrf
                                <a rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                </a>
                                <a href="{{url("/admin/products/{$product->id}/edit")}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{url("/admin/products/{$product->id}/images")}}" rel="tooltip" title="Imagenes producto" class="btn btn-warning btn-simple btn-xs">
                                    <i class="fa fa-image"></i>
                                </a>
                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>

                {{$products->links() }}
            
          </div>
        </div>
    </div>

    </div>
  </div>

  @include('elements.footer')
@endsection
