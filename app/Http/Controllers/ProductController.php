<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('publication_status',1)->get();
        $brands     = Brand::where('publication_status',1)->get();
        return view('admin.product.add-product',compact($categories,$brands,'categories','brands'));
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
    public function saveProduct(Request $request)
    {
      
        $product_image                     = $request->file('product_image');
        $imageName                         = $product_image->getClientOriginalName();
        //$directory                         = 'product-images/';
        $product_image->move(public_path('product-images/'),$imageName);

        $product = new Product();
        $product->category_id              = $request->category_id;
        $product->brand_id                 = $request->brand_id;
        $product->product_name             = $request->product_name;
        $product->product_price            = $request->product_price;
        $product->product_quantity         = $request->product_quantity;
        $product->short_desc               = $request->short_desc;
        $product->long_desc                = $request->long_desc;
        $product->product_image            = $imageName;
        $product->publication_status       = $request->publication_status;
        
        

        $product->save();
        return redirect()->back()->with('message',"Product Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function manageProduct(Product $product)
    {
        //$products = Product::all();
        $products = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','categories.add_category','brands.add_brand')
        ->get();
        return view('admin.product.manage-product',compact($products,'products'));
    }
    
    public function editProduct($id)
    {

        $product = Product::find($id);
        $categories = Category::where('publication_status',1)->get();
        $brands     = Brand::where('publication_status',1)->get();
        return view('admin.product.edit-product',compact($product,$categories,$brands,'product','categories','brands'));
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request,$id)
    {
            
            $product = Product::find($request->id);
            $product->category_id              = $request->category_id;
            $product->brand_id                 = $request->brand_id;
            $product->product_name             = $request->product_name;
            $product->product_price            = $request->product_price;
            $product->product_quantity         = $request->product_quantity;
            $product->short_desc               = $request->short_desc;
            $product->long_desc                = $request->long_desc;
            $product->publication_status       = $request->publication_status;
            //$product_image                     = $request->file('product_image');

          
            if($request->hasfile('product_image')){
               $old_image = $request->oldImage;
               $product_image                     = $request->file('product_image');
               $imageName                         = $product_image->getClientOriginalName();
               $product_image->move(public_path('product-images/'),$imageName);
               $product->product_image            = $imageName;
               unlink(public_path('product-images/').$old_image);
            }
            
            $product->save();
            return redirect()->back()->with('message',"Product Updated Successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message',"Data Deleted Successfully");
    }


    public function unpublishedProduct($id)
    {
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('/product/manage');
    }

    public function publishedProduct($id)
    {
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/product/manage');
    }

   
}
