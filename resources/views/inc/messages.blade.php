{{--
@if(count($errors) > 0)





    <div dir="rtl" class="position-fixed fixed-top col-md-3" style="top: 100px;left: unset !important">


        <div class="alert alert-danger alert-dismissible animated fadeInDown">
            <button type="button" class="close float-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-times"></i> خطا!</h5>
            <ul>
                @foreach($errors->all() as $error)

                    <li>
                        {{$error}}
                    </li>


                @endforeach
            </ul>
        </div>


    </div>





@endif
--}}


@if(session('success'))




    <div dir="rtl" class="position-fixed fixed-top col-md-3" style="top: 75px;left: unset !important">


        <div class="alert alert-success alert-dismissible animated fadeInDown shadow">
            <button type="button" class="close float-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> تبریک!</h5>

            {{session('success')}}

        </div>


    </div>






@endif


@if(session('error'))



    <div dir="rtl" class="position-fixed fixed-top col-md-3" style="top: 75px;left: unset !important">
        <div class="alert alert-danger alert-dismissible animated fadeInDown shadow">

            <button type="button" class="close float-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i>خطا رخ داد!</h5>
            {{session('error')}}

        </div>

    </div>

@endif



@if(session('edited'))



    <div dir="rtl" class="position-fixed fixed-top col-md-3" style="top: 75px;left: unset !important">


        <div class="alert alert-warning alert-dismissible animated fadeInDown">
            <button type="button" class="close float-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> تبریک!</h5>

            {{session('edited')}}


        </div>


    </div>





@endif
