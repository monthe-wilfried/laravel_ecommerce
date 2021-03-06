@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><i class="fa fa-shopping-basket fa-xs" aria-hidden="true"></i> <span class="tx-info tx-normal">Trade</span></div>
            <div class="tx-center mg-b-60">Ecommerce Project</div>

        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                @error('email')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><!-- form-group -->

            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>

            </div><!-- form-group -->

            <button type="submit" class="btn btn-info btn-block">Sign In</button>

        </form>
            <br>
            <div class="card-body text-center">
                <span class="card-title" style="color: grey; font-size: 11px; ">Developed by <a href="https://github.com/monthe-wilfried">Monthe Wilfried</a></span>
            </div>

        </div><!-- login-wrapper -->

    </div><!-- d-flex -->


@endsection
