<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('CSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <title>Hello Admin</title>
</head>

<body>
    <div class="container-fluid p-0 form-border">
        @include('navbar')
        <div class="table-responsive">
            <table class="table  text-center">

                <thead>

                    <tr>
                        <th class="bg-dark text-white">Id</th>
                        <th class="bg-dark text-white">Title</th>
                        <th class="bg-dark text-white">Tag</th>
                        <th class="bg-dark text-white">Genre</th>
                        <th class="bg-dark text-white">Description</th>
                        <th class="bg-dark text-white">Image</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($post as $posts)
                    <tr>
                        <td class="bg-light">{{$posts->id}}</td>
                        <td class="bg-light">{{$posts->title}}</td>
                        <td class="bg-light">{{$posts->tag}}</td>
                        <td class="bg-light">{{$posts->genre}}</td>
                        <td class="bg-light">{{$posts->description}}</td>
                        <td class="bg-light"><img src="{{asset($posts->image)}}" width="100" alt=""></td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
     
        </div>
    </div>

    </div>

    <script>
        let searchbar = document.getElementById("search");
        let search_drop = document.getElementById("search_dropdown");


        function placeholder() {

            searchbar.placeholder = 'search by ' + search_drop.value;

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>