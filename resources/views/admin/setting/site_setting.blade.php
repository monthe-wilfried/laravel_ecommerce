
@extends('layouts.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="">Setting</a>
            <span class="breadcrumb-item active">Website Setting</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Site Setting</h6>


                <form method="post" action="{{ route('update.site.setting') }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $setting->id }}">

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone One: </label>
                                    <input class="form-control" type="text" name="phone_one"  value="{{ old('phone_one', $setting->phone_one) }}" >
                                    @if($errors->has('phone'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('phone_one') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Two: </label>
                                    <input class="form-control" type="text" name="phone_two"  value="{{ old('phone_two', $setting->phone_two) }}" >
                                    @if($errors->has('phone'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('phone_two') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email: </label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email', $setting->email) }}" >
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Name: </label>
                                    <input class="form-control" type="text" name="company_name"  value="{{ old('company_name', $setting->company_name) }}" >
                                    @if($errors->has('company_name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Company Address: </label>
                                    <input class="form-control" type="text" name="company_address"  value="{{ old('company_address', $setting->company_address) }}" >
                                    @if($errors->has('company_address'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('company_address') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook: </label>
                                    <input class="form-control" type="text" name="facebook"  value="{{ old('facebook', $setting->facebook) }}" >
                                    @if($errors->has('facebook'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Youtube: </label>
                                    <input class="form-control" type="text" name="youtube"  value="{{ old('youtube', $setting->youtube) }}" >
                                    @if($errors->has('Youtube'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('Youtube') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Instagram: </label>
                                    <input class="form-control" type="text" name="instagram"  value="{{ old('instagram', $setting->instagram) }}" >
                                    @if($errors->has('instagram'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('instagram') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Twitter: </label>
                                    <input class="form-control" type="text" name="twitter"  value="{{ old('company_address', $setting->twitter) }}" >
                                    @if($errors->has('twitter'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('twitter') }}</strong>
                                        </div>
                                    @endif
                                </div>
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

