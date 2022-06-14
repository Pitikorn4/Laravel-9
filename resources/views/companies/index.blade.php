<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
<body>
    <div class = "container mt-2">
        <div class="row">
            <div class="col-lg-10 text-center">
                <h2>Laravel 9 Example</h2>
            </div>
            <div class="form-search">
                    <form action="{{ route('companies.index') }}" method="GET">
                        <input type="text" name="search" placeholder="Search here . ." class="col-8 my-2">
                        <button type="submit" class="btn btn-success col-2 my-2">search</button>
                    </form>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Address</th>
                </tr>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                </tr>
                @endforeach
            </table>
            {!! $companies->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</body>
</html>
@endsection