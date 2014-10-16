<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	public static $rules=[
				'firstname'=>'required|min:2',
				'lastname'=>'required|min:2',
				'email'    		=>'required|email|unique:users',
				'phone' 		=>'required|numeric',
				'password' 		=>'required',
				'password_confirm'=>'same:password|required',
				'address'=>'required|min:5',
				'phone'=>'required|numeric',
				'PIN'=>'required|numeric',
				'city'=>'required'
				
	];
	public function state(){
		return $this->belongsTo('State');
	}

	public function orders(){
		return $this->hasMany('Order');
	}

	public function getOrders(){
		$orders=Order::where('user_id',$this->id)->where('c',1)->get();
		return $orders;
	}

}
