<!Doctype HTML>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    Laravel
    </title>
</head>
<body>
<h1>Welcome Page</h1>
@if(session('message'))
    <p>{{session('message')}}</p>
@endif
</body>
</html>