<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Customer List</h2>

    <!-- Search Form -->
    <form action="{{ url('/humair/view') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or email">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ url('/humair/view') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Customer Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $value)
                <tr>
                    <td>{{ $value->customer_id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->gender }}</td>
                    <td>{{ $value->country }}</td>
                    <td>{{ $value->address }}</td>
                    <td>
                        <a href="{{ url('/humair/delete/' . $value->customer_id) }}" class="btn btn-danger btn-sm">Trash</a>
                        <a href="{{ route('humair.edit', ['id' => $value->customer_id]) }}" class="btn btn-success btn-sm">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No customers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $customers->links() }}
    </div>
</div>

</body>
</html>
