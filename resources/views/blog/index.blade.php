@extends('blog.layout')

@section('content')
    @each('blog.partials.post.card', $posts, 'post')
    <div class="container">{{ $posts->links() }}</div>
@endsection
