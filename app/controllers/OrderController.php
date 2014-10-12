<?php

class OrderController extends BaseController{

	public function __construct()
	{
		$user=User::find(1);
		Auth::login($user);
		$this->beforeFilter('admin');
		$this->beforeFilter('csrf',['on'=>'post']);
	}

	public function getIndex()
	{
		$orders=Order::where('c',1)->where('status',0)->orderBy('created_at','DESC')->get();
		return View::make('admin.orders.index')->with('orders',$orders);
	}

	public function getDetails($oid){

		$order=Order::find($oid);
		$total=$order->calculateTotal();
		return View::make('admin.orders.details')->with('order',$order)->with('total',$total);
	}

	public function getToday(){
		$orders=Order::where('created_at','>=',date('Y-m-d').' 00:00:00')->where('c',1)->where('status',0)->orderBy('created_at','DESC')->get();
		return View::make('admin.orders.today')->with('orders',$orders);
	}

	public function getUpdate(){
		if(Input::get('oid'))
		{
			$oid=Input::get('oid');
			$order=Order::where('id',$oid)->first();
			return View::make('admin.orders.update')->with('order',$order);
		}
		else
		{
			return View::make('admin.orders.update');
		}
	}

	public function postUpdate(){
		$oid=Input::get('oid');
		$order=Order::find($oid);
		if($order->changeStatus())
		{
			return Redirect::back()->with('success','Order Status Changed');
		}
		else
		{
			return Redirect::back()->with('danger','The operation could not be performed. Please Try Again Later.');
		}
	}
}