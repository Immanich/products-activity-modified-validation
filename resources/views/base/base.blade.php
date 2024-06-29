<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <script src="https://kit.fontawesome.com/74f7d44090.js" crossorigin="anonymous"></script>
</head>
<body class="flex">
    <div class="navbar flex flex-col bg-gray-300 min-h-lvh w-2/12">
        <div class="logo text-center font-bold py-10 hover:bg-gray-500 hover:text-zinc-200 duration-500 hover:cursor-pointer" style="font-size: 2.5rem;">
            <h1>Immanich</h1>
        </div>
        
        <nav class="text-center mt-3">
            <ul class="text-2xl">
                <li class="p-4 hover:bg-gray-500 hover:text-zinc-200 duration-500"><a href="/">Home</a></li>
                <li class="p-4 hover:bg-gray-500 hover:text-zinc-200 duration-500"><a href="/about ">About</a></li>
                <li class="p-4 hover:bg-gray-500 hover:text-zinc-200 duration-500"><a href="/product">Products</a></li>
                <li class="p-4 hover:bg-gray-500 hover:text-zinc-200 duration-500"><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="content w-10/12">
        @yield('content')
    </div>
</body>
</html>