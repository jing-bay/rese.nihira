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

<div class="item">
@foreach ($items as $item)
  <div class="item_card">
    <div class="item_card_img">
      <img src="{{ $item->url}}" alt="店舗画像">
    </div>
    <div class="item_card_content">
      <div class="card_content_ttl">
        <h1>{{ $item->name }}</h1>
      </div>
      <div class="card_content_tag">
        <p class="content_tag_area">
          #{{ $item-> area -> name }}
        </p>
        <p class="content_tag_category">
          #{{ $item-> category -> name }}
        </p>
      </div>
      <div class="card_content_detailbtn">
        <a href="/detail/{{ $item->id }}">詳しく見る</a>
      </div>
      <div class="card_content_favbtn">
        <i class="far fa-heart"></i>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection