<li>
    <a href="{{ route('blog.posts.by.category', $category) }}">{{$category->name}} ({{$category->posts_count}})</a>
    @if($category->children->count())
        <ul>
            @each('blog.partials.sidebar.modules.categories.categoryInTree', $category->children, 'category')
        </ul>
    @endif
</li>
