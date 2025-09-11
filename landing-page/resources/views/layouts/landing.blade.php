@extends('layouts.landing')

@section('content')
<!-- Carousel -->
@if($banners->count())
<div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($banners as $i => $b)
            <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$b->image_path) }}" class="d-block w-100" alt="{{ $b->title }}">
                @if($b->title)
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $b->title }}</h5>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endif

<!-- Services example (static placeholders) -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Nossos serviços</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3" alt="">
                <h5>Manipulação de Receitas</h5>
                <p>Descrição curta do serviço.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3" alt="">
                <h5>Produtos Naturais</h5>
                <p>Descrição curta do serviço.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3" alt="">
                <h5>Farmácia Veterinária</h5>
                <p>Descrição curta do serviço.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
@if($faqs->count())
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="mb-4">Ficou com alguma dúvida?</h3>
        <div class="accordion" id="faqAccordion">
            @foreach($faqs as $i => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $i }}">
                    <button class="accordion-button {{ $i>0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i==0 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
                        {{ $faq->question }}
                    </button>
                </h2>
                <div id="collapse{{ $i }}" class="accordion-collapse collapse {{ $i==0 ? 'show' : '' }}" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Contact form partial (simple) -->
<section class="py-5">
    <div class="container">
        <h3 class="mb-4">Solicite um orçamento</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row g-3">
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

            <!-- <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" value="1" id="agree" name="agreed_privacy" {{ old('agreed_privacy') ? 'checked' : '' }}>
                <label class="form-check-label" for="agree">
                    Estou de acordo com as <a href="#">Políticas de Privacidade</a>.
                </label>
            </div> -->

            <button class="btn btn-success">Enviar solicitação</button>
        </form>
    </div>
</section>
@endsection
