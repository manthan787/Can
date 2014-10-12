@extends('admin.layouts.main')
@section('title')
Edit {{ $cat->name }}
@stop

@section('content')

  <div class="row mt">
      	<div class="col-lg-6 col-md-6 col-sm-12">
      		<div class="showback">
				 {{ Form::model($cat) }}
				 <h3 align="center"> Add Category: </h3>
				 {{ Form::text('name',null,['class'=>'form-control round-form']) }}
				 @if($errors->has('name'))
				 <p>{{ $errors->first('name') }}</p>
				 @endif
				 <br>
				 {{ Form::submit('Add',['class'=>'btn btn-theme04 btn-lg btn-block','align'=>'center']) }}
				 {{ Form::close() }}
			</div>
		</div>
  
	

  </div>
	
@stop