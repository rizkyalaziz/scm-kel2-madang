<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
    
</head>
<body class="bg-dark bg-opacity-60" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; height: 100vh;">
    
    <div class="container pt-5">
        <div class="row justify-content-center">
             <div class="col-xl-9 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('assets/img/miee.png'); background-size: 400px 400px; background-position: center; background-repeat: no-repeat; height: 60vh; "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    
        <div class=" p-4 w-100" style="max-width: 550px;">
        
        <h1 class="text-center">Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $key => $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Log in</button>
        </div>
        </form>
    </div>
    </div>
        </div>
    </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>