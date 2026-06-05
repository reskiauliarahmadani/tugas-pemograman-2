<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Resep Masakan' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --cream: #faf6f0;
            --brown: #3d2b1f;
            --orange: #e8703a;
            --orange-light: #f5a574;
            --green: #4a7c59;
            --border: #e2d5c3;
            --shadow: 0 4px 24px rgba(61, 43, 31, 0.10);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--cream);
            color: var(--brown);
            min-height: 100vh;
        }

        nav {
            background: var(--brown);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 16px rgba(61, 43, 31, 0.18);
        }

        nav .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            color: var(--cream);
            text-decoration: none;
            letter-spacing: 0.02em;
        }

        nav .logo span {
            color: var(--orange-light);
        }

        nav a.nav-btn {
            background: var(--orange);
            color: white;
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background 0.2s;
        }

        nav a.nav-btn:hover {
            background: var(--orange-light);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            padding: 0.85rem 1.2rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            padding: 0.85rem 1.2rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .btn {
            display: inline-block;
            padding: 0.55rem 1.3rem;
            border-radius: 7px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-primary {
            background: var(--orange);
            color: white;
        }

        .btn-primary:hover {
            background: var(--orange-light);
        }

        .btn-secondary {
            background: var(--green);
            color: white;
        }

        .btn-secondary:hover {
            opacity: 0.85;
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid var(--border);
            color: var(--brown);
        }

        .btn-outline:hover {
            border-color: var(--orange);
            color: var(--orange);
        }

        .btn-danger {
            background: #c0392b;
            color: white;
        }

        .btn-danger:hover {
            background: #e74c3c;
        }

        .form-group {
            margin-bottom: 1.3rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.4rem;
            font-size: 0.9rem;
            color: var(--brown);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.65rem 0.9rem;
            border: 1.5px solid var(--border);
            border-radius: 7px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            background: white;
            color: var(--brown);
            transition: border-color 0.2s;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--orange);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-error {
            color: #c0392b;
            font-size: 0.82rem;
            margin-top: 0.3rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: #9e8c7b;
            font-size: 0.85rem;
            border-top: 1px solid var(--border);
            margin-top: 3rem;
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('recipes.index') }}" class="logo">🍳 Resep<span>Ku</span></a>
        <a href="{{ route('recipes.create') }}" class="nav-btn">+ Tambah Resep</a>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        {{ $slot }}
    </div>

    <footer>
        &copy; {{ date('Y') }} ResepKu — Aplikasi Pendataan Resep Masakan
    </footer>
</body>

</html>
