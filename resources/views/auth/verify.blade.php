@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div dir="rtl" class="card">
                    <div class="card-header bg-danger text-white">{{ __('لطفا ایمیل خود را تایید کنید.') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('یک ایمیل جدید به شما ارسال شد.') }}
                            </div>
                        @endif

                        {{ __('قبل از ورود به داشبورد، لطفا ایمیل خود را تایید کنید.') }}
                        {{ __('اگر ایمیلی دریافت نکرده اید') }}، <a
                            href="{{ route('verification.resend') }}">{{ __('اینجا کلیک کنید تا دوباره ایمیل برای شما ارسال شود') }}</a>.

                        <br>
                        <a target="_blank" dir="rtl" class="btn btn-success my-2" href="https://gmail.com"><i class="fab fa-google mx-2"></i>
                            باز کردن Gmail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
