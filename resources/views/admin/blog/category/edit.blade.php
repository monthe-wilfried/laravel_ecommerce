@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.blog.categories.index') }}">Blog</a>
            <span class="breadcrumb-item active">Blog Categories</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Blog Category</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Blog Category</h6>
                <br>
                <form method="post" action="{{ route('admin.blog.categories.update', $category->id) }}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">Category name (English)</label>
                        <input type="text" class="form-control" name="category_name_en" placeholder="Category" value="{{ old('name', $category->category_name_en) }}">
                        @if($errors->has('category_name_en'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('category_name_en') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Category name (German)</label>
                        <input type="text" class="form-control" name="category_name_de" placeholder="Kategorie" value="{{ old('name', $category->category_name_de) }}">
                        @if($errors->has('category_name_de'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('category_name_de') }}</strong>
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
