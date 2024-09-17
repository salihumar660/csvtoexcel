@extends('header')
<div class="main-content">
    <div class="header">
        <h1>Upload CSV Only</h1>
    </div>

    <div class="upload-container">
        <form action="{{route('import-csv')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Upload CSV File</h2>
            <input type="file" name="csv_file" accept=".csv">
            <button type="submit">Upload</button>
        </form>
    </div>
    <div class="btn-container">
        <form action="{{ route('export-csv') }}" method="GET">
            <button type="submit">Export to Excel</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>