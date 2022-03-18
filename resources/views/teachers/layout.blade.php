<!DOCTYPE html>
<html lang="en"  dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('scripts1')
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
</head>
<body>

<nav class='top-nav'>
    <ul>
        <li><a text-shadow href="{{route('teachers.index')}}">الصفحة الرئيسية</a></li>
        <li><a href="{{route('teachers.index')}}">شعبة التعليم الالكتروني</a></li>
        <li><a href="{{route('teachers.create')}}">ادخال المعلومات </a></li>
        <li><a href="{{route('teachers.index')}}">عن المشروع</a></li>
    </ul>
    </nav>
    
@yield('content')
@yield('scripts2')



</body>
</html>