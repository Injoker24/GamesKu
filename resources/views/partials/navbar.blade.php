<div class="navbar">
    <a href="#" style="padding-left: 200px;"><img src="{{ asset('storage/GamesKu Icon.png') }}" alt="" width="50"></a>
    <div style="padding-right: 200px;">
        @auth
            <a class="nav-details" href="/home">Home</a>
            @if (Auth::user()->IsAdmin)
                <a class="nav-details" href="#">Manage Transaction</a>
                <a class="nav-details" href="#">Manage Game</a>
            @else
                <a class="nav-details" href="/transaction">Transaction</a>
                <a class="nav-details" href="#">History</a>
            @endif
            <a class="nav-details" href="/logout">Logout</a>
        @else
            <a class="nav-details" href="/register">Register</a>
            <a class="login-button" href="/login">Login</a>
        @endauth
    </div>
</div>
