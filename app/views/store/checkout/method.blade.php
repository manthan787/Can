@extends('store.layouts.main')
@section('title')
Payment Method
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
        <li >Checkout<span class="divider">/</span></li>
        <li class="active">Payment Method</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        @if(isset($c)&&$count!=0)
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Checkout</span><span class="subtext"> Checkout Process</span></h1>
          <div class="checkoutsteptitle">Step 3: Payment Method
          </div>
          <div class="checkoutstep ">
            <section class="newcustomer ">
              <h3 class="heading3">Choose Your Payment Method </h3>
              <div class="loginbox">
              {{ Form::open(['url'=>'/checkout/payment','method'=>'post','class'=>'form-vertical']) }}
              
                <label class="inline">
                  <input type="radio" value="CARD" name="coption">
                  Card Payment </label>
                <button  class="btn btn-orange">Confirm Order</button>
                {{ Form::close() }}
              </div>
            </section>
           </div>
            @else
            <div class="container">
            <h3 class="alert alert-info" align="center">Please Add Products To Your Cart First.</h3>
            </div>
            @endif
          </div>
         </section>
         
@stop