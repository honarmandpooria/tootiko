@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">

            <div class=" col-md-8 offset-md-2">


                <div class="bg-white shadow rounded p-4">
                    <form method="POST" action="/">
                        @csrf

                        {{--language and category--}}

                        <h4 dir="rtl" class="text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۱)</span>
                            انتخاب زبان و زمینه ترجمه</h4>
                        <div dir="rtl" class="row">

                            <div class="form-group col-md-6">
                                {{--                {!! Form::select('start_lang_id', [1=>'انگلیسی',2=>'فارسی'], 'انگلیسی', ['class'=>'custom-select']) !!}--}}
                                <select name="start_lang_id" class="custom-select">
                                    <option value="">زبان مبدا</option>
                                    <option value="1">انگلیسی</option>
                                    <option value="2">فارسی</option>
                                </select>

                            </div>


                            <div class="form-group col-md-6 ">
                                {{--                {!! Form::select('target_lang_id', [2=>'فارسی',1=>'انگلیسی'], 'فارسی', ['class'=>'custom-select']) !!}--}}
                                <select name="start_lang_id" class="custom-select">
                                    <option value="">زبان مقصد</option>
                                    <option value="1">انگلیسی</option>
                                    <option value="2">فارسی</option>
                                </select>
                            </div>


                            <div class="form-group col-md-6 ">
                                {{--            {!! Form::select('category_id', [1=>'عمومی',2=>'مهندسی',3=>'پزشکی',4=>'انسانی'], null, ['class'=>'custom-select w-50']) !!}--}}
                                <select name="category_id" class="custom-select">
                                    <option value="">زمینه کلی</option>
                                    <option value="1">عمومی</option>
                                    <option value="2">مهندسی</option>
                                    <option value="3">پزشکی</option>
                                    <option value="3">انسانی</option>
                                </select>
                            </div>


                        </div>

                        <hr class=" border-primary my-5">


                        {{--upload file--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۲)</span>
                            انتخاب فایل ترجمه</h4>


                        <div dir="rtl" class="custom-file">
                            {{--            {!! Form::file('filepath', ['class'=>'custom-file-input','style'=>'cursor:pointer']) !!}--}}
                            <input name="translate-file" type="file" class="custom-file-input" style="cursor:pointer">
                            {{--            {!! Form::label('filepath','لطفا فایل ترجمه را انتخاب کنید', ['class'=>'custom-file-label']) !!}--}}
                            <label for="translate-file" class="custom-file-label text-left">فایل ترجمه</label>
                        </div>


                        <hr class=" border-primary my-5">

                        {{--quality radio--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۳)</span>
                            انتخاب کیفیت نهایی</h4>
                        <div dir="rtl" class="text-center">
                            <div class="custom-control form-control-lg custom-radio custom-control-inline">
                                {{--            {!! Form::radio('quality_id', 1, false,['id'=>'radio1','class'=>'custom-control-input']) !!}--}}
                                <input type="radio" name="quality_id" value="1" id="radio1"
                                       class="custom-control-input">
                                {{--            {!! Form::label('radio1','کیفیت متوسط', ['class'=>'custom-control-label']) !!}--}}
                                <label for="radio1" class="custom-control-label text-muted">کیفیت معمولی</label>
                            </div>

                            <div class="custom-control form-control-lg custom-radio custom-control-inline">
                                {{--            {!! Form::radio('quality_id', 2, true,['id'=>'radio2','class'=>'custom-control-input']) !!}--}}
                                <input type="radio" name="quality_id" value="2" id="radio2"
                                       class="custom-control-input">
                                {{--            {!! Form::label('radio2','کیفیت خوب', ['class'=>'custom-control-label']) !!}--}}
                                <label for="radio2" class="custom-control-label">کیفیت خوب</label>
                            </div>

                            <div class="custom-control form-control-lg custom-radio custom-control-inline">
                                {{--            {!! Form::radio('quality_id', 3, false,['id'=>'radio3','class'=>'custom-control-input']) !!}--}}
                                <input type="radio" name="quality_id" value="3" id="radio3"
                                       class="custom-control-input">
                                {{--            {!! Form::label('radio3','کیفیت عالی', ['class'=>'custom-control-label']) !!}--}}
                                <label for="radio3" class="custom-control-label">کیفیت عالی</label>
                            </div>

                        </div>
                        <hr class=" border-primary my-5">


                        {{--Access Rights--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۴)</span>
                            انتخاب حق دسترسی</h4>

                        <div dir="rtl" class="text-center">
                            <div class="custom-control custom-radio form-control-lg custom-control-inline">
                                {{--            {!! Form::radio('is_secret', 0, true,['id'=>'radio4','class'=>'custom-control-input']) !!}--}}
                                <input type="radio" name="is_secret" value="0" id="radio4" class="custom-control-input">
                                {{--            {!! Form::label('radio4','آزاد', ['class'=>'custom-control-label']) !!}--}}
                                <label for="radio4" class="custom-control-label">آزاد</label>
                            </div>

                            <div class="custom-control custom-radio form-control-lg custom-control-inline">
                                {{--            {!! Form::radio('is_secret', 1, false,['id'=>'radio5','class'=>'custom-control-input']) !!}--}}
                                <input type="radio" name="is_secret" value="1" id="radio5" class="custom-control-input">
                                {{--            {!! Form::label('radio5','محرمانه', ['class'=>'custom-control-label']) !!}--}}
                                <label for="radio5" class="custom-control-label">محرمانه</label>
                            </div>

                        </div>

                        <hr class=" border-primary my-5">


                        {{--Time--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۵)</span>
                            مهلت ترجمه</h4>
                        <div dir="rtl" class="clearfix">
                            <div class="form-group">
                                {{--                {!! Form::number('deadline', 7 ,['class'=>'form-control w-25 float-right']) !!}--}}
                                <input type="number" name="deadline" value="7" class="form-control float-right"
                                       style="max-width: 100px">
                            </div>
                            <span class="float-right mr-3 py-1">روز</span>

                        </div>
                        <hr class="border-primary my-5">


                        {{--Description--}}


                        <h4 dir="rtl" class=" text-right mb-4 text-muted"><span
                                class="font-weight-bold text-primary">۶)</span>
                            توضیحات</h4>

                        <div dir="rtl" class="form-group">
                            {{--            {!! Form::textarea('description', null, ['class'=>'form-control w-75', 'placeholder'=>'توضیحات لازم را در این جا وارد کنید','rows'=>'3']) !!}--}}
                            <textarea name="description" id="description" class="form-control "
                                      placeholder="هر توضیحاتی که فکر میکنید لازم است در این قسمت وارد کنید."
                                      rows="3"></textarea>
                            <label for="description"></label>
                        </div>


                        <div class="form-group">
                            {{--            {!! Form::submit('ثبت سفارش',['class'=>'btn btn-primary float-right mt-4']) !!}--}}
                            <button type="submit" class="btn btn-primary mt-4">ثبت سفارش</button>
                        </div>


                    </form>
                </div>


            </div>
        </div>

    </div>
@endsection
