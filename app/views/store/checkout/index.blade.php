@extends('store.layouts.main')
@section('title')
Checkout
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
        <li class="active">Checkout</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        @if(isset($c)&&$count!=0)
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Checkout</span><span class="subtext"> Checkout Process</span></h1>
          <div class="checkoutsteptitle">Step 1: Checkout Options
          </div>
          <div class="checkoutstep ">
            <section class="newcustomer ">
              <h3 class="heading3">New Customer </h3>
              <div class="loginbox">
              {{ Form::open(['url'=>'/checkout/choice','method'=>'post','class'=>'form-vertical']) }}
                <label class="inline">
                  <input type="radio" value="register" name="coption">
                  Register Account </label>
                <br>
                <label class="inline">
                  <input type="radio" value="guest" name="coption">
                  Guest Checkout </label>
                <p><br>
                  By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                <br>
                <button  class="btn btn-orange">Continue</button>
                {{ Form::close() }}
              </div>
            </section>
            <section class="returncustomer">
              <h3 class="heading3">Returning Customer </h3>
              <div class="loginbox">
              	{{ Form::open(['url'=>'/checkout/login','method'=>'post','class'=>'form-vertical']) }}
                
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label">E-Mail Address:</label>
                      
                      <div class="controls">
                        <input type="text" class="span3" name="email" value="{{Input::old('email')}}">
                      </div>
                      @if($errors->has('email'))
                      <p class="alert alert-info">{{ $errors->first('email') }}</p>
                      @endif
                    </div>
                    <div class="control-group">
                      <label class="control-label">Password:</label>
                      <div class="controls">
                        <input type="password"  class="span3" name="password">
                      </div>
                      @if($errors->has('password'))
                      <p class="alert alert-info">{{ $errors->first('password') }}</p>
                      @endif
                    </div>
                    <a class="" href="#">Forgotten Password</a>
                    <br>
                    <br>
                    <button class="btn btn-orange">Login</button>
                  </fieldset>
               {{ Form::close() }}
              </div>
            </section>
            @else
            <div class="container">
            <h3 class="alert alert-info" align="center">Please Add Products To Your Cart First.</h3>
            </div>
            @endif
          </div>
         </section>
         
@stop