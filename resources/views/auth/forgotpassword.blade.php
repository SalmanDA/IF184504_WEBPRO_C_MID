@extends('partials.auth_partials')
@section('auth_content')
    <main class="auth-container">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5"  style="background-color: #809CC0; width:450px;">
                        <div class="card-header justify-content-center">
                            <img class="img-fluid login-logo mx-auto" style="width: 150px;" src="{{ asset('assets') }}/assets/img/logo.png">
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block mb-3">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    {{ $message }}
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block mb-2">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    {{ $message }}
                                </div>
                            @endif
                            <div class="small mb-3" style="color: #fff; font-weight: 200; font-size: 16px;"> {{ __('Enter your email address and we will send you a link to reset your password.') }}</div>
                            <form action="{{ route('forgotpasswordsendlink') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label style="color: #fff; font-weight: 600; font-size: 16px;" class="small mb-1" for="email">{{ __('Email') }}</label>
                                    <input class="form-control" id="email" name="email" type="email" aria-describedby="email" placeholder="Enter email address" />
                                </div>
                                <button style="color: #1E73BE; font-weight: 600; font-size: 16px;" class="btn btn-warning" type="submit">{{ __('Submit') }}</button>
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
