@extends ('layouts.default')
@section ('content')
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
      <img src="{{ asset('shopimg/' . $shop->shopimg) }}" alt="店内画像">
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
      @if ($errors->has('booking_date'))
      <p class="booking_form_error">{{ $errors->first('booking_date') }}</p>
      @endif
      <input type="date" name="booking_date" class="booking_form_item date" id="tomorrow">
      <select name="booking_time" class="booking_form_item time" id="currenttime">
        @for ($i = 10; $i <= 23; $i++) 
        <option value="{{ $i }}:00">{{ $i }}:00</option>
        <option value="{{ $i }}:30">{{ $i }}:30</option>
        @endfor
      </select>
      <select name="number" class="booking_form_item number" id="number">
        @for ($k = 1; $k <= 6; $k++) 
        <option value="{{ $k }}">{{ $k }}人</option>
        @endfor
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