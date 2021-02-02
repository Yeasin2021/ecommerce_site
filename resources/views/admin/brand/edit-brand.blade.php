
@extends('admin.master')

@section('body')

                                           <div class="offset-1 col-lg-10">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Category</strong> Form
                                                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                    </div>

                                                    <div class="card-body card-block">
                                                      <form action="{{route('update-brand',['id' =>$brand->id])}}" method="post" >@csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Add Category</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="brand_name" class="form-control" value="{{$brand->add_brand}}" required=""><span class="help-block">Please enter your Category</span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="brand_description" class="form-control" value="{{$brand->description_brand}}" required=""><span class="help-block">Fill Up description</span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Publication Status</label>
                                                             </div>
                                                           
                                                           <div class="col col-md-9">
                                                                        <div class="form-check-inline form-check">
                                                                            <label for="inline-radio1" class="form-check-label ">
                                                                                <input type="radio"  name="publication_status" value="1" {{$brand->publication_status == 1 ? 'checked':''}} class="form-check-input" required="">Published
                                                                            </label>
                                                                            <label for="inline-radio2" class="form-check-label ">
                                                                                <input type="radio"  name="publication_status" value="0" {{$brand->publication_status == 0 ? 'checked':''}} class="form-check-input" required="">Unpublished
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

@endsection