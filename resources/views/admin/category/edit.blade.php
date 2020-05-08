@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Category</a>
            <span class="breadcrumb-item active">Categories</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Category</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Category</h6>
                <br>
                <form method="post" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" name="name" placeholder="Category" value="{{ old('name', $category->name) }}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
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
