<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Rese</title>
  </head>
  <body>
    <div class="contents">
      <header class="header">
        <nav class="header_nav" id="js-nav">
          <ul class="nav_items">
            @guest
            <li class="nav-items_item menu_item"><a href="/">Home</a></li>
            <li class="nav-items_item menu_item"><a href="/register">Registration</a></li>
            <li class="nav-items_item menu_item"><a href="/login">Login</a></li>
            @endguest
            @auth
            <li class="nav-items_item menu_item">
              <a href="/">Home</a>
            </li>
            <li class="nav-items_item">
              <form action="/logout" method="post">
                @csrf
                <input type="submit" class="menu_item_logout" value="Logout">
              </form>
            </li>
            <li class="nav-items_item menu_item">
              <a href="/mypage">Mypage</a>
            </li>
            @endauth
          </ul>
        </nav>
        <div class="menubtn" id="menubtn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <a href="/" class="header_title">Rese</a>
      </header>
      @yield ('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>