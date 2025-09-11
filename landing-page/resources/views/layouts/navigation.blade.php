<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Navegação Bootstrap</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Arquivo de estilos personalizado -->
    <link rel="stylesheet" href="resources/sass/app.scss">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        /* Estilos específicos para o menu responsivo móvel */
        .responsive-profile-section .user-info-section {
            margin-bottom: 1rem;
        }

        .responsive-nav-link {
            display: block;
            padding: 0.5rem 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
        <div class="container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <svg class="d-inline-block align-text-top h-9 w-auto text-gray-800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 22h20L12 2zM12 6.5L17.5 17H6.5L12 6.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <!-- Botão hamburguer -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de navegação -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log In</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>

                <!-- Perfil para desktop (opcional, apenas para usuários autenticados) -->
                @auth
                <ul class="navbar-nav d-none d-sm-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Perfil para mobile -->
                <div class="d-sm-none responsive-profile-section mt-3">
                    <div class="user-info-section">
                        <div class="fw-medium text-dark">{{ Auth::user()->name }}</div>
                        <div class="fw-medium text-secondary">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-2">
                        <a class="nav-link responsive-nav-link" href="#">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link responsive-nav-link text-decoration-none p-0 border-0">Log Out</button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
