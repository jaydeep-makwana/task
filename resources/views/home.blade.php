<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('CSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <title>Home</title>
</head>

<body>
    <div class="container-fluid p-0 form-border">
        @include('navbar')
        <div class="container mt-5 w-50">

            @if(session('register'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('register')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- register form -->
            <form action="{{url('register')}}" method="POST">

                <div class="row">
                    <h1 class="text-center col-lg-12 p-1">Register</h1>
                </div>

                @csrf
                <div class="form-group">
                    <label for="first_name" class="">First Name</label>
                    <input class="form-control" type="text" name="firstName" id="first_name" value="{{ old('firstName') }}">
                    <small>@error('firstName'){{$message}} @enderror </small>
                </div>

                <div class="form-group">
                    <label for="last_name" class="">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="last_name" value="{{ old('lastName') }}">
                    <small>@error('lastName'){{$message}} @enderror </small>
                </div>

                <div class="form-group">
                    <label for="email" class="">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                    <small>@error('email'){{$message}} @enderror </small>
                </div>

                <div class="form-group">
                    <label for="password" class="">Password</label>
                    <input class="form-control" type="password" name="Password" id="password" value="{{ old('Password') }}">
                    <small>@error('Password'){{$message}} @enderror </small>
                </div>

                <div class="form-group">
                    <label for="c_password" class="">Confirm Password</label>
                    <input class="form-control" type="password" name="c_password" id="c_password" value="{{ old('c_password') }}">
                    <small>@error('c_password'){{$message}} @enderror </small>
                </div>

                <button class="btn btn-primary ">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>

            </form>


        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>