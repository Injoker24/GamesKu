<div class="navbar">
    <a href="#" style="padding-left: 50px;"><img src="{{ asset('storage/GamesKu Logo.png') }}" alt="" width="200"></a>
    <div style="padding-left: 100px;">
        <a class="nav-details" href="/home">HOME</a>
        @auth
            @if (Auth::user()->IsAdmin)
                <a class="nav-details" href="#">MANAGE TRANSACTIONS</a>
                <a class="nav-details" href="#">MANAGE GAME</a>
            @else
                <a class="nav-details" href="#">TRANSACTION</a>
                <a class="nav-details" href="#">HISTORY</a>
            @endif
            <a class="nav-details" href="/logout">LOGOUT</a>
        @else
            <a class="nav-details" href="/register">REGISTER</a>
            <a class="nav-details" href="/login">LOGIN</a>
        @endauth
    </div>
</div>
