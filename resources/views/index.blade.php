@extends('layouts.default')
@section('content')

  <form action="/search" class ="search" method="get">
    <select name="search_area" class="search_form search_form_area" id="search_area" onchange="submit(this.form)">
      <option value="">All areas</option>
      @foreach ($areas as $area)
      @if(!empty($search_area) && $search_area == $area->id)
        <option value = "{{ $area->id }}" selected>{{ $area->name }}</option>
      @else
        <option value="{{ $area->id }}">{{ $area->name }}</option>
      @endif
      @endforeach
    </select>
    <select name="search_category" class="search_form search_form_category" id="search_category" onchange="submit(this.form)">
      <option value="">All categories</option>
      @foreach ($categories as $category)
      @if(!empty($search_category) && $search_category == $category->id)
        <option value = "{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}" >{{ $category->name }}</option>
      @endif
      @endforeach
    </select>
    @if(!empty($search_keyword))
    <input type="search" value="{{$search_keyword}}" name="search_keyword" class="search_form search_form_keyword" placeholder="Search ..." id="search_keyword" onchange="submit(this.form)">
    @else
    <input type="search" name="search_keyword" class="search_form search_form_keyword" placeholder="Search ..." id="search_keyword" onchange="submit(this.form)">
    @endif
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
        <div class="card_content_footer">
          <div class="card_content_detailbtn btn">
            <a href="/detail/{{ $shop->id }}">詳しくみる</a>
          </div>
          @if($shop->is_liked_by_auth_user())
            @foreach($favorites as $favorite)
              @if($favorite->shop_id == $shop->id)
              <form action="/favorites/delete/{{ $favorite->id }}" method="post" class="card_content_fav">
                <input type="image" src="{{ asset('image/fav.png')}}" class="fav_btn">
              @endif
            @endforeach
          @else
          <form action="/favorites" method="post" class="card_content_fav">
            <input type="hidden" value="{{ $shop->id }}" name="shop_id">
            <input type="image" src="{{ asset('image/unfav.png')}}" class="fav_btn">
          @endif    
          @csrf
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection