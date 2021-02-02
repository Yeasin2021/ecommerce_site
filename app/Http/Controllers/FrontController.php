<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Brand;
use DB;
class FrontController extends Controller
{
    

    public function index()
    {
    	$categories = Category::where('publication_status',1)->get();

    	$products = Product::where('publication_status',1)->get();
        //$products = Product::with('categories')->where('publication_status',1)->paginate(5);
        
    	return view('front-end.home.home',compact($categories,$products,'categories','products'));
    }

  
     public function categoryProduct($categoryId)
    {
          $singleCategory = Category::find($categoryId);
          $products = $singleCategory->products;

          /*$singleBrand = Brand::find($brandId);
          $brands = $singleBrand->brands;*/
          
         //return $categories = Category::findOrFail($categoryId)->products;
         //return $category->products;

        // $products = Product::where('publication_status',1)->get();
        //$categoryProducts = Category::find('category_id',$categoryId)->products;
        return view('front-end.category.category-content',compact($products,'products',));
    }

    /*public function brandProduct($brandId)
    {
          $singleBrand = Brand::find($brandId);
          $brands = $singleBrand->brands;
          return view('front-end.category.category-content',compact($brands,'brands'));
    }*/


    public function productDetails($id)
    {
       $singleProduct = Product::find($id);
       $singleBrand = Brand::find($id);
       $category = Category::find($id);
       
      
      return view('front-end.product.products-details',compact($singleProduct,$singleBrand,$category,'singleProduct','singleBrand','category'));
    }

   /*public function addToCart()
    {
      return view('front-end.product.addToCart');
    }*/
}
