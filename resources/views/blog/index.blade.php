@extends('blog.layout')

@section('content')
    @foreach($posts as $post)
        @php
            /** @var \App\Models\BlogCategory $category */
            $category =  $post->category
        @endphp
        @include('blog.partials.post.card')
    @endforeach
    <div class="container">{{ $posts->links() }}</div>
@endsection
