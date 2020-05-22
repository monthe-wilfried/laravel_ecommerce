@extends('layouts.app')

@section('content')

    @php

        $categories = \App\Category::all();
        $cart = Cart::content();
        $setting = DB::table('settings')->first();

    @endphp

    <style>

        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">categories</div>
                            </div>

                            <ul class="cat_menu">
                                @foreach($categories as $category)
                                    <li class="hassubs">
                                        <a href="{{ url('products/categories/'.$category->id) }}">{{ $category->name }}<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            @foreach($category->sub_categories as $sub_category)
                                                <li><a href="{{ url('products/'.$sub_category->id) }}">{{ $sub_category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="{{ url('/') }}">Home<i class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
                                    <a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="hassubs">
                                    <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="hassubs">
                                    <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('blog.post') }}">Blog<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="{{ route('contact.page') }}">Contact<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; border-radius: 30px; padding: 20px; margin-bottom: 20px; box-shadow: 0px 10px 10px 0px grey;">
                    <div class="contact_form_container">


                        @if(Cart::count() == 0)

                            <div class="cart_items">
                                <div class="row">
                                    <div class="col-lg-4" style="margin-bottom: 20px;">
                                        <i class="fas fa-shopping-cart fa-8x"></i>
                                    </div>
                                    <div class="col-lg-8">
                                        <h2>Your shopping cart is empty</h2>
                                        <br>
                                        <a href="{{ url('/') }}" class="btn btn-lg btn-danger">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>

                        @else

                            <div class="contact_form_title text-center">Cart Products</div>


                            <div class="cart_items">
                                <ul class="cart_list">
                                    @foreach($cart as $row)
                                        <li class="cart_item clearfix">


                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title"><strong>Product Image</strong></div>
                                                    <div class="cart_item_text"><img src="{{ asset($row->options->image) }}" style="height: 70px; width: 70px;"></div>
                                                </div>

                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title"><strong>Name</strong></div>
                                                    <div class="cart_item_text">{{ $row->name }}</div>
                                                </div>

                                                @if($row->options->color)
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title"><strong>Color</strong></div>
                                                        <div class="cart_item_text">{{ $row->options->color  }}</div>
                                                    </div>
                                                @endif

                                                @if($row->options->size)
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title"><strong>Size</strong></div>
                                                        <div class="cart_item_text">{{ $row->options->size }}</div>
                                                    </div>
                                                @endif

                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title"><strong>Quantity</strong></div>
                                                    <div class="cart_item_text">{{ $row->qty }}</div>
                                                </div>

                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title"><strong>Price</strong></div>
                                                    <div class="cart_item_text">${{ $row->price }}</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title"><strong>Total</strong></div>
                                                    <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                                </div>

                                            </div>
                                        </li>
                                        <hr>
                                    @endforeach
                                </ul>
                            </div>


                            <ul class="list-group col-lg-8" style="float: right;">
                                @if(session()->has('coupon'))
                                    <li class="list-group-item">Subtotal: <span style="float: right;">${{ $balance = Cart::subtotal() - session()->get('coupon')['discount'] }}</span></li>
                                    <li class="list-group-item">Coupon: ({{ session()->get('coupon')['name'] }})
                                        <a href="{{ route('coupon.remove') }}" title="Remove Coupon" class="btn btn-sm btn-danger">X</a>
                                        <span style="float: right;">${{ session()->get('coupon')['discount'] }}</span></li>
                                @else
                                    <li class="list-group-item">Subtotal: <span style="float: right;">${{ Cart::subtotal() }}</span></li>
                                @endif

                                <li class="list-group-item">Shipping Cost: <span style="float: right;">${{ $setting->shipping_cost }}</span></li>
                                <li class="list-group-item">Vat: <span style="float: right;">${{ $setting->vat }}</span></li>
                                @if(session()->has('coupon'))
                                    <li class="list-group-item">Total: <span style="float: right;">${{ $balance + $setting->shipping_cost + $setting->vat }}</span></li>
                                @else
                                    <li class="list-group-item">Total: <span style="float: right;">${{ Cart::subtotal() + $setting->shipping_cost + $setting->vat }}</span></li>
                                @endif
                            </ul>


                    </div>
                </div>




                <div class="col-lg-5" style="border: 1px solid grey; border-radius: 30px; padding: 20px; box-shadow: 0px 10px 10px 0px grey;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>

                        <form action="{{ route('oncash.charge') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                    Cash On Delivery
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <input type="hidden" name="shipping" value="{{ $setting->shipping_cost }}">
                                <input type="hidden" name="vat" value="{{ $setting->vat }}">
                                <input type="hidden" name="total" value="{{ Cart::subtotal() + $setting->vat + $setting->shipping_cost }}">
                                <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

                                <input type="hidden" name="shipping_name" value="{{ $data['name'] }}">
                                <input type="hidden" name="shipping_phone" value="{{ $data['phone'] }}">
                                <input type="hidden" name="shipping_email" value="{{ $data['email'] }}">
                                <input type="hidden" name="shipping_address" value="{{ $data['address'] }}">
                                <input type="hidden" name="shipping_city" value="{{ $data['city'] }}">
                                <input type="hidden" name="shipping_country" value="{{ $data['country'] }}">



                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <br>

                            <button class="btn btn-dark btn-block">Pay Now</button>
                        </form>

                    </div>
                    @endif
                </div>

            </div>
        </div>
        <div class="panel"></div>
    </div>



@endsection

@section('scripts')
    <script src="{{ asset('public/frontend/js/contact_custom.js') }}"></script>
@endsection


