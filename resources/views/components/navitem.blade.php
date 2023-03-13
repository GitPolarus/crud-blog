@props(['routeName', 'title'])

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs($routeName) ? 'active' : '' }}" aria-current="page"
        href="{{ route($routeName) }}">{{ $title }}</a>
</li>
