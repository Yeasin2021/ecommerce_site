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
              <h2>Product Details</h2>
              <p>{{$singleProduct->short_desc}}</p>
            </div>
            <div class="page_link">
              <a href="{{route('/')}}">Home</a>
              <a href="single-product.html">Product Details</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!--================Single Product Area =================-->
    <div class="product_image_area">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="s_product_img">
              <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel"
              >
                
                
                  <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="1"
                  >
                    <img
                      src="/product-images/{{$singleProduct->product_image}}"
                      alt=""
                    />
                  </li>
                  
                
                
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3>Name:{{$singleProduct->product_name}},{{$singleBrand->add_brand}}</h3>
              <h2>৳ {{$singleProduct->product_price}}</h2>
              <ul class="list">
                <li>
                  <a class="active" href="#">
                    <span>Category</span> : {{$category->add_category}}</a
                  >
                </li>
                <li>
                  <a href="#"> <span>Availibility</span> : In Stock</a>
                </li>
              </ul>
              <p>
                {!! $singleProduct->long_desc !!}
              </p>
              <form action="{{route('product-cart',['id'=>$singleProduct->id])}}" method="post">@csrf
              <div class="product_count">
                <label for="qty">Quantity:</label>
                <input
                  type="text"
                  name="qty"
                  id="sst"
                  maxlength="12"
                  min="1"
                  value="1"
                  title="Quantity:"
                  class="input-text qty"
                />
                <button
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
                </button>
              </div>
              <div class="card_area">
                <input type="hidden" name="product_id" value={{$singleProduct->id}}>
                 <input type="hidden" name="product_name" value={{$singleProduct->product_name}}>
                 <input type="hidden" name="product_price" value={{$singleProduct->product_price}}>
                 <input type="hidden" name="brand_name" value={{$singleBrand->add_brand}}>
                 <input type="hidden" name="category_name" value={{$category->add_category}}>
                 <input type="hidden" name="product_image" value={{$singleProduct->product_image}}>

                <button type="submit" class="btn btn-success">Add to Cart</button>
                
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <!--================End Single Product Area =================-->

    





@endsection