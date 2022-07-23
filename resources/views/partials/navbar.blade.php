<div class="navbar sticky-top">
    <a href="/" style="padding-left: 200px;"><img src="{{ asset('storage/GamesKu Icon.png') }}" alt="" width="50"></a>
    <div style="padding-right: 200px;">
        @auth
            <a class="nav-details {{ (Request::is("home")? "active" : Request::is("search*")) ? "active" : "" }}" href="/home">@lang('navbar.home')</a>
            @if (Auth::user()->IsAdmin)
                <a class="nav-details {{ Request::is("manage-transaction*")? "active" : "" }}" href="/manage-transaction">@lang('navbar.manage_transaction')</a>
                <a class="nav-details {{ Request::is("manage-game*")? "active" : "" }}" href="/manage-game">@lang('navbar.manage_game')</a>
            @else
                <a class="nav-details {{ Request::is("transaction*")? "active" : "" }}" href="/transaction">@lang('navbar.transaction')</a>
                <a class="nav-details {{ Request::is("history*")? "active" : "" }}" href="/history">@lang('navbar.history')</a>
            @endif
            <a class="nav-details {{ Request::is("profile")? "active" : "" }}" href="/profile">@lang('navbar.profile')</a>
            <a class="login-button" href="/logout">@lang('navbar.logout')</a>
        @else
            <a class="nav-details {{ Request::is("register")? "active" : "" }}" href="/register">@lang('navbar.register')</a>
            <button class="nav-details" id="popup-button-navbar" style="background-color: var(--dark); border: none">@lang('navbar.change_language')</button>
            <a class="login-button {{ Request::is("login")? "active" : "" }}" href="/login">@lang('navbar.login')</a>
        @endauth
    </div>
</div>
