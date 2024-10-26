<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to external styles, if any -->
    <style>
        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #333;
            color: #fff;
        }

        .navbar .brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .nav-links {
            display: flex;
            gap: 1rem;
        }

        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease;
        }

        .navbar .nav-links a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Mobile menu styling */
        .navbar .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .navbar .nav-links.mobile-active {
            display: block;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 1rem 0;
            flex-direction: column;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .navbar .nav-links {
                display: none;
            }

            .navbar .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Section -->
    <header class="navbar">
        <div class="brand">Blog Application</div>
        <nav class="nav-links" id="navLinks">
            <a href="/">Home</a>
            <a href="/sports">Sports</a>
            <a href="/health">Health</a>
            <a href="/tech">Tech</a>
            <a href="/contact">Contact</a>
        </nav>
        <div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Hero section for latest post -->
    @if(isset($latestPost) && $latestPost)
        <section class="hero-section">
            <div class="hero-content">
                <h1>Latest Blog Post</h1>
                <p>{{ $latestPost->title }}</p>
                <a href="{{ route('posts.show', $latestPost->id) }}" class="btn btn-primary">Read More</a>
            </div>
        </section>
    @endif

    <!-- Section for displaying all blog posts -->
    @if(isset($posts) && $posts->isNotEmpty())
        <section class="blog-cards">
            @foreach ($posts as $post)
                <div class="card">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Read More</a>
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    <!-- JavaScript for Responsive Navbar Toggle -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('mobile-active');
        });
    </script>
</body>
</html>
