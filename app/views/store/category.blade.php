@extends('store.layouts.main')
@section('title')
{{ $cat->name }}
@stop

@section('content')
<section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="/">Home</a>
          <span class="divider">/</span>
        </li>
        <li>
          <a>Categories</a>
          <span class="divider">/</span>
        </li>
        <li class="active">{{ $cat->name }}</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
            @foreach($catnav as $categ)
              <li>
                <a href="/categories/{{ $categ->name }}">{{ $categ->name }}</a>
              </li>
             @endforeach
            </ul>
          </div>
         
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
            @foreach($recent as $product)
              <li>
                <img width="50" height="50" src="{{ $product->fimg }}" alt="product" title="product">
                <a class="productname" href="/product/{{ $product->pno }}"> {{ $product->title }}</a>
                <span class="procategory">{{ $product->category->name }}</span>
                <span class="price">Rs. {{ round($product->price) }} </span>
              </li>
            @endforeach
            </ul>
          </div>
          </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <div class="sorting well">
          	<div class="btn-group pull-right">
                    <button class="btn" id="list"><i class="icon-th-list"></i>
                    </button>
                    <button class="btn btn-orange" id="grid"><i class="icon-th icon-white"></i></button>
                  </div>
          </div>
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Sorting-->
                <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                  @foreach($products as $product)
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
                                <div class="pricenew">Rs. {{ round($product->price) }}</div>
                               </div>

                              {{ Form::hidden('qty',1) }}
                              {{ Form::hidden('id',$product->id) }}
                              {{ Form::close() }}
                            @else
                                 <button class="btn btn-info">OUT OF STOCK</button>
                                 <div class="price">
                                    Rs. {{ round($product->price) }}
                                 </div>
                            @endif
                            </div>
                      </div>
                    </li>
                    @endforeach
                    </ul>
                    <ul class="thumbnails list row">
                    @foreach($products as $product)
                    <li>
                      <div class="thumbnail">
                        <div class="row">
                          <div class="span3">
                            <a href="/product/{{ $product->pno }}"><img alt="" src="{{ $product->fimg }}" ></a>
                          </div>
                          <div class="span6">
                            <a class="prdocutname" href="product.html">{{ $product->title }}</a>
                            <div class="productdiscrption"> {{ $product->description }}</div>
                            <div class="pricetag">
                              <span class="spiral"></span>
                              @if($product->stock!=0)
                              {{ Form::open(['url'=>'/cart/add','method'=>'POST']) }}
                              <button class="btn btn-orange">ADD TO CART</button>
                        
                              <div class="price">
                                <div class="pricenew">Rs. {{ round($product->price) }}</div>
                               </div>
                               {{ Form::hidden('qty',1) }}
                              {{ Form::hidden('id',$product->id) }}
                              {{ Form::close() }}
                              @else
                              <button class="btn btn-info">OUT OF STOCK</button>
                        
                              <div class="price">
                                Rs. {{ round($product->price) }}
                               </div>
                              @endif   
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                    </ul>
                    
                   
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
@stop