@extends('admin.layouts.main')
@section('title')
Admin Panel
@stop

@section('content')
	<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Categories</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Category</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($categories as $category)
                              <tr>
                                  <td><a href="/admin/categories/products/{{ $category->id }}">{{ $category->name }}</a></td>
                                  <td class="hidden-phone"></td>
                                  <td>
                                      {{ Form::open(['url'=>'/admin/categories/delete','method'=>'post']) }}
                                       <a href="/admin/categories/edit/{{ $category->id }}"><i class="fa fa-pencil"></i></a>
                                     {{ Form::hidden('id',$category->id) }}
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      {{ Form::close() }}
                                     </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
@stop