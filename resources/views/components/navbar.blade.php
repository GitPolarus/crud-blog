<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog F9</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <x-navitem routeName="view.home" title="Home" />
                @guest
                    <x-navitem routeName="view.login" title="Login" />
                    <x-navitem routeName="view.register" title="Register" />
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link">{{ Auth::user()->name }}</a>
                    </li>

                    <x-navitem routeName="logout" title="Logout" />
                @endauth


            </ul>

        </div>
    </div>
</nav>
