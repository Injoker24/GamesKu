<div class="navbar sticky-top">
    <a href="/" style="padding-left: 200px;"><img src="{{ asset('storage/GamesKu Icon.png') }}" alt="" width="50"></a>
    <div style="padding-right: 200px;">
        @auth
            <a class="nav-details {{ Request::is("home")? "active" : "" }}" href="/home">Home</a>
            @if (Auth::user()->IsAdmin)
                <a class="nav-details {{ Request::is("manage-transaction*")? "active" : "" }}" href="/manage-transaction">Manage Transaction</a>
                <a class="nav-details {{ Request::is("manage-game*")? "active" : "" }}" href="/manage-game">Manage Game</a>
            @else
                <a class="nav-details {{ Request::is("transaction*")? "active" : "" }}" href="/transaction">Transaction</a>
                <a class="nav-details {{ Request::is("history*")? "active" : "" }}" href="/history">History</a>
            @endif
            <a class="nav-details {{ Request::is("profile")? "active" : "" }}" href="/profile">Profile</a>
            <a class="login-button" href="/logout">Logout</a>
        @else
            <a class="nav-details {{ Request::is("register")? "active" : "" }}" href="/register">Register</a>
            <a class="login-button {{ Request::is("login")? "active" : "" }}" href="/login">Login</a>
        @endauth
    </div>
</div>
