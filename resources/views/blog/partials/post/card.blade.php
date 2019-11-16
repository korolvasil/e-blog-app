<article class="mb-5">
    <header>
        <h4>{{$post->title}} #{{$post->id}}</h4>
        <small>by {{$post->user->login}}, {{$post->created_at->diffForHumans()}}</small>
        @if($category = $post->category)
            <small>in <a href="{{ route('blog.posts.by.category', $category) }}">{{$category->name}}</a>
                @if($category->ancestors->count())
                    @foreach($category->ancestors as $category)
                    , <a href="{{ route('blog.posts.by.category', $category) }}">{{$category->name}}</a>
                    @endforeach
                @endif
            </small>
        @endif
    </header>
    <section>
        {{$post->excerpt}}
    </section>
    <footer class="mt-2">
        <a class="btn btn-primary btn-sm" href="{{ route('blog.posts.show', $post) }}">
            read more
        </a>
    </footer>
</article>
