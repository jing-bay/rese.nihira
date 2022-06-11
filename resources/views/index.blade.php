@extends('default')
@section('content')

  <form action="/search" class ="search" method="get">
    <select name="search_area" class="search_form search_form_area">
      <option value="" selected>All areas</option>
      @foreach ($areas as $area)
      <option value="{{ $area->id }}">{{ $area->name }}</option>
      @endforeach
    </select>
    <select name="search_category" class="search_form search_form_category">
      <option value="" selected>All categories</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}" >{{ $category->name }}</option>
      @endforeach
    </select>
    <input type="search" name="search_keyword" class="search_form search_form_keyword" placeholder="Search ...">
  </form>

  <div class="shop">
  @foreach ($shops as $shop)
    <div class="shop_card">
      <div class="shop_card_img">
        <img src="{{ $shop->url }}" alt="店舗画像">
      </div>
      <div class="shop_card_content">
        <div class="card_content_ttl">
          <h1>{{ $shop->name }}</h1>
        </div>
        <div class="card_content_tag">
          <p class="content_tag_area">
            #{{ $shop->area->name }}
          </p>
          <p class="content_tag_category">
            #{{ $shop->category->name }}
          </p>
        </div>
        <div class="card_content_detailbtn">
          <a href="/detail/{{ $shop->id }}">詳しく見る</a>
        </div>
        <div class="card_content_favbtn">]
          @if($shop->is_liked_by_auth_user())

          <form action="/favorites/delete/{{ $favorite_id }}" method="post">
          @endforeach
          @else
          <form action="/favorites" method="post">
          @endif
          @csrf
            <input type="submit" value="&#xf004;" class="favbtn_icon">
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>

@endsection