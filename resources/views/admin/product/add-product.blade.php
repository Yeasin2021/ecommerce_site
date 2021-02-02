
@extends('admin.master')

@section('body')


	<div class="offset-1 col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Category Select</strong>
                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            </div>
                            <div class="card-body col-md-8">
                                <form action="{{route('new-product')}}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group row">

								  	<label class="control-label col-md-3">Category Name</label>
								  	<div class="col-md-9">
								  		<select class="form-control" name="category_id">
								  			<option>-----Select Category-----</option>
								  			@foreach($categories as $category)
								  			<option value="{{$category->id}}">{{$category->add_category}}</option>
								  			@endforeach
								  		</select>
								  	</div>
								  </div>

								  <div class="form-group row">
								  	<label class="control-label col-md-3">Brand Name</label>
								  	<div class="col-md-9">
								  		<select class="form-control" name="brand_id">
								  			<option>-----Select Brand-----</option>
								  			@foreach($brands as $brand)
								  			<option value="{{$brand->id}}">{{$brand->add_brand}}</option>
								  			@endforeach
								  		</select>
								  	</div>
								  </div>

								  <div class="form-group row">
								  	<label class="control-label col-md-3">Product Name</label>
								  	<div class="col-md-9">
								      <input type="text" class="form-control" name="product_name">
								  	</div>
								  </div>

								   <div class="form-group row">
								  	<label class="control-label col-md-3">Product Price</label>
								  	<div class="col-md-9">
								      <input type="text" class="form-control" name="product_price">
								  	</div>
								  </div>

								   <div class="form-group row">
								  	<label class="control-label col-md-3">Product Quantity</label>
								  	<div class="col-md-9">
								      <input type="text" class="form-control" name="product_quantity">
								  	</div>
								  </div>

								   <div class="form-group row">
								  	<label class="control-label col-md-3">Short Description</label>
								  	<div class="col-md-9">
								     <textarea class="form-control" name="short_desc" row="2"></textarea>
								  	</div>
								  </div>

								   <div class="form-group row">
								  	<label class="control-label col-md-3">Long Description</label>
								  	<div class="col-md-9">
								       <textarea id="editor" class="form-control" name="long_desc" row="5"></textarea>
								  	</div>
								  </div>

								   <div class="form-group row">
								  	<label class="control-label col-md-3">Product Image</label>
								  	<div class="col-md-9">
								      <input type="file"  name="product_image">
								  	</div>
								  </div>
                                  <div class="row form-group">
                                     <div class="col col-md-3"><label class=" form-control-label">Publication Status</label>
                                      </div>
                                                           
                                        <div class="col col-md-9">
                                             <div class="form-check-inline form-check ">
                                                <label for="inline-radio1" class="form-check-label ">
                                                  <input type="radio"  name="publication_status" value="1" class="form-check-input" required="">Published
                                                  </label>
                                                  <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio"  name="publication_status" value="0" class="form-check-input" required="">Unpublished
                                                    </label>
                                                                            
                                                     </div>
                                                    </div>
                                        </div>
                                                    	
                                       <button type="submit" class="btn btn-primary btn-sm" name="btn">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                      <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                            <i class="fa fa-ban"></i> Reset
                                      </button>
                                   
                                
                            </div></form>
                        </div>
    </div>    
  
  

@endsection