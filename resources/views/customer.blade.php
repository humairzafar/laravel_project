<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">{{$title}}</h2>
    <form action="{{$url}}" method="post">
    @csrf
        <div class="row mb-3">
            <div class="col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ $customer->name ?? '' }}">
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required value="{{ $customer->email ?? '' }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ (isset($customer) && $customer->gender == 'male') ? 'selected' : '' }}>Male</option>
<option value="female" {{ (isset($customer) && $customer->gender == 'female') ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="col-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" required value="{{ $customer->address?? '' }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="country" class="form-label">Country</label>
                <input type="text" id="country" name="country" class="form-control" required value="{{ $customer->country ?? '' }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

</div>

</body>
</html>
