<div class="d-flex nav-style">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{route("homePage")}}">Home</a>
    <a class="nav-link {{ Request::is('menu') ? 'active' : '' }}" href="{{route("menu")}}">Menu</a>
</div>
