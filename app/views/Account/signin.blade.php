@extends('store.layouts.main')
@section('title')
Sign In
@stop

@section('content')
<section id="product">
    <div class="container">
      <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">SignIn</li>
      </ul>
       <!-- Account Login-->
      <div class="row">  
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Login</span><span class="subtext">First Login here to View All your account information</span></h1>
          <section class="newcustomer">
            <h2 class="heading2">New Customer </h2>
            <div class="loginbox">
              <h4 class="heading4"> Register Account</h4>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
              <br>
              <a href="/account/create" class="btn btn-orange">Continue</a>
            </div>
          </section>
          <section class="returncustomer">
            <h2 class="heading2">Returning Customer </h2>
            <div class="loginbox">
              <form class="form-vertical" method="POST">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">E-Mail Address:</label>
                    <div class="controls">
                      <input type="text"  class="span3" name="email">
                      @if($errors->has('email'))
                      <p class="alert alert-info">{{ $errors->first('email') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Password:</label>
                    <div class="controls">
                      <input type="password"  class="span3" name="password">
                      @if($errors->has('password'))
                      <p class="alert alert-info">{{ $errors->first('password') }}</p>
                      @endif
                    </div>
                  </div>
                  <a class="" href="/account/recover">Forgot Password?</a>
                  <br>
                  <br>
                  <button class="btn btn-orange">Login</a>
                </fieldset>
              </form>
            </div>
          </section>
        </div>
        
        
      </div>
    </div>
  </section>
@stop