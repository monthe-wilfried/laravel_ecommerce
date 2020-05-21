
@extends('layouts.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.seo') }}">SEO</a>
            <span class="breadcrumb-item active">SEO Setting</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">SEO Setting</h6>

                <form method="post" action="{{ route('update.seo') }}">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Title: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_title"  value="{{ old('meta_title', $seo->meta_title) }}">
                                    @if($errors->has('meta_title'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('meta_title') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Author <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_author" value="{{ old('meta_author', $seo->meta_author) }}">
                                    @if($errors->has('meta_author'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('meta_author') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Tag <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="meta_tag" value="{{ old('meta_tag', $seo->meta_tag) }}">
                                    @if($errors->has('meta_tag'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('meta_tag') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                                    <textarea name="meta_description" class="form-control">{{ old('meta_description', $seo->meta_description) }}</textarea>
                                    @if($errors->has('meta_description'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('meta_description') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                                    <textarea name="google_analytics" class="form-control">{{ old('google_analytics', $seo->google_analytics) }}</textarea>
                                    @if($errors->has('google_analytics'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('google_analytics') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                                    <textarea name="bing_analytics" class="form-control">{{ old('bing_analytics', $seo->bing_analytics) }}</textarea>
                                    @if($errors->has('bing_analytics'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('bing_analytics') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->

                            <input type="hidden"  name="id" value="{{ $seo->id }}">
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


