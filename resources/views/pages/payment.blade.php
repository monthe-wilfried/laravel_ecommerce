@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
@endsection

@section('content')


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

                        @foreach($setting as $row)
                            <ul class="list-group col-lg-8" style="float: right;">
                                @if(session()->has('coupon'))
                                    <li class="list-group-item">Subtotal: <span style="float: right;">${{ $balance = Cart::subtotal() - session()->get('coupon')['discount'] }}</span></li>
                                    <li class="list-group-item">Coupon: ({{ session()->get('coupon')['name'] }})
                                        <a href="{{ route('coupon.remove') }}" title="Remove Coupon" class="btn btn-sm btn-danger">X</a>
                                        <span style="float: right;">${{ session()->get('coupon')['discount'] }}</span></li>
                                @else
                                    <li class="list-group-item">Subtotal: <span style="float: right;">${{ Cart::subtotal() }}</span></li>
                                @endif

                                <li class="list-group-item">Shipping Cost: <span style="float: right;">${{ $row->shipping_cost }}</span></li>
                                <li class="list-group-item">Vat: <span style="float: right;">${{ $row->vat }}</span></li>
                                @if(session()->has('coupon'))
                                    <li class="list-group-item">Total: <span style="float: right;">${{ $balance + $row->shipping_cost + $row->vat }}</span></li>
                                @else
                                    <li class="list-group-item">Total: <span style="float: right;">${{ Cart::subtotal() + $row->shipping_cost + $row->vat }}</span></li>
                                @endif
                            </ul>
                        @endforeach

                    </div>
                </div>




                <div class="col-lg-5" style="border: 1px solid grey; border-radius: 30px; padding: 20px; box-shadow: 0px 10px 10px 0px grey;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>

                        <form action="{{ route('payment.process') }}" class="d-block" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="uname">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uname">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Enter your phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uname">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uname">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required  autofocus placeholder="Enter your address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uname">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="name" autofocus placeholder="Enter your city">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">City</label>
                                <select name="country_id" class="form-control" required>
                                    <option value="">Select Country...</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="contact_form_title text-center">Payment with</div>
                            <div class="form-group">
                                <ul class="logos_list">
                                    <li><input type="radio" name="payment" value="stripe"><img src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px; height: 70px;"></li>
                                    <li><input type="radio" name="payment" value="paypal"><img src="{{ asset('public/frontend/images/paypal.png') }}" style="width: 100px; height: 70px;"></li>
                                    <li><input type="radio" name="payment" value="oncash"><img src="{{ asset('public/frontend/images/cash-on-delivery.png') }}" style="width: 100px; height: 70px;"></li>
                                </ul>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">Pay Now</button>
                            </div>

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
