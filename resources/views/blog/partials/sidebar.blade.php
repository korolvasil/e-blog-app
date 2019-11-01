@section('aside')
    <section>
        <h2>Categories</h2>
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('blog.posts.by.category', $category) }}">{{$category->name}} ({{$category->posts_count}})</a>
                </li>
            @endforeach
        </ul>
    </section>

@endsection
