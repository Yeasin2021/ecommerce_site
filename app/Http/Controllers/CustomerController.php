<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Brand;
use Mail;
use Cart;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front-end.product.checkOut');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bill(Request $request)
    {
        $customer = new Customer();
        $customer->first_name    = $request->first_name;
        $customer->last_name     = $request->last_name;
        $customer->company       = $request->company;
        $customer->phone         = $request->phone;
        $customer->email         = $request->email;
        $customer->address       = $request->address;
        $customer->town_city     = $request->town_city;
        $customer->district      = $request->district;
        $customer->zipcode       = $request->zipcode;

        $items =  Cart::getContent();

            $sum = 0;
            foreach ($items as $item) {
                $sum+=$item->attributes->qty * $item->price;
            }
        $customer->product_name = $item->name;
        $customer->product_price = $item->price;
        $customer->product_quantity = $item->attributes->qty;
        $customer->total = $sum;
        $customer->save();

        /*$customerId = $customer->id;
        Session::put('customerId',$customerId);*/

        $data = $customer->toArray();
        $to = $data['email'];
        $subject = "Ecommerace Shop";
        $message = "Hello Dear Customer/t".$data['first_name']." ".$data['last_name']." /tYou Were Purched ".
        $data['product_name']." /tQuantity ".$data['product_quantity']." /tTotal Bill Is ".$data['total'];
        $header = 'From: <yeasin18801@gmail.com>';
        mail($to,$subject,$message,$header);

        /*Mail::send('front-end.mail.confirmation-mail',$data,function($message) use ($data){
            
            $message->to($data['email']);
            $message->subject('Yeasin Ecommerace Shop');
        });*/
        //return "Success";
        return redirect('/');
        //return view('front-end.mail.confirmation-mail',compact($items,$sum,'items','sum'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
