<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #0f172a;
            color: white;
        }
    </style>
</head>
<body>

<div class="flex">

    @include('sidebar')

    <div class="flex-1 p-6">
        @yield('content')
    </div>

</div>

</body>
</html>
