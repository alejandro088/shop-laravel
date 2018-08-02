@extends('layouts.app')

@section('title', 'Listado de categorias')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    
  </div>
  <div class="main main-raised">
    <div class="container">

      <div class="section text-center">
        <h2 class="title">Listado de categorias</h2>
        <div class="team">
          <div class="row">

            <a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round">Nueva categoria</a>
            <table class="table">
                    <thead>
                        <tr>
                            
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            
                            <td>{{$category->name}}</td>
                            <td>{{$category->short_desc}}</td>                            
                            <td class="td-actions text-right">
                                
                                <form action="{{url("/admin/categories/{$category->id}")}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <a rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                </a>
                                <a href="{{url("/admin/categories/{$category->id}/edit")}}" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
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

                {{$categories->links() }}
            
          </div>
        </div>
    </div>

    </div>
  </div>

  @include('elements.footer')
@endsection
