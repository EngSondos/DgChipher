<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('articale.index')}}">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('articale.index')}}">Home <span class="sr-only">(current)</span></a>
            </li>


@if (Session::has('loginId'))

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Articles
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('articale.create')}}">Add</a>
                    <a class="dropdown-item" href="{{route('articale.index')}}">List</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('category.create')}}">Add</a>
                    <a class="dropdown-item" href="{{route('category.index')}}">List</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('product.create')}}">Add</a>
                    <a class="dropdown-item" href="{{route('product.index')}}">List</a>
                </div>
            </li>

                </ul>
                <form action="{{route('logout')}}" method="get">
                    <button class="btn btn-danger">Logout</button>
                </form>
                @endif
                @if (!Session::has('loginId'))
    <form action="{{route('login')}}" method="get">
        <button class="btn btn-primary ">Login</button>
    </form>

    
                @endif
    </div>
</nav>
