<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Admin | Login</title>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div
            class="row w-50 bg-gradient-light d-flex justify-content-center align-items-center mx-auto mt-5 border rounded">
            <div class="p-5 w-100">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                </div>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="user" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    {{ csrf_field()}}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary rounded py-2 px-5">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


</body>

</html>
