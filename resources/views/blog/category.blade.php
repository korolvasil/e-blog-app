@extends('blog.layout')

@section('content')
    @foreach($categories as $category)
        <div>
            <p>{{$category->name}} <small>by {{$category->user->login}}, {{$category->created_at->diffForHumans()}}</small></p>
        </div>

        @foreach($category->posts as $post)
            @include('blog.partials.post.card')
        @endforeach

        <hr>
    @endforeach
@endsection
