<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Laravel9</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Simple Laravel9</div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Employees</div>
            <div>
                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm float-end">Create</a>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($employees->isNotEmpty())
                            @foreach ($employees as $employee)
                                <tr>
                                    <td align="center">{{ $employee->id }}</td>
                                    <td align="center">
                                        @if ($employee->image != '' && file_exists(public_path() . '/uploads/employees/' . $employee->image))
                                            <img src="{{ url('uploads/employees/' . $employee->image) }}" alt=""
                                                width="150px" height="100px">
                                        @else
                                            <img src="{{ url('assets/images/no-image-icon.jpg') }}" alt=""
                                                width="150px" height="100px">
                                        @endif
                                    </td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td align="center">
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                            class="btn btn-success btn-sm">edit</a>
                                        <a href="#" onclick="deleteEmployee({{ $employee->id }})"
                                            class="btn btn-danger btn-sm">delete</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="post"
                                            id="employee-edit-action-{{ $employee->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="6">Record Not Found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            {{-- รันคำสั่งนี้เสมอ php artisan vendor:publish --tag=laravel-pagination --}}
            {{ $employees->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function deleteEmployee(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('employee-edit-action-' + id).submit();
        }
    }
</script>

</html>
