<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Products</title>


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://unpkg.com/htmx.org@1.9.12"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex h-screen bg-gray-300">

    <div class="flex w-full">

        <nav id="main-nav" class="bg-gray-300 text-black w-64 min-h-screen p-5 flex flex-col">
            <div class="logo text-center font-bold py-10 hover:bg-gray-500 hover:text-zinc-200 duration-500 hover:cursor-pointer" style="font-size: 2.5rem;">
                <h2 class="text-3xl font-bold">Immanich</h2>
            </div>
            <div class="text-center flex flex-col mt-6 space-y-2 text-lg">
                <a href="/" class="text-2xl p-4 hover:bg-gray-500 hover:text-zinc-200 text-zinc-900 duration-500 no-underline">
                    Home
                </a>
                <a href="/about" class="text-2xl p-4 hover:bg-gray-500 hover:text-zinc-200 text-zinc-900 duration-500">
                    About
                </a>    
                <a href="/products" class="text-2xl p-4 hover:bg-gray-500 hover:text-zinc-200 text-zinc-900 duration-500 no-underline">
                    Products
                </a>
                <a href="/contact" class="text-2xl p-4 hover:bg-gray-500 hover:text-zinc-200 text-zinc-900 duration-500">
                    Contact Us
                </a>
            </div>
        </nav>

        <div class="flex-1 flex flex-col">
            <div class="flex-1 overflow-auto bg-white shadow-lg">
                <article id="content" class="min-h-[41rem] p-5">
                    @yield('content')
                </article>
            </div>
        </div>
    </div>

</body>
</html>
