<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/path-to-your-logo.svg" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="container py-5">
        <div class="text-center mb-5">
            <img src="https://via.placeholder.com/150" alt="Logo" class="d-block mx-auto mb-4">
            <h1 class="display-5 fw-bold">Nossos Serviços</h1>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" class="card-img-top mb-3" alt="...">
                        <h5 class="card-title">Manipulação de Receitas</h5>
                        <p class="card-text">Descrição curta do serviço.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" class="card-img-top mb-3" alt="...">
                        <h5 class="card-title">Produtos Naturais</h5>
                        <p class="card-text">Descrição curta do serviço.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" class="card-img-top mb-3" alt="...">
                        <h5 class="card-title">Farmácia Veterinária</h5>
                        <p class="card-text">Descrição curta do serviço.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-5">
            <h2 class="text-center mb-4">Solicite um orçamento</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="Seu nome" value="{{ old('nome') }}" required>
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="telefone" class="form-control" placeholder="Celular" value="{{ old('telefone') }}">
                            </div>
                        </div>
                        <button class="btn btn-success">Enviar solicitação</button>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <footer class="bg-white text-muted py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>
</body>
</html>