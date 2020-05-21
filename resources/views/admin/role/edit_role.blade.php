
@extends('layouts.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="">User Role</a>
            <span class="breadcrumb-item active">Admin Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Admin</h6>
                <p class="mg-b-20 mg-sm-b-30">Edit Admin Form</p>

                <form method="post" action="{{ route('admin.update', $user->id) }}">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name: </label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter your name" value="{{ old('name', $user->name) }}" >
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone: </label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter your phone"  value="{{ old('phone', $user->phone) }}" >
                                    @if($errors->has('phone'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email: </label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter your email" value="{{ old('email', $user->email) }}" >
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password: </label>
                                    <input class="form-control" type="password" name="password" placeholder="Enter your password" >
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <br>
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="category" value="1"
                                           @if($user->category == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Category</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="coupon" value="1"
                                           @if($user->coupon == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Coupon</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="product" value="1"
                                           @if($user->product == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Products</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="order" value="1"
                                           @if($user->order == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Order</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="blog" value="1"
                                           @if($user->blog == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Blog</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="newsletter" value="1"
                                           @if($user->newsletter == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Newsletters</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="seo" value="1"
                                           @if($user->seo == 1)
                                           checked
                                        @endif
                                    >
                                    <span>SEO</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="report" value="1"
                                           @if($user->report == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Report</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="role" value="1"
                                           @if($user->role == 1)
                                           checked
                                        @endif
                                    >
                                    <span>User Role</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="return" value="1"
                                           @if($user->return == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Return Order</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="contact" value="1"
                                           @if($user->contact == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Contact Messages</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="review" value="1"
                                           @if($user->review == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Product Review</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="setting" value="1"
                                           @if($user->setting == 1)
                                           checked
                                        @endif
                                    >
                                    <span>Site Setting</span>
                                </label>
                            </div><!-- col-4 -->



                        </div><!-- end row -->

                        <br><br>
                        <div class="formform-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

