<div class="title-bar" data-responsive-toggle="topbar-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>

<div class="top-bar" id="topbar-menu">
  <div class="top-bar-left">
    <ul class="menu">
      <li class="menu-text">
        {{ config('app.name', 'Laravel') }}
      </li>
    </ul>
  </div>

  <div class="top-bar-right">
    <ul class="dropdown vertical medium-horizontal menu" data-dropdown-menu>
      @guest
        <li>
          <a href="{{ route('login') }}">Login</a>
        </li>
        <li>
          <a href="{{ route('register') }}">Register</a>
        </li>
      @else
        <li>
          <a href="#">{{ Auth::user()->name }}</a>
          <ul class="menu vertical">
            <li>
              <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      @endguest
    </ul>
  </div>
</div>
