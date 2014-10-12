@extends('store.layouts.main')
@section('title')
Change Password
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
        <li class="active">Change Password</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Change Password</span></h1>
          <form class="form-horizontal" method="POST">
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Old Password:</label>
                  <div class="controls">
                    <input type="password"  class="input-xlarge" name="old_password">
                    
                    @if($errors->has('old_password'))
                    <span class="alert alert-info">{{ $errors->first('old_password') }}</span>
                    @endif
                   
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> New Password:</label>
                  <div class="controls">
                    <input type="password"  class="input-xlarge" name="password">
                    
                    @if($errors->has('password'))
                    <span class="alert alert-info">{{ $errors->first('password') }}</span>
                    @endif
                   
                  </div>
                </div>
                <div class="pull-right">
              		<input type="Submit" class="btn btn-orange" value="Continue">
            	</div>
               </fieldset>
              </div>
             </form>
            </div>
           </div>
           </div></section>
@stop