<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/products">Products</a>
            </li>
            <li>
                <a href="/orders">Orders</a>
            </li>
            <li>
                <a href="/contact">Contact us</a>
            </li>
            <li>
                <a href="/about">About</a>
            </li>

        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Footer</p>
    </footer>

</body>
</html>
