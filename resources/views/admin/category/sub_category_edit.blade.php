@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Category</a>
            <span class="breadcrumb-item active">Sub Categories</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Sub Category</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Sub Category</h6>
                <br>
                <form method="post" action="{{ route('sub.category.update', $subCategory->id) }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">Sub Category name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter sub category" value="{{ old('name', $subCategory->name) }}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="sub_category">Category name</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($category->id == $subCategory->category->id)
                                        selected
                                    @endif>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary pd-x-20">Back</a>

                </form>

            </div><!-- card -->


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    </div>

@endsection
