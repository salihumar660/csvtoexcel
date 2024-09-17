
@extends('header')
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="container mt-5">
            @if(session('welcome_message'))
                <div class="alert alert-success">
                    {{ session('welcome_message') }}
                </div>
            @endif
    
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
