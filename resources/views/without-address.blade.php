@extends('header')
<div class="main-content">
    <div class="header">
        <h1>Users Without Address</h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($usersWithoutAddress as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->addresses->isEmpty())
                        <span class="text-danger">No Address</span>
                        @else
                            Address
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
