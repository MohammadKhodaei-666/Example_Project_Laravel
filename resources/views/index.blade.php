<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('/css/Grids.css')}}">
    <link rel="stylesheet" href="{{url('css/Styles.css')}}">
    <script src="{{url('js/jquery.js')}}"></script>
    <script>
        $(function () {
            $("#button1").click(function () {
                $("#topmenu ul").slideToggle();
                $("#cats").css("right", "-300px");
            });

            $("#button2").click(function () {
                if ($("#cats").css("right") == "-300px") {
                    $("#cats").css("right", "0");
                    $("#topmenu ul").slideUp();
                } else {
                    $("#cats").css("right", "-300px");
                }
            });

            $("#cats .plus").click(function (event) {
                $(this).parent().siblings("ul").slideToggle();
                event.preventDefault();
            });

            //$(window).resize(function () {
            //    if ($("#cats").css("width") != "300px") {
            //        $("#cats .submenu").slideUp();
            //    }
            //});
        });
    </script>
</head>
<body>
    <!--navbar-->
    @include('front/navbar')

    <!--header-->
    @include('front/header')

    <!--menu-->
    @include('front/menu')

    <!--main-->
    @include('front.main')

    <!--footer-->
    @include('front.footer')
</body>
</html>
