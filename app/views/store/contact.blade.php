@extends('store.layouts.main')
@section('title')
Contact Us
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
        <li class="active">Contact</li>
      </ul>  
      <!-- Contact Us-->
      <h1 class="heading1"><span class="maintext">Contact Us</span><span class="subtext">Have any queries? Just shoot us a message and we will get back to you as soon as possible!</span></h1>
      <div class="row">
        <div class="span9">
        {{ Form::open(['url'=>'/contact','method'=>'post','class'=>'form-horizontal']) }}
           <fieldset>
                  <div class="control-group">
                    <label  class="control-label">Name<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text"  class="span3" name="name">
                      @if($errors->has('name'))
                      <span class="alert alert-info">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                      <input type="email"  class="span3" name="email">
                      @if($errors->has('email'))
                      <span class="alert alert-info">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Subject<span class="required">*</span></label>
                    <div class="controls">
                      <input type="text"  class="span3" name="subject">
                      @if($errors->has('subject'))
                      <span class="alert alert-info">{{ $errors->first('subject') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Message<span class="required">*</span></label>
                    <div class="controls">
                      <textarea name="message" style="height:90px;width:37%"></textarea>
                      @if($errors->has('message'))
                      <span class="alert alert-info">{{ $errors->first('message') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-actions">
                  <button class="btn btn-orange">Submit</button>
                  <input class="btn" type="reset" value="Reset">
                  </button>
                </fieldset>
              </form>
        </div>
        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span>Contact Info</span></h2>
              <p> E/8, Brij Park-2, <br>Behind Manjalpur Township-1,<br>Manjalpur, Vadodara,<br>390011
                <br>
                Phone:+919998668728<br>
                Email: test@contactus.com<br>
                
              </p>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
        
      </div>
    </div>
  </section>
@stop