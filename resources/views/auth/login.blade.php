@extends('partials.auth_partials')
@section('auth_content')
    <main class="auth-container">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" >
                    <div class="card shadow-lg border-0 rounded-lg mt-5" style="background-color: #809CC0; width:450px;">
                        <div class="card-header justify-content-center">
                            <img class="img-fluid login-logo mx-auto" style="width: 150px;"  src="{{ asset('assets') }}/assets/img/logo.png">
                        </div>
                        <div class="card-body" >
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block mb-2">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    {{ $message }}
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block mb-2">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    {{ $message }}
                                </div>
                            @endif
                            <form action="{{ route('post_login') }}"  method="POST">
                                @csrf
                                <div class="form-group" >
                                    <label style="color: #fff; font-weight: 600; font-size: 16px;" class="small mb-1" for="email">{{ __('Email') }}</label>
                                    <input  class="form-control" name="email" id="email" type="email" placeholder="Enter email address" />
                                </div>
                                <div class="form-group">
                                    <label style="color: #fff; font-weight: 600; font-size: 16px;" class="small mb-1" for="password">{{ __('Password') }}</label>
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password" />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a style="color: #fff; font-weight: 600; font-size: 16px;" class="small" href="/forgotpassword">{{ __('Forgot Password?') }}</a>
                                    <button style="color: #1E73BE; font-weight: 600; font-size: 16px;" class="btn btn-warning lift" type="submit">{{ __('Login') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a style="color: #fff; font-weight: 600; font-size: 16px;" href="/register">{{ __('Need an account? Sign up!') }}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
