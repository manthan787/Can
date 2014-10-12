<?php


class CategoryController extends BaseController{

	public function __construct(){
		$this->beforeFilter('csrf',['on'=>'post']);
		$this->beforeFilter('admin');
	}

	public function index(){
		return View::make('admin.index');
	}

	public function getIndex(){
		$categories=Category::with('products')->get();
		return View::make('admin.categories.index')->with('categories',$categories);
		if($id){

		}
	}

	public function getProducts($id){
		$cat=Category::with('products')->where('id',$id)->first();
		if($cat){
			$count=$cat->products->count();
			return View::make('admin.categories.products')->with('cat',$cat)->with('count',$count);
		}
		return Redirect::to('admin/categories')->with('warning','The Category Does Not Exist!');
	}

	public function getAdd(){
		$categories=Category::all();
		return View::make('admin.categories.add')->with('categories',$categories);
	}

	public function postAdd(){
		$validator=Validator::make(Input::all(),Category::$rules);
		if($validator->passes()){
			$category=new Category;
			$category->name=Input::get('name');
			$category->save();
			return Redirect::to('/admin/categories/add')->with('success','Category Successfully Added!');
		}
		return Redirect::back()->withInput()
		->withErrors($validator)
		->with('warning','There has been a problem while adding a new category. Please try again.');
	}

	public function getEdit($id){
		$cat=Category::find($id);
		if($cat){
			return View::make('admin.categories.edit')->with('cat',$cat);
		}
		return Redirect::to('admin/categories')->with('warning','There has been a problem while performing this action. Please Try Again Later. ');
	}
	
	public function postEdit($id){
		
		$validator=Validator::make(Input::all(),Category::$rules);
		if($validator->passes())
		{
			$cat=Category::find($id);
			if($cat){
			$cat->name=Input::get('name');
			$cat->save();
			return Redirect::to('admin/categories')->with('success','Category Edited Successfully!');
			}
			else{
				return Redirect::back()->with('warning','There has been a problem while performing this action!');

		   	}
		}
		return Redirect::back()->with('warning','Check the errors and try again.')
		    ->withErrors($validator)->withInput();
		
		
	}

	public function postDelete(){
		$id=Input::get('id');
		$cat=Category::find($id);
		if($cat){
			$cat->delete();
			return Redirect::to('admin/categories')->with('success','Category Successfully Deleted!');
		}
		return Redirect::back()->with('warning','The Category Does Not Exist!');
	}

}
