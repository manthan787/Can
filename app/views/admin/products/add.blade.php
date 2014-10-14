@extends('admin.layouts.main')
@section('title')
Add Product
@stop

@section('content')

  <div class="row mt">
      	<div class="col-lg-6 col-md-6 col-sm-12">
      		<div class="showback">
				 {{ Form::open(['files'=>'true']) }}
				 <h3 align="center"> Add Product: </h3>
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
				 {{ Form::label('Stock:','Stock') }}
				 {{ Form::text('stock',Input::old('price'),['class'=>'form-control round-form']) }}
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
				 
				 {{ Form::label('availability','Availability') }}
				 {{ Form::select('availability', ['1'=>'Available','2'=>'Out Of Stock'],null,['class'=>'form-control']) }} 
				 @if($errors->has('availability'))
				 <p class="alert alert-danger">{{ $errors->first('availability') }}</p>
				 @endif
				 <br>
				 {{ Form::label('fimg', 'Front Image(Required)')}} 	
				 {{ Form::file('fimg',['class'=>'form-control']) }} 
				 @if($errors->has('fimg'))
				 <p class="alert alert-danger">{{ $errors->first('fimg') }}</p>
				 <br>
				 @endif
				 {{ Form::label('img2', 'Second Image')}} 	
				 {{ Form::file('img2',['class'=>'form-control']) }} 
				 @if($errors->has('img2'))
				 <p class="alert alert-danger">{{ $errors->first('img2') }}</p>
				 <br>
				 @endif
				 {{ Form::label('img3', 'Third Image')}} 	
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
  
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="showback">
			<h3 align="center">Recently Added Products</h3>
			<ul>
		
			<table class="table table-striped table-advance table-hover">
				@foreach($products as $product)
                              <tr>
                                  <td><a href="/admin/products/edit/{{ $product->pno }}">{{ $product->title }}</a></td>
                                  <td><img src="{{ $product->fimg }}" height="70" width="75"></td>
                                  <td class="hidden-phone"></td>
                                  <td>
                                  	 
                                     
                                      {{ Form::open(['url'=>'/admin/products/delete','method'=>'post']) }}
                                       <a href="/admin/products/edit/{{ $product->id }}"><i class="fa fa-pencil"></i></a>
                                      {{ Form::hidden('id',$product->id) }}
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      {{ Form::close() }}
                                  </td>
                              </tr>
                @endforeach
			</table>
		
			</ul>
		</div>
	</div>

  </div>
@stop