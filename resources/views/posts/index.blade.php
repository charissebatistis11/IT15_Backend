<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=source-sans-3:400,600" rel="stylesheet" />
        <style>
            :root {
                --ink: #111;
                --muted: #6b6b6b;
                --paper: #f7f7f7;
                --card: #ffffff;
                --line: #e1e1e1;
                --accent: #2b6cb0;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: "Source Sans 3", Arial, sans-serif;
                color: var(--ink);
                background: linear-gradient(180deg, var(--paper), #ffffff 60%);
            }

            .page {
                min-height: 100vh;
                display: grid;
                grid-template-columns: 200px 1fr;
                gap: 20px;
                padding: 24px;
            }

            .sidebar {
                background: var(--card);
                border-radius: 8px;
                padding: 16px;
                border: 1px solid var(--line);
                height: fit-content;
            }

            .sidebar h2 {
                margin: 0 0 12px;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 0.06em;
                color: var(--muted);
            }

            .category-list {
                list-style: none;
                margin: 0;
                padding: 0;
                display: grid;
                gap: 8px;
            }

            .category-list a {
                display: block;
                padding: 8px 10px;
                border-radius: 6px;
                text-decoration: none;
                color: var(--ink);
                border: 1px solid transparent;
            }

            .category-list a.active,
            .category-list a:hover {
                border-color: var(--accent);
                color: var(--accent);
            }

            .content {
                display: grid;
                gap: 16px;
            }

            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .header h1 {
                margin: 0;
                font-size: 24px;
            }

            .header span {
                color: var(--muted);
            }

            .grid {
                display: grid;
                gap: 12px;
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }

            .card {
                background: var(--card);
                border-radius: 8px;
                padding: 14px;
                border: 1px solid var(--line);
            }

            .card h3 {
                margin: 0 0 8px;
                font-size: 16px;
            }

            .card p {
                margin: 0;
                color: var(--muted);
                font-size: 14px;
                line-height: 1.5;
            }

            .empty {
                padding: 32px;
                border: 1px dashed var(--line);
                border-radius: 8px;
                color: var(--muted);
                background: #fafafa;
            }

            @media (max-width: 768px) {
                .page {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="page">
            <aside class="sidebar">
                <h2>Categories</h2>
                <ul class="category-list">
                    <li>
                        <a href="{{ route('posts.index') }}" class="{{ $selectedSlug ? '' : 'active' }}">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a
                                href="{{ route('posts.index', ['category' => $category->slug]) }}"
                                class="{{ $selectedSlug === $category->slug ? 'active' : '' }}"
                            >
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
            <section class="content">
                <div class="header">
                    <h1>Posts</h1>
                    <span>{{ $posts->count() }} result{{ $posts->count() === 1 ? '' : 's' }}</span>
                </div>
                @if ($posts->isEmpty())
                    <div class="empty">No posts found for this category.</div>
                @else
                    <div class="grid">
                        @foreach ($posts as $post)
                            <article class="card">
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->description }}</p>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </body>
</html>
