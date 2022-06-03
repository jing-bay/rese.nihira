@extends('default')
@section('content')

<div class="search">
  <form action="/search" method="get">
    <select name="search_area">
      <option value="" selected>All areas</option>
      @foreach ($areas as $area)
        <option value="{{ $area->name }}">{{ $area->name }}</option>
      @endforeach
    </select>
    <select name="search_category">
      <option value="" selected>All categories</option>
      @foreach ($categories as $category)
        <option value="{{ $category->name }}">{{ $category->name }}</option>
      @endforeach
    </select>
    <input type="search" name="keyword" placeholder="Search ...">
  </form>
</div>

@foreach ($items as $item)
<li>
  <a href="/detail/{{ $item->id }}">{{ $item->name }}</a>
</li>
@endforeach

@endsection