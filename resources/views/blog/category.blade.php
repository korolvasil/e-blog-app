@extends('blog.layout')

@section('content')
    @if($posts->count())
        @each('blog.partials.post.card', $posts, 'post')
        <div class="container">{{ $posts->links() }}</div>
    @else
        There is no posts in this category
    @endif
@endsection
