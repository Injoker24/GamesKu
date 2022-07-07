<div class="navbar">
    <a class="navbar-brand" href="#" style="padding-left: 50px;"><img src="{{ asset('storage/GamesKu Icon.png') }}" alt="" width="75"></a>
    <div style="padding-left: 100px;">
        <a class="nav-details" href="/">HOME</a>
        @auth
            <a class="nav-details" href="/">HISTORY</a>
            <a class ="nav-details" href="/contact">LOGOUT</a>
        @else
            <a class="nav-details" href="/">REGISTER</a>
            <a class ="nav-details" href="/contact">LOGIN</a>
        @endauth
    </div>
</div>
