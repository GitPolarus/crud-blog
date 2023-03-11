<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog F9</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('view.login') }}>login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('view.register') }}>register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href={{ route('logout') }}>logout</a>
                    </li>
                @endauth


            </ul>

        </div>
    </div>
</nav>
