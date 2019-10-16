@extends('layouts.public.app')

@section('content')
    @foreach($posts as $item)
        <article class="mb-5">
            <header>
                <h4>{{$item->title}}</h4>
                <small>by {{$item->user->login}}, {{$item->created_at->diffForHumans()}}</small>
            </header>
            <section>
                {{$item->excerpt}}
            </section>
            <footer class="mt-2">
                <a class="btn btn-primary btn-sm" href="">
                    read more
                </a>
            </footer>
        </article>
    @endforeach
@endsection

@section('aside')
    <h3>SideBar</h3>

@endsection
