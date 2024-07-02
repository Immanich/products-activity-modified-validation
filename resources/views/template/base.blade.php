<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MODIFIED VALIDATION</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/74f7d44090.js" crossorigin="anonymous"></script>   
    <style>
        .main {
            font-family: monospace, 'Georgia', serif;
        }
        
        #main-nav {
            background-color: #d1d5db;
        }
        #main-nav a {
            transition: background-color 0.3s;
        }
        #main-nav a:hover {
            background-color: #2d3748;
        }
        #brand {
            /* font-family: monospace, 'Georgia', serif; */
            font-weight: bold;
        }
        footer {
            background-color: #f7fafc;
            border-top: 1px solid #e2e8f0;
        }
        .product-list {
            max-height: 70vh;
            overflow-y: auto;
        }
    </style>
</head>
<body class="flex h-screen bg-gray-100">

    <div class="main flex w-full">

        <nav id="main-nav" class="text-white w-64 min-h-screen p-5 flex flex-col items-center text-center">
            <div id="brand" class="text-4xl text-bold mb-5 text-gray-800">
                Immanich
            </div>
            <a href="/" class="text-2xl w-full text-gray-800 p-3 hover:bg-blue-600 hover:text-zinc-200" style="text-decoration: none;">Home</a>
            <a href="/about" class="text-2xl w-full text-gray-800 p-3 hover:bg-blue-600 hover:text-zinc-200" style="text-decoration: none;">About</a>
            <a href="/products" class="text-2xl w-full text-gray-800 p-3 hover:bg-blue-600 hover:text-zinc-200" style="text-decoration: none;">Products</a>
            <a href="/contact" class="text-2xl w-full text-gray-800 p-3 hover:bg-blue-600 hover:text-zinc-200" style="text-decoration: none;">Contact</a>
        </nav>

        <div class="flex-1 flex flex-col">
            <div class="w-full mx-auto bg-white shadow-lg">
                <article id="content" class="min-h-[41rem] p-5">
                    <div class="product-list">
                        @yield('content')
                    </div>
                </article>

                {{-- <footer class="text-center text-gray-500 py-3">
                    Copyright &copy; 2024. All rights reserved.
                </footer> --}}
            </div>
        </div>
    </div>

</body>
</html>
