<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room Booking</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add in <head> -->

    <!-- Add before closing </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #6a11cb;
            background-image: linear-gradient(315deg, #6a11cb 0%, #2575fc 74%);
            border: none;
        }
        .btn-primary:hover {
            background-image: linear-gradient(315deg, #2575fc 0%, #6a11cb 74%);
        }
    </style>
</head>
<body>

<div class="container my-5">
    @isset($header)
        <header class="mb-4">
            <nav class="mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-light">Dashboard</a>
            </nav>
            {{ $header }}
        </header>
    @endisset

    <main>
        @yield('content')
    </main>
</div>

</body>
</html>
