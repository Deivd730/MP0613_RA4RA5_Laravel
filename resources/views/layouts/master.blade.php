<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="bg-primary text-white p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Movies App</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mb-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white p-3 mt-auto">
        <div class="container text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
