
@extends('admin.master')

@section('body')

                                           <div class="offset-1 col-lg-10">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Product</strong> Form
                                                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                    </div>

                                                    <div class="card-body card-block">
                                                      <form action="{{route('update-product',['id' =>$product->id])}}" method="post"  enctype="multipart/form-data" name="editForm">@csrf
                                                        <input type="hidden" name="oldImage" value="{{$product->product_image}}">
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Category Name</label></div>
                                                                <div class="col-12 col-md-9"><select class="form-control" name="category_id">
                                                                    @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->add_category}}</option>
                                                                    @endforeach
                                                                </select></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Brand Name</label></div>
                                                                <div class="col-12 col-md-9"><select class="form-control" name="brand_id">
                                                                    @foreach($brands as $brand)
                                                                    <option value="{{$brand->id}}">{{$brand->add_brand}}</option>
                                                                    @endforeach
                                                                </select></div>
                                                            </div>
                                                              <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Product Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="product_name" class="form-control" value="{{$product->product_name}}" required=""><span class="help-block"></span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Product Price</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="product_price" class="form-control" value="{{$product->product_price}}" required=""><span class="help-block"></span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Product Quantity</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="product_quantity" class="form-control" value="{{$product->product_quantity}}" required=""><span class="help-block"></span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Short Description</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="short_desc" class="form-control" value="{{$product->short_desc}}" required=""><span class="help-block"></span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Long Description</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="long_desc" class="form-control" value="{{$product->long_desc}}" required=""><span class="help-block"></span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Product Image</label></div>
                                                                <div class="col-12 col-md-9"><input type="file"  name="product_image" class="form-control" value="{{$product->product_image}}">
                                                                    <br><img src="/product-images/{{$product->product_image}}" height="150px" weight="200px"><span class="help-block"></span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Publication Status</label>
                                                             </div>
                                                           
                                                           <div class="col col-md-9">
                                                                        <div class="form-check-inline form-check">
                                                                            <label for="inline-radio1" class="form-check-label ">
                                                                                <input type="radio"  name="publication_status" value="1" {{$product->publication_status == 1 ? 'checked':''}} class="form-check-input" required="">Published
                                                                            </label>
                                                                            <label for="inline-radio2" class="form-check-label ">
                                                                                <input type="radio"  name="publication_status" value="0" {{$product->publication_status == 0 ? 'checked':''}} class="form-check-input" required="">Unpublished
                                                                            </label>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        
                                                    </div>
                                                    <!--<div class="card-footer">
                                                    	<input type="submit" class="btn btn-primary btn-sm" name="btn">
                                                    </div>-->
                                                    <div class="card-footer">
                                                    	
                                                        <button type="submit" class="btn btn-primary btn-sm" name="btn">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        
                                                    </div>
                                                  </form>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                document.forms['editForm'].elements['category_id'].value='{{$product->category_id}}';
                                                document.forms['editForm'].elements['brand_id'].value='{{$product->brand_id}}';
                                            </script>

@endsection