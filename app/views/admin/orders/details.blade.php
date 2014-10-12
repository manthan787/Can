@extends('admin.layouts.main')
@section('title')
Order Details
@stop

@section('content')
<div class="row mt">
		<div class="showback">
		<ul class="list-group">
			<li class="list-group-item"><h4>Recepient Name: {{ $order->firstname }} {{ $order->lastname }}</li>
			<li class="list-group-item"><h4>Contact No: {{ $order->phone}}</li>
			<li class="list-group-item"><h4>Email: {{ $order->email}}</li>
			<li class="list-group-item"><h4>Delivery Address: {{ $order->address}}</li>
			<li class="list-group-item"><h4>City: {{ $order->city}}</li>
			<li class="list-group-item"><h4>PIN Code: {{ $order->PIN}}</li>
			<li class="list-group-item"><h4>State: {{ $order->state->state}}</li>
			<li class="list-group-item"><b><h3>Total Paid Amount:Rs. {{ $total}}</h5></b></li>
			
		</ul>
		</div>
		@foreach($order->products as $product)
		<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="weather-2 pn">
								<div class="weather-2-header">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<p>{{ $product->title }}</p>
										</div>
										<div class="col-sm-6 col-xs-6 goright">
											<p class="small">Product No. {{ $product->pno }}</p>
										</div>
									</div>
								</div><!-- /weather-2 header -->
								<div class="row centered">
									<a href="/product/{{ $product->pno }}">
									<img src="{{ $product->fimg }}" class="img-circle" width="120">	
									</a>		
								</div>
								<div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h6><b>Quantity: {{ $product->pivot->qty }}</b></h6>
										<h6><b>Unit Price:Rs. {{ $product->price }}</b></h6>
										
									</div>
									<div class="col-sm-6 col-xs-6 goright">
										
										<h4><b>SubTotal: Rs.{{ $product->pivot->qty*$product->price }}</b></h4>
										
									</div>
								</div>
							</div>
						</div><! --/col-md-4 -->
		@endforeach
</div>
@stop