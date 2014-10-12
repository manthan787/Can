<?php


class Category extends Eloquent{

	protected $fillable=['name'];	
	public static $rules=['name'=>'required'];

	public function products(){
		return $this->hasMany('Product');
	}
}