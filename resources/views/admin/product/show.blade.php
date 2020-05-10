
@extends('layouts.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.products.index') }}">Products</a>
            <span class="breadcrumb-item active">Product Details</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Details Page</h6>
                <br>
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name:</label><br>
                                    <strong>{{ $product->product_name }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: </label><br>
                                    <strong>{{ $product->product_code }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: </label><br>
                                    <strong>{{ $product->product_quantity }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category:</label><br>
                                    <strong>{{ $product->category->name }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: </label><br>
                                    <strong>{{ $product->sub_category->name ?? 'No Sub Categories' }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: </label><br>
                                    <strong>{{ $product->brand->name ?? 'No Brand' }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size:</label><br>
                                    <strong>{{ $product->product_size }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color:</label><br>
                                    <strong>{{ $product->product_color }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: </label><br>
                                    <strong>{{ $product->selling_price }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: </label><br>
                                    <p>{!! $product->product_details !!}</p>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link:</label><br>
                                    <strong>{{ $product->video_link ?? '' }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image One (Main Thumbnail): </label><br>
                                    <img src="{{ asset($product->image_one) }}" width="80" height="80">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: </label><br>
                                    <img src="{{ asset($product->image_two) }}" width="80" height="80">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three: </label><br>
                                    <img src="{{ asset($product->image_three) }}" width="80" height="80">
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->

                        <hr>
                        <br>
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <label>
                                    @if($product->main_slider == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    <span>Main Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label>
                                    @if($product->hot_deal == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Active</span>
                                    @endif
                                    <span>Hot Deal</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label>
                                    @if($product->best_rated== 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    <span>Best Rated</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label>
                                    @if($product->trend == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    <span>Trend Product</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label>
                                    @if($product->mid_slider == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    <span>Mid Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label>
                                    @if($product->hot_new== 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    <span>Hot New</span>
                                </label>
                            </div><!-- col-4 -->

                        </div><!-- end row -->

                        <div class="formform-layout-footer">
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-danger">Edit</a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
