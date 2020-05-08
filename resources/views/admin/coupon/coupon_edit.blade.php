@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Coupon</a>
            <span class="breadcrumb-item active">Coupons</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Coupon</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Coupon</h6>
                <br>
                <form method="post" action="{{ route('admin.coupon.update', $coupon->id) }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="coupon_code">Coupon Code</label>
                        <input type="text" class="form-control" name="coupon" placeholder="Enter coupon code" value="{{ old('coupon', $coupon->coupon) }}">
                        @if($errors->has('coupon'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('coupon') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="coupon_code">Coupon Discount (%)</label>
                        <input type="number" class="form-control" name="discount" placeholder="Enter coupon discount" value="{{ old('coupon', $coupon->discount) }}">
                        @if($errors->has('discount'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary pd-x-20">Back</a>

                </form>

            </div><!-- card -->


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    </div>

@endsection
