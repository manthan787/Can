<?php

class ProductController extends BaseController{
	

	public function __construct(){
		//Auth::logout();
		$this->beforeFilter('admin');
		$this->beforeFilter('csrf',['on'=>'post']);
	}

	public function getIndex(){
		$products=Product::with('category')->orderBy('created_at','DESC')->get();
		$count=$products->count();
		return View::make('admin.products.index')->with('products',$products)->with('count',$count);
	} 

	public function getAdd(){
		$products=Product::all();
		$categories=Category::lists('name','id');
		return View::make('admin.products.add')->with('products',$products)->with('categories',$categories);
	}

	public function postAdd(){

		$validator=Validator::make(Input::all(),Product::$rules);

			if($validator->passes())
			{
					
					$product=new Product;
					$product->pno=Input::get('pno');
					$product->title=Input::get('title');
					$product->description=Input::get('description');
					$product->category_id=Input::get('category_id');
					$product->price=Input::get('price');
					$product->stock=Input::get('stock');
					$img=Input::file('fimg');
					
					$filename=date('y-m-d-H:i:s').'-'.$img->getClientOriginalName();
					$path = public_path('products/' . $filename);
					Image::make($img->getRealPath())->save($path);
					$product->fimg='/products/'.$filename;
				

					if(Input::file('img2')){
					$img2=Input::file('img2');
					$filename=date('y-m-d-H:i:s').'-'.$img2->getClientOriginalName();
					$path = public_path('products/' . $filename);
					Image::make($img2->getRealPath())->save($path);
					$product->img2='/products/'.$filename;
					
					}

					if(Input::file('img3')){
					$img3=Input::file('img3');
					$filename=date('y-m-d-H:i:s').'-'.$img3->getClientOriginalName();
					$path = public_path('products/' . $filename);
					Image::make($img3->getRealPath())->save($path);
					$product->img3='/products/'.$filename;
					
					}
					$product->save();



					return Redirect::to('/admin/products/add')->
					with('success', 'Product Successfully Added!');
		
			}
		return Redirect::to('admin/products/add')->
		with('warning', 'There has been a problem while adding this product')->
		withErrors($validator)->withInput();

	}

	public function getEdit($id){
		$product=Product::find($id);
		if($product){
			$categories=Category::lists('name','id');
			return View::make('admin.products.edit')->with('product',$product)->with('categories',$categories);
		}
		else{
			return Redirect::to('/admin/products')->with('warning','Oops! Sorry. Can not perform this task for you!');
		}
	}

	public function patchEdit($id){
		$validator=Validator::make(Input::all(), Product::$editrules);
			if($validator->passes())
			{
					$product=Product::find($id);
					$product->pno=Input::get('pno');
					$product->title=Input::get('title');
					$product->description=Input::get('description');
					$product->category_id=Input::get('category_id');
					$product->price=Input::get('price');
					$product->stock=Input::get('stock');

					$img=Input::file('fimg');
					if($img){
					$filename=date('y-m-d-H:i:s').'-'.$img->getClientOriginalName();
					$path = public_path('products/' . $filename);
					Image::make($img->getRealPath())->save($path);
					$product->fimg='/products/'.$filename;
					}

					if(Input::file('img2')){
					$img2=Input::file('img2');
					$filename=date('y-m-d-H:i:s').'-'.$img2->getClientOriginalName();
					$path = public_path('products/' . $filename);
					Image::make($img2->getRealPath())->save($path);
					$product->img2='/products/'.$filename;
					
					}

					if(Input::file('img3')){
					$img3=Input::file('img3');
					$filename=date('y-m-d-H:i:s').'-'.$img3->getClientOriginalName();
					$path = public_path('products/' . $filename);
					Image::make($img3->getRealPath())->save($path);
					$product->img3='/products/'.$filename;
					
					}
					$product->save();



					return Redirect::to('/admin/products/')->
					with('success', 'Product Successfully Edited!');
		
			}
		return Redirect::to('admin/products/edit/'.$id)->
		with('warning', 'There has been a problem while adding this product')->
		withErrors($validator)->withInput();

	}

	public function postDelete(){
			$id=Input::get('id');
			$product=Product::find($id);
		if($product){
			$product->delete();
			return Redirect::to('admin/products')->with('success','Product Successfully Deleted!');
		}
		return Redirect::back()->with('warning','The Product Does Not Exist!');
	}

}