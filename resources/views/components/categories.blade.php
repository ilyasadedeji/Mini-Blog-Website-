<nav class="categories-nav">
    <ul class="category-list">
        @foreach ($categories as $category)
            <li><a href="{{ route('posts.category', $category->slug) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</nav>
