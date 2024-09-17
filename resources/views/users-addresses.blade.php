@extends('header')
    <div class="main-content">
        <div class="header">
            <h1>Address Details</h1>
        </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Address Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usersWithAddressCount as $index => $user)
                        @foreach($user->addresses as $address)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $address->address }}</td>
                            <td>{{ $user->addresses_count }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
