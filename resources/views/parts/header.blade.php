<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ecom</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
            </ul>
            <form class="d-flex" method="get" action="{{ url('/search') }}">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 500px;" name="query" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @if (!Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ url('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ url('registration') }}">Registration</a>
                    </li>
                </ul>
            @else
            
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                        </ul>
                      </li>
                    
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ url('cart') }}">Cart({{ cartItemCount() }})</a>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</nav>
