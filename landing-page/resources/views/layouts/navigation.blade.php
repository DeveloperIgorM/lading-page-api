<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Navegação Bootstrap</title>
    <!-- Inclui a CDN do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link para o nosso arquivo de estilo SCSS compilado -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos de fonte globais, se necessário */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
        <div class="container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <svg class="d-inline-block align-text-top h-9 w-auto fill-current text-gray-800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 22h20L12 2zM12 6.5L17.5 17H6.5L12 6.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <!-- Botão Hamburguer para dispositivos móveis -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de Navegação -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">LOREMIPSUM</a>
                    </li>
                </ul>

                <!-- Dropdown do Perfil -->
                <ul class="navbar-nav d-none d-sm-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nome do Usuário
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Novo Bloco Adaptado para dispositivos móveis -->
                <div class="d-sm-none responsive-profile-section">
                    <div class="user-info-section">
                        <div class="user-name">
                            <div class="fw-medium text-dark">
                                <div>@if(Auth::check())
                                    <div>{{ Auth::user()->name }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="user-email">
                            <div class="fw-medium text-secondary">
                                <div>@if(Auth::check())

                                    <div>{{ Auth::user()->email }}</div>

                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <a class="nav-link responsive-nav-link" href="#">Profile</a>

                        <!-- Autenticação -->
                        <form method="POST" action="#">
                            <!-- Aqui seria a lógica do Blade, substituída por um botão de exemplo -->
                            <button type="submit" class="btn btn-link responsive-nav-link text-decoration-none p-0 border-0">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>