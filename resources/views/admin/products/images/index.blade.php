@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    
  </div>
  <div class="main main-raised">
    <div class="container">

      <div class="section text-center">
        <h2 class="title">Imagenes del producto {{$product->name}}</h2>
        <div class="team">
          <div class="row">

            <div class="card">
                <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                          @csrf
                        <input type="file" name="photo" id="photo" required>
                        <button type="submit" class="btn btn-primary btn-round">
                            Subir nuevas imagenes</button>
                        <a href="{{url('/admin/products/')}}" class="btn btn-default btn-round">
                            Volver al listado de productos</a>
                     </form>
                </div>
            </div>
            
                
                <div class="row">
                @foreach($images as $image)
                @if($images->count() == 2)
                <div class="col-md-6">
                @elseif($images->count() == 1)
                <div class="col-md-12">
                @else
                <div class="col-md-4">
                @endif
                <div class="card">
                    <div class="card-body">
                      <img src="{{$image->url}}" width="250">
                      <form method="POST" action="">
                          @csrf
                          {{ method_field('DELETE') }}
                          <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                            @if ($image->featured)
                            <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada">
                                <i class="material-icons">favorite</i>
                            </button>
                            @else
                            <a href=" {{url("/admin/products/{$product->id}/images/select/{$image->id}")}} " class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">favorite</i>
                            </a>
                            @endif
                      </form>
                      
                    </div>
                </div>
                </div>
                @endforeach
                </div>
            
          </div>
        </div>
    </div>

    </div>
  </div>

  @include('elements.footer')
@endsection
