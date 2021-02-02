
@extends('admin.master')

@section('body')

                                           <div class="offset-1 col-lg-10">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Category</strong> Form
                                                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                    </div>

                                                    <div class="card-body card-block">
                                                      <form action="{{route('new-category')}}" method="post" enctype="multipart/form-data">@csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Add Category</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="catagory_name" class="form-control" required=""><span class="help-block">Please enter your Category</span></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><input type="text"  name="category_description" class="form-control" required=""><span class="help-block">Fill Up description</span></div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-md-3">Category Image</label>
                                                                <div class="col-md-9">
                                                                  <input type="file"  name="category_image" required="">
                                                            </div>
                                                          </div>
                                                            <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Publication Status</label>
                                                             </div>
                                                           
                                                           <div class="col col-md-9">
                                                                        <div class="form-check-inline form-check">
                                                                            <label for="inline-radio1" class="form-check-label ">
                                                                                <input type="radio"  name="publication_status" value="1" class="form-check-input" required="">Published
                                                                            </label>
                                                                            <label for="inline-radio2" class="form-check-label ">
                                                                                <input type="radio"  name="publication_status" value="0" class="form-check-input" required="">Unpublished
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
                                                        <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                  </form>
                                                </div>
                                            </div>

@endsection