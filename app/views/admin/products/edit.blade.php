@extends('admin.layouts.main')
@section('title')
Edit {{ $product->title }}
@stop

@section('content')
<div class="row mt">
      	<div class="col-lg-6 col-md-6 col-sm-12">
      		<div class="showback">
				 {{ Form::model($product,['method'=>'patch','files'=>'true']) }}
				 <h3 align="center"> Edit Product: </h3>
				 {{ Form::label('pno ','Product Number') }}
				 {{ Form::text('pno',Input::old('pno'),['class'=>'form-control round-form']) }}
				 @if($errors->has('pno'))
				 <p class="alert alert-danger">{{ $errors->first('pno') }}</p>
				 @endif
				 <br>
				 {{ Form::label('title','Product Title') }}
				 {{ Form::text('title',Input::old('title'),['class'=>'form-control round-form']) }}
				 @if($errors->has('title'))
				 <p class="alert alert-danger">{{ $errors->first('title') }}</p>
				 @endif
				 <br>
				 {{ Form::label('description','Product Description') }}
				 {{ Form::textarea('description',Input::old('description'),['class'=>'form-control']) }}
				 @if($errors->has('description'))
				 <p class="alert alert-danger">{{ $errors->first('description') }}</p>
				 @endif
				 <br>
				 {{ Form::label('price','Price') }}
				 {{ Form::text('price',Input::old('price'),['class'=>'form-control round-form']) }}
				 @if($errors->has('price'))
				 <p class="alert alert-danger">{{ $errors->first('price') }}</p>
				 @endif
				 <br>
				 {{ Form::label('Stock','Stock') }}
				 {{ Form::text('stock',Input::old('stock'),['class'=>'form-control round-form']) }}
				 @if($errors->has('stock'))
				 <p class="alert alert-danger">{{ $errors->first('stock') }}</p>
				 @endif
				 <br>
				 {{ Form::label('category_id','Category') }}
				 {{ Form::select('category_id',$categories,Input::old('category_id'),['class'=>'form-control']) }} 
				 @if($errors->has('availability'))
				 <p class="alert alert-danger">{{ $errors->first('availability') }}</p>
				 @endif
				 <br>
				 {{ Form::label('fimg', 'Front Image(Required)')}}
				 {{ HTML::image($product->fimg,null,['height'=>'50','width'=>'50']) }} <br> 	
				 {{ Form::file('fimg',['class'=>'form-control']) }}

				 @if($errors->has('fimg'))
				 <p class="alert alert-danger">{{ $errors->first('fimg') }}</p>
				 <br>
				 @endif
				 {{ Form::label('img2', 'Second Image')}}
				 @if($product->img2)
				 {{ HTML::image($product->img2,null,['height'=>'50','width'=>'50']) }} 	
				 @endif
				 {{ Form::file('img2',['class'=>'form-control']) }} 
				 @if($errors->has('img2'))
				 <p class="alert alert-danger">{{ $errors->first('img2') }}</p>
				 <br>
				 @endif
				 {{ Form::label('img3', 'Third Image')}} 
				 @if($product->img3)
				 {{ HTML::image($product->img3,null,['height'=>'50','width'=>'50']) }} 	
				 @endif	
				 {{ Form::file('img3',['class'=>'form-control']) }} 
				 @if($errors->has('img3'))
				 <p class="alert alert-danger">{{ $errors->first('img3') }}</p>
				 <br>
				 @endif
				<br>
				<br>
				 {{ Form::submit('Add',['class'=>'btn btn-theme04 btn-lg btn-block','align'=>'center']) }}
				 {{ Form::close() }}
				
			</div>
		</div>
	</div>
@stop