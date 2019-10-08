<nav class="main-nav">
    <div class="inner">
        <ul>
            <li><a href=""><span>Послуги</span></a></li>
            <li><a href=""><span>Товари</span></a></li>
            <li{!! request()->routeIs('blog.posts.all') ? " class='current'" : ''!!}>
                <a href="{{route('blog.posts.all')}}"><span>Блог</span></a>
            </li>
            <li><a href=""><span>Наші роботи</span></a></li>
            <li><a href=""><span>Про нас</span></a></li>
        </ul>
    </div>
</nav>
