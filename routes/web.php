<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


// Admin section -Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories.index');
Route::post('admin/category/store', 'Admin\Category\CategoryController@store')->name('category.store');
Route::get('admin/category/delete/{id}', 'Admin\Category\CategoryController@delete')->name('category.delete');
Route::get('admin/category/edit/{id}', 'Admin\Category\CategoryController@edit')->name('category.edit');
Route::put('admin/category/update/{id}', 'Admin\Category\CategoryController@update')->name('category.update');

// Admin section -Brands
Route::get('admin/brands', 'Admin\Category\BrandController@index')->name('brands.index');
Route::post('admin/brands/store', 'Admin\Category\BrandController@store')->name('brand.store');
Route::get('admin/brands/delete/{id}', 'Admin\Category\BrandController@delete')->name('brand.delete');
Route::get('admin/brands/edit/{id}', 'Admin\Category\BrandController@edit')->name('brand.edit');
Route::put('admin/brands/update/{id}', 'Admin\Category\BrandController@update')->name('brand.update');


// Admin section - Sub Categories
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@index')->name('sub.categories.index');
Route::post('admin/sub/category/store', 'Admin\Category\SubCategoryController@store')->name('sub.category.store');
Route::get('admin/sub/category/delete{id}', 'Admin\Category\SubCategoryController@delete')->name('sub.category.delete');
Route::get('admin/sub/category/edit/{id}', 'Admin\Category\SubCategoryController@edit')->name('sub.category.edit');
Route::put('admin/sub/category/update/{id}', 'Admin\Category\SubCategoryController@update')->name('sub.category.update');

// Admin section - Coupons
Route::get('admin/coupons', 'Admin\Category\CouponController@index')->name('admin.coupons.index');
Route::post('admin/coupon/store', 'Admin\Category\CouponController@store')->name('admin.coupon.store');
Route::get('admin/coupon/delete/{id}', 'Admin\Category\CouponController@delete')->name('admin.coupon.delete');
Route::get('admin/coupon/edit/{id}', 'Admin\Category\CouponController@edit')->name('admin.coupon.edit');
Route::put('admin/coupon/update/{id}', 'Admin\Category\CouponController@update')->name('admin.coupon.update');


// Admin section - Newsletters
Route::get('admin/newsletters', 'Admin\Category\NewsletterController@index')->name('admin.newsletters.index');
Route::get('admin/newsletter/delete/{id}', 'Admin\Category\NewsletterController@delete')->name('admin.newsletter.delete');


// Admin section - Products
Route::get('admin/products', 'Admin\ProductController@index')->name('admin.products.index');
Route::get('admin/product/create', 'Admin\ProductController@create')->name('admin.product.create');
Route::post('admin/product/store', 'Admin\ProductController@store')->name('admin.product.store');
Route::get('admin/product/active/{id}', 'Admin\ProductController@active')->name('admin.product.active');
Route::get('admin/product/inactive/{id}', 'Admin\ProductController@inactive')->name('admin.product.inactive');
Route::get('admin/product/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
Route::get('admin/product/show/{id}', 'Admin\ProductController@show')->name('admin.product.show');
Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
Route::put('admin/product/update/without-photo/{id}', 'Admin\ProductController@updateWithoutPhoto')->name('admin.product.update.without.photo');
Route::put('admin/product/update/photo/{id}', 'Admin\ProductController@updatePhoto')->name('admin.product.update.photo');

// Show Sub Category with Ajax
Route::get('get/subcategory/{category_id}', 'Admin\ProductController@getSubCategory');


// Admin section - Blog
Route::get('admin/blog/categories/list', 'Admin\PostController@blogCategoryList')->name('admin.blog.categories.index');
Route::post('admin/blog/categories/store', 'Admin\PostController@blogCategoryStore')->name('admin.blog.categories.store');
Route::get('admin/blog/categories/edit/{id}', 'Admin\PostController@blogCategoryEdit')->name('admin.blog.categories.edit');
Route::put('admin/blog/categories/update/{id}', 'Admin\PostController@blogCategoryUpdate')->name('admin.blog.categories.update');
Route::get('admin/blog/categories/delete/{id}', 'Admin\PostController@blogCategoryDelete')->name('admin.blog.categories.delete');

Route::get('admin/blog/posts/index', 'Admin\PostController@blogPostList')->name('admin.blog.posts.index');
Route::get('admin/blog/post/create', 'Admin\PostController@blogPostCreate')->name('admin.blog.post.create');
Route::post('admin/blog/post/store', 'Admin\PostController@blogPostStore')->name('admin.blog.post.store');
Route::get('admin/blog/post/delete/{id}', 'Admin\PostController@blogPostDelete')->name('admin.blog.post.delete');
Route::get('admin/blog/post/edit/{id}', 'Admin\PostController@blogPostEdit')->name('admin.blog.post.edit');
Route::put('admin/blog/post/update/{id}', 'Admin\PostController@blogPostUpdate')->name('admin.blog.post.update');




// Frontend - Newsletter
Route::post('newsletter/store', 'FrontController@storeNewsletter')->name('newsletter.store');

// Frontend - Wishlist
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');
Route::get('user/wishlist', 'WishlistController@wishlist')->name('user.wishlist');
Route::get('remove/wishlist/{product_id}', 'WishlistController@removeWishlist');

// Frontend -  Cart
Route::get('add/to/cart/{id}', 'CartController@addCart');
Route::get('check', 'CartController@check');

Route::get('product/cart', 'CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::get('remove/cart/all', 'CartController@removeAll')->name('remove.cart.all');
Route::post('update/cart/item/quantity', 'CartController@updateQuantity')->name('update.cart.quantity');

Route::get('cart/product/view/{id}', 'CartController@quickViewProduct');
Route::post('insert/into/cart', 'CartController@insertCart')->name('insert.into.cart');

// Coupon
Route::post('user/apply/coupon', 'CartController@applyCoupon')->name('apply.coupon');
Route::get('user/remove/coupon', 'CartController@removeCoupon')->name('coupon.remove');


// Frontend - Product single page details
Route::get('product/details/{id}/{product_name}', 'ProductController@productVew');
Route::post('cart/product/add/{id}', 'ProductController@addCart');

// User Checkout
Route::get('user/checkout', 'CartController@checkout')->name('user.checkout');


// Blog - Post
Route::get('blog/post', 'BlogController@blog')->name('blog.post');
Route::get('blog/post/{id}/{blog_title}', 'BlogController@singleBlog');

Route::get('language/english', 'BlogController@english')->name('language.english');
Route::get('language/german', 'BlogController@german')->name('language.german');






