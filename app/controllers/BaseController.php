<?php

class BaseController extends Controller {

	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function __construct(){
		$this->beforeFilter(function(){
			View::share('catnav',Category::all());

		});

		$this->beforeFilter(function(){
			
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
				View::share('c',$order);
				$c=0;
				$sub=0;
				foreach($order->products as $product){
					$sub+=($product->price)*($product->pivot->qty);
					$c+=$product->pivot->qty;
				}
				View::share('sub',$sub);
				View::share('count',$c);
			}
		});
		
	}

}
