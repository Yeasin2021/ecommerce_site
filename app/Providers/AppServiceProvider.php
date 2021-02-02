<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use View;
use Cart;
use App\Category;
use App\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('200');

        View::composer('*',function($view){
            $categories = Category::where('publication_status',1)->get();
            
            $view->with('categories',$categories);
            
        });


        View::composer('*',function($view){
            $total = 0;
            $item = Cart::get(3);
            //determine the Quantity
            $cartTotalQuantity = 0;
            $items =  Cart::getContent();
            foreach ($items as $item) {
                $cartTotalQuantity+= $item->attributes->qty;
                $total+= $item->attributes->qty * $item->price;
            }
            //$cartTotalQuantity = Cart::attributes->qty;
            //determine the Subtotal
            $subTotal = Cart::getSubTotal();
            
            $view->with('cartTotalQuantity',$cartTotalQuantity);
            $view->with('subTotal',$subTotal);
            $view->with('total',$total);
            $view->with('item',$item);
            
            
            
        });
    }
}
