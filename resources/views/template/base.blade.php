<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        #main-nav {
            background-color: #1a202c; /* Darker background */
        }
        #main-nav a {
            transition: background-color 0.3s;
        }
        #main-nav a:hover {
            background-color: #2d3748; /* Slightly lighter background */
        }
        #brand {
            font-family: 'Georgia', serif;
            font-weight: bold;
        }
        footer {
            background-color: #f7fafc;
            border-top: 1px solid #e2e8f0;
        }
        .product-list {
            max-height: 70vh; /* Set a fixed height for the product list */
            overflow-y: auto; /* Make the product list scrollable */
        }
    </style>
</head>
<body class="flex h-screen bg-gray-100">

    <div class="flex w-full">

        <nav id="main-nav" class="text-white w-64 min-h-screen p-5 flex flex-col">
            <div id="brand" class="text-2xl mb-5">
                Blessy Products
            </div>
            <a href="/" class="p-3 hover:bg-blue-600">Home</a>
            <a href="/about" class="p-3 hover:bg-blue-600">About</a>
            <a href="/products" class="p-3 hover:bg-blue-600">Products</a>
            <a href="/contact" class="p-3 hover:bg-blue-600">Contact</a>
        </nav>

        <div class="flex-1 flex flex-col">
            <div class="w-full mx-auto bg-white shadow-lg">
                <article id="content" class="min-h-[41rem] p-5">
                    <!-- Include a product-list section within the content -->
                    <div class="product-list">
                        @yield('content')
                    </div>
                </article>

                <footer class="text-center text-gray-500 py-3">
                    Copyright &copy; 2024. All rights reserved.
                </footer>
            </div>
        </div>
    </div>

</body>
</html>
