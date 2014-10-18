@extends('store.layouts.main')
@section('title')
Home
@stop

@section('content')
<!-- Slider Start-->
  <section class="slider">
    <div class="container">
      <div class="flexslider" id="mainslider">
        <ul class="slides">
          <li>
            <img src="store/img/Bright11.jpg" alt="" />
          </li>
          <li>
            <img src="store/img/BW11.jpg" alt="" />
          </li>
          <li>
            <img src="store/img/Deep11.jpg" alt="" />
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Slider End-->
  
  <!-- Section Start-->
  <section class="container otherddetails">
    <div class="otherddetailspart">
      <div class="innerclass free">
        <h2>Free shipping</h2>
        All over in world over $200 </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass payment">
        <h2>Easy Payment</h2>
        Payment Gatway support </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass shipping">
        <h2>24hrs Shipping</h2>
        Free For Indian Customers </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass choice">
        <h2>Over 5000 Choice</h2>
        50,000+ Products </div>
    </div>
  </section>
  <!-- Section End-->
  
  <!-- Featured Product-->
  <section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
      @foreach($featured as $product)
        <li class="span3">
          <a class="prdocutname" href="/product/{{ $product->pno }}"{{ $product->title }}</a>
          <div class="thumbnail">
           
            <a href="/product/{{ $product->pno }}"><img alt="" src="{{ $product->fimg }}"></a>
            <div class="pricetag">
              <span class="spiral"></span>
              @if($product->stock!=0)
                              {{ Form::open(['url'=>'/cart/add','method'=>'POST']) }}
                              
                                <button class="btn btn-orange">ADD TO CART</button>
                              
                              <div class="price">
                                <div class="pricenew">Rs. {{ $product->price }}</div>
                               </div>

                              {{ Form::hidden('qty',1) }}
                              {{ Form::hidden('id',$product->id) }}
                              {{ Form::close() }}
                            @else
                                 <button class="btn btn-info">OUT OF STOCK</button>
                                 <div class="price">
                                    Rs. {{ $product->price }}
                                 </div>
                            @endif
            </div>
          </div>
        </li>
       @endforeach 
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
  <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
      <ul class="thumbnails">
      @foreach($recent as $product)
        <li class="span3">
          <a class="prdocutname" href="/product/{{ $product->pno }}">{{ $product->title }}</a>
          <div class="thumbnail">
            <a href="/product/{{ $product->pno }}"><img alt="" src="{{ $product->fimg }}"></a>
            <div class="pricetag">
              <span class="spiral"></span>
             @if($product->stock!=0)
                              {{ Form::open(['url'=>'/cart/add','method'=>'POST']) }}
                              
                                <button class="btn btn-orange">ADD TO CART</button>
                              
                              <div class="price">
                                <div class="pricenew">Rs. {{ $product->price }}</div>
                               </div>

                              {{ Form::hidden('qty',1) }}
                              {{ Form::hidden('id',$product->id) }}
                              {{ Form::close() }}
                            @else
                                 <button class="btn btn-info">OUT OF STOCK</button>
                                 <div class="price">
                                    Rs. {{ $product->price }}
                                 </div>
                            @endif
            </div>
          </div>
        </li>
        @endforeach
        
      </ul>
    </div>
  </section>


@stop