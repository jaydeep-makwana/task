<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('CSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid p-0 form-border">
        @include('navbar')
        <div class="container mt-5 w-50">

            @if(session('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('fail')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class=" ">
                <h1 class="text-center p-1">Login</h1>
            </div>

            <!-- login form -->
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                    <small>@error('email'){{$message}} @enderror </small>
                </div>

                <div class="form-group">
                    <label for="password" class="">Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}">
                    <small>@error('password'){{$message}} @enderror </small>
                </div>

                <button class="btn btn-primary ">Login</button>
            </form>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>