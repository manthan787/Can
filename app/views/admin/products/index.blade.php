@extends('admin.layouts.main')
@section('title')
All Products
@stop

@section('content')
<h3><i class="fa fa-angle-right"></i> All Products({{ $count }})</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		
					
					<div class="row">
					@if($count==0)
					<div class="alert alert-info">There are No Products to display right now!</div>
					@endif
					@foreach($products as $product)
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
						
							<div class="product-panel-2 pn">
								<img src="{{ $product->fimg }}" width="180" height="140" alt="">
								<h5 class="mt">{{ $product->title }}</h5>
								<h6><a href="/admin/categories/products/{{ $product->category->id }}">{{ $product->category->name }}</a></h6>
								{{ Form::open(['url'=>'/admin/products/delete','method'=>'post']) }}
								<a href="/admin/products/edit/{{ $product->id }}"><i class="fa fa-pencil"></i></a>
								
								{{ Form::hidden('id',$product->id) }}
								<button class="btn btn-small btn-theme04"><i class="fa fa-trash-o "></i></button>
								{{ Form::close() }}
							</div>
						</div>
						@endforeach
					</div>
@stop