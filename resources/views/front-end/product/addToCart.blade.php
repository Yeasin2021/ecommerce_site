@extends('front-end.master')

@section('title')Category || Ecommerce @endsection

@section('body')


<!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Cart</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="cart.html">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                <tr>
                  
                  <td>
                    <div class="media">
                      <div class="d-flex">

                        <img
                           src="/product-images/{{$item->attributes->product_image}}"
                          alt=""
                        />

                      </div>
                      
                    </div>
                    <h5>Name:{{$item->name}}||Brand:{{$item->attributes->brand_name}}||Category{{$item->attributes->category}}</h5>
                  </td>
                  <td>
                    <h5>{{$item->price}}</h5>
                  </td>
                  <td>
                    <form action="{{route('update')}}" method="post">@csrf
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty"
                        id="sst"
                        maxlength="12"
                        value="{{$item->attributes->qty}}"
                        title="Quantity:"
                        class="input-text qty"
                      />
                      <input type="hidden" name="itemId" value="{{$item->id}}">
                      <input type="submit" name="btn" value="+">
                      <!--<button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                        class="increase items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-up"></i>
                      </button>
                      <button
                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-down"></i>
                      </button>-->
                    </div>
                    </form>
                  </td>
                  <td>
                   <h5>৳{{$item->attributes->qty * $item->price}}</h5>
                   <a class = "btn btn-danger" href="{{route('item-remove',$item->id)}}"><span><i class="fa fa-trash"></i></span></a>
                  </td>
                  
                </tr>
                @endforeach
                
                <tr>
                  
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>৳{{$sum}}</h5>
                  </td>
                </tr>
              
                <tr class="out_button_area">
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="{{route('/')}}">Continue Shopping</a>
                      <a class="main_btn" href="{{route('product-checkout')}}">Proceed to checkout</a>
                    </div>
                  </td>
                 
                  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->


@endsection