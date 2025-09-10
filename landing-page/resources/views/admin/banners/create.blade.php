@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Novo Banner</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Imagem (jpg, jpeg, png)</label>
            <input type="file" name="image_path" class="form-control" accept=".jpg,.jpeg,.png" required>
            <small class="text-muted">Recomendado: horizontal (ex: 4000x866)</small>
        </div>

        <div class="mb-3">
            <label class="form-label">URL (opcional)</label>
            <input type="url" name="url" class="form-control" value="{{ old('link_url') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status" id="status" class="form-check-input" {{ old('status') ? 1 : 0 }}>
            <label class="form-check-label" for="status">Ativo</label>
        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-link">Voltar</a>
    </form>
</div>
@endsection
