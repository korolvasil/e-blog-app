<article class="mb-5">
    <header>
        <h4>{{$post->title}} #{{$post->id}}</h4>
        <small>by {{$post->user->login}}, {{$post->created_at->diffForHumans()}}</small>
    </header>
    <section>
        {{$post->excerpt}}
    </section>
    <footer class="mt-2">
        <a class="btn btn-primary btn-sm" href="">
            read more
        </a>
    </footer>
</article>
