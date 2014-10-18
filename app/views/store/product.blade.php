@extends('store.layouts.main')
@section('title')
{{ $product->title }}
@stop

@section('content')

<section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ $product->fimg }}">
                <img src="{{ $product->fimg }}" alt="" title="">
              </a>
            </li>
            @if($product->img2)
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ $product->img2 }}">
                <img src="{{ $product->img2 }}" alt="" title="">
              </a>
            </li>
            @endif
            @if($product->img3)
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ $product->img3 }}">
                <img  src="{{ $product->img3 }}" alt="" title="">
              </a>
            </li>
            @endif
          </ul>
          <span></span>

          <div class="span5">
            <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{{ $product->fimg }}" alt="" title="" style="height:67px;">
              </a>
            </li>
            @if($product->img2)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{{ $product->img2 }}" alt="" title="" style="height:67px;">
              </a>
            </li>
            @endif
            @if($product->img3)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{{ $product->img3 }}" alt="" title="" style="height:67px;">
              </a>
            </li>
            @endif
          </ul>
          </div>
          </div>
        </div>
         <!-- Right Details-->
        <div class="span7">
          <div class="row">
            <div class="span7">
              <h1 class="productname"><span class="bgnone">{{ $product->title }}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>Rs. {{ $product->price }}</div>
    
              </div>
              <div class="row">
                  <div class="span7">
                  {{ $product->description }}
                  </div>

              </div>
              @if($product->stock!=0)
              {{ Form::open(['url'=>'/cart/add','method'=>'POST']) }}
              <div class="quantitybox">
                <label>Quantity</label>
                <input type="text" name="qty" value="{{Input::old('qty')?Input::old('qty'):1}}">
                @if($errors->has('qty'))
                <p class="alert alert-info">{{ $errors->first('qty') }}</p>
                @endif
    
              </div>
              <ul class="productpagecart" align="center">
                
                <li><button class="btn btn-orange btn-xl">ADD TO CART</a>
                </li>
              </ul>
              {{ Form::hidden('id',$product->id) }}
              {{ Form::close() }}
              @else
              <ul class="productpagecart" align="center">
                <li><button class="btn btn-danger btn-xl">OUT OF STOCK</button></li>
              </ul>
              @endif
         
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"></span></h1>
      <ul class="thumbnails">
      @foreach($rel as $r)
        <li class="span3">
          <a class="prdocutname" href="product.html">{{ $r->title }}</a>
          <div class="thumbnail">
            <a href="#"><img alt="" src="img/product1.jpg"></a>
            <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">Rs. {{ $r->price }}</div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </div>
  </section>
@stop