<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    {{ $resources ?? '' }}

    <title>{{ $title }} - Guitar Chord Book</title>
</head>
<body class="bg-neutral-100 text-neutral-700">

    <x-layout.header/>

    {{ $slot }}
</body>
</html>