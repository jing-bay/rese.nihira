@extends('layouts.default')
@section('content')
  <div class="item">
    <div class="detail">
      <div class="detail_top">
        <a href="/" class="detail_top_backbtn">
          <span></span>
          <span></span>
        </a>
        <h1 class="detail_top_title">{{ $shop->name }}</h1>
      </div>
      <div class="detail_img">
        <img src="{{ $shop->url}}" alt="店内画像">
      </div>
      <div class="detail_tag">
        #{{ $shop->area->name }} #{{ $shop->category->name }}
      </div>
      <div class="detail_overview">
        {{ $shop->overview }}
      </div>
    </div>
    <div class="booking">
      <h1 class="booking_title">予約</h1>
      <form action="/booking" id="booking_form" class="booking_form" method="post">
        @csrf
        <input type="date" name="booking_date" class="booking_form_item date" id="tomorrow">
        <select name="booking_time" class="booking_form_item time" id="currenttime">
          @for ($i = 10; $i <= 23; $i++) 
            @for ($j = 0; $j <= 30; $j += 30)
              @if($j == 0)
                <option value="{{$i}}:00">{{$i}}:00</option>
              @else
                <option value="{{$i}}:{{$j}}">{{$i}}:{{$j}}</option>
              @endif
            @endfor
          @endfor
        </select>
        <select name="number" class="booking_form_item number" id="number">
          <option value="1">1人</option>
          <option value="2">2人</option>
          <option value="3">3人</option>
          <option value="4">4人</option>
          <option value="5">5人</option>
          <option value="6">6人</option>
        </select>
        <div class="booking_content">
          <table class="booking_content_table">
            <tr>
              <th>Shop</th>
              <td>{{ $shop->name }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td id="inputed_date"></td>
            </tr>
            <tr>
              <th>Time</th>
              <td id="inputed_time"></td>
            </tr>
            <tr>
              <th>Number</th>
              <td id="inputed_number"></td>
            </tr>
          </table>
        </div>
        <input type="submit" class="bookbtn" value="予約する">
        <input type="hidden" value="{{ $shop->id }}" name="shop_id">
      </form>
    </div>
  </div>
@endsection