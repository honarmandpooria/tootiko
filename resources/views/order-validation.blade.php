@extends('layouts.app')







@section('content')



    <div class="container text-center">

        <h3 class="text-success">تبریک! مرحله اول سفارش شما با موفقیت انجام شد</h3>

        <p>هم اکنون برای ثبت نهایی سفارش، ایمیل خود را وارد کنید</p>



        <form class="needs-validation" novalidate method="POST"
              action="{{route('before-register.postStep2')}}"
        >
            @csrf


            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <div dir="rtl" class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل</label>


                        <input dir="ltr" id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-4"></div>

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        ارسال
                    </button>
                </div>
            </div>

        </form>

    </div>





@endsection

