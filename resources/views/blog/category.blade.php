@extends('blog.layout')

@section('content')
    @if($posts->count())
        @foreach($posts as $post)
            @include('blog.partials.post.card')
        @endforeach
        <div class="container">{{ $posts->links() }}</div>
    @else
        There is no posts in this category
    @endif
@endsection
