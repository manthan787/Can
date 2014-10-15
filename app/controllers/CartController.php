<?php


class CartController extends BaseController {


	public function getIndex(){
			return View::make('store.cart');
	}

	public function postAdd(){
		$validator=Validator::make(Input::all(),['qty'=>'required']);
		if($validator->passes())
		{
				$id=Input::get('id');
				$qty=Input::get('qty');
				if(!Session::has('cart')&&!Auth::check())
				{
					$order=new Order;
					$order->save();
					Session::put('cart',$order->id);
				}
				else if(Auth::check())
				{
					$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();
					if(!$order)
					{
						$order=new Order;
						$order->user_id=Auth::user()->id;
						$order->save();
					}

				}
				else if(Session::has('cart'))
				{
					$order=Order::find(Session::get('cart'));
				}
				$product=Product::find($id);
				if($product->checkStock($qty))
				{
					if($r=$order->isUnique($id,$qty)){
						if($r==1){
							return Redirect::back()->with('success','Product Successfully Added To Your Cart.');
						}
						else
						{
							return Redirect::back()->with('danger','Sorry! We have only '.$product->stock.' units of this product in stock right now.');
						}

					}
					else{
					$order->products()->attach($id,['qty'=>$qty]);
					return Redirect::back()->with('success','Product Successfully Added To Your Cart.');
					}
				}
				else
				{
					return Redirect::back()->with('danger','Sorry! We have only '.$product->stock.' units of this product in stock right now.');
				}
		}
		else{
			return Redirect::back()->withErrors($validator)->with('danger','Whoops! You forgot something.');
		}
	}

	public function postDelete(){
		$pid=Input::get('id');
		if(Auth::check()){
			$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();
			
		}
		else if(Session::has('cart')){
			$order=Order::find(Session::get('cart'));
			
		}
		if(isset($order)){
			$order->products()->detach($pid);
			return Redirect::to('/cart')->with('success','Product has been successfully removed from your cart.');
		}
	}


}