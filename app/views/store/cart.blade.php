@extends('store.layouts.main')
@section('title')
Shooping Cart
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
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      @if(isset($c)&&$count!=0)
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
        
              @foreach($c->products as $product)
              <tr>
                <td class="image"><a href="/product/{{ $product->pno }}"><img title="product" alt="product" src="{{ $product->fimg }}" height="50" width="50"></a></td>
                <td  class="name"><a href="/product/{{ $product->pno }}">{{ $product->title }}</a></td>
                <td class="quantity">{{ $product->pivot->qty }}
                 
                 </td>
                 <td class="total">

                 {{ Form::open(['url'=>'/cart/delete','method'=>'post']) }}
                 {{ Form::hidden('id',$product->id) }}
                 {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                 {{ Form::close() }}
                 </td>
                 
                <td class="price">Rs. {{ $product->price }}</td>
                <td class="total">Rs. {{$product->price*$product->pivot->qty}}</td>
                 
              </tr>
              @endforeach

        </table>
      </div>
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">Rs. {{ $sub }}</span></td>
              </tr>
            </table>
            <a href="/checkout" class="btn btn-orange pull-right">Checkout</a>
            <a href="/" class="btn btn-orange pull-right mr10">Continue Shopping</a>
          </div>
        </div>
        </div>
    </div>
    @else
    <div class="container">
    <h3 class="alert alert-info" align="center">There are no items in your cart yet!</h3>
    </div>
    @endif
  </section>
</div>
@stop