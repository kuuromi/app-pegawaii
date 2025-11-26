<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP PEGAWAI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        :root {
            --app-purple: #70589E;
            --app-text: #70589E;
        }
        
        .navbar-custom {
            background-color: var(--app-purple) !important;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: 600;
            padding-left: 1rem;
            padding-right: 1rem;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .navbar-custom .nav-link:hover {
            opacity: 1;
        }

        .welcome-container {
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #f8f8f8;
        }

        .welcome-text {
            color: var(--app-text);
            font-size: 3.5rem;
            font-weight: bold;
        }

        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container-fluid mx-5">
            <a class="navbar-brand me-5" href="#">APP PEGAWAI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('employees.index') }}">EMPLOYEE</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('departemen.index') }}">DEPARTMENT</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('positions.index') }}">POSITION</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('attendance.index') }}">ATTENDANCE</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('salaries.index') }}">SALARY</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('projects.index') }}">PROJECT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="welcome-container">
        <div class="container">
            <h1 class="welcome-text">WELCOME, USER!</h1>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>