@extends('layouts.default')
@section('content')
<h1 class="username">{{ $user->name }} さん</h1>
<div class="mypage">
  <div class="mypage_left">
    <div class="mypage_booking">
      <h2 class="mypage_content_ttl">予約状況</h2>
      @if($errors->has('booking_date'))
      <ul>
        @foreach($errors->get('booking_date') as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      @endif
      @foreach($bookings as $index => $booking)
      <div class="mypage_booking_card">
        <div class="booking_card_header">
          <img src="{{ asset('image/clock.png' )}}" class="clockicn" alt="clockicn">
          <p class="booking_card_ttl">
            予約{{ $index+1 }}
          </p>
          <form action="/booking/delete/{{ $booking->id }}" method="post">
            @csrf
            <input type="image" src="{{ asset('image/delete.png') }}" alt="削除する" class="deleteicn">
          </form>
        </div>
        <form action="/booking/update/{{ $booking->id }}" class="booking_form" method="post">
          @csrf
          <table class="booking_content_table">
            <tr>
              <th>Shop</th>
              <td>
                {{ $booking->shop->name }}
              </td>
            </tr>
            <tr>
              <th>Date</th>
              <td>
                <input type="date" name="booking_date" class="mypage_booking_input" value="{{ $booking->booking_date }}">
              </td>
            </tr>
            <tr>
              <th>Time</th>
              <td>
                <select name="booking_time" class="mypage_booking_input" id="currenttime">
                  @for ($i = 10; $i <= 23; $i++) 
                  <option value="{{ $i }}:00" {{ $booking->booking_time == $i.':00:00' ? "selected" : "" }}>
                    {{ $i }}:00 
                  </option>
                  <option value="{{ $i }}:30" {{ $booking->booking_time == $i.':30:00' ? "selected" : "" }}>
                    {{ $i }}:30 
                  </option>
                  @endfor
                </select>
              </td>
            </tr>
            <tr>
              <th>Number</th>
              <td>
                <select name="number" class="mypage_booking_input">
                  @for( $k = 1; $k <= 6; $k++ )
                  <option value="{{ $k }}" {{ $booking->number == $k ? "selected" : "" }}>{{ $k }}人</option>
                  @endfor
                </select>
              </td>
            </tr>
          </table>
          <input type="submit"  value="予約を変更する" class="booking_update_btn">
        </form>
      </div>
      @endforeach
    </div>
      
    <div class="mypage_evaluation">
      <h2 class="mypage_content_ttl">評価</h2>
      @if($errors->has('evaluation'))
      <ul>
        @foreach($errors->get('evaluation') as $error2)
        <li>{{ $error2 }}</li>
        @endforeach
      </ul>
      @endif
      @if($errors->has('comment'))
      <ul>
        @foreach($errors->get('comment') as $error3)
        <li>{{ $error3 }}</li>
        @endforeach
      </ul>
      @endif
        @foreach($evaluations as $evaluation)
        <div class="mypage_booking_card">
          @if(empty($evaluation->evaluation->id))
          <form action="/evaluation" class="booking_form" method="post">
          @else
          <form action="/evaluation/delete/{{ $evaluation->evaluation->id }}" method="post">
            @csrf
            <input type="image" src="{{ asset('image/delete.png') }}" class="evaluation_deleteicn">
          </form>
          <form action="/evaluation/update/{{ $evaluation->evaluation->id }}" class="booking_form" method="post">
          @endif
            @csrf
            <input type="hidden" name="booking_id" value="{{ $evaluation->id }}">
            <table class="booking_content_table">
              <tr>
                <th>Shop</th>
                <td>
                  {{ $evaluation->shop->name }}
                </td>
              </tr>
              <tr>
                <th>Date</th>
                <td>
                  {{ $evaluation->booking_date }}
                </td>
              </tr>
              <tr>
                <th>Time</th>
                <td>
                  {{ substr($evaluation->booking_time ,0 ,5) }}
                </td>
              </tr>
              <tr>
                <th>Number</th>
                <td>
                  {{ $evaluation->number }}
                </td>
              </tr>
              <tr>
                <th>Evaluation</th>
                <td class="rate-form">
                  @for( $l = 5; $l >= 1; $l-- )
                  @if(empty($evaluation->evaluation->id))
                  <input id="star{{ $l }}" type="radio" name="evaluation" value="{{ $l }}">
                  <label for="star{{ $l }}">★</label>
                  @else
                  <input id="star{{ $l }}" type="radio" name="evaluation" value="{{ $l }}" {{ $evaluation->evaluation->evaluation == $l ? "checked" : "" }}>
                  <label for="star{{ $l }}">★</label>
                  @endif
                  @endfor
                </td>
              </tr>
              <tr>
                <th class="mypage_evaluation_th">Comment</th>
                <td>
                  <textarea class="mypage_evaluation_comment" name="comment">@if(!empty($evaluation->evaluation->id)){{ $evaluation->evaluation->comment }}@endif</textarea>
                </td>
              </tr>
            </table>
            @if(empty($evaluation->evaluation->id))
            <input type="submit"  value="評価を登録する" class="booking_update_btn">
            @else
            <input type="submit" value="評価を変更する" class="booking_update_btn">
            @endif
          </form>
        </div>
        @endforeach
    </div>
  </div>

  <div class="mypage_favorite">
    <h2 class="mypage_content_ttl">お気に入り店舗</h2>
    <div class="favorite_shop">
      @foreach($favorites as $favorite)
      <div class="shop_card">
        <div class="shop_card_img">
          <img src="{{ $favorite->shop->url }}" alt="店舗画像">
        </div>
        <div class="shop_card_content">
          <div class="card_content_ttl">
            <h1>{{ $favorite->shop->name }}</h1>
          </div>
          <div class="card_content_tag">
            <p class="content_tag_area">
              #{{ $favorite->shop->area->name }}
            </p>
            <p class="content_tag_category">
              #{{ $favorite->shop->category->name }}
            </p>
          </div>
          <div class="card_content_footer">
            <div class="card_content_detailbtn btn">
              <a href="/detail/{{ $favorite->shop->id }}">詳しくみる</a>
            </div>
            @if($favorite->shop->is_liked_by_auth_user())
            @if($favorite->shop_id == $favorite->shop->id)
            <form action="/favorites/delete/{{ $favorite->id }}" method="post">
              <input type="image" src="{{ asset('image/fav.png')}}" class="fav_btn">
            @endif
            @else
            <form action="/favorites" method="post">
              <input type="hidden" value="{{ $favorite->shop->id }}" name="shop_id">
              <input type="image" src="{{ asset('image/unfav.png') }}" class="fav_btn">
            @endif    
            @csrf
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection