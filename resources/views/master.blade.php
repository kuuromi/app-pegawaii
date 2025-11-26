<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Aplikasi Manajemen Pegawai')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        :root {
            --app-purple: #70589E; 
            --app-text: #70589E;
        }

        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
            padding-top: 56px;
        }
        
        .container {
            padding-top: 20px;
        }

        .navbar-custom {
            background-color: var(--app-purple) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            color: white !important;
            opacity: 1;
        }

        .navbar-custom .nav-link {
            color: white !important;
            font-weight: 600;
            padding-left: 1rem;
            padding-right: 1rem;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            opacity: 1;
        }

        .form-wrapper, .detail-wrapper, .table-wrapper {
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
            margin-top: 20px;
            border-radius: 3px;
        }

        .welcome-page-container {
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #f5f5f5;
        }
        .welcome-text {
            color: var(--app-text);
            font-size: 3.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="{{ route('employees.index') }}">APP PEGAWAI</a>
            
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

    <div id="app-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    </script>
    @yield('scripts')
</body>
</html>
