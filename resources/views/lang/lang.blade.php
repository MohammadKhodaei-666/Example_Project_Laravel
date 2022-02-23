<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h5>{{__('auth.message')}}</h5>
    {{--<h5>@lang('auth.message')</h5>--}}
    <h5>@lang('auth.welcome',['name'=>"محمد"])</h5>
    <h5>{{trans('auth.welcome',['name'=>"محمد"])}}</h5>
    <h5>{{trans_choice('auth.welcome2',0)}}</h5>
</body>
</html>
