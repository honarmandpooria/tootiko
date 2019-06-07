@extends('layouts.app')



@section('content')


    <div class="container">


        <div class="row">

            <div class=" col-md-8 offset-md-2">


                <div class="bg-white shadow rounded p-4">

                    @if($errors -> all())

                        <div dir="rtl" class="alert alert-danger" role="alert">
                            لطفا مواردی که با رنگ قرمز مشخص شده اند را تصحیح کنید.
                        </div>


                        {{--                    USE THIS FOR DEBUG--}}
                        {{--   <div dir="rtl" class="alert alert-danger" role="alert">
                               @foreach($errors-> all() as $error)
                                   {{$error}}
                                   <br>
                               @endforeach
                           </div>
   --}}
                    @endif


                    @include('order.form')



                </div>


            </div>
        </div>


    </div>



@endsection


