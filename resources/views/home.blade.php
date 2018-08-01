@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
   
  </div>
  <div class="main main-raised">
    <div class="container">
      
      <div class="section text-center">
        <h2 class="title">Dashboard</h2>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
                
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
                <!--
                    color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                -->
                <li class="nav-item">
                    <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-space">
                <div class="tab-pane active" id="dashboard-1">
                    
                     <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos </p>   

                    <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    
                                    
                                    <th class="text-right">Precio</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach(auth()->user()->cart->details as $detail)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{$detail->product->featured_image_url}}" height="50" />
                                    </td>
                                    <td>
                                        <a href="{{url("/products/{$detail->product->id}")}}" target="_blank">{{$detail->product->name}}</a>
                                    </td>                                    
                                    
                                    <td class="text-right">&euro; {{$detail->product->price}}</td>
                                    <td class="text-right">{{$detail->quantity}}</td>
                                    <td class="text-right">&euro; {{$detail->quantity * $detail->product->price}}</td>
                                    <td class="td-actions text-right">
                                        
                                        <form action="{{url("/cart")}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                        
                                        <a href="{{url("/products/{$detail->product->id}")}}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
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
                </div>
                
                <div class="tab-pane" id="tasks-1">
                    Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                    <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                </div>
            </div>

      </div>
     
    </div>
  </div>

  @include('elements.footer')
@endsection

                    