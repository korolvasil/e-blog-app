<nav class="main-nav">
    <div class="inner">
        <ul>
            <li><a href=""><span>Services</span></a></li>
            <li><a href=""><span>Shop</span></a></li>
            <li{!! request()->routeIs('blog.posts.all') ? " class='current'" : ''!!}>
                <a href="{{route('blog.posts.all')}}"><span>Blog</span></a>
            </li>
            <li><a href=""><span>Works</span></a></li>
            <li><a href=""><span>About us</span></a></li>
        </ul>
    </div>
</nav>
