@props(['routeName', 'title', 'icon'])

<li class="nav-item">
    <a href="{{ route($routeName) }}"
        class="nav-link {{ request()->routeIs($routeName) ? 'active' : '' }} py-3 border-bottom rounded-0"
        aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="{{ $title }}"
        data-bs-original-title="{{ $title }}">
        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="{{ $title }}">
            <use xlink:href="#{{ $icon }}"></use>
        </svg>
    </a>
</li>
