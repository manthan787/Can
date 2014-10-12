@extends('admin.layouts.main')
@section('title')
Update Order Status
@stop
@section('content')
<div class="row">
	<div class="container" align="center">
	<br><br>
		{{ Form::open(['method'=>'get']) }}
		{{ Form::text('oid',null,['placeholder'=>'Enter Order ID','class'=>'form-control'])}}<br>
		{{ Form::submit('Search',['class'=>'btn btn-primary']) }}
		{{ Form::close() }}
		<br>
		@if(isset($order))
		<table class="table table-striped table-advance table-hover">
		<td>{{ $order->id }}</td>
		<td>{{ $order->firstname }} {{ $order->lastname }}</td>
		<td>{{ $order->city }}, {{ $order->state->state }}</td>
		<td>Rs. {{ $order->calculateTotal() }}</td>
		@if($order->status)
		<td><button class="btn btn-success">Delivered</td>
		@else
		<td><button class="btn btn-danger">Not Delivered</td>
		@endif
		<td>
			{{ Form::open(['method'=>'post']) }}
			{{ Form::hidden('oid',$order->id) }}
			{{ Form::submit('Change Status',['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
		</td>
		</table>
		@endif

	</div>

</div>

@stop