@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.blog.categories.index') }}">Blog</a>
            <span class="breadcrumb-item active">All Posts</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Post Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post List
                    <a href="{{ route('admin.blog.post.create') }}" class="btn btn-sm btn-primary" style="float: right">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Post Title</th>
                            <th class="wd-20p">Post Category</th>
                            <th class="wd-20p">Post Image</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key=>$post)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $post->title_en }}</td>
                                <td>{{ $post->post_category->category_name_en }}</td>
                                <td><img src="{{ $post->image ? asset($post->image) : asset('public/media/post/no_image.jpg') }}" class="img-fluid" width="70" height="70"></td>
                                <td>
                                    <a href="{{ route('admin.blog.post.edit', $post->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a id="delete" href="{{ route('admin.blog.post.delete', $post->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    </div>

@endsection
