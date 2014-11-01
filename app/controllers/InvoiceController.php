<?php

class InvoiceController extends BaseController{
	

	public function getIndex($oid){
		$order=Order::find($oid);
		//return PDF::load(View::make('invoice.invoice')->with('order',$order),'A4','Portrait')->show();
		define('BUDGETS_DIR', public_path('uploads/invoice')); // I define this in a constants.php file

		if (!is_dir(BUDGETS_DIR)){
    		mkdir(BUDGETS_DIR, 0755, true);
		}

		$outputName = str_random(10); // str_random is a [Laravel helper](http://laravel.com/docs/helpers#strings)
		$pdfPath = BUDGETS_DIR.'/'.$outputName.'.pdf';
		File::put($pdfPath, PDF::load(View::make('invoice.invoice')->with('order',$order), 'A4', 'portrait')->output());
		
		Mail::send('emails.pdf', ['firstname'=>$order->firstname], function($message) use ($pdfPath,$order){
    		$message->from('candlestorein@gmail.com', 'CandleStore Invoice');
    		$message->to($order->email);
    		$message->attach($pdfPath);
		});

		return Redirect::to('/')->with('success','Thank your for purchasing! You shall receive an email with the Invoice. ');
	}	
}