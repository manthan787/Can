@extends('store.layouts.main')
@section('title')
Create Account
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
        <li class="active">Create Account</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Create Account</span><span class="subtext">Register Your details with us for a better shopping experience.</span></h1>
          <form class="form-horizontal" method="POST">
            <h3 class="heading3">Your Personal Details</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> First Name:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="firstname" value="{{ Input::old('firstname') }}">
                    
                    @if($errors->has('firstname'))
                    <span class="alert alert-info">{{ $errors->first('firstname') }}</span>
                    @endif
                   
                  </div>

                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Last Name:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="lastname" value="{{ Input::old('lastname') }}">
                  	@if($errors->has('lastname'))
                    <span class="alert alert-info">{{ $errors->first('lastname') }}</span>
                    @endif
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="email" value="{{ Input::old('email') }}">
                  	@if($errors->has('email'))
                    <span class="alert alert-info">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> phone:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="phone" value="{{ Input::old('phone') }}">
                  	@if($errors->has('phone'))
                    <span class="alert alert-info">{{ $errors->first('phone') }}</span>
                    @endif
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">Your Address</h3><span class="subtext">Fill it up now for a faster checkout.</span>
            <div class="registerbox">
              <fieldset>
               
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Address:</label>
                  <div class="controls">
                    <textarea class="input-xlarge" name="address" >{{ Input::old('address') }}</textarea>
                  	@if($errors->has('address'))
                    <span class="alert alert-info">{{ $errors->first('address') }}</span>
                    @endif
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">
                    <span class="red">*</span>City:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="city" value="{{ Input::old('city') }}">
                  	@if($errors->has('city'))
                    <span class="alert alert-info">{{ $errors->first('city') }}</span>
                    @endif
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">
                    <span class="red">*</span>PIN Code:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="PIN" value="{{ Input::old('PIN') }}">
                  	@if($errors->has('PIN'))
                    <span class="alert alert-info">{{ $errors->first('PIN') }}</span>
                    @endif
                  </div>
                </div>
 
                <div class="control-group">
                  <label class="control-label">
                    <span class="red">*</span>Region / State:</label>
                  <div class="controls">
                    {{ Form::select('state',$states,Input::old('state')) }}
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">Your Password</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password:</label>
                  <div class="controls">
                    <input type="password"  class="input-xlarge" name="password">
                  	@if($errors->has('password'))
                    <span class="alert alert-info">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password Confirm::</label>
                  <div class="controls">
                    <input type="password"  class="input-xlarge" name="password_confirm">
                  	@if($errors->has('password_confirm'))
                    <span class="alert alert-info">{{ $errors->first('password_confirm') }}</span>
                    @endif
                  </div>
                </div>
              </fieldset>
            </div>
       
            <div class="pull-right">
              <input type="Submit" class="btn btn-orange" value="Continue">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>  
 </section>
{{ Form::close() }}
@stop