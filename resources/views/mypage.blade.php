@extends('layouts.default')
@section('content')
<h1 class="username">{{ $user->name }} さん</h1>
<div class="mypage">
  <div class="mypage_booking">
    <h2 class="mypage_booking_ttl">予約状況</h2>
    <div class="booking_shop">
      @foreach ($shops as $shop)
      @foreach($bookings as $booking)
      @if($booking->shop_id == $shop->id)
      <form action="/booking/delete/{{ $booking->id}}" method="post">  
        @csrf
        <div class="mypage_booking_card">
          <div class="booking_card_header">
            <img src="{{ asset('image/clock.png')}}" class="clockicn" alt="clockicn">
            <p class="booking_card_ttl">予約{{$loop->iteration}}</p>
            <input type="image" src="{{ asset('image/delete.png')}}" alt="削除する" class="deleteicn">
          </div>
          <table class="booking_content_table">
            <tr>
              <th>Shop</th>
              <td>{{ $shop->name }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{ $booking->booking_date }}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ $booking->booking_time }}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{ $booking->number }}人</td>
            </tr>
          </table>
          <input type="hidden" value="{{ $shop->id }}" name="shop_id">
        </div>
      </form>
      @endif
      @endforeach 
      @endforeach
    </div>
  </div>

  <div class="mypage_favorite">
    <h2 class="mypage_favorite_ttl">お気に入り店舗</h2>
    <div class="favorite_shop">
      @foreach ($shops as $shop)
      @foreach($favorites as $favorite)
      @if($favorite->shop_id == $shop->id)
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
                <form action="/favorites/delete/{{ $favorite->id }}" method="post">
                  <input type="image" src="{{ asset('image/fav.png')}}" class="fav_btn">
                @endif
              @endforeach
            @else
            <form action="/favorites" method="post">
              <input type="hidden" value="{{ $shop->id }}" name="shop_id">
              <input type="image" src="{{ asset('image/unfav.png')}}" class="fav_btn">
            @endif    
            @csrf
            </form>
          </div>
        </div>
      </div>
      @endif
      @endforeach 
      @endforeach
    </div>
  </div>
</div>
@endsection