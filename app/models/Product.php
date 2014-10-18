<?php


class Product extends Eloquent{

	protected $fillable=['title','description','price','category_id','availability','fimg','img2','img3','img4','img5'];
	public static $rules=
	[
		'pno'=>'required|unique:products',
		'title'=>'required',
		'description'=>'required|min:10',
		'price'=>'required',
		'category_id'=>'required',
		'fimg'=>'required|image|mimes:jpeg,jpg,png,gif',
	    'img2'=>'image|mimes:jpeg,jpg,png,gif',
	    'img3'=>'image|mimes:jpeg,jpg,png,gif',
	    'stock'=>'numeric'
	];

	public static $editrules=
	[
		'pno'=>'required',
		'title'=>'required',
		'description'=>'required|min:10',
		'price'=>'required',
		'category_id'=>'required',
		'fimg'=>'image|mimes:jpeg,jpg,png,gif',
	    'img2'=>'image|mimes:jpeg,jpg,png,gif',
	    'img3'=>'image|mimes:jpeg,jpg,png,gif',
	    'stock'=>'numeric'
	];
	public function checkStock($qty){
		if($qty>$this->stock)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	public function category(){

		return $this->belongsTo('Category');
	}

	public static function getFeatured(){
		$featured=Product::all()->random(4);
		Cache::put('feat',$featured,30);
		return $featured;

	}

	public static function getRecent(){
		$recent=Product::take(4)->orderBy('created_at','DESC')->get();
		Cache::put('recent',$recent,30);
		return $recent;
	}

	public function getRelated(){
		$product=Product::where('category_id',$this->category_id)->take(4)->get();
		if($product->count()<4){
			$product=Product::all()->random(4);
		}
		return $product;
	}
}