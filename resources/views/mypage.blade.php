@extends('layouts.default')
@section('content')
<div class="item">
  <div class="mypage_booking">
    <h1>予約状況</h1>
    @foreach ($bookings as $booking)
    <div class="booking_card">
      <img src="{{ $item->url}}" alt="店舗画像">
    </div>
    <div class="item_card_content">
      <div class="card_content_ttl">
        <h1>{{ $item->name }}</h1>
      </div>
      <div class="card_content_tag">
        <p class="content_tag_area">
          #{{ $item->area->name }}
        </p>
        <p class="content_tag_category">
          #{{ $item->category->name }}
        </p>
      </div>
@endsection