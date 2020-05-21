@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
@endsection

@section('content')

        <div class="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; border-radius: 30px; padding: 20px; margin-bottom: 20px; box-shadow: 0px 10px 10px 0px grey;">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign In</div>

                            <form action="{{route('login')}}" class="d-block" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email or Phone</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <a href="{{ route('password.request') }}">I forgot my password</a>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-dark btn-block"><i class="far fa-envelope"></i> Login with Email</button>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-f"></i> Login with Facebook</button>
                                <button type="submit" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with Google</button>

                            </form>

                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; border-radius: 30px; padding: 20px; box-shadow: 0px 10px 10px 0px grey;">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign Up</div>

                            <form action="{{route('register')}}" class="d-block" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="uname">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pphone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus placeholder="Enter your phone">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="rtpassword">Re-type Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-block">Sigup</button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <div class="panel"></div>
        </div>
@endsection

@section('scripts')
<script src="{{ asset('public/frontend/js/contact_custom.js') }}"></script>
@endsection
