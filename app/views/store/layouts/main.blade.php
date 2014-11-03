<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title') | CandleStore</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic') }}
{{ HTML::style('http://fonts.googleapis.com/css?family=Crete+Round') }}
{{ HTML::style('store/css/bootstrap.css') }}
{{ HTML::style('store/css/bootstrap-responsive.css') }}
{{ HTML::style('store/css/style.css') }}
{{ HTML::style('store/css/flexslider.css') }}
{{ HTML::style('store/css/jquery.fancybox.css') }}
{{ HTML::style('store/css/cloud-zoom.css') }}

<!--
<link href="store/css/bootstrap.css" rel="stylesheet">
<link href="store/css/bootstrap-responsive.css" rel="stylesheet">
<link href="store/css/style.css" rel="stylesheet">
<link href="store/css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="store/css/jquery.fancybox.css" rel="stylesheet">
<link href="store/css/cloud-zoom.css" rel="stylesheet"> -->

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->

</head>
<body>
<!-- Header Start -->
<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <a href="/" class="logo pull-left">{{ HTML::image('store/img/logo1.jpg') }}</a>
          <!-- Top Nav Start -->
          <div class="pull-left">
            <div class="navbar" id="topnav">
              <div class="navbar-inner">
                <ul class="nav" >
                  </li>
                  <li><a class="shoppingcart" href="/cart">Shopping Cart</a>
                  </li>
                  <li><a class="checkout" href="/checkout">CheckOut</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Top Nav End -->
          <div class="pull-right">
            <form class="form-search top-search">
              <input type="text" class="input-medium search-query" placeholder="Search Here…">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="headerdetails">
      <div class="pull-right">
      @if(Auth::check())
        <ul class="nav language pull-left">
          <li class="dropdown hover">
            <a href="#" class="dropdown-toggle" data-toggle="">{{ Auth::user()->firstname }} <b class="caret"></b></a>
            <ul class="dropdown-menu currency">
              @if(Auth::user()->admin)
                <li><a href="/admin">Admin Panel</a>
                </li>
              @endif
                <li><a href="/account/u/{{ Auth::user()->id }}">My Account</a>
                </li>
                <li><a href="/account/signout">Sign Out</a>
                </li>
                <li><a href="/account/change-password">Change Password</a>
                </li>
            </ul>
          </li>
        </ul>
      @else
      <ul class="nav language pull-left">
          <li class="dropdown hover">
            <a href="/account/signin" class="dropdown-toggle" data-toggle="">Sign In <b class="caret"></b></a>
            <ul class="dropdown-menu currency">
                      <li><a href="/account/create">Create Account</a>
                      </li>
                      <li><a href="/account/recover">Recover Account</a></li>
            </ul>
          </li>
        </ul>
      @endif
      </div>
      @if(isset($c)&&$count!=0)
      <div class="pull-right">
        <ul class="nav topcart pull-left">
          <li class="dropdown hover carticon ">
            <a href="/cart" class="dropdown-toggle" > Shopping Cart <span class="label label-orange font14">{{ $count }} item(s)</span> - Rs. {{ $sub }} <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
              <li>
                <table>
                  <tbody>
                  @foreach($c->products as $product)
                    <tr>
                    {{ Form::open(['url'=>'/cart/delete','method'=>'post']) }}
                        {{ Form::hidden('id',$product->id) }}
                      <td class="image"><a href="/product/{{ $product->pno }}"><img width="50" height="50" src="{{ $product->fimg }}" alt="product" title="product"></a></td>
                      <td class="name"><a href="/product/{{ $product->pno }}">{{ $product->title }}</a></td>
                      <td class="quantity">x&nbsp;{{ $product->pivot->qty }}</td>
                      <td class="total">Rs. {{ $product->price }}</td>
                      <td class="remove">
                        
                        {{ Form::submit('X',['class'=>'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <table>
                  <tbody>
                    <tr>
                      <td class="textright"><b>Sub-Total:</b></td>
                      <td class="textright">Rs. {{ $sub }}</td>
                    </tr>
                  </tbody>
                </table>
                <div class="well pull-right buttonwrap">
                  <a class="btn btn-orange" href="/cart">View Cart</a>
                  <a class="btn btn-orange" href="/checkout">Checkout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    @else
    <div class="pull-right">
        <ul class="nav topcart pull-left">
          <li class="dropdown hover carticon ">
            <a href="/cart" class="dropdown-toggle" > Shopping Cart <span class="label label-orange font14">0 item(s)</span> - Rs. 0 <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
              <li>
                <table>
                  <tbody>
                    The cart is empty. 
                  </tbody>
                </table>
                
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    @endif

    <div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a class="active"  href="/">Home</a>
          </li>
          <li>
          
          <a href="#">Categories</a>
            <div>
              <ul>
                @foreach($catnav as $cat)
                <li><a href="/categories/{{ $cat->name }}">{{$cat->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </li>
          <li><a href="/about">About Us</a>
          </li>
          <li><a href="/contact">Contact Us</a>
          </li>         
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- Header End -->
<div id="maincontainer">
<div class="container">
    @if(Session::has('danger'))
    <div class="errormsg alert">
            <a class="clostalert">close</a>
            <strong>{{ Session::get('danger') }}</strong> 
    </div>
    @endif
    @if(Session::has('success'))
    <div class="successmsg alert">
            <a class="clostalert">close</a>
            <strong>{{ Session::get('success') }}</strong> 
    </div>
    @endif
</div> 
@yield('content')
</div>
<!-- /maincontainer -->

<!-- Footer -->
<footer id="footer">
  <section class="footersocial">
    <div class="container">
      <div class="row">
        <div class="span3 aboutus">
          <h2>About Us </h2>
          We are premium manufacturer and seller of decorative candles and candle holders. We always try to lighten and brighten your home as well as your life with our intriguing collection of products. We are one of the largest online stores for candles and related products. We have developed our online shopping store specifically for India and thus we offer wide range of variety of products for Indian customers.
          <a href="/about">Read More...</a>
          </div>
        <div class="span3 contact">
          <h2>Contact Us </h2>
          <ul>
            
            <li class="mobile"> +919998668728</li>
            <li class="email"> candlestorein@gmail.com</li>
           
          </ul>
        </div>
        <div class="span3 twitter">
          <h2>Twitter </h2>
          <div id="twitter">
          </div>
        </div>
        <div class="span3 facebook">
          <h2>Facebook </h2>
          <div id="fb-root"></div>
          
        </div>
      </div>
    </div>
  </section>
  <section class="footerlinks">
    <div class="container">
      <div class="info">
        <ul>
          <li><a href="/refund-policy">Refund Policy</a>
          </li>
          <li><a href="/delivery-shipping-policy">Delivery and Shipping Policy</a>
          </li>
          <li><a href="/replacement-policy">Replacement Policy</a>
          </li>
          <li><a href="/disclaimer">Disclaimer</a>
          </li>
        </ul>
      </div>
      <div id="footersocial">
        <a href={{ Config::get('candlestore.facebook') }} title="Facebook" class="facebook">Facebook</a>
        <a href={{ Config::get('candlestore.twitter') }} title="Twitter" class="twitter">Twitter</a>
      </div>
    </div>
  </section>
  <section class="copyrightbottom">
    <div class="container">
      <div class="row">
        <div class="span6"> Made With <3 in India! </div>
        <div class="span6 textright"> CandleStore </div>
      </div>
    </div>
  </section>
  <a id="gotop" href="http://www.mafiashare.net">Back to top</a>
</footer>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{ HTML::script('store/js/jquery.js') }}
{{ HTML::script('store/js/bootstrap.js') }}
{{ HTML::script('store/js/respond.min.js') }}
{{ HTML::script('store/js/application.js') }}
{{ HTML::script('store/js/bootstrap-tooltip.js') }}
{{ HTML::script('store/js/jquery.fancybox.js') }}
{{ HTML::script('store/js/jquery.flexslider.js') }}
{{ HTML::script('store/js/jquery.tweet.js') }}
{{ HTML::script('store/js/cloud-zoom.1.0.2.js') }}
{{ HTML::script('store/js/jquery.validate.js') }}
{{ HTML::script('store/js/jquery.carouFredSel-6.1.0-packed.js') }}
{{ HTML::script('store/js/jquery.mousewheel.min.js') }}
{{ HTML::script('store/js/jquery.touchSwipe.min.js') }}
{{ HTML::script('store/js/jquery.ba-throttle-debounce.min.js') }}
{{ HTML::script('store/js/custom.js') }}
<!--
<script src="store/js/jquery.js"></script>
<script src="store/js/bootstrap.js"></script>
<script src="store/js/respond.min.js"></script>
<script src="store/js/application.js"></script>
<script src="store/js/bootstrap-tooltip.js"></script>
<script defer src="store/js/jquery.fancybox.js"></script>
<script defer src="store/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="store/js/jquery.tweet.js"></script>
<script  src="store/js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="store/js/jquery.validate.js"></script>
<script type="text/javascript"  src="store/js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="store/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="store/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="store/js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="store/js/custom.js"></script> -->
</body>
</html>