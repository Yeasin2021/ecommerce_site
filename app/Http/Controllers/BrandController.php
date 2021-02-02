<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    //public $id = Brand::all();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.add-brand');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->add_brand             = $request->brand_name;
        $brand->description_brand     = $request->brand_description;
        $brand->publication_status    = $request->publication_status;
        $brand->save();
        //Brand::create($request->all());
        return redirect()->back()->with('message',"Brand Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $brands = Brand::all();
        return view('admin.brand.manage-brand',compact($brands,'brands'));
    }



    public function unpublishedBrand($id)
    {
        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('/brand/manage');
    }

    public function publishedBrand($id)
    {
        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('/brand/manage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand',compact($brand,'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->add_brand             = $request->brand_name;
        $brand->description_brand     = $request->brand_description;
        $brand->publication_status    = $request->publication_status;
        $brand->save();
        //Brand::create($request->all());
        return redirect('/brand/manage')->with('message',"Brand Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand,$id)
    {

       $brand = Brand::find($id);
       $brand->delete();
       return redirect('/brand/manage')->with('message',"Brand Deleted Successfully");
    }
}
