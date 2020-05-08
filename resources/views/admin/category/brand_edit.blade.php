@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Category</a>
            <span class="breadcrumb-item active">Brands</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Brand</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Brand</h6>
                <br>
                <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="brand-name">Brand name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter brand name" value="{{ old('name', $brand->name) }}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="brand_logo">Brand Logo</label>
                        <input type="file" class="form-control" name="logo">
                        @if($errors->has('logo'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="brand_logo">Old Brand Logo</label>
                        <img src="{{ URL::to($brand->logo) }}" height="50px" width="60px">
                    </div>

                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary pd-x-20">Back</a>

                </form>

            </div><!-- card -->


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    </div>

@endsection

