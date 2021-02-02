@extends('admin.master')

@section('body')


  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Category Table</strong>
                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            </div>
                            <div class="table-responsive-md">
                                <table id="bootstrap-data-table-export" class="table">
                                    <thead>
                                        <tr>
                                            <th>SI. NO</th>
                                            <th>Category Name</th>
                                            <th>Brand Name</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                            <th>Short Description</th>
                                            <th>Long Description</th>
                                            <th>Product Image</th>
                                            <th>Published Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@php($i = 1)
                                    	@foreach($products as $product)
                                        <tr>
                                        	<td>{{$i++}}</td>
                                            <td>{{$product->add_category}}</td>
                                            <td>{{$product->add_brand}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_price}}</td>
                                            <td>{{$product->product_quantity}}</td>
                                            <td>{{$product->short_desc}}</td>
                                            <td>{{$product->long_desc}}</td>
                                            <td><img src="/product-images/{{$product->product_image}}"></td>
                                            <td>{{$product->publication_status == 1?'published':'unpublished'}}</td>
                                            <td>
                                            	@if($product->publication_status == 1)
                                            	<a href="{{route('unpublished-brand',['id' => $product->id])}}" class="btn btn-info"><span><i class="fa fa-arrow-up"></i></span></a>
                                            	@else
                                            	<a href="{{route('published-brand',['id' => $product->id])}}" class="btn btn-warning"><span><i class="fa fa-arrow-down"></i></span></a>
                                            	@endif
                                            	<a href="{{route('edit-product',['id' => $product->id])}}" class="btn btn-success"><span><i class="fa fa-edit"></i></span></a>
                                            	<a href="{{route('delete-product',['id' => $product->id])}}" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>
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