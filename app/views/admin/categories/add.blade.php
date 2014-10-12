@extends('admin.layouts.main')
@section('title')
Add Category
@stop

@section('content')

  <div class="row mt">
      	<div class="col-lg-6 col-md-6 col-sm-12">
      		<div class="showback">
				 {{ Form::open() }}
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
  
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="showback">
			<h3 align="center">Existing Categories</h3>
			<ul>
		
			<table class="table table-striped table-advance table-hover">
				@foreach($categories as $category)
                              <tr>
                                  <td><a href="/admin/categories/products/{{ $category->id }}">{{ $category->name }}</a></td>
                                  <td class="hidden-phone"></td>
                                  <td>
                                  	 
                                     
                                      {{ Form::open(['url'=>'/admin/categories/delete','method'=>'post']) }}
                                       <a href="/admin/categories/edit/{{ $category->id }}"><i class="fa fa-pencil"></i></a>
                                      {{ Form::hidden('id',$category->id) }}
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