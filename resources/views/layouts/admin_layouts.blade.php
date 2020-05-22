<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Trade</title>

    <!-- vendor css -->
    <link href="{{ asset('public/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Datatable css-->
    <link href="{{ asset('public/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('public/backend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

    <!-- Tags Input CDN-->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

    <!-- chart -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/starlight.css') }}">

    <!-- Summernote CSS -->
    <link href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>

    @guest()

    @else

        <!-- ########## START: LEFT PANEL ########## -->
        <div class="sl-logo"><a href=""><i class="fa fa-shopping-basket fa-xs" aria-hidden="true"></i>Trade</a></div>
        <div class="sl-sideleft">

            <div class="sl-sideleft-menu">
                <a href="{{ route('admin.home') }}" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                @if(Auth::user()->category == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                        <span class="menu-item-label">Category</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="{{ route('sub.categories.index') }}" class="nav-link">Sub Categories</a></li>
                    <li class="nav-item"><a href="{{ route('brands.index') }}" class="nav-link">Brands</a></li>
                </ul>
                @endif

                @if(Auth::user()->coupon == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-scissors" aria-hidden="true"></i>
                        <span class="menu-item-label">Coupon</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.coupons.index') }}" class="nav-link">Coupons</a></li>
                </ul>
                @endif

                @if(Auth::user()->product == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        <span class="menu-item-label">Products</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.product.create') }}" class="nav-link">Add Product</a></li>
                    <li class="nav-item"><a href="{{ route('admin.products.index') }}" class="nav-link">All Products</a></li>
                </ul>
                @endif

                @if(Auth::user()->order == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <span class="menu-item-label">Orders</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.new.order') }}" class="nav-link">New Order</a></li>
                    <li class="nav-item"><a href="{{ route('admin.accept.payment') }}" class="nav-link">Accept Payment</a></li>
                    <li class="nav-item"><a href="{{ route('admin.process.order') }}" class="nav-link">Process Delivery</a></li>
                    <li class="nav-item"><a href="{{ route('admin.success.delivery') }}" class="nav-link">Delivery Success</a></li>
                    <li class="nav-item"><a href="{{ route('admin.cancel.order') }}" class="nav-link">Cancel Order</a></li>
                </ul>
                @endif

                @if(Auth::user()->blog == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-bold" aria-hidden="true"></i>
                        <span class="menu-item-label">Blog</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.blog.categories.index') }}" class="nav-link">Blog Categories</a></li>
                    <li class="nav-item"><a href="{{ route('admin.blog.post.create') }}" class="nav-link">Add Post</a></li>
                    <li class="nav-item"><a href="{{ route('admin.blog.posts.index') }}" class="nav-link">All Posts</a></li>
                </ul>
                @endif

                @if(Auth::user()->newsletter == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        <span class="menu-item-label">Newsletters</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.newsletters.index') }}" class="nav-link">Subscribers</a></li>
                </ul>
                @endif

                @if(Auth::user()->seo == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <span class="menu-item-label">SEO</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.seo') }}" class="nav-link">SEO Setting</a></li>
                </ul>
                @endif

                @if(Auth::user()->report == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        <span class="menu-item-label">Report</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('search.report') }}" class="nav-link">Search Report</a></li>
                </ul>
                @endif

                @if(Auth::user()->role == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <span class="menu-item-label">User Role</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.create') }}" class="nav-link">Create User</a></li>
                    <li class="nav-item"><a href="{{ route('admin.all.user') }}" class="nav-link">All Users</a></li>
                </ul>
                @endif

                @if(Auth::user()->order == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-backward" aria-hidden="true"></i>
                        <span class="menu-item-label">Return Order</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.return.request') }}" class="nav-link">Return Request</a></li>
                    <li class="nav-item"><a href="{{ route('admin.all.request') }}" class="nav-link">All Request</a></li>
                </ul>
                @endif

                @if(Auth::user()->contact == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span class="menu-item-label">Contact Messages</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.all.messages') }}" class="nav-link">All Messages</a></li>
                </ul>
                @endif

                @if(Auth::user()->stock == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span class="menu-item-label">Stock Management</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->
                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('admin.product.stock') }}" class="nav-link">Product Stock</a></li>

                    </ul>
                @endif

                @if(Auth::user()->review == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                        <span class="menu-item-label">Product Reviews</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="" class="nav-link">New Review</a></li>
                    <li class="nav-item"><a href="" class="nav-link">All Reviews</a></li>
                </ul>
                @endif

                @if(Auth::user()->setting == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <span class="menu-item-label">Site Settings</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.site.setting') }}" class="nav-link">Site Setting</a></li>
                </ul>
                @endif
            </div><!-- sl-sideleft-menu -->

            <br>
        </div><!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div><!-- sl-header-left -->
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name"><span class="hidden-md-down">Hi, {{ Auth::user()->name }}</span></span>
                            <img src="{{ asset('public/backend/img/img3.jpg') }}" class="wd-32 rounded-circle" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                                <li><a href="{{ route('admin.password.change') }}"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                                <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>
                <div class="navicon-right">
                    <a id="btnRightMenu" href="" class="pos-relative">
                        <i class="icon ion-ios-bell-outline"></i>
                        <!-- start: if statement -->
                        <span class="square-8 bg-danger"></span>
                        <!-- end: if statement -->
                    </a>
                </div><!-- navicon-right -->
            </div><!-- sl-header-right -->
        </div><!-- sl-header -->
        <!-- ########## END: HEAD PANEL ########## -->

        <!-- ########## START: RIGHT PANEL ########## -->
        <div class="sl-sideright">
            <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
                </li>
            </ul><!-- sidebar-tabs -->

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                    <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                                    <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                                    <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                                    <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                                    <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                    <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div><!-- media -->
                        </a>
                    </div><!-- media-list -->
                    <div class="pd-15">
                        <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
                    </div>
                </div><!-- #messages -->

                <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                    <span class="tx-12">October 03, 2017 8:45am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                                    <span class="tx-12">October 02, 2017 12:44am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                    <span class="tx-12">October 01, 2017 10:20pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                    <span class="tx-12">October 01, 2017 6:08pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                                    <span class="tx-12">September 27, 2017 6:45am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                    <span class="tx-12">September 28, 2017 11:30pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                                    <span class="tx-12">September 26, 2017 11:01am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                    <span class="tx-12">September 23, 2017 9:19pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                    </div><!-- media-list -->
                </div><!-- #notifications -->

            </div><!-- tab-content -->
        </div><!-- sl-sideright -->
        <!-- ########## END: RIGHT PANEL ########## --->

    @endguest

    @yield('admin_content')

    <div class="card-body text-center">
        <span class="card-title" style="color: grey; font-size: 11px; ">Developed by <a href="https://github.com/monthe-wilfried">Monthe Wilfried</a></span>
    </div>

    <script src="{{ asset('public/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('public/backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

    <script src="{{ asset('public/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('public/backend/lib/select2/js/select2.min.js') }}"></script>

    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>


    <script src="{{ asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}../lib/d3/d3.js"></script>
    <script src="{{ asset('public/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/backend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <!-- Summernote JS -->
    <script src="{{ asset('public/backend/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('public/backend/lib/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function(){
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false
            })
        });
    </script>

    <script>
        $(function(){
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote2').summernote({
                height: 150,
                tooltip: false
            })
        });
    </script>


    <script src="{{ asset('public/backend/js/starlight.js') }}"></script>
    <script src="{{ asset('public/backend/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('public/backend/js/dashboard.js') }}"></script>

    <!-- Floating dynamic messages -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    @yield('scripts')

    <script>
            @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Do you Want to delete?",
                text: "Once Deleted, This will be Permanently Deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Data not deleted!");
                    }
                });
        });
    </script>
</body>
</html>
