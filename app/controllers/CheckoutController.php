<?php 
require_once 'payu.php';

class CheckoutController extends BaseController{
	
	
	public function getIndex()
	{
		
		if(Session::has('cart')&& !Auth::check())
			{
				$id=Session::get('cart');
				$order=Order::where('id',$id)->where('c',0)->first();
				
				
			}
			elseif(Auth::check())
			{
				$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();

			}
		if(isset($order)){

			if($order->isExclusive())
			{	
				if(!Auth::check())
				{
					return View::make('store.checkout.index');
				}
				else
				{
					return Redirect::to('/checkout/info');
				}
			}
				else
				{
					return Redirect::back()->with('danger','Sorry! One or more products in your cart have gone out of stock. Those product(s) can not be processed right now.');
				}
		}
		else
		{
			if(!Auth::check())
				{
					return View::make('store.checkout.index');
				}
				else
				{
					return Redirect::to('/checkout/info');
				}
		}
	}

	public function postChoice(){
		if(Input::get('coption')=='guest')
		{
			return Redirect::to('/checkout/info');
		}
		else
		{
			return Redirect::to('/account/create');
		}
	}

	public function postLogin()
	{
		
			$v=Validator::make(Input::all(),['email'=>'required|email','password'=>'required']);
			if($v->passes())
			{
				if(Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')]))
				{
					if(Session::has('cart'))
					{
						$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();
						if(isset($order))
						{
							$order->abandoned=1;
							$order->save();
						}
						$o=Order::find(Session::get('cart'));
						$o->user_id=Auth::user()->id;
						$o->save();
						Session::forget('cart');
						return Redirect::to('/checkout/info');
				    }
				}
				else
				{
					return Redirect::back()->with('danger','Invalid Email/Password Combination');
				}
			}
			else
			{
				return Redirect::back()->with('danger','Oops! Can not log you in.')
				->withErrors($v)
				->withInput();
			}
		
	}

	public function getInfo()
	{
	
			$states=State::lists('state','id');
			if(Auth::check()){
				$user=User::find(Auth::user()->id);
			 	return View::make('store.checkout.info')->with('user',$user)->with('states',$states);
			}
			else{
				return View::make('store.checkout.info')->with('states',$states);
			}

	}

	public function postInfo()
	{
		$v=Validator::make(Input::all(),Order::$rules);
		if($v->passes()){
			if(Auth::check()){
				$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();
			}
			else if(Session::has('cart')){
				$order=Order::find(Session::get('cart'));
			}
			$order->firstname=Input::get('firstname');
			$order->lastname=Input::get('lastname');
			$order->email=Input::get('email');
			$order->phone=Input::get('phone');
			$order->address=Input::get('address');
			$order->city=Input::get('city');
			$order->PIN=Input::get('PIN');
			$order->state_id=Input::get('state');
			$order->save();
			return Redirect::to('/checkout/payment');
		}
		return Redirect::back()->with('danger','There has been a problem while submitting your details.')
		->withErrors($v)
		->withInput();
	}

	public function getPayment(){
		return	View::make('store.checkout.method');
	}
	public function postPayment(){
		if(Auth::check()){
				$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();
			}
			else if(Session::has('cart')){
				$order=Order::find(Session::get('cart'));
			}
		if(Input::get('coption')=='CARD') {
			$payment = new Payment('nAm7IhGH', 'prod');
			$params = array ('key' => 'xgRct3', 'txnid' => $order->id, 'amount' => $order->calculateTotal(),
			'firstname' => $order->firstname, 'email' => $order->email, 'phone' => $order->phone,
			'productinfo' => 'Candle Store Product!', 'surl' => 'payment_success', 'furl' => 'payment_failure');

			$result = $payment->pay($params);
			if($result['status'] == 1)
			{
				return Redirect::to($result['data']);
		}	}
			
			/*if($order->updateStock()){
				if($order->save())
				{
				
					Session::forget('cart');
					return Redirect::to('/i/'.$order->id);
				}
				else
				{	
					return Redirect::to('/')->with('danger','Looks like something went wrong. Please Try Again!');
				}
			}
			else{
				return Redirect::to('/')->with('danger','Looks like something went wrong. Please Try Again!');
			
			}*/

		}
		
	}
}