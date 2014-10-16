@extends('store.layouts.main')
@section('title')
{{ $user->firstname }}'s Account
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
        <li class="active">My Account</li>
      </ul>
      <div class="row">
        
        <!-- My Account-->
        <div class="span9">
<h1 class="heading1"><span class="maintext">My Account</span><span class="subtext"></span></h1>        
              <h3 class="heading3">Account Details</h3>
          <div class="myaccountbox">
            <ul>
              <li><h2 class="heading2">
              {{ $user->firstname }}  {{ $user->lastname }}  
              </li>
              <li><h2 class="heading2">
              {{ $user->email }}
              </li>
              <li><h2 class="heading2">
              {{ $user->phone }}
              </li>
              <li><h2 class="heading2">
              {{ $user->address }} 
              </li>
              <li><h2 class="heading2">
              {{ $user->PIN }} 
              </li>
              <li><h2 class="heading2">
              {{ $user->city }} 
              </li>
              <li><h2 class="heading2">
              {{ $user->state->state }} 
              </li>
            </ul>
          </div>
          <h3 class="heading3">Order History</h3>
          <div class="myaccountbox">
            <ul>

            @if($orders->count())
                @foreach($orders as $order)
                    <li><h2>
                    Order No. <strong>{{ $order->id }}</strong></h2>
                     <table class="table">
                    <thead>
                      <tr>
                        <th>Product #</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $product)
                          <tr>
                            <td>{{ $product->pno }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->pivot->qty }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                    </li>
                @endforeach
                </ul>
            @else
              <ul>
              <li><h2 class="alert alert-info">Looks like you haven't ordered anything yet.</h2></li>
              </ul>
            @endif
          </div>
         </div> 
        
        <!-- Sidebar Start-->
          <aside class="span3">
            <div class="sidewidt">
              <h2 class="heading2"><span>Account</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a href="/account/change-password">Change Password</a>
                </li>
                
                <li>
                  <a href="/account/signout">Sign Out</a>
                </li>
              </ul>
            </div>
          </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
@stop