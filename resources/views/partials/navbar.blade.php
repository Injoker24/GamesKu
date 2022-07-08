<div class="navbar">
    <a href="#" style="padding-left: 50px;"><img src="{{ asset('storage/GamesKu Logo.png') }}" alt="" width="200"></a>
    <div style="padding-left: 100px;">
        <a class="nav-details" href="/">HOME</a>
        @auth
            <a class="nav-details" href="#">TRANSACTION</a>
            <a class="nav-details" href="#">HISTORY</a>
            <a class="nav-details" href="/logout">LOGOUT</a>
        @else
            <a class="nav-details" href="/register">REGISTER</a>
            <a class="nav-details" href="/login">LOGIN</a>
        @endauth
    </div>
</div>
