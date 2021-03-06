<header class="p-3 sticky-top bg-dark text-white">
    <div class="container ">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/books" class="nav-link px-2 {{Request::getRequestUri() == "/books" ? 'text-secondary' :'text-white'}}">Home</a></li>
                <li><a href="/user/books" class="nav-link px-2 {{Request::getRequestUri() == "/user/books" ? 'text-secondary' :'text-white'}}">My books</a></li>
                <li><a href="/books/add" class="nav-link px-2 {{Request::getRequestUri() == "/books/add" ? 'text-secondary' :'text-white'}}">Add book</a></li>
            </ul>

            <form action='/books/search' method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                @csrf
                <input type="search" name="query" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <a  href="/user/{{Auth::check()?'logout':'login'}}" class="btn btn-outline-light me-2">{{Auth::check()?'Logout':'Login'}}</a>
                @if(!Auth::check())<a  href="/user/register" class="btn btn-warning">Sign up</a>@endif
            </div>
        </div>
    </div>
</header>
