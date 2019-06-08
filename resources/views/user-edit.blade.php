<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>داشبورد طوطیکو</title>

    <link rel="stylesheet" href="css/app.css">
</head>
<body class="hold-transition sidebar-mini">

{{--USER EDIT MODAL--}}

<style>
    .blured-bg {
        -webkit-filter: blur(4x);
        filter: blur(4px);
        pointer-events: none;
    }
</style>

<div class="container-fluid position-fixed d-flex align-items-center justify-content-center"
     style="z-index:2001; height:100vh;">


    <div class="card rounded-0">

        <div class="card-header bg-white">

            <h3 class="card-title text-success pt-3 px-5">
                خوش آمدید! لطفا قبل از ورود به پنل خود، اطلاعات زیر را تکمیل بفرمایید
            </h3>


        </div>

        <div class="card-body">
            <form class="needs-validation" novalidate method="POST"
                  action="{{route('before-register.postStep3')}}"
            >
                @csrf


                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="نام">
                </div>


                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="رمز عبور">
                </div>


                <div class="form-group">
                    <input type="text" name="password-confirm" class="form-control" placeholder="تکرار رمز عبور">
                </div>


                <div class="form-group">

                    <input type="submit" class="btn btn-primary" value="به روز رسانی">
                </div>


            </form>
        </div>


    </div>


</div>


{{--JUST EXAMPLE DASHBOARD IN BACKGROUND--}}
<div class="blured-bg wrapper">

</div>

<!-- REQUIRED SCRIPTS -->


<script src="js/app.js"></script>
</body>
</html>
