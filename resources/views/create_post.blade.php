<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('CSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <title>Create Post</title>
</head>

<body>
    <div class="container-fluid p-0 form-border">
        @include('navbar')
        <div class="container mt-5 w-50">


            <!-- create post form -->
            <form action="{{url('create_post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <h1 class="text-center col-lg-12 p-1">Create Post</h1>
                </div>

                <div class="form-group">
                    <label for="title" class="">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                    <small>@error('title'){{$message}} @enderror </small>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group ">
                            <label for="genre" class="form-check-label">Genre</label>
                            <input class="form-control" type="text" name="genre" id="genre" value="{{ old('genre') }}">
                            <small>@error('genre'){{$message}} @enderror</small>
                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="form-group ">
                            <label for="tag" class="form-check-label">Tag</label>
                            <input class="form-control" type="text" name="tag" id="tag" value="{{ old('tag') }}">
                            <small>@error('tag'){{$message}} @enderror</small>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="desc" class="form-check-label">Description</label>
                    <textarea name="desc" id="desc" placeholder="" class="form-control">{{old('desc')}}</textarea>
                    <small>@error('desc'){{$message}} @enderror</small>
                </div>

                <div class="form-group">
                    <label for="image" class="">Image</label>
                    <input class="form-control" type="file" name="image" id="image">
                    <small>@error('image'){{$message}} @enderror </small>
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