<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(session()->has('user'))
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="{{url('/')}}">Home</a>
            </li>
            @endif
            
            @if(session()->has('admin'))
            <li class="nav-item active">
                <a class="nav-link font-weight-bold"><i>{{session('admin')}}</i></a>
            </li>
            @endif
            
            @if(!session()->has('user') && !session()->has('admin'))
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="{{url('login')}}">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="{{url('admin_login')}}">Admin Panel</a>
            </li>
            @endif

            @if(session()->has('user'))
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="{{url('create_post')}}">Create Post</a>
            </li>
            @endif

        </ul>

        <ul class="navbar-nav ml-auto">

            @if(session()->has('admin'))
            <!-- search form start -->
            <form class="form-inline my-2 my-lg-0 mr-3" action="{{url('search_data')}}" method="post">
                @csrf
                <select class="form-control mr-1" id="search_dropdown" name="search_dropdown" onchange="placeholder()">
                    <option value="id">Id</option>
                    <option value="title">Title</option>
                    <option value="tag">Tag</option>
                    <option value="genre">Genre</option>
                    <option value="description">Description</option>
                </select>
                <input class="form-control mr-sm-2" type="text" id="search" placeholder="search by id" aria-label="Search" name="search_field" value="{{old('search_field')}}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <li class="nav-item active ml-2">
                    <a class=" nav-link btn btn-warning text-dark" href="{{url('admin_dashboard')}}">Reset Search</a>

                </li>

            </form>
            <!-- search form end -->
            @endif

            @if(session()->has('user') || session()->has('admin'))
            <li class="nav-item active">
                <a class="nav-link btn btn-danger" href="{{url('logout')}}">Logout</a>
            </li>
            @endif

        </ul>
    </div>
</nav>