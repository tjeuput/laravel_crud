<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Blog - {{$title ?? 'Blog App'}}</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="min-h-full">

    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>

    <main>{{$slot}}</main>


</div>
</body>
</html>
