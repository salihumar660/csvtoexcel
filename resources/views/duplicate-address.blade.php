@extends('header')
<div class="main-content">
    <div class="header">
        <h1>Users Without Address</h1>
    </div>

    @if($duplicates->isEmpty())
        <div class="alert alert-info">
            No duplicate addresses found.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Address</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($duplicates as $index => $duplicate)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $duplicate->address }}</td>
                        <td>{{ $duplicate->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>