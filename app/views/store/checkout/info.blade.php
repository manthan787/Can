@extends('store.layouts.main')
@section('title')
Delivery Details
@stop

@section('content')
<section>
<div class="container">
<div class="checkoutsteptitle">Step 2: Billing Details<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
          @if(isset($c)&&$count!=0)  
            @if(isset($user))
                  {{ Form::model($user,['url'=>'/checkout/info','method'=>'POST','class'=>'form-horizontal']) }}
                   
                <fieldset>
                  <div class="span4">
                   <div class="control-group">
                      <label class="control-label" >First Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="firstname"  value="{{ $user->firstname }}">
                       </div>
                   </div>
                    <div class="control-group">
                      <label class="control-label" >Last Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="lastname"  value="{{ $user->lastname }}">
                         @if($errors->has('lastname'))
       					<p class="alert alert-info">{{ $errors->first('lastname') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="email"  value="{{ $user->email }}">
                         @if($errors->has('email'))
       					<p class="alert alert-info">{{ $errors->first('email') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Phone Number<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="phone"  value="{{ $user->phone }}">
                         @if($errors->has('phone'))
       					<p class="alert alert-info">{{ $errors->first('phone') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" >Address<span class="red">*</span></label>
                      <div class="controls">
                        <textarea name="address" class="input-xlarge">{{ $user->address }}</textarea>
                         @if($errors->has('address'))
       					<p class="alert alert-info">{{ $errors->first('address') }}</p>
       					@endif
       				
                      </div>
                    </div>
                   
                    <div class="control-group">
                      <label class="control-label" >City<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="city"  value="{{ $user->city }}">
                         @if($errors->has('city'))
       					<p class="alert alert-info">{{ $errors->first('city') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >PIN Code<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="PIN"  value="{{ $user->PIN }}">
                         @if($errors->has('PIN'))
       					<p class="alert alert-info">{{ $errors->first('PIN') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >State<span class="red">*</span></label>
                      <div class="controls">
                        {{ Form::select('state',$states,$user->state_id) }}
                      </div>
                    </div>
                  </div>
                </fieldset>
              
            </div>
            <button class="btn btn-orange pull-right">Continue</button>
            {{ Form::close() }}
            @else

                  {{ Form::open(['url'=>'/checkout/info','method'=>'POST','class'=>'form-horizontal']) }}
                   
                <fieldset>
                  <div class="span4">
                   <div class="control-group">
                      <label class="control-label" >First Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="firstname"  value="{{ Input::old('firstname') }}">
                        @if($errors->has('firstname'))
                          <p class="alert alert-info">{{ $errors->first('address') }}</p>
                         @endif
                       </div>
                   </div>
                    <div class="control-group">
                      <label class="control-label" >Last Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="lastname"  value="{{ Input::old('lastname') }}">
                         @if($errors->has('lastname'))
       					<p class="alert alert-info">{{ $errors->first('lastname') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="email"  value="{{ Input::old('email') }}">
                         @if($errors->has('email'))
       					<p class="alert alert-info">{{ $errors->first('email') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Phone Number<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="phone"  value="{{ Input::old('phone') }}">
                         @if($errors->has('phone'))
       					<p class="alert alert-info">{{ $errors->first('phone') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" >Address<span class="red">*</span></label>
                      <div class="controls">
                        <textarea name="address" cols="10" rows="7" value="{{ Input::old('address') }}"></textarea>
                         @if($errors->has('address'))
                 					<p class="alert alert-info">{{ $errors->first('address') }}</p>
                 				 @endif
       				
                      </div>
                    </div>
                   
                    <div class="control-group">
                      <label class="control-label" >City<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="city"  value="{{ Input::old('city') }}">
                         @if($errors->has('city'))
       					          <p class="alert alert-info">{{ $errors->first('city') }}</p>
       					        @endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >PIN Code<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" name="PIN"  value="{{ Input::old('PIN') }}">
                         @if($errors->has('PIN'))
       					<p class="alert alert-info">{{ $errors->first('PIN') }}</p>
       					@endif
       				
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >State<span class="red">*</span></label>
                      <div class="controls">
                        {{ Form::select('state',$states,Input::old('state')) }}
                      </div>
                    </div>
                  </div>
                </fieldset>
              
            </div>
            <button class="btn btn-orange pull-right">Continue</button>
            {{ Form::close() }}
              @endif
          </div>
        @else
        <div class="container">
        <h3 class="alert alert-info" align="center">You can't access this page right now. Please add some products first.</h3>
        </div>  
        @endif
     </div>
</section>
@stop