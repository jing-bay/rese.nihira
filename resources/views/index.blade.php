@foreach ($posts as $post)
    <li>
      <a href="/detail/{shop_id}">{{ $post->title }}</a>
    </li>
@endforeach