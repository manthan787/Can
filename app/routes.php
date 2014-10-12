<?php


Route::get('/admin','CategoryController@index');
Route::get('/', ['as'=>'home','uses'=>'StoreController@getIndex']);
Route::get('/categories/{cat}','StoreController@getCategory');
Route::get('/product/{pno}','StoreController@getProduct');
Route::controller('/admin/categories','CategoryController');
Route::controller('admin/products','ProductController');
Route::controller('admin/orders','OrderController');
Route::controller('/cart','CartController');
Route::controller('/checkout','CheckoutController');
Route::get('/account/recover/{code}',['as'=>'account.recovery','uses'=>'AccountController@getRecovery']);
Route::controller('/account','AccountController');
/*
Route::get('/orders',function(){
	$p=Order::find(1);
	
		echo $p->name.' '.$p->address.'<br>' ;
		echo '<ul>';
		foreach($p->products as $pr){
			echo '<li>'.$pr->title.' '.$pr->pivot->qty.'</li>';


		}
		echo '</ul>';
	
});
Route::get('add',function(){
	$order=Order::find(1);
	$order->products()->attach(1,['qty'=>2]);
});
*/
