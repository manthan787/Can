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
        <li class="active">Recover Account</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Recover Account</span></h1>
          <form class="form-horizontal" method="POST">
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email ID:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge" name="email">
                    
                    @if($errors->has('email'))
                    <span class="alert alert-info">{{ $errors->first('email') }}</span>
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