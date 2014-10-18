<?php 

class StoreController extends BaseController{

	public function getIndex(){
		$featured=Product::getFeatured();
		$recent=Product::getRecent();
		return View::make('store.index')->with('featured',$featured)->with('recent',$recent);
	}

	public function getCategory($cat){
		$cat=Category::where('name',$cat)->first();
		if($cat){
			$products=Product::where('category_id',$cat->id)->get();
			return View::make('store.category')->with('cat',$cat)->with('products',$products);
		}
		else{
		return Redirect::to('/');
	    }
	}

	public function getProduct($pno){
		$product=Product::where('pno',$pno)->first();
		if($product){
			$rel=Product::take(4);
			return View::make('store.product')->with('product',$product)->with('rel',$rel);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function getRefundPolicy(){
		return View::make('store.refund');
	}

	public function getReplacementPolicy(){
		return View::make('store.replacement');
	}	

	public function getDeliveryPolicy(){
		return View::make('store.delivery');
	}

	public function getAbout(){
		return View::make('store.about');
	}

	public function getDisclaimer(){
		return View::make('store.disclaimer');
	}

	public function getContact(){
		return View::make('store.contact');
	}

	public function postContact(){
		$v=Validator::make(Input::all(),['name'=>'required|min:3','email'=>'required|email','subject'=>'required|min:5','message'=>'required|min:10']);
		if($v->passes()){
			$name=Input::get('name');
			$email=Input::get('email');
			$subject=Input::get('subject');
			$m=Input::get('message');
			Mail::send('emails.contact',['name'=>$name,'email'=>$email,'subject'=>$subject,'m'=>$m],function($message)
				{
					$message->to('candlestorein@gmail.com','CandleStore')->subject('Contact Us: New Message');
				});
			return Redirect::back()->with('success','We have recieved your message. We will respond to your message as soon as possible. Thank you for connecting with us.');
		}
		else
		{
			return Redirect::back()->withInput()->withErrors($v);
		}
	}
}