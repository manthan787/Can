<?php 


class StoreController extends BaseController{

	public function getIndex(){

		return View::make('store.index');
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
}