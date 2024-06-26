<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>
<body class="flex">
    <div class="navbar flex flex-col p-4 bg-gray-300 min-h-lvh w-2/12" style="">
        <nav class="text-center">
            <ul class="text-2xl">
                <li class="mt-3"><a href="/">Home</a></li>
                <li class="mt-6"><a href="/about ">About</a></li>
                <li class="mt-6"><a href="/product">Products</a></li>
                <li class="mt-6"><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="content p-8 w-10/12">
        @yield('content')
    </div>
</body>
</html>