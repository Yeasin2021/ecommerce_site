<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Brand;
use Cart;
use DB;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request,$id)
    {
    	//return $request->all();
    	$product   = Product::find($request->product_id);
    	$brand     = Brand::find($request->product_id);
    	$category  = Category::find($request->product_id);
    	Cart::add([
		    'id' => $product->id, // inique row ID
		    'name' => $product->product_name,
		    'price' => $product->product_price,
		    'quantity' => $request->qty,
		    'attributes' => [
		         "product_image" => $product->product_image,
		         "brand_name" => $brand->add_brand,
		         "category" => $category->add_category,
		         'qty' => $request->qty,
		    ]
		]);
		    //$product = Cart::get($id);
		    $items =  Cart::getContent();

            $sum = 0;
            foreach ($items as $item) {
            	$sum+=$item->attributes->qty * $item->price;
            }
		    
	    	
	        return view('front-end.product.addToCart',compact($items,$sum,'items','sum'));
    }

    /*public function showCart()
    {
       
            $items =  Cart::getContent();

            $sum = 0;
            foreach ($items as $item) {
                $sum+=$item->attributes->qty * $item->price;
            }
      return view('front-end.product.addToCarts',compact($items,$sum,'items','sum'));

    }*/


    public function cartItemRemove($id)
    {
       
      Cart::remove($id);
      $items =  Cart::getContent();

            $sum = 0;
            foreach ($items as $item) {
                $sum+=$item->attributes->qty * $item->price;
            }
        return view('front-end.product.addToCarts',compact($items,$sum,'items','sum'));

    }

    public function update(Request $request)
    {
        //return $product = $request->itemId;
       $items =  Cart::getContent();

            $sum = 0;
            foreach ($items as $item) {
                $sum+=$item->attributes->qty * $item->price;
            }
       Cart::update($request->itemId,array(
           
          'quantity' => $request->qty, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
      return view('front-end.product.addToCarts',compact($items,$sum,'items','sum'));

    }

    public function checkOut()
    {
       
      
      return view('front-end.product.checkOut');

    }




    
}
