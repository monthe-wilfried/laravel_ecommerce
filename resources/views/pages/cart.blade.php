@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">

    <!-- Main Navigation -->

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
                                <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
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


    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        @auth()
                            @if(Cart::count() == 0)

                                <div class="cart_title">Shopping Cart</div>
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

                                <div class="cart_title">Shopping Cart</div>
                                    <div class="cart_items">
                                        <ul class="cart_list">
                                            @foreach($cart as $row)
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image text-center"><br><a href="{{ url('product/details/'.$row->id.'/'.str_slug($row->name)) }}"><img src="{{ asset($row->options->image) }}" style="height: 70px; width: 70px;"></a></div>
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Name</div>
                                                        <div class="cart_item_text">{{ $row->name }}</div>
                                                    </div>

                                                    @if($row->options->color)
                                                        <div class="cart_item_color cart_info_col">
                                                            <div class="cart_item_title">Color</div>
                                                            <div class="cart_item_text"><span style="background-color:{{ $row->options->color  }};"></span>{{ $row->options->color  }}</div>
                                                        </div>
                                                    @endif

                                                    @if($row->options->size)
                                                        <div class="cart_item_quantity cart_info_col">
                                                            <div class="cart_item_title">Size</div>
                                                            <div class="cart_item_text">{{ $row->options->size }}</div>
                                                        </div>
                                                    @endif
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title">Quantity</div>
                                                        <form action="{{ route('update.cart.quantity') }}" method="post" style="margin-top: 30px;">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $row->rowId }}">
                                                            <input type="number" name="qty" value="{{ $row->qty }}" pattern="[0-9]" style="width: 50px;">
                                                            <button type="submit" title="Update Quantity" class="btn btn-sm btn-success"><i class="fas fa-check-square fa-xs"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Price</div>
                                                        <div class="cart_item_text">${{ $row->price }}</div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Total</div>
                                                        <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                                    </div>

                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Action</div>
                                                        <div class="cart_item_text"><a href="{{ url('remove/cart/'.$row->rowId) }}" title="Remove from cart" class="btn btn-sm btn-danger">x</a></div>
                                                    </div>
                                                </div>
                                            </li>
                                                <hr>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif


                            <!-- Order Total -->
                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Order Total:</div>
                                    <div class="order_total_amount">${{ Cart::subtotal() }}</div>
                                </div>
                            </div>

                            <div class="cart_buttons">
                                <a href="{{ route('remove.cart.all') }}" type="button" class="button cart_button_clear">Remove All</a>
                                <a href="{{ route('user.checkout') }}" class="button cart_button_checkout">Checkout</a>
                            </div>
                        @else

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

                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{ asset('public/frontend/images/send.png') }}" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form method="post" action="{{ route('newsletter.store') }}" class="newsletter_form">
                                @csrf
                                <input type="email" name="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                                <button type="submit" class="newsletter_button">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
