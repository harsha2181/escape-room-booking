<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Escape Room Booking - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: white;
        }
        body {
            background: url('https://images.unsplash.com/photo-1579546929518-9e396f3cc809?auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.65);
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 1rem;
        }
        h1 {
            font-weight: 900;
            font-size: 4rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.7);
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 3rem;
            max-width: 600px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }
        .btn-primary, .btn-success {
            min-width: 160px;
            font-weight: 700;
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #004085;
            box-shadow: 0 8px 25px rgba(0,64,133,0.6);
        }
        .btn-success:hover {
            background-color: #19692c;
            box-shadow: 0 8px 25px rgba(25,105,44,0.6);
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="content">
        <h1>Escape Room Booking</h1>
        <p>Secure your adventure — book, pay, and enjoy unforgettable escape rooms.</p>
        <div>
            <a href="{{ route('login') }}" class="btn btn-primary me-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success">Sign Up</a>
        </div>
    </div>
</body>
</html>
