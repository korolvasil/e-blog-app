@extends('blog.layout')

@section('content')
    @foreach($posts as $post)
        @include('blog.partials.post.card')
    @endforeach
@endsection
