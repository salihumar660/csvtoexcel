<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: #333;
            font-size: 16px;
        }
        .sidebar .nav-link.active {
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 80px; 
        }
        .header {
            padding: 15px 20px;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            position: fixed;
            top: 0;
            left: 250px; 
            width: calc(100% - 250px); 
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            margin: 0;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <h4>Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="bi bi-house-door"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('upload-form')}}">
                    <i class="bi bi-file-earmark"></i> File Form
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users-adresses')}}">
                    <i class="bi bi-map"></i> Users With Address
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users-without-Address')}}">
                    <i class="bi bi-person"></i> Without Address Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('duplicate-Address')}}">
                    <i class="bi bi-file-earmark-text"></i> Duplicate Address
                </a>
            </li>
            
            <li class="nav-item">
                <form method="get" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    