<?php


class Product extends Eloquent{

	protected $fillable=['title','description','price','category_id','availability','fimg','img2','img3','img4','img5'];
	public static $rules=
	[
		'pno'=>'required',
		'title'=>'required',
		'description'=>'required|min:10',
		'price'=>'required',
		'category_id'=>'required',
		'fimg'=>'required|image|mimes:jpeg,jpg,png,gif',
	    'img2'=>'image|mimes:jpeg,jpg,png,gif',
	    'img3'=>'image|mimes:jpeg,jpg,png,gif',
	];

	public function category(){

		return $this->belongsTo('Category');
	}
}