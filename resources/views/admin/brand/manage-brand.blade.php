@extends('admin.master')

@section('body')


  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Brand Table</strong>
                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SI. NO</th>
                                            <th>Brand Name</th>
                                            <th>Brand Description</th>
                                            <th>Published Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@php($i=1)
                                    	@foreach($brands as $brand)
                                        <tr>
                                        	<td>{{$i++}}</td>
                                            <td>{{$brand->add_brand}}</td>
                                            <td>{{$brand->description_brand}}</td>
                                            <td>{{$brand->publication_status == 1?'published':'unpublished'}}</td>
                                            <td>
                                            	@if($brand->publication_status == 1)
                                            	<a href="{{route('unpublished-brand',['id' => $brand->id])}}" class="btn btn-info"><span><i class="fa fa-arrow-up"></i></span></a>
                                            	@else
                                            	<a href="{{route('published-brand',['id' => $brand->id])}}" class="btn btn-warning"><span><i class="fa fa-arrow-down"></i></span></a>
                                            	@endif
                                            	<a href="{{route('edit-brand',['id' => $brand->id])}}" class="btn btn-success"><span><i class="fa fa-edit"></i></span></a>
                                            	<a href="{{route('delete-brand',['id' => $brand->id])}}" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
    </div><!-- .content -->

@endsection