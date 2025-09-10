@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Editar Banner #{{ $banner->id }}</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<!-- 
        <div class="mb-3">
            <label class="form-label">Título (opcional)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title) }}">
        </div> -->

        <div class="mb-3">
            <label class="form-label">Imagem atual</label><br>
            @if($banner->image_path)
                <img src="{{ asset('storage/'.$banner->image_path) }}" alt="" style="max-width:300px;">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Substituir imagem (opcional)</label>
            <input type="file" name="image_path" class="form-control" accept=".jpg,.jpeg,.png">
        </div>

        <div class="mb-3">
            <label class="form-label">URL (opcional)</label>
            <input type="url" name="url" class="form-control" value="{{ old('url', $banner->url) }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status" id="status" class="form-check-input" {{ old('status', $banner->status) ? 1 : 0 }}>
            <label class="form-check-label" for="status">Ativo</label>
        </div>

        <button class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-link">Voltar</a>
    </form>
</div>
@endsection
