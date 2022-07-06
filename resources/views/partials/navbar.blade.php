<nav class="navbar navbar-expand-lg" style="background-color: #1F2833;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="{{ asset('storage/GamesKu Icon.png') }}" alt="" width="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="/home">HOME</a>
          </li>
        @auth
            <li class="nav-item">
            <a class="nav-link text-white" href="#">TRANSACTION</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="#">HISTORY</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="/logout">LOGOUT</a>
            </li>
        @else
            <li class="nav-item">
            <a class="nav-link text-white" href="/login">LOGIN</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="/register">REGISTER</a>
            </li>
        @endauth
        </ul>
      </div>
    </div>
  </nav>
