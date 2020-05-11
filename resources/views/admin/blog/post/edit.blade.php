
@extends('layouts.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.products.index') }}">Blog</a>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Post
                    <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-sm btn-success pull-right">All Posts</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Post Form</p>

                <form method="post" action="{{ route('admin.blog.post.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_en" placeholder="Enter post title in english" value="{{ old('title_en', $post->title_en) }}">
                                    @if($errors->has('title_en'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (German): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_de" placeholder="Enter post title in german"  value="{{ old('title_de', $post->title_de) }}">
                                    @if($errors->has('title_de'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('title_de') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Details (English): <span class="tx-danger">*</span></label>
                                    <textarea id="summernote" name="details_en" class="form-control">{{ old('details_en', $post->details_en) }}</textarea>
                                    @if($errors->has('details_en'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('details_en') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Post Details: (German)<span class="tx-danger">*</span></label>
                                    <textarea id="summernote2" name="details_de" class="form-control">{{ old('details_de', $post->details_de) }}</textarea>
                                    @if($errors->has('details_de'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('details_de') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="post_category_id" data-placeholder="Choose category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if($category->id == $post->post_category_id)

                                                @endif
                                            >{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Image: </label>
                                    <label class="form-control custom-file">
                                        <input type="file" name="image" class="custom-file-input" onchange="readURL(this);">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    @if($errors->has('image'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <img src="{{ asset($post->image) }}" id="one" class="img-fluid" width="200" height="200">
                            </div>

                        </div><!-- row -->

                        <br><br>
                        <div class="formform-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection

<!-- Ajax code to preview images -->
<script type="text/javascript">
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

