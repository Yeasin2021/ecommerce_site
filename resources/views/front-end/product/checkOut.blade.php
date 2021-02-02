@extends('front-end.master')

@section('title')Category || Ecommerce @endsection

@section('body')


<!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">
        <!--<div class="returning_customer">
          <div class="check_title">
            <h2>
              Returning Customer?
              <a href="#">Click here to login</a>
            </h2>
          </div>
          <p>
            If you have shopped with us before, please enter your details in the
            boxes below. If you are a new customer, please proceed to the
            Billing & Shipping section.
          </p>
          <form
            class="row contact_form"
            action="#"
            method="post"
            novalidate="novalidate"
          >
            <div class="col-md-6 form-group p_star">
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value=" "
              />
              <span
                class="placeholder"
                data-placeholder="Username or Email"
              ></span>
            </div>
            <div class="col-md-6 form-group p_star">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                value=""
              />
              <span class="placeholder" data-placeholder="Password"></span>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">
                Send Message
              </button>
              <div class="creat_account">
                <input type="checkbox" id="f-option" name="selector" />
                <label for="f-option">Remember me</label>
              </div>
              <a class="lost_pass" href="#">Lost your password?</a>
            </div>
          </form>
        </div>
        <div class="cupon_area">
          <div class="check_title">
            <h2>
              Have a coupon?
              <a href="#">Click here to enter your code</a>
            </h2>
          </div>
          <input type="text" placeholder="Enter coupon code" />
          <a class="tp_btn" href="#">Apply Coupon</a>
        </div> -->
        <div class="billing_details">
          <div class="row">
            <div class="col-lg-8">
              <h3>Billing Details</h3>
              <form action="{{route('customer-checkout')}}" method="post">   
              @csrf
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="first"
                    name="first_name"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="First name"
                  ></span>
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="last"
                    name="last_name"
                  />
                  <span class="placeholder" data-placeholder="Last name"></span>
                </div>
                <div class="col-md-12 form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="company"
                    name="company"
                    placeholder="Company name"
                  />
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="number"
                    name="phone"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Phone number"
                  ></span>
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Email Address"
                  ></span>
                </div>
                
                <div class="col-md-12 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Address"
                  ></span>
                </div>
              
                <div class="col-md-12 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="town_city"
                    name="town_city"
                  />
                  <span class="placeholder" data-placeholder="Town/City"></span>
                </div>
                <div class="col-md-12 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="district"
                    name="district"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="District"
                  ></span>
                </div>
                <div class="col-md-12 form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="zipcode"
                    name="zipcode"
                    placeholder="Postcode/ZIP"
                  />
                </div>
                <!--<div class="col-md-12 form-group">
                  <div class="creat_account">
                    <input type="checkbox" id="f-option2" name="selector" />
                    <label for="f-option2">Create an account?</label>
                  </div>
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account">
                    <h3>Shipping Details</h3>
                    <input type="checkbox" id="f-option3" name="selector" />
                    <label for="f-option3">Ship to a different address?</label>
                  </div>
                  <textarea
                    class="form-control"
                    name="message"
                    id="message"
                    rows="1"
                    placeholder="Order Notes"
                  ></textarea>
                </div>-->
            </div>
            <div class="col-lg-4">
              <div class="order_box">
                <h2>Your Order</h2>
                <ul class="list">
                  <li>
                    <a href="#"
                      >Product
                      <span>Total</span>
                    </a>
                  </li>
                  
                    @foreach(Cart::getContent() as $item)
                   
                  <li>
                    <a href="#"
                      >{{$item->name}}
                      <span></span>
                      <span class="middle">{{$item->price}}x{{$item->attributes->qty}}</span>
                      <span class="last">৳{{$item->attributes->qty * $item->price}}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
                <ul class="list list_2">
                  <li>
                    <a href="#"
                      >Subtotal
                      <span>৳{{Cart::getSubTotal()}}</span>
                    </a>
                  </li>
                  <li>
                    <a href="#"
                      >Vat
                      <span>tax rate: $00.00</span>
                    </a>
                  </li>
                  <li>
                    <a href="#"
                      >Total
                      <span>৳{{Cart::getTotal()}}</span>
                    </a>
                  </li>
                </ul>
                <!--<div class="payment_item">
                  <div class="radion_btn">
                    <input type="radio" id="f-option5" name="selector" />
                    <label for="f-option5">Check payments</label>
                    <div class="check"></div>
                  </div>
                  <p>
                    Please send a check to Store Name, Store Street, Store Town,
                    Store State / County, Store Postcode.
                  </p>
                </div>
                <div class="payment_item active">
                  <div class="radion_btn">
                    <input type="radio" id="f-option6" name="selector" />
                    <label for="f-option6">Paypal </label>
                    <img src="img/product/single-product/card.jpg" alt="" />
                    <div class="check"></div>
                  </div>
                  <p>
                    Please send a check to Store Name, Store Street, Store Town,
                    Store State / County, Store Postcode.
                  </p>
                </div>
                <div class="creat_account">
                  <input type="checkbox" id="f-option4" name="selector" />
                  <label for="f-option4">I’ve read and accept the </label>
                  <a href="#">terms & conditions*</a>
                </div>-->
                
                <input type="submit" name="submit" class="main_btn" value="Proceed to Payment"></form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->


@endsection