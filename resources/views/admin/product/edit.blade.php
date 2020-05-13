
@extends('layouts.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.products.index') }}">Products</a>
            <span class="breadcrumb-item active">Edit Product</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Product
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-success pull-right">All Products</a>
                </h6>

                <form method="post" action="{{ route('admin.product.update.without.photo', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" placeholder="Enter product name" value="{{ old('product_name', $product->product_name) }}">
                                    @if($errors->has('product_name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" placeholder="Enter product code"  value="{{ old('product_code', $product->product_code) }}">
                                    @if($errors->has('product_code'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_code') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity" placeholder="Product quantity" value="{{ old('product_quantity', $product->product_quantity) }}">
                                    @if($errors->has('product_quantity'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_quantity') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: </label>
                                    <input class="form-control" type="number" name="discount_price" placeholder="Discount Price" value="{{ old('discount_price', $product->discount_price) }}">
                                    @if($errors->has('discount_price'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('discount_price') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id" data-placeholder="Choose category">
                                        <option value="">Choose Category...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if($category->id == $product->category_id)
                                                    selected
                                                @endif
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category: </label>
                                    <select class="form-control select2" name="sub_category_id">
                                        <option value="">Choose Sub Category...</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}"
                                                    @if($subCategory->id == $product->sub_category_id)
                                                    selected
                                                @endif
                                            >{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: </label>
                                    <select class="form-control select2" name="brand_id" data-placeholder="Choose brand">
                                        <option value="">Choose Brand...</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @if($brand->id == $product->brand_id)
                                                    selected
                                                @endif
                                            >{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <input id="size" type="text" name="product_size" data-role="tagsinput" class="form-control" value="{{ old('product_size', $product->product_size) }}">
                                    @if($errors->has('product_size'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_size') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                    <input id="color" type="text" name="product_color" data-role="tagsinput" class="form-control" value="{{ old('product_color', $product->product_color) }}">
                                    @if($errors->has('product_color'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_color') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                    <input type="number" name="selling_price" placeholder="Enter Selling Price" class="form-control" value="{{ old('selling_price', $product->selling_price) }}">
                                    @if($errors->has('selling_price'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('selling_price') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                    <textarea id="summernote" name="product_details" class="form-control">{{ old('product_details', $product->product_details) }}</textarea>
                                    @if($errors->has('product_details'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('product_details') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link:</label>
                                    <input name="video_link" class="form-control" placeholder="Video Link" value="{{ old('video_link', $product->video_link) }}">
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <br>
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1"
                                        @if($product->main_slider == 1)
                                            checked
                                        @endif
                                    >
                                    <span>Main Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1"
                                        @if($product->hot_deal == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Hot Deal</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1"
                                        @if($product->best_rated == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Best Rated</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1"
                                        @if($product->trend == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Trend Product</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1"
                                        @if($product->mid_slider == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Mid Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1"
                                        @if($product->hot_new == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Hot New</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1"
                                           @if($product->buyone_getone == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Buy One Get One</span>
                                </label>
                            </div><!-- col-4 -->



                        </div><!-- end row -->

                        <br><br>
                        <div class="formform-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update Product</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div><!-- sl-pagebody -->


        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Images</h6>

                <form method="post" action="{{ route('admin.product.update.photo', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label>
                                <label class="form-control custom-file">
                                    <input type="file" name="image_one" class="custom-file-input" onchange="readURL(this);">
                                    <span class="custom-file-control"></span>
                                </label>
                                @if($errors->has('image_one'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('image_one') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{ asset($product->image_one )}}" id="one" width="80" height="80">
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                <label class="form-control custom-file">
                                    <input type="file" name="image_two" class="custom-file-input" onchange="readURL2(this);">
                                    <span class="custom-file-control"></span>
                                </label>
                                @if($errors->has('image_two'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('image_two') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{ asset($product->image_two) }}" id="two" width="80" height="80">
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                                <label class="form-control custom-file">
                                    <input type="file" name="image_three" class="custom-file-input" onchange="readURL3(this);">
                                    <span class="custom-file-control"></span>
                                </label>
                                @if($errors->has('image_three'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('image_three') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6 col-sm-6">
                            <img src="{{ asset($product->image_three) }}" id="three" width="80" height="80">
                        </div>


                        <div class="formform-layout-footer"><br><br>
                            <button type="submit" class="btn btn-info mg-r-5">Update Photo</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </form>
            </div>
        </div><!-- sl-pagebody -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<!-- Ajax code to get the sub categories when each category is selected -->
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="sub_category_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');

                        });
                    },
                });

            }else{
                alert('danger');
            }

        });
    });

</script>

<!-- Ajax code to preview images -->
<script type="text/javascript">
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



<script type="text/javascript">
    function readURL2(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
    function readURL3(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
