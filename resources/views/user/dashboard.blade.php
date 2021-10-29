@extends('partials.user_partials')
@section('user_content')
    <main>
        <div class="container">
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mt-5">
                <div class="mr-4 mb-3 mb-sm-0">
                    <h1 class="mb-0">{{ __('Welcome,') }} {{ Auth::user()->name }}</h1>
                </div>
            </div>
            <div class="card card-waves mb-4 mt-5">
                <div class="card-body p-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col text-center">
                            <h2 id="text" class="text-primary">You're not check in yet!</h2>
                            <h1 class="text-xl py-4">
                                <span id="hour">00</span> :
                                <span id="min">00</span> :
                                <span id="sec">00</span>
                                <span hidden id="milisec">00</span>
                            </h1>
                            <div class="justify-content-between">                
                                <div>
                                    <!-- <button class="btn btn-primary lift p-3" onclick="start()" id="start">{{ __('Check In') }}</button> -->
                                    <a class="btn btn-primary lift p-3" href="{{ route('usr.checkin', Auth::user()->id) }}">{{ __('Check In') }}</a>
                                    <!-- <button class="btn btn-danger lift p-3" onclick="stop()" id="stop">{{ __("Check Out") }}</button> -->
                                    <a class="btn btn-danger lift p-3"  href="{{ route('usr.checkout', Auth::user()->id) }}" onclick="confirm_modal() data-toggle="modal" data-target="#modalCheckout">
                                    {{ __("Check Out") }}</a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col justify-content-center align-items-center">
                            <img class="img-dashboard" src="{{ asset('assets') }}/assets/img/illustration.svg" alt="Illustration">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkoutModalLabel">Checkout Confirmation</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure want to checkout?</div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="stop()" id="stop">Yes</button>
                    </div>
                </div>
            </div>
    </main>
@endsection

