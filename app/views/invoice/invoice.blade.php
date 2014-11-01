<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>CandleStore Invoice</title>
    
    <style>

      @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
      body, h1, h2, h3, h4, h5, h6,div{
      font-family: 'Bree Serif', serif;
      }
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-6 text-right">
          
          <h1>Invoice</h1>
          <h3>Order # {{ $order->id }}</h3>
          <h3>Order Date: {{ $order->updated_at->format('d/m/Y') }}
        </div>
      </div>
      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>From: CandleStore</h4>
            </div>
            <div class="panel-body">
              <p>
               E/8, Brij Park-2, 
Behind Manjalpur Township-1,
Manjalpur, Vadodara, 390011, Gujarat </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>To : {{ $order->firstname }} {{ $order->lastname }}</h4>
            </div>
            <div class="panel-body">
              <p>
                {{ $order->address }},<br> {{ $order->city }},<br> {{ $order->PIN }}<br>{{ $order->state->state }} <br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->

      <table class="table table-bordered" border="0" width="550">
        <thead>
          <tr>
            <th>
              <h4></h4>
            </th>
            <th>
              <h4>Product ID</h4>
            </th>
            <th>
              <h4>Title</h4>
            </th>
            <th>
              <h4>Qty</h4>
            </th>
            <th>
              <h4>Price(Rs.)</h4>
            </th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($order->products as $product)
          <tr>
            <td class="text-right"><img src="/var/www/CandleStore/public{{ $product->fimg }}" height="50" width="50"></td>
            <td align="center">{{ $product->pno }}</td>
            <td align="center">{{ $product->title }}</td>
            <td class="text-right" align="center">{{ $product->pivot->qty }}</td>
            <td class="text-right" align="center">{{ $product->price }}</td>
            
          </tr>
          @endforeach
          <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td align="center"><b>Total:</b><br>Rs.{{ $order->calculateTotal() }}</td>
          </tr>
        </tbody>
      </table>
      
      
      </div>
    </div>
  </body>
</html>