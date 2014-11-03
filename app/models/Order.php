<?php

class Order extends Eloquent{

	public static $rules=['firstname'=>'required',
	'lastname'=>'required',
	'email'=>'required|email',
	'address'=>'required|min:5',
	'phone'=>'required|numeric',
	'PIN'=>'required|numeric',
	'city'=>'required'

	];
	
	public function products(){

		return $this->belongsToMany('Product','order_product')->withPivot('qty');
	}

	public function isUnique($pid,$q){
		$data=DB::table('order_product')->where('order_id',$this->id)->where('product_id',$pid)->first();
		$product=Product::find($pid);
		if($data){
			$qty=DB::table('order_product')->where('order_id',$this->id)->where('product_id',$pid)->select('qty')->get();
			if($qty){
			$q=$q+$qty[0]->qty;	
			}	
			if($product->checkStock($q))
			{
				DB::table('order_product')->where('order_id',$this->id)->where('product_id',$pid)->update(['qty'=>$q]);
				return 1;
			}
			else{
				return 2;
			}
		}
		else{
			return 0;
		}
	}

	public function state(){
		return $this->belongsTo('State');
	}

	public function calculateTotal(){
		$total=0;
		foreach($this->products as $product)
		{
			$total+=($product->price)*($product->pivot->qty);
		}
		return $total;
	}

	public function changeStatus(){
		if($this->status==1)
		{
			$this->status=0;
			$this->save();
		}
		else
		{
			$this->status=1;
			$this->save();
		}
		return 1;
	}

	public function updateStock()
	{
		
		foreach($this->products as $product)
		{
			$product->stock=($product->stock) - ($product->pivot->qty);
			if(!$product->save())
			{
				return 0;
			}
		}
		return 1;
	}

	
}