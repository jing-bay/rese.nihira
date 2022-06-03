<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>Rese</title>
</head>
<body>
  <div class="contents">
    <header class="header">
      <div class="menubtn"><span></span><span></span><span></span></div>
      <h1 class="header_title">Rese</h1>
    </header>
      @yield('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/menu.js') }}"></script>
  </div>
</body>
</html>