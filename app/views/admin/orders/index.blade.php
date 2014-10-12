@extends('admin.layouts.main')
@section('title')
All Orders
@stop

@section('content')
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Orders</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Order ID</th>
                                  <th><i class="fa fa-bullhorn"></i>Customer Name</th>
                                  <th>Contact No.</th>
                                  <th>Email</th>
                                  <th>Placement Date</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($orders as $order)
                              <tr>
                              	  <td>{{ $order->id }}</td>
                                  <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                  <td class="hidden-phone">{{ $order->phone }}</td>
                                  <td>{{ $order->email }}</td>
                                  <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                  <td><a href="/admin/orders/details/{{ $order->id }}"><i class="fa fa-pencil">Order Details</a></td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
@stop